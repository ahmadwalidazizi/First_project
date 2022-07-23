<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function StudentGroupView(){
        $data ['allData'] = StudentGroup::all();
        return view('Backend.setup.student_group.view_group',$data);
    }

    public function StudentGroupStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = new StudentGroup();
        $data -> name = $request->name;
        $data -> save();

        $notification = array(
            'message' => 'Student Group inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);

    }

    public function StudentGroupEdit($id){
        $editData = StudentGroup::find($id);
        return view('Backend.setup.student_group.edit_group',compact('editData'));
    }

    public function StudentGroupUpdate(Request $request, $id){

        $data = StudentGroup::find($id);
        $validatedData = $request -> validate([
        'name' => 'required|unique:student_groups,name,'.$data->id
        ]);
        
        $data -> name = $request->name;
        $data -> save();

        $notification = array(
            'message' => 'Group updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.group.view')->with($notification);
        
    }

    public function StudentGroupDelete($id){
        $user = StudentGroup::find($id);
        $user -> delete();

        $notification = array(
            'message' => 'Student Group Deleted Successfully',
            'alert-typt' => 'warning'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

}
