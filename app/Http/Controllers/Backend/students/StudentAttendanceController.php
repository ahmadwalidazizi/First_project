<?php

namespace App\Http\Controllers\Backend\students;
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
use App\Models\StudentParent;
use App\Models\Transportation;
use App\Models\StudentAttendace;
use DB;
use PDF;
class StudentAttendanceController extends Controller
{
    public function StudentAttendanceView(){
        $data ['allData'] = StudentAttendace::select('date')->groupBy('date')->orderBy('id','asc')->get();
        return view('Backend.student.attendance.attendance_view', $data);
    }

    public function StudentAttendanceAdd(){
        $data ['employees'] = User::where('usertype','Student')->get();
        $data ['classes'] = StudentClass::all();
        $data ['grades'] = StudentGroup::all();
        return view('Backend.student.attendance.attendance_add', $data);
    }
}
