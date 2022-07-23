<?php

namespace App\Http\Controllers\Backend\students;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudents;
use App\Models\User;
use App\Models\StudentDiscount;
use App\Models\FeeAmount;
use App\Models\Registration_fee_amount;
use App\Models\StudentYear;
use App\Models\StudentShift;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentParent;
use DB;
use PDF;

class FeeRegistrationController extends Controller
{
    public function FeeRegistrationView(){
        //$data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        //$data['grades'] = StudentGroup::all();
        return view('Backend.student.registration_fee.registration_fee_view',$data);
    }

    public function FeeRegClassData(Request $request){

        $class_id = $request->class_id;

        if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
        }

        $allStudent = AssignStudents::with(['discountStudent'])->where($where)->get();
        //dd($allStudent);
        $html['thsource']  = '<th>SL</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Father Name</th>';
        $html['thsource'] .= '<th>Registration Fee</th>';
        $html['thsource'] .= '<th>Uniform</th>';
        $html['thsource'] .= '<th>Qertasia</th>';
        $html['thsource'] .= '<th>Total</th>';
        $html['thsource'] .= '<th>Action</th>';

        foreach ($allStudent as $key => $v) {
            $registrationfee = Registration_fee_amount::where('fee_catagory_id','1')->where('class_id',$v->class_id)->first();
            $color = 'success';
            $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'] .= '<td>'.$v-> father_name.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->registration_amount.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->uniform.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$registrationfee->qertasia.'</td>';
            
            $originalfee = $registrationfee->registration_amount;
            $studentsuniform = $registrationfee->uniform;
            $qertasi = $registrationfee->qertasia;
  
            $finalfee = (float)$originalfee+(float)$studentsuniform+(float)$qertasi;

            $html[$key]['tdsource'] .='<td>'.$finalfee.'Afn'.'</td>';
            $html[$key]['tdsource'] .='<td>';
            $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'
            .route("student.registration.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'">Fee Slip</a>';
            $html[$key]['tdsource'] .= '</td>';

        }  
       return response()->json(@$html);

   }// end method 

   public function FeeRegPaySlip(Request $request){
    $student_id = $request->student_id;
    $class_id = $request->class_id;

    $allStudent['details'] = AssignStudents::with(['student','discountStudent'])->where('student_id',$student_id)->where('class_id',$class_id)->first();

    $pdf = PDF::loadView('backend.student.registration_fee.registration_fee_pdf', $allStudent);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');
   }
}
