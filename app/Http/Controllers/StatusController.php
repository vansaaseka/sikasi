<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\Dokumen;
use App\Mail\KirimEmail;
use App\Models\Kategori;
use App\Models\Pengajuan;
use App\Models\Trxstatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;



class StatusController extends Controller
{
public function index(){

        // Status tanpa dolar = nama database
        $status = Status::all();
        return view('admin\Status\tampilstatus', compact('status'));
          // yang bertanda dolar harus sama dengan isi compact
    }
public function tambahstatus(){
    return view('admin\Status\tambahstatus');
}

public function insertstatus(Request $request){
    // dd($request->all());
    $this->validate($request, [
        'status' => 'required',
    ]);
    Status::create($request->all());
    return redirect()->route('status')->with('success', 'Data Berhasil Ditambahkan');
}

public function editstatus($id){
    $status = Status::find($id);
    //dd($status);
    return view('admin\Status\editStatus', compact('status'));
}

public function updatestatus(Request $request, $id){
    $this->validate($request, [
        'status' => 'required',
    ]);
    $status = Status::find($id);
    $status->update($request->all());
    return redirect()->route('status')->with('toast_success','Data Berhasil Diupdate');
}

public function hapusStatus($id){
    $status = Status::find($id);
    $status->delete();
    return redirect()->route('status')->with('toast_success','Data Berhasil Dihapus');
}

    public function verifikasi(){
        $kategori = Kategori::all();
        $pengajuan = Pengajuan::all();
        $mitra = Mitra::all();
        $status = Status::all();
        $prodi = Prodi::all();
        $dokumen = Dokumen::all();
        $trxstatus = Trxstatus::all();
        $user = User::all();
        return view('verifikator\tampilverifikasi' , compact('pengajuan' , 'mitra', 'status','prodi', 'dokumen', 'trxstatus', 'user', 'kategori' ));
    }

    public function dataajuan(){
        $kategori = Kategori::all();
    $pengajuan = Pengajuan::all();
    $mitra = Mitra::all();
    $status = Status::all();
    $prodi = Prodi::all();
    $dokumen = Dokumen::all();
    $trxstatus = Trxstatus::all();
    $user = User::all();
    return view('admin.pengajuan.tampilpengajuan' , compact('pengajuan' , 'mitra', 'status','prodi', 'dokumen',
    'trxstatus', 'user', 'kategori'));
    }

    public function cetakpengajuan(){
    $kategori = Kategori::all();
    $pengajuan = Pengajuan::all();
    $mitra = Mitra::all();
    $trxstatus = Trxstatus::all();
    $prodi = Prodi::all();
    $dokumen = Dokumen::all();
    $user = User::all();
    return view('admin.pengajuan.cetakpengajuan' , compact('pengajuan' , 'mitra','prodi', 'dokumen',
    'trxstatus', 'user', 'kategori'));
    }

    public function newstatus(){
    $pengajuan = Pengajuan::all();
    $status = Status::all();
    return view('verifikator\updatestatus', compact('status' ,'pengajuan'));
    }

    public function insertnewstatus(Request $request){
    $trxstatus = new Trxstatus;
    $user = User::all();
    $pengajuan = Pengajuan::all();
    $status = Status::all();
    $trx = Trxstatus::all();

            $trxstatus->pengajuan_id = $request->input('pengajuan_id');
            $trxstatus->created_by = $request->input('created_by');
            $trxstatus->status_id = $request->input('status_id');
            $trxstatus->catatan = $request['catatan'];
            $trxstatus->status_dokumen = $request['status_dokumen'];
            $trxstatus->save();
 
            // \Mail::raw('Hallo'.$user->name, function ($message) use($user) {
            //     $message->to($user->email,$user->name);
            //     $message->subject('Pendaftaran');
            // });

               
                // $tujuan='derieri62@gmail.com';
                foreach($pengajuan as $datapengajuan){   
                foreach($user as $a)
             
                if($datapengajuan->user_id == $a->id ){
                    $nama = $a->name;
                    $mitra = $datapengajuan->mitra->namamitra;


                }}


                foreach($pengajuan as $data){
                foreach($trx as $s){
                if($data->id == $s->pengajuan_id){
                foreach($status as $b){
                if($s->status_id == $b->id){
                    $status = $b->namastatus;
                }
            }
        }
    
                }}


         
            $data = [
               'user' => $nama,
               'mitra' => $mitra,
               'status' => $status
            ];
                $tujuan= $a->email;
                \Mail::to($tujuan)->send(new KirimEmail($data));
                Alert::success('Sukses', 'Email berhasil dikirim!');
                return back()->with('Email berhasil dikirm');
}




public function validasi(){
$pengajuan = Pengajuan::all();
$mitra = Mitra::all();
$status = Status::all();
$prodi = Prodi::all();
$dokumen = Dokumen::all();
$trxstatus = Trxstatus::all();
$user = User::all();
return view('reviewer.tampilvalidasi' , compact('pengajuan' , 'mitra', 'status','prodi', 'dokumen',
'trxstatus', 'user'));
}

}
