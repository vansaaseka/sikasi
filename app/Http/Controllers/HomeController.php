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
           $total_ajuan = Pengajuan::count();
           $selesai_pengajuan = Trxstatus::where('status_id', 11)->orWhere('status_id', 16)->count();
           $proses_pks = Trxstatus::whereBetween('status_id',['1' , '10'])->count();
           $proses_mou = Trxstatus::whereBetween('status_id',['12' , '15'])->count();

           $tInformatika = Pengajuan::where('prodiid', 1)->count();
           $tKimia = Pengajuan::where('prodiid', 2)->count();
           $tMesin = Pengajuan::where('prodiid', 3)->count();
           $tSipil = Pengajuan::where('prodiid', 4)->count();
           $ptInformatika = Pengajuan::where('prodiid', 5)->count();
           $farmasi = Pengajuan::where('prodiid', 6)->count();
           $kebidanan_3 = Pengajuan::where('prodiid', 7)->count();
           $kebidanan_4 = Pengajuan::where('prodiid', 8)->count();
           $k3 = Pengajuan::where('prodiid', 9)->count();
           $budidayaTernak = Pengajuan::where('prodiid', 10)->count();
           $agribisnis = Pengajuan::where('prodiid', 11)->count();
           $thp = Pengajuan::where('prodiid', 12)->count();
           $pthp = Pengajuan::where('prodiid', 13)->count();
           $mbisnis = Pengajuan::where('prodiid', 14)->count();
           $mpemasaran = Pengajuan::where('prodiid', 15)->count();
           $mperdagangan = Pengajuan::where('prodiid', 16)->count();
           $perpajakan = Pengajuan::where('prodiid', 17)->count();
           $perbankan = Pengajuan::where('prodiid', 18)->count();
           $akuntansi = Pengajuan::where('prodiid', 19)->count();
           $pakuntansi = Pengajuan::where('prodiid', 20)->count();
           $bInggris = Pengajuan::where('prodiid', 21)->count();
           $bMandarin = Pengajuan::where('prodiid', 22)->count();
           $dkv = Pengajuan::where('prodiid', 23)->count();
           $komter = Pengajuan::where('prodiid', 24)->count();
           $upw = Pengajuan::where('prodiid', 25)->count();
               return view('admin.dashboard', compact('total_ajuan', 'selesai_pengajuan', 'proses_pks', 'proses_mou',
               'tInformatika', 'tKimia', 'tMesin', 'tSipil', 'ptInformatika', 'farmasi', 'kebidanan_3',
               'kebidanan_4', 'k3', 'budidayaTernak', 'agribisnis', 'thp', 'pthp', 'mbisnis', 'mpemasaran',
               'mperdagangan', 'perpajakan', 'perbankan', 'akuntansi', 'pakuntansi', 'bInggris', 'bMandarin',
               'dkv', 'komter', 'upw'
            
            ));
           }
           if($role=='2')
           {
            //  $total_ajuan = Pengajuan::count();
            
               return view('verifikator/dashboard');
           }
           if($role=='3')
           {
                $total_ajuan = Pengajuan::count();
                $selesai_pengajuan = Trxstatus::where('status_id', 11)->count();
                $proses_pengajuan = Trxstatus::whereBetween('status_id',['1' , '10'])->count();
                $belum_validasi = Trxstatus::whereBetween('status_id',['1' , '2'])->count();
                $selesai_validasi = Trxstatus::whereBetween('status_id',['3' , '10'])->count();
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
