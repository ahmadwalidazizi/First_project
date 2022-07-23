<?php

namespace App\Http\Controllers\Backend\setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Examtype;

class ExamTypeController extends Controller
{
    public function ExamTypeView(){
        $data ['allData'] = Examtype::all();
        return view('Backend.Setup.exam_type.view_exam_type',$data);
    }

    public function StoreExamType(Request $request){
        $validatedData = $request -> validate([
            'name' => 'required|unique:examtypes,name'
        ]);

        $data = new ExamType();
        $data -> name = $request -> name;
        $data -> save();

        $notification = array(
            'message' => 'Student Exam Type inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }

    public function EditExamType($id){
        $editData = ExamType::find($id);
        return view('Backend.setup.exam_type.edit_exam_type',compact('editData'));
    }

    public function UpdateExamType(Request $request, $id){
        $data = ExamType::find($id);
        $validatedData = $request -> validate([
            'name' => 'required|unique:examtypes,name,'.$data->id
        ]);
        
        $data -> name = $request->name;
        $data -> save();

        $notification = array(
            'message' => 'Exam Type updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }

    public function DeleteExamType($id){
        $user = ExamType::find($id);
        $user -> delete();

        $notification = array(
            'message' => 'Exam Type deleted Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('exam.type.view')->with($notification);
    }

}
