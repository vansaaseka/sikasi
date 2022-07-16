<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;

use App\Models\Trxstatus;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
       public function index()
       {
           $role=Auth::user()->role;
           if($role=='1')
           {
               return view('admin.dashboard');
           }
           if($role=='2')
           {
            
               return view('verifikator/dashboard');
           }
           if($role=='3')
           {
                $total_ajuan = Pengajuan::count();
                $selesai_pengajuan = Trxstatus::where('status_id', 11)->count();
                $proses_pengajuan = Trxstatus::whereBetween('status_id',['1' , '10'])->count();
                $belum_validasi = Trxstatus::whereBetween('status_id',['2' , '3'])->count();
                $selesai_validasi = Trxstatus::whereBetween('status_id',['4' , '10'])->count();
               return view('reviewer/dashboard', compact('total_ajuan', 'selesai_pengajuan', 'proses_pengajuan', 'belum_validasi', 'selesai_validasi'
               ));
           }
           else
           { 
                    $pengajuan_user = Pengajuan::where('prodiid', Auth()->user()->prodi_id)->count();
                    $proses_user = Trxstatus::whereBetween('status_id',['1' , '10'])->get();
                    $totalproses = 0;
                    foreach($proses_user as $p){
                    foreach($pengajuan = Pengajuan::where('id', $p->pengajuan_id)->where('prodiid', Auth()->user()->prodi_id)->get() as $proses){
                    $totalproses += 1;
            
                
                    }
                }

                    $selesai_user = Trxstatus::where('status_id',11)->get();
                    $totalselesai = 0;
                    foreach($selesai_user as $s){
                    foreach($pengajuan = Pengajuan::where('id', $s->pengajuan_id)->where('prodiid',
                    Auth()->user()->prodi_id)->get() as $selesai){
                    $totalselesai += 1;


                    }
                    }
        //    dd($totall);
               return view('dosen/dashboard', compact('pengajuan_user', 'proses_user', 'totalproses', 'selesai_user', 'totalselesai'));
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
