<?php

namespace App\Http\Controllers\Backend\employee;

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
use App\Models\AssignEmployee;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use App\Models\LeavePurpose;
use App\Models\EmployeeLeave;
use App\Models\EmployeeAttendance;
use DB;
use PDF;

class EmployeeMonthlySalaryController extends Controller
{
    public function EmployeeMonthlySalaryView(){
        return view('Backend.employee.monthly_salary.monthly_salary_view');
    }

    public function EmployeeMonthlySalaryGet(Request $request){
        $date = date('Y-m',strtotime($request->date));
    	 if ($date !='') {
    	 	$where[] = ['date','like',$date.'%'];
    	 }
    	 
    	 $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user','salary'])->where($where)->get();
		 $data = AssignEmployee::all();
		
    	 // dd($allStudent);
    	 $html['thsource']  = '<th>SL</th>';
    	 $html['thsource'] .= '<th>Employee Id</th>';
    	 $html['thsource'] .= '<th>Employee Name</th>';
    	 $html['thsource'] .= '<th>Basic Salary</th>';
    	 $html['thsource'] .= '<th>Salary This Month</th>';
    	 $html['thsource'] .= '<th >Action</th>';


    	 foreach ($data as $key => $attend) {
    	 	$totalattend = EmployeeAttendance::with(['user','salary'])->where($where)->where('employee_id',$attend->employee_id)->get();
    	 	$absentcount = count($totalattend->where('attend_status','Absent'));
    	 	$presentcount = count($totalattend->where('attend_status','Present'));
    	 	$leavecount = count($totalattend->where('attend_status','Leave'));

    	 	$color = 'success';
    	 	$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
    	 	$html[$key]['tdsource'] .= '<td>'.$attend['employee']['id_no'].'</td>';
    	 	$html[$key]['tdsource'] .= '<td>'.$attend['employee']['name'].'</td>';
    	 	$html[$key]['tdsource'] .= '<td>'.$attend ->salary.'</td>';
    	 	
    	 	$salary = (float)$attend->salary;
    	 	$salaryperday = (float)$salary/30;
    	 	$totalsalaryminus = (float)$absentcount*(float)$salaryperday;
    	 	$totalsalary = (float)$salary-(float)$totalsalaryminus;

    	 	$html[$key]['tdsource'] .='<td>'.$totalsalary.'AF'.'</td>';
    	 	$html[$key]['tdsource'] .='<td>';
    	 	$html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("employee.monthly.salary.payslip",$attend->employee_id).'">Salary Slip</a>';
    	 	$html[$key]['tdsource'] .= '</td>';

    	 }  
    	return response()->json(@$html);
    }

    public function EmployeeMonthlySalarySlip(Request $request, $employee_id){
		
		$id = EmployeeAttendance::where('employee_id',$employee_id)->first();
		$date = date('Y-m',strtotime($id->date));
    	 if ($date !='') {
    	 	$where[] = ['date','like',$date.'%'];
    	}
		$data['details'] = EmployeeAttendance::with(['user','salary'])->where($where)->where('employee_id',$id->employee_id)->get();
		$pdf = PDF::loadView('Backend.employee.monthly_salary.monthly_salary_pdf', $data);
		$pdf->SetProtection(['copy', 'print'], '', 'pass');
		return $pdf->stream('document.pdf');
    }
}
