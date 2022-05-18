<?php

namespace App\Http\Controllers;

use App\Models\Mitra;

use App\Models\Status;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

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

    // public function verifikasi(){
    //     $pengajuan = Pengajuan::all();
    //     $mitra = Mitra::all();
    //     $status = Status::all();
    //     return view('verifikator\tampilverifikasi' , compact('pengajuan' , 'mitra', 'status'));
    // }

    // public function upgradepengajuan(){
    // $pengajuan = Pengajuan::all();
    // $status = Status::all();
    // return view('verifikator\updatestatus', compact('status' ,'pengajuan'));
    // }

    // public function insertupgrade(Request $request){
    // $status = Status::create($request->all());
    // return view('verifikator\tampilverifikasi');
    // }

}
