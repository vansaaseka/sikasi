<?php

namespace App\Http\Controllers;

use App\Mail\DeadlineAjuanKerjasamaMail;
use App\Models\Mitra;
use App\Models\Pengajuan;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\Trxstatus;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Toastr;

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
           $prodi = Prodi::all();
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


            $total_trxstatus = Trxstatus::count();
            $statusCounts = [
                'Ajuan Diterima' => [
                    '2021' => Trxstatus::where('status_id', 1)->whereYear('created_at', 2021)->count(),
                    '2022' => Trxstatus::where('status_id', 1)->whereYear('created_at', 2022)->count(),
                    '2023' => Trxstatus::where('status_id', 1)->whereYear('created_at', 2023)->count(),
                    '2024' => Trxstatus::where('status_id', 1)->whereYear('created_at', 2024)->count(),
                ],
                'Dokumen direview BPU' => [
                    '2021' => Trxstatus::where('status_id', 2)->whereYear('created_at', 2021)->count(),
                    '2022' => Trxstatus::where('status_id', 2)->whereYear('created_at', 2022)->count(),
                    '2023' => Trxstatus::where('status_id', 2)->whereYear('created_at', 2023)->count(),
                    '2024' => Trxstatus::where('status_id', 2)->whereYear('created_at', 2024)->count(),
                ],
                'Dokumen selesai direview BPU' => [
                    '2021' => Trxstatus::where('status_id', 3)->whereYear('created_at', 2021)->count(),
                    '2022' => Trxstatus::where('status_id', 3)->whereYear('created_at', 2022)->count(),
                    '2023' => Trxstatus::where('status_id', 3)->whereYear('created_at', 2023)->count(),
                    '2024' => Trxstatus::where('status_id', 3)->whereYear('created_at', 2024)->count(),
                ],
                'Proses tanda tangan Dekan' => [
                    '2021' => Trxstatus::where('status_id', 4)->whereYear('created_at', 2021)->count(),
                    '2022' => Trxstatus::where('status_id', 4)->whereYear('created_at', 2022)->count(),
                    '2023' => Trxstatus::where('status_id', 4)->whereYear('created_at', 2023)->count(),
                    '2024' => Trxstatus::where('status_id', 4)->whereYear('created_at', 2024)->count(),
                ],
                'Dokumen telah ditandatangani Dekan' => [
                    '2021' => Trxstatus::where('status_id', 5)->whereYear('created_at', 2021)->count(),
                    '2022' => Trxstatus::where('status_id', 5)->whereYear('created_at', 2022)->count(),
                    '2023' => Trxstatus::where('status_id', 5)->whereYear('created_at', 2023)->count(),
                    '2024' => Trxstatus::where('status_id', 5)->whereYear('created_at', 2024)->count(),
                ],
                'Proses tanda tangan Mitra' => [
                    '2021' => Trxstatus::where('status_id', 6)->whereYear('created_at', 2021)->count(),
                    '2022' => Trxstatus::where('status_id', 6)->whereYear('created_at', 2022)->count(),
                    '2023' => Trxstatus::where('status_id', 6)->whereYear('created_at', 2023)->count(),
                    '2024' => Trxstatus::where('status_id', 6)->whereYear('created_at', 2024)->count(),
                ],
                'Dokumen telah ditandatangani Mitra' => [
                    '2021' => Trxstatus::where('status_id', 7)->whereYear('created_at', 2021)->count(),
                    '2022' => Trxstatus::where('status_id', 7)->whereYear('created_at', 2022)->count(),
                    '2023' => Trxstatus::where('status_id', 7)->whereYear('created_at', 2023)->count(),
                    '2024' => Trxstatus::where('status_id', 7)->whereYear('created_at', 2024)->count(),
                ],
                'Pengajuan DKPI' => [
                    '2021' => Trxstatus::where('status_id', 8)->whereYear('created_at', 2021)->count(),
                    '2022' => Trxstatus::where('status_id', 8)->whereYear('created_at', 2022)->count(),
                    '2023' => Trxstatus::where('status_id', 8)->whereYear('created_at', 2023)->count(),
                    '2024' => Trxstatus::where('status_id', 8)->whereYear('created_at', 2024)->count(),
                ],
                'Dokumen direview DKPI' => [
                    '2021' => Trxstatus::where('status_id', 9)->whereYear('created_at', 2021)->count(),
                    '2022' => Trxstatus::where('status_id', 9)->whereYear('created_at', 2022)->count(),
                    '2023' => Trxstatus::where('status_id', 9)->whereYear('created_at', 2023)->count(),
                    '2024' => Trxstatus::where('status_id', 9)->whereYear('created_at', 2024)->count(),
                ],
                'Proses tanda tangan WR 4' => [
                    '2021' => Trxstatus::where('status_id', 10)->whereYear('created_at', 2021)->count(),
                    '2022' => Trxstatus::where('status_id', 10)->whereYear('created_at', 2022)->count(),
                    '2023' => Trxstatus::where('status_id', 10)->whereYear('created_at', 2023)->count(),
                    '2024' => Trxstatus::where('status_id', 10)->whereYear('created_at', 2024)->count(),
                ],
                'Selesai' => [
                    '2021' => Trxstatus::where('status_id', 11)->whereYear('created_at', 2021)->count(),
                    '2022' => Trxstatus::where('status_id', 11)->whereYear('created_at', 2022)->count(),
                    '2023' => Trxstatus::where('status_id', 11)->whereYear('created_at', 2023)->count(),
                    '2024' => Trxstatus::where('status_id', 11)->whereYear('created_at', 2024)->count(),
                ],
            ];

           return view('admin.dashboard', compact('total_ajuan', 'total_juli', 'total_agus', 'total_sept',
               'total_okto', 'total_nove', 'total_dese', 'total_jan', 'total_feb', 'total_mar', 'total_apr',
               'total_mei', 'total_jun','total_ajuan', 'proses_pks', 'proses_mou', 'kategori1', 'kategori2', 'kategori3', 'kategori4', 'kategori5', 'kategori6',
               'kategori7', 'kategori8', 'kategori9', 'kategori10', 'prodi',
              'total_trxstatus', 'statusCounts'
            ));
           }
           if($role=='2')
           {
            $prodi = Prodi::all();
            $total = Pengajuan::count();
            $total_pks = Pengajuan::where('kategori_id', 1)->count();
            $total_mou = Pengajuan::where('kategori_id', 2)->count();

            $selesai_pks = Trxstatus::where('status_id', 11)->count();
            $selesai_mou = Trxstatus::where('status_id', 16)->count();
            $selesai = $selesai_pks + $selesai_mou;

             $proses = $total = $selesai;
             $proses_pks = $total_pks - $selesai_pks;
             $proses_mou = $total_mou - $selesai_mou;

               return view('verifikator/dashboard', compact('prodi', 'total', 'total_pks', 'total_mou', 'selesai', 'selesai_pks', 'selesai_mou', 'proses', 'proses_pks', 'proses_mou', ));

           }
           if($role=='3')
           {


                // $pengajuan = Pengajuan::all();
                // foreach ($pengajuan as $pj){

                //  $proses = Trxstatus::where('pengajuan_id' ,
                //  $pj->id)->whereBetween('status_id',['1' , '10'])->orderBy('id', 'desc')->first()->count();

                // }
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
               $prodi = Prodi::all();
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

                  $prodi = Prodi::all();
                  $total = Pengajuan::count();
                  $total_pks = Pengajuan::where('kategori_id', 1)->count();
                  $total_mou = Pengajuan::where('kategori_id', 2)->count();


                  $belum_validasi = Trxstatus::where('status_id', 1)->orderBy('id', 'desc')->get()->count();
                  $selesai_validasi = Trxstatus::where('status_id', 3)->count();
                  $proses_validasi = abs($selesai_validasi - $belum_validasi);

                  $selesai_pks = Trxstatus::where('status_id', 11)->count();
                  $selesai_mou = Trxstatus::where('status_id', 16)->count();
                  $selesai = $selesai_pks + $selesai_mou;



                  $total_trxstatus = Trxstatus::count();
                  $statusCounts = [
                      'Ajuan Diterima' => [
                          '2021' => Trxstatus::where('status_id', 1)->whereYear('created_at', 2021)->count(),
                          '2022' => Trxstatus::where('status_id', 1)->whereYear('created_at', 2022)->count(),
                          '2023' => Trxstatus::where('status_id', 1)->whereYear('created_at', 2023)->count(),
                          '2024' => Trxstatus::where('status_id', 1)->whereYear('created_at', 2024)->count(),
                      ],
                      'Dokumen direview BPU' => [
                          '2021' => Trxstatus::where('status_id', 2)->whereYear('created_at', 2021)->count(),
                          '2022' => Trxstatus::where('status_id', 2)->whereYear('created_at', 2022)->count(),
                          '2023' => Trxstatus::where('status_id', 2)->whereYear('created_at', 2023)->count(),
                          '2024' => Trxstatus::where('status_id', 2)->whereYear('created_at', 2024)->count(),
                      ],
                      'Dokumen selesai direview BPU' => [
                          '2021' => Trxstatus::where('status_id', 3)->whereYear('created_at', 2021)->count(),
                          '2022' => Trxstatus::where('status_id', 3)->whereYear('created_at', 2022)->count(),
                          '2023' => Trxstatus::where('status_id', 3)->whereYear('created_at', 2023)->count(),
                          '2024' => Trxstatus::where('status_id', 3)->whereYear('created_at', 2024)->count(),
                      ],
                      'Proses tanda tangan Dekan' => [
                          '2021' => Trxstatus::where('status_id', 4)->whereYear('created_at', 2021)->count(),
                          '2022' => Trxstatus::where('status_id', 4)->whereYear('created_at', 2022)->count(),
                          '2023' => Trxstatus::where('status_id', 4)->whereYear('created_at', 2023)->count(),
                          '2024' => Trxstatus::where('status_id', 4)->whereYear('created_at', 2024)->count(),
                      ],
                      'Dokumen telah ditandatangani Dekan' => [
                          '2021' => Trxstatus::where('status_id', 5)->whereYear('created_at', 2021)->count(),
                          '2022' => Trxstatus::where('status_id', 5)->whereYear('created_at', 2022)->count(),
                          '2023' => Trxstatus::where('status_id', 5)->whereYear('created_at', 2023)->count(),
                          '2024' => Trxstatus::where('status_id', 5)->whereYear('created_at', 2024)->count(),
                      ],
                      'Proses tanda tangan Mitra' => [
                          '2021' => Trxstatus::where('status_id', 6)->whereYear('created_at', 2021)->count(),
                          '2022' => Trxstatus::where('status_id', 6)->whereYear('created_at', 2022)->count(),
                          '2023' => Trxstatus::where('status_id', 6)->whereYear('created_at', 2023)->count(),
                          '2024' => Trxstatus::where('status_id', 6)->whereYear('created_at', 2024)->count(),
                      ],
                      'Dokumen telah ditandatangani Mitra' => [
                          '2021' => Trxstatus::where('status_id', 7)->whereYear('created_at', 2021)->count(),
                          '2022' => Trxstatus::where('status_id', 7)->whereYear('created_at', 2022)->count(),
                          '2023' => Trxstatus::where('status_id', 7)->whereYear('created_at', 2023)->count(),
                          '2024' => Trxstatus::where('status_id', 7)->whereYear('created_at', 2024)->count(),
                      ],
                      'Pengajuan DKPI' => [
                          '2021' => Trxstatus::where('status_id', 8)->whereYear('created_at', 2021)->count(),
                          '2022' => Trxstatus::where('status_id', 8)->whereYear('created_at', 2022)->count(),
                          '2023' => Trxstatus::where('status_id', 8)->whereYear('created_at', 2023)->count(),
                          '2024' => Trxstatus::where('status_id', 8)->whereYear('created_at', 2024)->count(),
                      ],
                      'Dokumen direview DKPI' => [
                          '2021' => Trxstatus::where('status_id', 9)->whereYear('created_at', 2021)->count(),
                          '2022' => Trxstatus::where('status_id', 9)->whereYear('created_at', 2022)->count(),
                          '2023' => Trxstatus::where('status_id', 9)->whereYear('created_at', 2023)->count(),
                          '2024' => Trxstatus::where('status_id', 9)->whereYear('created_at', 2024)->count(),
                      ],
                      'Proses tanda tangan WR 4' => [
                          '2021' => Trxstatus::where('status_id', 10)->whereYear('created_at', 2021)->count(),
                          '2022' => Trxstatus::where('status_id', 10)->whereYear('created_at', 2022)->count(),
                          '2023' => Trxstatus::where('status_id', 10)->whereYear('created_at', 2023)->count(),
                          '2024' => Trxstatus::where('status_id', 10)->whereYear('created_at', 2024)->count(),
                      ],
                      'Selesai' => [
                          '2021' => Trxstatus::where('status_id', 11)->whereYear('created_at', 2021)->count(),
                          '2022' => Trxstatus::where('status_id', 11)->whereYear('created_at', 2022)->count(),
                          '2023' => Trxstatus::where('status_id', 11)->whereYear('created_at', 2023)->count(),
                          '2024' => Trxstatus::where('status_id', 11)->whereYear('created_at', 2024)->count(),
                      ],
                  ];


               return view('reviewer/dashboard', compact('total', 'total_pks', 'total_mou', 'selesai', 'selesai_pks',
               'selesai_mou', 'belum_validasi', 'proses_validasi', 'selesai_validasi', 'prodi',
               'total_ajuan', 'total_juli', 'total_agus', 'total_sept',
               'total_okto', 'total_nove', 'total_dese', 'total_jan', 'total_feb', 'total_mar', 'total_apr',
               'total_mei', 'total_jun','total_ajuan', 'proses_pks', 'proses_mou', 'kategori1', 'kategori2', 'kategori3', 'kategori4', 'kategori5', 'kategori6',
               'kategori7', 'kategori8', 'kategori9', 'kategori10',  'thn_sekarang', 'total_trxstatus', 'statusCounts',
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
            $now = \Carbon\Carbon::now();
            $deadlineThreshold = $now->addMonths(0);

            $pengajuanDeadline = \App\Models\Pengajuan::with('user', 'mitra')
            ->where('tanggalakhir', '<', $deadlineThreshold)
            ->get();


            $trxstatus = Trxstatus::with('pengajuan', 'status') // Ganti $pengajuanId dengan id pengajuan yang Anda inginkan
            ->orderByDesc('status_id') // Urutkan berdasarkan status_id dari yang terbesar ke terkecil
            ->get(); // Ambil hanya satu data yang memiliki status_id terakhir



            // foreach ($pengajuanDeadline as $pengajuan) {
            //     if ($pengajuan->user_id == Auth::user()->id) {
            //         $mail = [
            //             'user' => $pengajuan->user->name,
            //             'mitra' => $pengajuan->mitra->namamitra,
            //             'deadline' => $pengajuan->tanggalakhir,
            //         ];

            //         $emailUser = $pengajuan->user->email;
            //         // Aktifkan ini jika mail suddah di settng di env
            //         // Mail::to($emailUser)->send(new DeadlineAjuanKerjasamaMail($mail));
            //         \Toastr::warning('Deadline pengajuan ' . $pengajuan->mitra->namamitra . ' sudah kurang dari 3 bulan.', 'Peringatan Deadline');
            //     }
            // }
               return view('dosen/dashboard', compact('pengajuan_user', 'totalselesai', 'proses_pengajuan','pengajuanDeadline', 'trxstatus'));
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
