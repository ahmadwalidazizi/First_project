<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCatagory;
 
class FeeCatagoryController extends Controller
{
    public function FeeCatagoryView(){
        $data ['allData'] = FeeCatagory::all();
        return view('Backend.setup.fee_catagory.view_fee_catagory',$data);
    }

    public function FeeCatagoryStore(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:fee_catagories,name',
        ]);

        $data = new FeeCatagory();
        $data -> name = $request->name;
        $data -> save(); 

        $notification = array(
            'message' => 'Fee Catagory inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.catagory.view')->with($notification);
    }

    public function FeeCatagoryEdit($id){
        $editData = FeeCatagory::find($id);
        return view('Backend.setup.fee_catagory.edit_fee_catagory',compact('editData'));
    }

    public function FeeCatagoryUpdate(Request $request, $id){
        $data = FeeCatagory::find($id);
        $validatedData = $request -> validate([
            'name' => 'required|unique:fee_catagories,name,'.$data->id
        ]);

        $data -> name = $request -> name;
        $data -> save();

        $notification = array(
            'message' => 'Fee Catagory Name updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.catagory.view')->with($notification);
    }

    public function FeeCatagoryDelete($id){
        $user = FeeCatagory::find($id);
        $user -> delete();

        $notification = array(
            'message' => 'Fee Catagory Name Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect() -> route('fee.catagory.view')->with($notification);
    }
}
