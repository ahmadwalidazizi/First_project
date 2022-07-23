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
use DB;
use PDF;

class EmployeeRegistrationController extends Controller
{
    public function EmployeeRegistrationView(){
        $data['allData'] = AssignEmployee::all();
        //$data['allData'] = User::where('usertype','Employee')->get();
        return view('Backend.employee.employee_reg.employee_view',$data);
    }

    public function EmployeeRegistrationAdd(){
        $data['disgnations'] = Designation::all();
        return view('Backend.employee.employee_reg.employee_add',$data);
    }

    public function EmployeeRegistrationStore(Request $request){
        DB::transaction(function() use($request){
            $checkYear = date('Y', strtotime($request->joining_date));
            $employee = User::where('usertype','Employee')->orderby('id','DESC')->first();
            if ($employee == NULL) {
                $firstReg = 0;
                $employeeId = $firstReg+1;
                if ($employeeId < 10) {
                    $id_no = '0' .$employeeId;
                }elseif ($employeeId < 100) {
                    $id_no = '00' .$employeeId;
                }elseif ($employeeId < 1000) {
                    $id_no = '0' .$employeeId;
                }
            }else {
                $employee = User::where('usertype','Employee')->orderby('id','DESC')->first()->id;
                $employeeId = $employee + 1;
                if ($employeeId < 10) {
                    $id_no ='0' .$employeeId;
                }elseif ($employeeId < 100) {
                    $id_no = '00' .$employeeId;
                }elseif ($employeeId < 1000) {
                    $id_no = '0' .$employeeId;
                }
            }

            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(000000,999999);
            $user -> id_no = $final_id_no;
            $user -> password = bcrypt($code);
            $user -> usertype = 'Employee';
            $user -> code = $code;
            $user -> name = $request -> name;
            $user -> mobile = $request -> mobile;
            $user -> email = $request -> email;
            $user -> address = $request -> address;
            $user ->gender = $request->gender;

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file -> move(public_path('upload/employee_images'),$filename);
                $user ['image'] = $filename;
            }
            $user -> save();

            $assign_employee = new AssignEmployee();
            $assign_employee -> employee_id = $user->id;
            $assign_employee -> disgnation_id = $request->disgnation_id;
            $assign_employee -> father_name = $request -> father_name;
            $assign_employee -> tazkira_no = $request -> tazkira_no;
            $assign_employee -> birth_place = $request -> birth_place;
            $assign_employee -> salary = $request -> salary;
            $assign_employee -> education_level = $request -> education_level;
            $assign_employee -> dob = date('Y-m-d',strtotime($request -> dob));
            $assign_employee -> joining_date = date('Y-m-d',strtotime($request -> joining_date));
            $assign_employee -> save();
 
            $salarylog = new EmployeeSalaryLog();
            $salarylog -> employee_id = $assign_employee -> id;
            $salarylog -> previous_salary = $request -> salary;
            $salarylog -> present_salary = $request -> salary;
            $salarylog -> increment_salary = '0' ;
            $salarylog -> effected_salary = date('Y-m-d',strtotime($request -> joining_date));
            $salarylog -> save();
        });

        $notification = array(
            'message' => "Employee Inserted Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('employee.registration.view')->with($notification);
    }

    public function EmployeeRegistrationEdit($employee_id){
        $data['disgnations'] = Designation::all();
        $data ['editData'] = AssignEmployee::with(['employee','designation'])->where('employee_id', $employee_id)->first();
        //dd($data['editData']->toArray());
        return view('Backend.employee.employee_reg.employee_edit',$data);
    }

    public function EmployeeRegistrationUpdate(Request $request, $employee_id){
        DB::transaction(function() use($request, $employee_id){
            $user = User::where('id',$employee_id)->first();
            $user -> name = $request -> name;
            $user -> mobile = $request -> mobile;
            $user -> email = $request -> email;
            $user -> address = $request -> address;
            $user -> gender = $request->gender;

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file -> move(public_path('upload/employee_images'),$filename);
                $user ['image'] = $filename;
            }
            $user -> save();

            $assign_employee = AssignEmployee::where('id',$request->id)->where('employee_id',$employee_id)->first();
            $assign_employee -> employee_id = $user->id;
            $assign_employee -> disgnation_id = $request->disgnation_id;
            $assign_employee -> father_name = $request -> father_name;
            $assign_employee -> tazkira_no = $request -> tazkira_no;
            $assign_employee -> birth_place = $request -> birth_place;
            $assign_employee -> salary = $request -> salary;
            $assign_employee -> education_level = $request -> education_level;
            $assign_employee -> faculty = $request -> faculty;
            $assign_employee -> field = $request -> field;
            $assign_employee -> exp_year = $request -> exp_year;
            $assign_employee -> organization = $request -> organization;
            $assign_employee -> position_title = $request -> position_title;
            $assign_employee -> dob = date('Y-m-d',strtotime($request -> dob));
            $assign_employee -> joining_date = date('Y-m-d',strtotime($request -> joining_date));
            $assign_employee -> save();

        });

        $notification = array(
            'message' => "Employee's Information Updated Successfully",
            'alert-type' => 'info'
        );
        return redirect()->route('employee.registration.view')->with($notification);
    }

    public function EmployeeDetails($employee_id){
        $data['details'] = AssignEmployee::with(['employee','designation'])->where('employee_id',$employee_id)->first();

        $pdf = PDF::loadView('backend.employee.employee_reg.employee_details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    } 

    public function EmployeeDelete($employee_id){
        $data = AssignEmployee::find($employee_id);
        $data -> delete();
        $notification = array(
            'message' => "Employee's Information deleted Successfully",
            'alert-type' => 'warning'
        );
        return redirect()->route('employee.registration.view')->with($notification);
    }
} 
