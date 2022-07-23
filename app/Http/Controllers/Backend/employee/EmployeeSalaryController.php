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
use App\Models\EmployeeDecrement;
use DB;
use PDF;

class EmployeeSalaryController extends Controller
{
    public function EmployeeSalaryView(){
        $data['allData'] = AssignEmployee::all();
        //dd($data['allData']);
        return view('Backend.employee.employee_salary.employee_salary_view', $data);
    }

    public function EmployeeSalaryIncrement($id){
        $data ['editData'] = AssignEmployee::with(['employee'])->where('employee_id', $id)->first();
        $data ['editData'] = AssignEmployee::find($id);
        //$data['editData'] = User::all();
        //dd($data['editData']);
        return view('Backend.employee.employee_salary.employee_salary_increment', $data);
    } 

    public function EmployeeSalaryIncrementUpdate(Request $request, $id){
        $user = AssignEmployee::find($id);
        //dd($user)->toArray();
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary+(float)$request->increment_salary; 
        $user->salary = $present_salary;
        $user -> save();

        $salaryData = new EmployeeSalaryLog();
        $salaryData -> employee_id = $id;
        $salaryData -> previous_salary = $previous_salary;
        $salaryData -> increment_salary = $request -> increment_salary;
        $salaryData -> present_salary = $present_salary;
        $salaryData -> effected_salary = $request-> effected_salary;
        $salaryData -> increment_reason = $request-> increment_reason;
        $salaryData -> save();

        $notification = array(
            'message' => "Employee Salary Incremented Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('employee.salary.view')->with($notification);
    }

    public function EmployeeSalaryDetails($id){
        $data['details'] = AssignEmployee::find($id);
        $data['salarylog'] = EmployeeSalaryLog::where('employee_id', $data['details']->id)->get();
        //dd($data['salarylog'])->toArray();
        return view('Backend.employee.employee_salary.employee_salary_details',$data);
    }

    //Decrement section 

    public function EmployeeSalaryDecrement($id){
        $data ['editData'] = AssignEmployee::with(['employee'])->where('employee_id', $id)->first();
        $data ['editData'] = AssignEmployee::find($id);
        //$data['editData'] = User::all();
        //dd($data['editData']);
        return view('Backend.employee.employee_salary.employee_salary_decrement', $data);
    }
    
    public function EmployeeSalaryDecrementUpdate(Request $request, $id){
        $user = AssignEmployee::find($id);
        //dd($user)->toArray();
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary-(float)$request->decrement_salary; 
        $user->salary = $present_salary;
        $user -> save();

        $salaryData = new EmployeeDecrement();
        $salaryData -> employee_id = $id;
        $salaryData -> previous_salary = $previous_salary;
        $salaryData -> decrement_salary = $request -> decrement_salary;
        $salaryData -> present_salary = $present_salary;
        $salaryData -> effected_salary = $request-> effected_salary;
        $salaryData -> decrement_reason = $request-> decrement_reason;
        $salaryData -> save();

        $notification = array(
            'message' => "Employee Salary decremeneted Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('employee.salary.view')->with($notification);
    }

    public function EmployeeDecrementdSalaryDetails($id){
        $data['details'] = AssignEmployee::find($id);
        $data['salarylog'] = EmployeeDecrement::where('employee_id', $data['details']->id)->get();
        //dd($data['salarylog'])->toArray();
        return view('Backend.employee.employee_salary.employee_salary_decrement_details',$data);
    }
}
