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

class EmployeeAttendanceController extends Controller
{
    public function EmployeeAttendanceView(){
        $data ['allData'] = EmployeeAttendance::select('date')->groupby('date')->orderby('id','asc')->get();
        //$data ['allData'] = EmployeeAttendance::orderby('id','Desc')->get();
        return view('Backend.employee.employee_attendance.employee_attendance_view',$data);
    }

    public function EmployeeAttendanceAdd(){
        $data ['employees'] = User::where('usertype','Employee')->get();
		$data ['assign_employee'] = AssignEmployee::all();
        return view('Backend.employee.employee_attendance.employee_attendance_add',$data);
    }

    public function EmployeeAttendanceStore(Request $request){
		EmployeeAttendance::where('date', date('Y-m-d', strtotime($request -> date)))->delete();
        $countemployee = count($request->employee_id);
    	for ($i=0; $i <$countemployee ; $i++) { 
    		$attend_status = 'attend_status'.$i;
    		$attend = new EmployeeAttendance();
    		$attend->date = date('Y-m-d',strtotime($request->date));
    		$attend->employee_id = $request->employee_id[$i];
    		$attend->attend_status = $request->$attend_status;
    		$attend->save();
    	} // end For Loop

 		$notification = array(
    		'message' => 'Employee Attendace Data Update Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.attendance.view')->with($notification);
    }

	public function EmployeeAttendanceEdit($date){

		$data['editData'] = EmployeeAttendance::where('date',$date)->get();
    	$data['employees'] = User::where('usertype','Employee')->get();

		return view('Backend.employee.employee_attendance.employee_attendance_edit',$data);
	}

	public function EmployeeAttendanceDetails($date){

		$data ['details'] = EmployeeAttendance::with(['user'])->where('date',$date)->get();
		return view('Backend.employee.employee_attendance.employee_attendance_details',$data);
	}


}