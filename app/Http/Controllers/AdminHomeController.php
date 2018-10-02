<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Textlocal\Textlocal;
class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function showloginform()
    // {
    //     return view('home');
        
    // }
    // public function login(){
    //     return view('adminhome');
    // }
     public function index()
    {
        return view('adminhome');
    }
    
}
