<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Draf;

class DrafController extends Controller
{
    public function index(){

        // Draf tanpa dolar = nama database
        $draf = Draf::all();
        return view('admin\Draf\tampilDraf', compact('draf'));
          // yang bertanda dolar harus sama dengan isi compact
    }

    public function tambahdraf(){
    return view('admin\Draf\tambahdraf');
    }

    public function insertdraf(Request $request){

        $this->validate($request, [
            'namadraf' => 'required',
            'filedraf' => 'required|mimes:doc,docx,rtf',
            'deskripsi' => 'required',
        ]);
 

    // $draf = variabel (bebas)
    $draf = Draf::create($request->all());
    if ($request->hasFile('filedraf')) {
        $request->file('filedraf')->move('filedrafkerjasama/', $request->file('filedraf')->getClientOriginalName());
        $draf->filedraf = $request->file('filedraf')->getClientOriginalName();
        $draf->save();

    }
    return redirect()->route('draf')->with('success', 'Data Berhasil Ditambahkan');
    }

    // public function insertdraf(Request $request){

    // //mengambil data file yang diupload
    // $filedraf = $request->file('filedraf');

    // //mengambil nama file
    // $namafiledraf = $filedraf->getClientOriginalName();

    // //memindahkan file ke folder ke tujuan
    // $filedraf->move('filedrafkerjasama/', $filedraf->getClientOriginalName());

    // // $draf-> new Draf;
    // $draf->namadraf = $request->input('namadraf');
    // $draf->filedraf = $namafiledraf;
    // $draf->deskripsi = $request->input('draf');

    // //simpan ke database
    // $draf->save();


    // return redirect()->route('draf')->with('success', 'Data Berhasil Ditambahkan');

    // }

    public function editdraf($id){
    $draf = Draf::find($id);
    //dd($draf);
    return view('admin\Draf\editdraf', compact('draf'));
    }

    public function updatedraf(Request $request, $id){
    $draf = Draf::find($id);
    $draf->update($request->all());
    if ($request->hasFile('filedraf')) 
        {
            $request->file('filedraf')->move('filedrafkerjasama/', $request->file('filedraf')->getClientOriginalName());
            $draf->filedraf = $request->file('filedraf')->getClientOriginalName();
            $draf->save();
        }
    return redirect()->route('draf')->with('toast_success','Data Berhasil Diupdate');
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
