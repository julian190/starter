<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdultController extends Controller
{
    //
    public function index(){
        return view('adult.index');
    }

    public function site(){
        return view('user');
    }
    public function admin(){
        return view('admin');
    }
    public function loginadmin(){
        return view('auth.adminlogin');
    }
    public function CheckAdminLogin(Request $request){
        $this->validate($request,[
           'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email'));
    }
}
