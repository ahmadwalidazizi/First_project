<?php

namespace App\Http\Controllers\Backend\students;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudents;
use App\Models\User;
use App\Models\StudentDiscount;
use App\Models\FeeAmount;
use App\Models\StudentYear;
use App\Models\StudentShift;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentParent;
use App\Models\Transportation;
use DB;
use PDF;
 
class MonthlyFeeController extends Controller
{
    public function MonthlyFeeView(){
        $data['classes'] = StudentClass::all();
        $data['grades'] = StudentGroup::all();
        return view('Backend.student.monthly_fee.monthly_fee_view',$data);
    }

    public function MonthlyFeeClassData(Request $request){

        $class_id = $request->class_id;
        //$group_id = $request->group_id;

        if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
        }
        /*
        if ($class_id !='') {
            $where[] = ['group_id','like',$group_id.'%'];
        }
        */
        $allStudent = AssignStudents::with(['discountStudent','transport'])->where($where)->get();

        
        //dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>S/Name</th>';
        $html['thsource'] .= '<th>F/Name</th>';
        $html['thsource'] .= '<th>M/Fee</th>';
        $html['thsource'] .= '<th class="fa fa-car"> Fee</th>';
        $html['thsource'] .= '<th>Discount</th>';
        $html['thsource'] .= '<th>Total Fee</th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach ($allStudent as $key => $v) {
            $registrationfee = FeeAmount::where('fee_catagory_id','2')->where('class_id',$v->class_id)->first();
            
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v -> father_name.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee -> amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['transport']['amount'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['discountStudent']['discount'].'%'.'</td>';
            
            $originalfee = $registrationfee->amount;
            $discount = $v['discountStudent']['discount'];
            $transport = $v['transport']['amount'];
            $total_original_fee = $originalfee+$transport;
            $discounttablefee = $discount/100*$total_original_fee;
            $finalfee = (float)$originalfee+(float)$transport-(float)$discounttablefee;

            $html[$key]['tdsource'] .='<td>'.$finalfee.'Afn'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'
            .route("student.monthly.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.' &month='.$request->month.'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }  
       return response()->json(@$html);

   }// end method 

   public function MonthlyFeePaySlip(Request $request){
    $student_id = $request->student_id;
    $class_id = $request->class_id;
    $allStudent['month'] = $request -> month;

    $allStudent['details'] = AssignStudents::with(['student','discountStudent'])->where('student_id',$student_id)->where('class_id',$class_id)->first();

    $pdf = PDF::loadView('backend.student.monthly_fee.monthly_fee_pdf', $allStudent);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');
   }
}
