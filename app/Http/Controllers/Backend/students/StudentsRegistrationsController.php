<?php

namespace App\Http\Controllers\Backend\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudents;
use App\Models\User;
use App\Models\StudentDiscount;
use App\Models\StudentYear;
use App\Models\StudentShift;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentParent;
use App\Models\Transportation;
use App\Models\FeeAmount;
use App\Models\StudentTimetable;
use App\Models\AssignEmployee;
use App\Models\Subject;
use DB;
use PDF;

class StudentsRegistrationsController extends Controller
{ 

    public function StudentRegistrationView(){
        
    	$data['allData'] = AssignStudents::all();
        $data ['monthlyFee'] = FeeAmount::all();
    	return view('Backend.student.student_registration.student_view',$data);

    }
 
    public function StudentRegistrationAdd(){
        $data['years'] = StudentYear::all();
        $data['shifts'] = StudentShift::all();
        $data['classes'] = StudentClass::all();
        //$data['grades'] = StudentGroup::all();
        $data['transports'] = Transportation::all();
        return view('Backend.student.student_registration.student_add',$data);
    }
    public function StudentRegistrationStore(Request $request){
        DB::transaction(function() use($request){
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype','Student')->orderby('id','DESC')->first();
            if ($student == NULL) {
                $firstReg = 0;
                $studentId = $firstReg+1;
                if ($studentId < 10) {
                    $id_no = '000' .$studentId;
                }elseif ($studentId < 100) {
                    $id_no = '00' .$studentId;
                }elseif ($studentId < 1000) {
                    $id_no = '0' .$studentId;
                }
            }else {
                $student = User::where('usertype','Student')->orderby('id','DESC')->first()->id;
                $studentId = $student + 1;
                if ($studentId < 10) {
                    $id_no = '000' .$studentId;
                }elseif ($studentId < 100) {
                    $id_no = '00' .$studentId;
                }elseif ($studentId < 1000) {
                    $id_no = '0' .$studentId;
                }
            }

            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(000000,999999);
            $user -> id_no = $final_id_no;
            $user -> password = bcrypt($code);
            $user -> role = 'Student';
            $user -> usertype = 'Student';
            $user -> code = $code;
            $user -> name = $request -> name;
            $user -> mobile = $request -> mobile;
            $user -> email = $request -> email;
            $user -> address = $request -> address;
            $user->gender = $request->gender;
            $user -> save();

            $assign_student = new AssignStudents();
            $assign_student -> student_id = $user->id;
            $assign_student -> class_id = $request -> class_id;
            $assign_student -> transport_id = $request -> transport_id;
            $assign_student -> year_id = $request -> year_id;
            //$assign_student -> group_id = $request -> group_id;
            $assign_student -> shift_id = $request -> shift_id;
            $assign_student -> registration_date = $request -> registration_date;
            $assign_student -> base_number = $request -> base_number;
            $assign_student -> father_name = $request -> father_name;

            $assign_student -> tazkira_no = $request -> tazkira_no;
            $assign_student -> birth_place = $request -> birth_place;
            $assign_student -> dob = date('Y-m-d',strtotime($request -> dob));
            
            
            $assign_student -> save();
 
            $discount = new StudentDiscount();
            $discount -> assign_students_id = $assign_student -> id;
            $discount -> fee_category_id = '1';
            $discount -> discount = $request -> discount;
            $discount -> save();
        });

        $notification = array(
            'message' => "Student Inserted Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('student.registration.view')->with($notification);
    }

    public function StudentRegistrationEdit($student_id){
        $data['years'] = StudentYear::all();
        $data['shifts'] = StudentShift::all();
        $data['classes'] = StudentClass::all();
        //$data['grades'] = StudentGroup::all();
        $data['transports'] = Transportation::all();
        $data['fee'] = FeeAmount::all();

        $data ['editData'] = AssignStudents::with(['student','discountStudent'])->where('student_id', $student_id)->first();
       // dd($data['editData']->toArray());
        return view('Backend.student.student_registration.student_edit',$data);
    }

    public function StudentRegistrationUpdate(Request $request, $student_id){
        DB::transaction(function() use($request, $student_id){
            $user = User::where('id',$student_id)->first();
            $user -> name = $request -> name;
            $user -> mobile = $request -> mobile;
            $user -> email = $request -> email;
            $user -> address = $request -> address;
            $user -> gender = $request ->gender;
            $user -> status = $request -> status;

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/'.$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file -> move(public_path('upload/student_images'),$filename);
                $user ['image'] = $filename;
            }
            $user -> save();

            $assign_student = AssignStudents::where('id',$request->id)->where('student_id',$student_id)->first();
            $assign_student -> student_id = $user->id;
            $assign_student -> class_id = $request -> class_id;
            $assign_student -> transport_id = $request -> transport_id;
            $assign_student -> year_id = $request -> year_id;
            //$assign_student -> group_id = $request -> group_id;
            $assign_student -> shift_id = $request -> shift_id;
            $assign_student -> registration_date = $request -> registration_date;
            $assign_student -> base_number = $request -> base_number;
            $assign_student -> father_name = $request -> father_name;
            $assign_student -> grand_father_name = $request -> grand_father_name;
            $assign_student -> tazkira_no = $request -> tazkira_no;
            $assign_student -> birth_place = $request -> birth_place;
            $assign_student -> dob = date('Y-m-d',strtotime($request -> dob));
            $assign_student -> fullname = $request -> fullname;
            $assign_student -> relationship = $request -> relationship;
            $assign_student -> job = $request -> job;
            $assign_student -> job_location = $request -> job_location;
            $assign_student -> mobile = $request -> mobile;
            $assign_student -> email = $request -> email;
            $assign_student -> address = $request -> address;
            if ($request->file('tazkira_image')) {
                $file = $request->file('tazkira_image');
                @unlink(public_path('upload/student_images/students_tazkira_images/'.$assign_student->tazkira_image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file -> move(public_path('upload/student_images/students_tazkira_images'),$filename);
                $assign_student ['tazkira_image'] = $filename;
            }
            $assign_student -> save();
 
            $discount = StudentDiscount::where('assign_students_id', $request->id)->first();
            $discount -> discount = $request -> discount;
            $discount -> save();
        });

        $notification = array(
            'message' => "Student`s Information Updated Successfully",
            'alert-type' => 'info'
        );
        return redirect()->route('student.registration.view')->with($notification);
    }
    
    public function StudentDetails($student_id){
        $data['details'] = AssignStudents::with(['student','discountStudent'])->where('student_id',$student_id)->first();

        $pdf = PDF::loadView('backend.student.student_registration.student_details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function StudentTimetableDetails($class_id){
        $data ['timetableDetails'] = StudentTimetable::where('class_id', $class_id)->get();
        $data ['teachers'] = AssignEmployee::all();
        $data ['subjects'] = Subject::all();
        return view('Backend.student.student_registration.student_edit',$data);
    }

    // Students Change Status functions 

    public function StudentsChangeStatus(Request $request){
        $data = User::find($request->member_id);
        $data -> status = $request -> status;
        $data -> save();
    }

    // Student Fee pay functions 

    public function StudentMonthlyFee($student_id){
        $data['allData'] = AssignStudents::all();
        $data ['monthlyFee'] = FeeAmount::all();
    	return view('Backend.student.student_pay.student_pay',$data);
    }

}
