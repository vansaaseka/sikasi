<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;

class DokumenController extends Controller
{
    public function index(){

        // dokumen tanpa dolar = nama database
        $dokumen = dokumen::all();
        return view('admin\dokumen\tampildokumen', compact('dokumen'));
          // yang bertanda dolar harus sama dengan isi compact
    }

    public function insertdokumen(Request $request){
            // ddd($request);
            //membuat validasi, jika tidak diisi maka akan menampilkan pesan error
            $this->validate($request, [
                'dokumen'=> 'mimes:doc,docx,pdf',
            ],
       
        );
             //mengambil data file yang diupload
             $dokumen           = $request->file('dokumen');
             //mengambil nama file
             $nama_dokumen     = $dokumen->getClientOriginalName();
            //memindahkan file ke folder tujuan
            $dokumen->move('dokumenkerjasama',$dokumen->getClientOriginalName());
            $dokumens = new Dokumen;
            $dokumens->pengajuan_id = $request->input('pengajuan_id');
            $dokumens->user_id = $request->input('user_id');
            $dokumens->dokumen = $nama_dokumen;
            $dokumens->nodokumen = $request->input('nodokumen');
            //menyimpan data ke database
            $dokumens->save();
    
            //kembali ke halaman sebelumnya
            return back()->with('toast_success', 'Data Berhasil Tersimpan');
   
    // // return redirect()->route('pengajuan')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function editdokumen($id){
    $draf = Draf::find($id);
    //dd($draf);
    return view('admin\Draf\editdraf', compact('draf'));
    }

    public function updatedokumen(Request $request, $id){
    $dokumen = Dokumen::find($id);
    $dokumen->update($request->all());
    if ($request->hasFile('dokumen')) 
        {
            $request->file('dokumen')->move('dokumenkerjasama/', $request->file('dokumen')->getClientOriginalName());
            $dokumen->dokumen = $request->file('dokumen')->getClientOriginalName();
            $dokumen->save();
        }
        return back()->with('toast_success','Data Berhasil Diupdate');
    }

    public function hapusdraf($id){
    $draf = Draf::find($id);
    $draf->delete();
    return redirect()->route('draf')->with('toast_success','Data Berhasil Dihapus');
    }

    public function download($id)
    {
        $data = Draf::where('id', $id)->firstOrFail();
        $pathToFile = storage_path('app/books/' . $draf->filedraf);
        return response()->download($pathToFile);
    }
}
