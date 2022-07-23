<?php

namespace App\Http\Controllers\Backend\Setup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCatagory;
use App\Models\StudentClass;
use App\Models\FeeAmount;
use App\Models\Registration_fee_amount;
 
class FeeAmountController extends Controller 
{
    
    // Registration Fee Amount functions 

    public function RegistrationFeeAmountView(){
        $data ['allData'] = Registration_fee_amount::select('class_id')->groupby('class_id')->get();
        return view('Backend.setup.fee_registration_amount.view_registration_fee_amount', $data);
    }

    public function RegistrationFeeAmountAdd(){
        $data ['fee_catagory'] = FeeCatagory::where('name','Registration Fee')->get();
        $data ['classes'] = StudentClass::all();
        return view('Backend.setup.fee_registration_amount.add_registration_fee_amount', $data);
    }

    public function RegistrationFeeAmountStore(Request $request){
        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i=0; $i < $countClass; $i++) { 
                $registration_amount = new Registration_fee_amount();
                $registration_amount -> fee_catagory_id = $request -> fee_catagory_id;
                $registration_amount -> class_id = $request -> class_id[$i];
                $registration_amount -> registration_amount = $request -> registration_amount[$i];
                $registration_amount -> uniform = $request -> uniform[$i];
                $registration_amount -> qertasia = $request -> qertasia[$i];
                $registration_amount -> save();
            }//end for
        }//end if
        $notification = array(
            'message' => 'Classes Registration Fee amount Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('regis.fee.amount')->with($notification);
    }

    public function RegistrationFeeAmountEdit($class_id){
        $data ['editData'] = Registration_fee_amount::where('class_id', $class_id)->orderby('class_id', 'asc')->get();
        $data ['fee_catagory'] = FeeCatagory::where('name','Registration Fee')->get();
        $data ['classes'] = StudentClass::all();
        return view('Backend.setup.fee_registration_amount.edit_registration_fee_amount', $data);
    }

    public function RegistrationFeeAmountUpdate(Request $request, $class_id){

        Registration_fee_amount::where('class_id',$class_id)->delete();
            $countClass = count($request->class_id);
            for ($i=0; $i < $countClass ; $i++) { 
                $registration_amount = new Registration_fee_amount();
                $registration_amount -> fee_catagory_id = $request -> fee_catagory_id;
                $registration_amount -> class_id = $request -> class_id[$i];
                $registration_amount -> registration_amount = $request -> registration_amount[$i];
                $registration_amount -> uniform = $request -> uniform[$i];
                $registration_amount -> qertasia = $request -> qertasia[$i];
                $registration_amount -> save();
        
        $notification = array(
            'message' => 'Classes Registration Fee amount Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('regis.fee.amount')->with($notification);
        }

    }

    public function RegistrationFeeAmountDetail(){
        $data ['detailsData'] = Registration_fee_amount::all();
        return view('Backend.setup.fee_registration_amount.detail_registration_fee_amount',$data);
    }

    // Monthly fee amount functions
    public function FeeAmountView(){
        //$data ['allData'] = FeeAmount::all();
        $data ['allData'] = FeeAmount::select('class_id')->groupby('class_id')->get();
        return view('Backend.setup.fee_monthly_amount.view_fee_amount',$data);
    }

    public function FeeAmountAdd(){
        $data ['fee_catagory'] = FeeCatagory::where('name','Monthly Fee')->get();
        $data ['classes'] = StudentClass::all();
        return view('Backend.setup.fee_monthly_amount.add_fee_amount',$data);
    }

    public function FeeAmountStore(Request $request){
        $countClass = count($request->class_id);
        if ($countClass != NULL) {
            for ($i=0; $i < $countClass ; $i++) { 
                $fee_amount = new FeeAmount();
                $fee_amount -> fee_catagory_id = $request->fee_catagory_id;
                $fee_amount -> class_id = $request->class_id[$i];
                $fee_amount -> amount = $request->amount[$i];
                $fee_amount -> save();
            }//end loop
        }//end if
        $notification = array(
            'message' => 'Classes Monthly amount fee Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    }

    public function EditFeeAmount($class_id){
        $data ['editData'] = FeeAmount::where('class_id',$class_id)->orderby('class_id','asc')->get();
        $data ['fee_catagory'] = FeeCatagory::where('name','Monthly Fee')->get();
        $data ['classes'] = StudentClass::all();
        return view('Backend.setup.fee_monthly_amount.edit_fee_amount',$data);
    }

    public function FeeAmountUpdate(Request $request, $class_id){
        
        FeeAmount::where('class_id',$class_id)->delete();
        $countClass = count($request->class_id);
        for ($i=0; $i < $countClass ; $i++) { 
            $fee_amount = new FeeAmount();
            $fee_amount -> fee_catagory_id = $request->fee_catagory_id;
            $fee_amount -> class_id = $request->class_id[$i];
            $fee_amount -> amount = $request->amount[$i];
            $fee_amount -> save();
    
            $notification = array(
                'message' => 'Classes Monthly Fee amount Updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('fee.amount.view')->with($notification);
        }
    }

    public function FeeAmountDetails(){
        $data ['detailsData'] = FeeAmount::all();
        return view('Backend.setup.fee_monthly_amount.amount_fee_detail',$data);
    }


}