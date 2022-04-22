<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Status;

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
}
