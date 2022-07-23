<?php

namespace App\Http\Controllers\Backend\setup;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignEmployee;
use App\Models\Designation;
use App\Models\Transportation;
 
class TransportController extends Controller
{
    public function TransportationView(){
        $data ['allData'] = Transportation::with(['drive'])->get();
        return view('Backend.setup.transportation.transportation_view', $data);
    }

    public function TransportationAdd(){
        $data ['drivers'] = AssignEmployee::where('disgnation_id','3')->get();
        return view('Backend.setup.transportation.transportation_add', $data);
    }

    public function TransportationStore(Request $request){
        $pathcount = count($request -> employee_id);
        if ($pathcount != NULL) {
            for ($i=0; $i < $pathcount; $i++) { 
                $data = new Transportation();
                $data -> employee_id = $request -> employee_id[$i];
                $data -> title = $request -> title[$i];
                $data -> amount = $request -> amount[$i];
                $data -> save();
            }//end of for loop
        }//end of if condition

        $notification =  array(
            'message' => 'Transport Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('transportation.view')->with($notification);
    }

    public function TransportationEdit($id){
        $data ['editData'] = Transportation::find($id);
        $data ['drivers'] = AssignEmployee::where('disgnation_id','3')->get();
        return view('Backend.setup.transportation.transportation_edit',$data);
    }

    public function TransportationUpdate(Request $request, $id){
        $data = Transportation::find($id);
        $data -> employee_id = $request -> employee_id;
        $data -> title = $request -> title;
        $data -> amount = $request -> amount;
        $data -> save();

        $notification = array(
            'message' => 'Transport Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('transportation.view')->with($notification);
    }

    public function TransportationDelete($id){
        $data = Transportation::find($id);
        $data -> delete();

        $notification = array(
            'message' => 'Transport Deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
}
