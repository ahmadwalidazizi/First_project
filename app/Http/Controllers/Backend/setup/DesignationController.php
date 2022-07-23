<?php

namespace App\Http\Controllers\Backend\setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function DesignationView(){
        $data ['allData'] = Designation::all();
        return view('Backend.setup.designation.view_designation',$data);
    }

    public function DesignationStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:designations,name'
        ]);

        $data = new Designation();
        $data -> name = $request -> name;
        $data -> save();

        $notification = array(
            'message' => 'Designation Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()-> route('designation.view')->with($notification);

    }

    public function DesignationEdit($id){
        $editData = Designation::find($id);
        return view('Backend.setup.designation.edit_designation',compact('editData'));
    }

    public function DesignationUpdate(Request $request,$id){
        $data = Designation::find($id);
        $validatedData = $request -> validate([
            'name' => 'required|unique:designations,name'
        ]);

        $data -> name = $request -> name;
        $data -> save();

        $notification = array(
            'message' => 'Designation updated successfully',
            'alert-type' => 'info'
        );
        return redirect() -> route('designation.view')->with($notification);
    }

    public function DesignationDelete($id){

        $user = Designation::find($id);
        $user -> delete();

        $notification = array(
            'message' => 'Designation Deleted successfully',
            'alert-type' => 'warning'
        );

        return redirect()->route('designation.view')->with($notification);
    }
}
