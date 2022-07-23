<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function ViewUser(){
        //$allData = User::all();
        $data['allData'] = User::all();
        return view('Backend.user.view_user',$data);
    }
    public function AddUser(){
        return view('Backend.user.add_user');
    }
    public function StoreUser(Request $request){
        $validateDate = $request->validate([
            'email' =>'required|unique:users',
            'name' => 'required'
        ]);
         
        $data = new User();
        $code = rand(000000,999999);
        $data->usertype = 'Admin';
        $data->usertype = $request->usertype; 
        $data ->name = $request->name;
        $data ->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code;
        $data->save();

        $notification = array(
            'message' => 'User inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('view.user')->with($notification );
    }
    public function EditUser($id){
        $editData = User::find($id);
        return view('Backend.user.edit_user',compact('editData'));
    }

    public function UpdateUser(Request $request, $id){
        $data = User::find($id);
        $data ->usertype = $request-> usertype;
        $data ->name = $request->name;
        $data ->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('view.user')->with($notification );
    }
    
    public function DeleteUser($id){
    	$user = User::find($id);
    	$user -> delete();

    	$notification = array(
    		'message' => 'User Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('view.user')->with($notification);

    }

    
}
