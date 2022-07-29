<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

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
           $validasi = Validator::make($request->all(),[
                'dokumen'=> 'required|mimes:doc,docx,pdf',
            ],
       
        );
         if($validasi->fails()) {
         Alert::warning('Warning', 'Mohon isikan data secara benar!');
         return redirect()->back();
         } 
         else {
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
    }

  

    public function updatedokumen(Request $request, $id){
         $validasi = Validator::make($request->all(),[
          'dokumen'=> 'mimes:doc,docx,pdf',
          ],

          );
          if($validasi->fails()) {
          Alert::warning('Warning', 'Mohon isikan data secara lengkap dan benar!');
          return redirect()->back();
          }
          else {

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
    }



    public function download($id)
    {
        $data = Draf::where('id', $id)->firstOrFail();
        $pathToFile = storage_path('app/books/' . $draf->filedraf);
        return response()->download($pathToFile);
    }
}
