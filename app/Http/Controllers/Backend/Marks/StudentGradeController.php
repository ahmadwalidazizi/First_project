<?php

namespace App\Http\Controllers\Backend\Marks;

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
use App\Models\AssignSubject;
use App\Models\Examtype;
use App\Models\StudentMarks;
use App\Models\MarksGrade;
use DB;
use PDF;

class StudentGradeController extends Controller
{
    public function MarksGradeView(){
        $data ['allData'] = MarksGrade::all();
        return view('Backend.marks.grade_marks_view', $data);
    }

    public function MarksGradeAdd(){
        $data ['exams'] = Examtype::all();
        return view('Backend.marks.grade_marks_add', $data);
    }

    public function MarksGradeStore(Request $request){
        $gradeCount = count($request->grade_name);
        if ($gradeCount != NULL) {
            for ($i=0; $i <$gradeCount ; $i++) { 
                $data = new MarksGrade();
                $data -> examtype = $request -> examtype;
                $data -> grade_name = $request -> grade_name[$i];
                $data -> start_marks = $request -> start_marks[$i];
                $data -> end_marks = $request -> end_marks[$i];
                $data -> remarks = $request -> remarks[$i];
                $data -> save();
            }//end for loop
        }//end if

        $notification = array(
            'message' => 'Marks Grade Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('marks.grade.view')->with($notification);
    }

    public function MarksGradeEdit($id){
        $data ['editData'] = MarksGrade::find($id);
        $data ['exams'] = Examtype::all();
        return view('Backend.marks.grade_marks_edit',$data);
    }

    public function MarksGradeUpdate(Request $request, $id){

        $data = MarksGrade::find($id);
        $data -> examtype = $request -> examtype;
        $data -> grade_name = $request -> grade_name;
        $data -> start_marks = $request -> start_marks;
        $data -> end_marks = $request -> end_marks;
        $data -> remarks = $request -> remarks;
        $data -> save();

        $notification = array(
            'message' => 'Marks Grade Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('marks.grade.view')->with($notification);
    }

    public function MarksGradeDelete($id){
        $delete = MarksGrade::find($id);
        $delete -> delete();

        $notification = array(
            'message' => 'Marks Grade Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->route('marks.grade.view')->with($notification);
    }
}

