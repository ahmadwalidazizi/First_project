<?php

namespace App\Http\Controllers\Backend\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignEmployee;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\Subject;
use App\Models\TeacherTimetable;
use DB;
use PDF;

class TeacherTimetableController extends Controller
{
    public function TeacherTimetableView(){
        $data ['allData'] = TeacherTimetable::select('employee_id')->groupBy('employee_id')->get();
        return view('Backend.employee.timetable.timetable_view', $data);
    }

    public function TeacherTimetableAdd(){
        $data ['teachers'] = AssignEmployee::where('disgnation_id','2')->with(['employee'])->get();
        $data ['subjects'] = Subject::all();
        $data ['classes'] = StudentClass::all();

        return view('Backend.employee.timetable.timetable_add', $data);
    }

    public function TeacherTimetableStore(Request $request){
        $countday = count($request->day);
        if ($countday != NULL) {
            for ($i=0; $i < $countday; $i++) { 
                $assign_timetable = new TeacherTimetable();
                $assign_timetable -> employee_id = $request -> employee_id;
                $assign_timetable -> day = $request -> day[$i];
                $assign_timetable -> class_1 = $request -> class_1[$i];
                $assign_timetable -> class_2 = $request -> class_2[$i];
                $assign_timetable -> class_3 = $request -> class_3[$i]; 
                $assign_timetable -> class_4 = $request -> class_4[$i];
                $assign_timetable -> class_5 = $request -> class_5[$i];
                $assign_timetable -> class_6 = $request -> class_6[$i];
                $assign_timetable -> class_7 = $request -> class_7[$i];
                $assign_timetable -> subject_1 = $request -> subject_1[$i];
                $assign_timetable -> subject_2 = $request -> subject_2[$i];
                $assign_timetable -> subject_3 = $request -> subject_3[$i];
                $assign_timetable -> subject_4 = $request -> subject_4[$i];
                $assign_timetable -> subject_5 = $request -> subject_5[$i];
                $assign_timetable -> subject_6 = $request -> subject_6[$i];
                $assign_timetable -> subject_7 = $request -> subject_7[$i];
                $assign_timetable -> save();
            }//end for loop
        }//end if
        $notification = array(
            'message' => 'Timetable inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('teacher.timetable.view')->with($notification);
    }

    public function TeacherTimetableEdit($employee_id){
        $data ['editData'] = TeacherTimetable::where('employee_id',$employee_id)->orderby('employee_id', 'asc')->get();
        $data ['teachers'] = AssignEmployee::all();
        $data ['subjects'] = Subject::all();
        $data ['classes'] = StudentClass::all();
        
        return view('Backend.employee.timetable.timetable_edit', $data);
    }

    public function TeacherTimetableUpdate(Request $request, $employee_id){
        $countday = count($request->day);
        TeacherTimetable::where('employee_id', $employee_id)->delete();
        if ($countday != NULL) {
            for ($i=0; $i < $countday; $i++) { 
                $assign_timetable = new TeacherTimetable();
                $assign_timetable -> employee_id = $request -> employee_id;
                $assign_timetable -> day = $request -> day[$i];
                $assign_timetable -> class_1 = $request -> class_1[$i];
                $assign_timetable -> class_2 = $request -> class_2[$i];
                $assign_timetable -> class_3 = $request -> class_3[$i];
                $assign_timetable -> class_4 = $request -> class_4[$i];
                $assign_timetable -> class_5 = $request -> class_5[$i];
                $assign_timetable -> class_6 = $request -> class_6[$i];
                $assign_timetable -> class_7 = $request -> class_7[$i];
                $assign_timetable -> subject_1 = $request -> subject_1[$i];
                $assign_timetable -> subject_2 = $request -> subject_2[$i];
                $assign_timetable -> subject_3 = $request -> subject_3[$i];
                $assign_timetable -> subject_4 = $request -> subject_4[$i];
                $assign_timetable -> subject_5 = $request -> subject_5[$i];
                $assign_timetable -> subject_6 = $request -> subject_6[$i];
                $assign_timetable -> subject_7 = $request -> subject_7[$i];
                $assign_timetable -> save();
            }//end for loop
        }//End IF condition
        $notification = array(
            'message' => 'Timetable Upadated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('teacher.timetable.view')->with($notification);
    }

    public function TeacherTimetableDetails($employee_id){
        $data ['teachetimetabledetails'] = TeacherTimetable::where('employee_id', $employee_id)->get();
        $data ['classes'] = StudentClass::all();
        $data ['subjects'] = Subject::all();
        return view('Backend.employee.timetable.timetable_details', $data);
    }
}
