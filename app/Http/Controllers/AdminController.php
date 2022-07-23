<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function Logout(){
        auth::logout();
        return Redirect()->route('login');
    }
}








