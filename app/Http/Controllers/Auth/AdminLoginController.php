<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class AdminLoginController extends Controller
{

	public function __construct()
    {
       $this->middleware('guest:admin');
    }
    public function showloginform()
    {
        return view('auth.adminlogin');
        
    }
    public function login(Request $request){
            $this->validate($request,[
                'email'=>'required|email',
                'password'=>'required|min:6'
        ]);

      //  dd($request);

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email','remember'));
    
    }
}
