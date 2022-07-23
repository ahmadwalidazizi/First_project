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
use App\Models\StudentMarks;
use App\Models\Examtype;
use DB;
use PDF;

class StudentMarksController extends Controller
{
	public function MarkView(){
		$data ['allData'] = StudentMarks::select('class_id')->groupby('class_id')->get();
		$data['classes'] = StudentClass::all();
        $data['exams'] = Examtype::all();

        return view('Backend.marks.mark_view',$data);
	}

    public function MarksAdd(){
        $data['classes'] = StudentClass::all();
        $data['exams'] = Examtype::all();

        return view('Backend.marks.marks_add',$data);
    }

    public function MarksEntryStore(Request $request){

        $studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i < count($request->student_id) ; $i++) { 
    		$data = new StudentMarks();
    		$data->class_id = $request->class_id;
    		$data->assign_subject_id = $request->assign_subject_id;
    		$data->exam_type_id = $request->exam_type_id;
    		$data->student_id = $request->student_id[$i];
    		$data->id_no = $request->id_no[$i];
    		$data->marks = $request->marks[$i];
    		$data->save();

    		} // end for loop
    	}// end if conditon

			$notification = array(
    		'message' => 'Student Marks Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('marks.view')->with($notification);
    }

	public function MarksEntryEdit(){
		$data['classes'] = StudentClass::all();
        $data['grades'] = StudentGroup::all();
        $data['exams'] = Examtype::all();

        return view('Backend.marks.marks_edit',$data);
	}

	public function MarksEntryGetStudent(Request $request){
		$class_id = $request -> class_id;
		$assign_subject_id = $request -> assign_subject_id;
		$exam_type_id = $request -> exam_type_id;

		$getstudent = StudentMarks::with(['student'])->where('class_id', $class_id)->where('assign_subject_id', $assign_subject_id)
		->where('exam_type_id',$exam_type_id)->get();
		return response()->json($getstudent);
	}

	public function MarksEntryUpdate(Request $request){

		StudentMarks::where('class_id', $request->class_id)->where('assign_subject_id', $request->assign_subject_id)
		->where('exam_type_id', $request->exam_type_id)->delete();
		$studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i < count($request->student_id) ; $i++) { 
    		$data = new StudentMarks();
    		$data->class_id = $request->class_id;
    		$data->assign_subject_id = $request->assign_subject_id;
    		$data->exam_type_id = $request->exam_type_id;
    		$data->student_id = $request->student_id[$i];
    		$data->id_no = $request->id_no[$i];
    		$data->marks = $request->marks[$i];
    		$data->save();

    		} // end for loop 
    	}// end if conditon

			$notification = array(
    		'message' => 'Student Marks Updated Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('marks.view')->with($notification);
	}

	public function MarksDetails($class_id){
		$data ['marksDetails'] = StudentMarks::where('class_id', $class_id)->orderby('student_id', 'asc')->get();
		$data['classes'] = StudentClass::all();
        $data['grades'] = StudentGroup::all();
        $data['exams'] = Examtype::all();
		return view('Backend.marks.marks_details', $data);
	}
}
