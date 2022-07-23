<?php

namespace App\Http\Controllers\Backend\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FinanceOtherCost;

class OtherCostController extends Controller
{
    public function OtherCostView(){
        $data['allData'] = FinanceOtherCost::orderBy('id', 'asc')->get();
        return view('Backend.finance.other_cost.other_cost_view',$data);
    }

    public function OtherCostAdd(){
        return view('Backend.finance.other_cost.other_cost_add');
    }

    public function OtherCostStore(Request $request){
        $data = new FinanceOtherCost();
        $data -> date = $request -> date;
        $data -> amount = $request -> amount;
        $data -> description = $request -> description;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file -> move(public_path('upload/other_cost_images'),$filename);
            $data ['image'] = $filename;
        }

        $data -> save();

        $notification = array(
            'message' => 'The item cost inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('other.cost.view')->with($notification);
    }

    public function OtherCostEdit($id){

        $data['editData'] = FinanceOtherCost::find($id);
        return view('Backend.finance.other_cost.other_cost_edit',$data);
    }

    public function OtherCostUpdate(Request $request, $id){
        $data = FinanceOtherCost::find($id);
        $data -> date = $request -> date;
        $data -> amount = $request -> amount;
        $data -> description = $request -> description;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/other_cost_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file -> move(public_path('upload/other_cost_images'),$filename);
            $data ['image'] = $filename;
        }

        $data -> save();

        $notification = array(
            'message' => 'The item cost Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('other.cost.view')->with($notification);
    }

    public function OtherCostDelete($id){
        $data = FinanceOtherCost::find($id);
        $data -> delete();

        $notification = array(
            'message' => 'The item cost Deleted successfully',
            'alert-type' => 'erorr'
        );
        return redirect()->route('other.cost.view')->with($notification);
    }
}
