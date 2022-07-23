<?php

namespace App\Http\Controllers\Backend\report;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentMarks;
use App\Models\Examtype;
use App\Models\MarksGrade;
use App\Models\AssignStudents;
class MarkSheetController extends Controller
{
    public function MarkSheetGenerateView(){
        $data ['classes'] = StudentClass::orderBy('id', 'asc')->get();
        $data ['grades'] = StudentGroup::all();
        $data ['exams'] = Examtype::all();

        return view('Backend.report.mark_sheet.mark_sheet_view',$data);
    }

    public function MarkSheetGet(Request $request){
        $class_id = $request -> class_id;
        $exams = $request -> exam_type_id;
        $id_no = $request -> id_no;

        $count_fail = StudentMarks::where('class_id', $class_id)->where('exam_type_id', $exams)->where('id_no', $id_no)->where('marks','<','50')->count();
        //dd($count_fail);

        $single_student = StudentMarks::where('class_id', $class_id)
        ->where('exam_type_id', $exams)->where('id_no', $id_no)->first();

        if ($single_student == true) {
            $all_marks = StudentMarks::with(['subject','studentAssign', 'student'])->where('class_id', $class_id)
            ->where('exam_type_id', $exams)->where('id_no', $id_no)->get();
            //dd($all_marks->toArray());

            $all_grade = MarksGrade::all();
            return view('Backend.report.mark_sheet.mark_sheet_pdf',compact('count_fail', 'all_marks', 'all_grade'));
        }else{
            $notification = array(
                'message' => 'Sorry These Criteria Donse not match',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }
    }
}
