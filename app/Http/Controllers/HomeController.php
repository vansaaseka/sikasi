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
               return view('admin/layoutAdmin');
           }
           if($role=='2')
           {
               return view('verifikator');
           }
           if($role=='3')
           {
               return view('reviewer');
           }
           else
           {
               return view('dosen/layoutDosen');
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
