<?php

namespace App\Http\Controllers;

use App\Models\Mitra;

use App\Models\Prodi;
use App\Models\Status;
use App\Models\Pengajuan;
use App\Models\Trxstatus;
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

    public function verifikasi(){
        $pengajuan = Pengajuan::all();
        $mitra = Mitra::all();
        $status = Status::all();
        $prodi = Prodi::all();
        return view('verifikator\tampilverifikasi' , compact('pengajuan' , 'mitra', 'status','prodi'));
    }

    public function newstatus(){
    $pengajuan = Pengajuan::all();
    $status = Status::all();
    return view('verifikator\updatestatus', compact('status' ,'pengajuan'));
    }

    public function insertnewstatus(Request $request){
    $trxstatus = new Trxstatus;
            $trxstatus->pengajuan_id = $request->input('pengajuan_id');
            $trxstatus->created_by = $request->input('created_by');
            $trxstatus->status_id = $request->input('status_id');
            $trxstatus->catatan = $request['catatan'];
            $trxstatus->status_dokumen = $request['status_dokumen'];
            $trxstatus->save();
            return back()->with('toast_success','Data Berhasil Diupdate');
    }

}
