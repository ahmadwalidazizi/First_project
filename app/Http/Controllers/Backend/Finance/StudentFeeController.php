<?php

namespace App\Http\Controllers\Backend\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudents;
use App\Models\User;
use App\Models\StudentDiscount;
use App\Models\FeeAmount;
use App\Models\Registration_fee_amount;
use App\Models\FeeCatagory;
use App\Models\StudentYear;
use App\Models\StudentShift;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentParent;
use App\Models\StudentFinanceFee;
use App\Models\Transportation;
use DB;
use PDF;

class StudentFeeController extends Controller
{
    public function StudentsFeeView(){
        $data ['allData'] = StudentFinanceFee::all();
        return view('Backend.finance.student_fee.student_fee_view', $data);
    }

    public function StudentsFeeAdd(){
        //$data ['grades'] = StudentGroup::all();
        $data ['classes'] = StudentClass::all();
        $data ['fee_catagory'] = FeeCatagory::all(); 

        return view('Backend.finance.student_fee.student_fee_add', $data);
    }

    public function FianceFeeGetStsudent(Request $request){
        $class_id = $request->class_id;
        $fee_catagory_id = $request->fee_catagory_id;
        $date = date('Y-m',strtotime($request->date));    	   
    	
        $data = AssignStudents::with(['student','discountStudent'])->where('class_id',$class_id)->get();
    	$html['thsource']  = '<th>ID No</th>';
    	$html['thsource'] .= '<th>Student Name</th>';
    	$html['thsource'] .= '<th>Father Name</th>';
    	$html['thsource'] .= '<th>Monthly></th>';
    	$html['thsource'] .= '<th>Transport</th>';
      	$html['thsource'] .= '<th>Discount</th>';
      	$html['thsource'] .= '<th>Fee (This Student)</th>';
      	$html['thsource'] .= '<th>Select</th>';

    	 foreach ($data as $key => $std) {
            $registrationfee = FeeAmount::where('fee_catagory_id',$fee_catagory_id)->where('class_id',$std->class_id)->first();
            $transportation = Transportation::all();
            $accountstudentfees = StudentFinanceFee::where('student_id',$std->id)->where('class_id',$std->class_id)
            ->where('class_id',$std->class_id)->where('fee_catagory_id',$fee_catagory_id)->where('date',$date)->first();
            if($accountstudentfees !=null) {
                $checked = 'checked';
            }else{
                $checked = '';
            }  	 	 
        $color = 'success';
        $html[$key]['tdsource']  = '<td>'.$std['student']['id_no']. 
        '<input type="hidden" name="fee_catagory_id" value= " '.$fee_catagory_id.' " >'.'</td>';

        $html[$key]['tdsource']  .= '<td>'.$std['student']['name']. 
        '<input type="hidden" name="group_id" value= " '.$std->group_id.' " >'.'</td>';

        $html[$key]['tdsource']  .= '<td>'.$std['student']['name']. 
        '<input type="hidden" name="class_id" value= " '.$std->class_id.' " >'.'</td>';

        $html[$key]['tdsource']  .= '<td>'.$registrationfee->amount.'Af'.
        '<input type="hidden" name="date" value= " '.$date.' " >'.'</td>';

        $html[$key]['tdsource'] .= '<td>'.$std -> $transportation.''.'</td>';

        $html[$key]['tdsource'] .= '<td>'.$std['discountStudent']['discount'].'%'.'</td>';
  
        $orginalfee = $registrationfee->amount;
        $discount = $std['discountStudent']['discount'];
        $discountablefee = $discount/100*$orginalfee;
        $finalfee = (int)$orginalfee-(int)$discountablefee;    	 	 

        $html[$key]['tdsource'] .='<td>'. '<input type="text" name="amount[]" value="'.$finalfee.' " class="form-control" readonly'.'</td>';
        
        $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="student_id[]" value="'.$std->student_id.'">'.
        '<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' 
         style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>'; 

    	 }  
    	return response()->json(@$html);
    }
}
