<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function ViewStudentClass(){
        $data ['allData'] = StudentClass::all();
        return view('Backend.setup.student_class.view_class',$data);
    }

    public function StoreStudentClass(Request $request){
        $validatedData = $request -> validate([
        'name' => 'required|unique:student_classes,name',
        ]);
        $data = new StudentClass();
        $data -> name = $request->name;
        $data -> save();

        $notification = array(
            'message' => 'Class inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }

    public function UpdateStudentClass($id){
        $editData = StudentClass::find($id);
        return view('Backend.setup.student_class.edit_class',compact('editData'));
    }

    public function StudentClassUpdate(Request $request, $id){
        $data = StudentClass::find($id);
        $validatedData = $request -> validate([
            'name' => 'required|unique:student_classes,name,'.$data->id
        ]);
        
        $data -> name = $request->name;
        $data -> save();

        $notification = array(
            'message' => 'Class updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.class.view')->with($notification);
    }

    public function DeleteClassStudent($id){
        $user = StudentClass::find($id);
        $user -> delete();

        $notification = array(
            'message' => 'Class Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }
}