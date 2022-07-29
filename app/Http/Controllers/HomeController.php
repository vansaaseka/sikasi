<?php

namespace App\Http\Controllers;

use App\Models\Mitra;

use App\Models\Status;
use App\Models\Pengajuan;
use App\Models\Trxstatus;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
       public function index()
       {
           $role=Auth::user()->role;
           if($role=='1')
           { 
            
            $thn_sekarang = Carbon::now()->isoFormat('YYYY');
            $total_jan= 0;
            $total_feb= 0;
            $total_mar= 0;
            $total_apr= 0;
            $total_mei= 0;
            $total_jun= 0;
            $total_juli= 0;
            $total_agus= 0;
            $total_sept= 0;
            $total_okto= 0;
            $total_nove= 0;
            $total_dese= 0;
            foreach(Pengajuan::get() as $ff){
            $k= date('m', strtotime($ff->created_at));
            $y= date('Y', strtotime($ff->created_at));

            if($y == $thn_sekarang){
            if($k == '07'){
            $total_juli += 1;

            }elseif ($k == '01'){
            $total_jan += 1;
            }elseif ($k == '02'){
            $total_feb += 1;
            }elseif ($k == '03'){
            $total_mar += 1;
            }elseif ($k == '04'){
            $total_apr += 1;
            }elseif ($k == '05'){
            $total_mei += 1;
            }elseif ($k == '06'){
            $total_jun += 1;
            }elseif ($k == '08'){
            $total_agus += 1;
            }
            elseif ($k == '09'){
            $total_sept += 1;
            }
            elseif ($k == '10'){
            $total_okto += 1;
            }elseif ($k == '11'){
            $total_nove += 1;
            }elseif ($k == '12'){
            $total_dese += 1;
            }}

            }

           $total_ajuan = Pengajuan::count();
           $proses_pks = Pengajuan::where('kategori_id', 1)->count();
           $proses_mou = Pengajuan::where('kategori_id', 2)->count();

            $kategori1 = Mitra::where('kategorimitra_id', 1)->count();
            $kategori2 = Mitra::where('kategorimitra_id', 2)->count();
            $kategori3 = Mitra::where('kategorimitra_id', 3)->count();
            $kategori4 = Mitra::where('kategorimitra_id', 4)->count();
            $kategori5 = Mitra::where('kategorimitra_id', 5)->count();
            $kategori6 = Mitra::where('kategorimitra_id', 6)->count();
            $kategori7 = Mitra::where('kategorimitra_id', 7)->count();
            $kategori8 = Mitra::where('kategorimitra_id', 8)->count();
            $kategori9 = Mitra::where('kategorimitra_id', 9)->count();
            $kategori10 = Mitra::where('kategorimitra_id',10)->count();
            $kategori11= Mitra::where('kategorimitra_id', 11)->count();

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
               
           return view('admin.dashboard', compact('total_ajuan', 'total_juli', 'total_agus', 'total_sept',
               'total_okto', 'total_nove', 'total_dese', 'total_jan', 'total_feb', 'total_mar', 'total_apr',
               'total_mei', 'total_jun','total_ajuan', 'proses_pks', 'proses_mou',
               'tInformatika', 'tKimia', 'tMesin', 'tSipil', 'ptInformatika', 'farmasi', 'kebidanan_3',
               'kebidanan_4', 'k3', 'budidayaTernak', 'agribisnis', 'thp', 'pthp', 'mbisnis', 'mpemasaran',
               'mperdagangan', 'perpajakan', 'perbankan', 'akuntansi', 'pakuntansi', 'bInggris', 'bMandarin',
               'dkv', 'komter', 'upw', 'kategori1', 'kategori2', 'kategori3', 'kategori4', 'kategori5', 'kategori6',
               'kategori7', 'kategori8', 'kategori9', 'kategori10', 'kategori11'
            
            ));
           }
           if($role=='2')
           {
            $total = Pengajuan::count();
            $total_pks = Pengajuan::where('kategori_id', 1)->count();
            $total_mou = Pengajuan::where('kategori_id', 2)->count();

            $selesai_pks = Trxstatus::where('status_id', 11)->count();
            $selesai_mou = Trxstatus::where('status_id', 16)->count();
            $selesai = $selesai_pks + $selesai_mou;

             $proses = $total = $selesai;
             $proses_pks = $total_pks - $selesai_pks;
             $proses_mou = $total_mou - $selesai_mou;
               return view('verifikator/dashboard', compact('total', 'total_pks', 'total_mou', 'selesai', 'selesai_pks', 'selesai_mou', 'proses', 'proses_pks', 'proses_mou'));

           }
           if($role=='3')
           {
               
                
                // $pengajuan = Pengajuan::all();
                // foreach ($pengajuan as $pj){
                  
                //  $proses = Trxstatus::where('pengajuan_id' ,
                //  $pj->id)->whereBetween('status_id',['1' , '10'])->orderBy('id', 'desc')->first()->count();
                 
                // }
                  
                  $total = Pengajuan::count();
                  $total_pks = Pengajuan::where('kategori_id', 1)->count();
                  $total_mou = Pengajuan::where('kategori_id', 2)->count();
                 
                  
                  $belum_validasi = Trxstatus::where('status_id', 1)->orderBy('id', 'desc')->get()->count();
                  $selesai_validasi = Trxstatus::where('status_id', 3)->count();
                  $proses_validasi = abs($selesai_validasi - $belum_validasi);

                  $selesai_pks = Trxstatus::where('status_id', 11)->count();
                  $selesai_mou = Trxstatus::where('status_id', 16)->count();
                  $selesai = $selesai_pks + $selesai_mou;
             
               return view('reviewer/dashboard', compact('total', 'total_pks', 'total_mou', 'selesai', 'selesai_pks',
               'selesai_mou', 'belum_validasi', 'proses_validasi', 'selesai_validasi'
               ));
            
            }
           else
           { 
                    $pengajuan_user = Pengajuan::where('prodiid', Auth()->user()->prodi_id)->count();
                //     $proses_user = Trxstatus::whereBetween('status_id',['1' , '10'])->get();
                //     $totalproses = 0;
                //     foreach($proses_user as $p){
                //     foreach($pengajuan = Pengajuan::where('id', $p->pengajuan_id)->where('prodiid', Auth()->user()->prodi_id)->get() as $proses){
                //     $totalproses += 1;
            
                
                //     }
                // }

                    $selesai_pks = Trxstatus::where('status_id',11)->get();
                    $selesai1 = 0;
                    foreach($selesai_pks as $s){
                    foreach($pengajuan = Pengajuan::where('id', $s->pengajuan_id)->where('prodiid',
                    Auth()->user()->prodi_id)->get() as $selesai){
                    $selesai1 += 1;
                    }}
                     $selesai_mou = Trxstatus::where('status_id',16)->get();
                     $selesai2 = 0;
                     foreach($selesai_mou as $s){
                     foreach($pengajuan = Pengajuan::where('id', $s->pengajuan_id)->where('prodiid',
                     Auth()->user()->prodi_id)->get() as $selesai){
                     $selesai2 += 1;

                    }}
                    $totalselesai = $selesai1 + $selesai2;

                    $proses_pengajuan = $pengajuan_user - $totalselesai;
                    
                    
        //    dd($totall);
               return view('dosen/dashboard', compact('pengajuan_user', 'totalselesai', 'proses_pengajuan'));
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
