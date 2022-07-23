<?php

namespace App\Http\Controllers\Backend\students;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignEmployee;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\Subject;
use App\Models\StudentTimetable;
use DB;
use PDF;

class StudentTimetableController extends Controller
{
    public function StudentTimetableView(){
        $data ['allData'] = StudentTimetable::select('class_id')->groupby('class_id')->get();
        return view('Backend.student.timetable.timetable_view',$data);
    }

    public function StudentTimetableAdd(){
        $data ['teachers'] = AssignEmployee::with(['employee'])->get();
        $data ['subjects'] = Subject::all();
        $data ['classes'] = StudentClass::all();
        //$data ['grades'] = StudentGroup::all();
        return view('Backend.student.timetable.timetable_add',$data);
    }

    public function StudentTimetableStore(Request $request){

        $countday = count($request->day);
        if ($countday != NULL) {
            for ($i=0; $i < $countday ; $i++) { 
                $assign_timetable = new StudentTimetable();
                $assign_timetable  -> class_id = $request->class_id;
                //$assign_timetable  -> group_id = $request->group_id;
                $assign_timetable  -> day = $request->day[$i];
                $assign_timetable  -> teacher_1 = $request->teacher_1[$i];
                $assign_timetable  -> teacher_2 = $request->teacher_2[$i];
                $assign_timetable  -> teacher_3 = $request->teacher_3[$i];
                $assign_timetable  -> teacher_4 = $request->teacher_4[$i];
                $assign_timetable  -> teacher_5 = $request->teacher_5[$i];
                $assign_timetable  -> teacher_6 = $request->teacher_6[$i];
                $assign_timetable  -> teacher_7 = $request->teacher_7[$i];
                $assign_timetable  -> subject_1 = $request->subject_1[$i];
                $assign_timetable  -> subject_2 = $request->subject_2[$i];
                $assign_timetable  -> subject_3 = $request->subject_3[$i];
                $assign_timetable  -> subject_4 = $request->subject_4[$i];
                $assign_timetable  -> subject_5 = $request->subject_5[$i];
                $assign_timetable  -> subject_6 = $request->subject_6[$i];
                $assign_timetable  -> subject_7 = $request->subject_7[$i];
                $assign_timetable  -> save();
            }
        }
        $notification = array(
            'message' => 'Timetable inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.timetable.view')->with($notification);
    }

    public function StudentTimetableEdit($class_id){
        $data ['editData'] = StudentTimetable::where('class_id',$class_id)->orderby('class_id','asc')->get();
        $data ['subjects'] = Subject::all();
        $data ['classes'] = StudentClass::all();
        //$data ['grades'] = StudentGroup::all();
        $data ['teachers'] = AssignEmployee::all();
        return view('Backend.student.timetable.timetable_edit',$data);
    }

    public function StudentTimetableUpdate(Request $request, $class_id){
        if ($request->day == NULL) {
            $notification = array(
                'message' => 'Sorry you do not select any day',
                'alert-type' => 'warning'
            );
            return redirect()->route('student.timetable.edit', $class_id)->with($notification);
        }else{
            $countday = count($request->day);
            StudentTimetable::where('class_id', $class_id)->delete();
            for ($i=0; $i <$countday ; $i++) { 
                $assign_timetable = new StudentTimetable();
                $assign_timetable  -> class_id = $request->class_id;
                //$assign_timetable  -> group_id = $request->group_id;
                $assign_timetable  -> day = $request->day[$i];
                $assign_timetable  -> teacher_1 = $request->teacher_1[$i];
                $assign_timetable  -> teacher_2 = $request->teacher_2[$i];
                $assign_timetable  -> teacher_3 = $request->teacher_3[$i];
                $assign_timetable  -> teacher_4 = $request->teacher_4[$i];
                $assign_timetable  -> teacher_5 = $request->teacher_5[$i];
                $assign_timetable  -> teacher_6 = $request->teacher_6[$i];
                $assign_timetable  -> teacher_7 = $request->teacher_7[$i];
                $assign_timetable  -> subject_1 = $request->subject_1[$i];
                $assign_timetable  -> subject_2 = $request->subject_2[$i];
                $assign_timetable  -> subject_3 = $request->subject_3[$i];
                $assign_timetable  -> subject_4 = $request->subject_4[$i];
                $assign_timetable  -> subject_5 = $request->subject_5[$i];
                $assign_timetable  -> subject_6 = $request->subject_6[$i];
                $assign_timetable  -> subject_7 = $request->subject_7[$i];
                $assign_timetable  -> save();
            }
            $notification = array(
                'message' => 'Timetable Updated successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('student.timetable.view')->with($notification);
        }
    }
    
    public function StudentTimetableDetails($class_id){
        $data ['timetableDetails'] = StudentTimetable::where('class_id', $class_id)->get();
        $data ['teachers'] = AssignEmployee::all();
        $data ['subjects'] = Subject::all();
        return view('Backend.student.timetable.timetable_details', $data);
    }
}

