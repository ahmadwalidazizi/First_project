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
use DB;
use PDF;

class EmployeeLeaveController extends Controller
{
    public function EmployeeLeaveView(){
        $data ['allData'] = EmployeeLeave::orderby('id','Desc')->get();
        return view('Backend.employee.employee_leave.employee_leave_view',$data);
    }

    public function EmployeeLeaveAdd(){
        $data['employees'] = User::where('usertype','Employee')->get();
        $data ['leave_purpose'] = LeavePurpose::all();
        return view('Backend.employee.employee_leave.employee_leave_add',$data);
    }

    public function EmployeeLeaveStore(Request $request){
        if ($request -> leave_purpose_id == "0") {
            $leavepurpose = new LeavePurpose();
            $leavepurpose -> name = $request -> name;
            $leavepurpose -> save();
            $leave_purpose_id = $leavepurpose -> id;
        }
        else{
            $leave_purpose_id = $request -> leave_purpose_id;
        }

        $data = new EmployeeLeave();
        $data -> employee_id = $request -> employee_id;
        $data -> leave_purpose_id = $leave_purpose_id;
        $data -> start_date = $request -> start_date;
        $data -> end_date = $request -> end_date;
        $data -> save();

        $notification = array(
            'message' => 'Employee Leave inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('employee.leave.view')->with($notification);
    }

    public function EmployeeLeaveEdit($id){
        $data ['editData'] = EmployeeLeave::find($id);
        $data ['employees'] = User::where('usertype','Employee')->get();
        $data ['leave_purpose'] = LeavePurpose::all();
        return view('Backend.employee.employee_leave.employee_leave_edit', $data);
    }

    public function EmployeeLeaveUpdate(Request $request, $id){
        if ($request -> leave_purpose_id == "0") {
            $leavepurpose = new LeavePurpose();
            $leavepurpose -> name = $request -> name;
            $leavepurpose -> save();
            $leave_purpose_id = $leavepurpose -> id;
        }
        else{
            $leave_purpose_id = $request -> leave_purpose_id;
        }

        $data = EmployeeLeave::find($id);
        $data -> employee_id = $request -> employee_id;
        $data -> leave_purpose_id = $leave_purpose_id;
        $data -> start_date = $request -> start_date;
        $data -> end_date = $request -> end_date;
        $data -> save();

        $notification = array(
            'message' => 'Employee Leave Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('employee.leave.view')->with($notification);
    }

    public function EmployeeLeaveDelete($id){
        $data = EmployeeLeave::find($id);
        $data -> delete();

        $notification = array(
            'message' => 'Employee Leave deleted successfully',
            'alert-type' => 'warning'
        );
        return redirect()->route('employee.leave.view')->with($notification);
    }
}
