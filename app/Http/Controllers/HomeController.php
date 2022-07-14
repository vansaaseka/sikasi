<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
       public function index()
       {
           $role=Auth::user()->role;
           if($role=='1')
           {
               return view('admin/dashboard');
           }
           if($role=='2')
           {
               return view('verifikator/dashboard');
           }
           if($role=='3')
           {
               return view('reviewer/dashboard');
           }
           else
           {
               return view('dosen/dashboard');
           }
       }
    
  

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

   
    // public function index()
    // {
    //     return view('home');
    // }
}
