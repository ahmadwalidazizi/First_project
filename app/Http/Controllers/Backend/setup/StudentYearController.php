<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function StudentYearView(){
        $data ['allData'] = StudentYear::all();
        return view('Backend.setup.student_year.view_year',$data);
    }

    public function StudentYearStore(Request $request){
        $validatedData = $request -> validate([
            'name' => 'required|unique:student_years,name',
        ]);
        $data = new StudentYear();
        $data -> name = $request->name;
        $data -> save();

        $notification = array(
            'message' => 'Year inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearEdit($id){
        $editData = StudentYear::find($id);
        return view('Backend.setup.student_year.edit_year',compact('editData'));
    }

    public function StudentYearUpdate(Request $request, $id){
      
        $data =  StudentYear::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id
        ]);

        $data -> name = $request->name;
        $data -> save();

        $notification = array(
            'message' => 'Year updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearDelete($id){
        $user = StudentYear::find($id);
        $user -> delete();

        $notification = array(
            'message' => 'Year Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }
    
}
