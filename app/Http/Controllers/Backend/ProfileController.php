<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

    class ProfileController extends Controller
    {

    public function UpdateProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('Backend.user.profile_update',compact('editData'));
    }

        public function StoreProfile(Request $request){
            $data = User::find(Auth::user()->id);
            $data -> name = $request->name;
            $data -> email = $request->email;
            $data -> mobile = $request->mobile;
            $data -> address = $request->address;
            $data -> gender = $request->gender;

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/user/'.$data->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file -> move(public_path('upload/user_images'),$filename);
                $data ['image'] = $filename;
            }
            $data -> save();
            $notification = array(
                'message' => 'Profile Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('edit.profile')->with($notification );

        }

        public function UpdatePassword(Request $request){
            $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
            ]);
            $hashedPassword = Auth::user()->password;
            if (Hash::check($request->oldpassword,$hashedPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->route('login');
            }else{
                return redirect()->back();
            }
        }
    }
