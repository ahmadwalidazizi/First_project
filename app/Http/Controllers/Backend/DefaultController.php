<?php

namespace App\Http\Controllers\Backend;
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

class DefaultController extends Controller
{
    public function GetSubject(Request $request){
        
        $class_id = $request -> class_id;
        if ($class_id !='') {
            $where[] = ['class_id','like',$class_id.'%'];
        }
        
        $allData = AssignSubject::with(['student_subject'])->where($where)->get();
        return response()->json($allData);
    }

    public function GetStudents(Request $request){
    	$class_id = $request->class_id;
    	$allData = AssignStudents::with(['student'])->where('class_id',$class_id)->get();
    	return response()->json($allData);
    }


        
}
