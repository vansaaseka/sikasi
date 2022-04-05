<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(){

            // Kategori tanpa dolar = nama database
            $kategori = Kategori::all();
            return view('admin\Kategori\tampilKategori', compact('kategori'));
              // yang bertanda dolar harus sama dengan isi compact
        }
    public function tambahkategori(){
        return view('admin\Kategori\tambahkategori');
    }

    public function insertkategori(Request $request){
        // dd($request->all());
        $this->validate($request, [
            'namakategori' => 'required',
            'deskripsi' => 'required',
        ]);
        Kategori::create($request->all());
        return redirect()->route('kategori')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function editkategori($id){
        $kategori = Kategori::find($id);
        //dd($kategori);
        return view('admin\Kategori\editkategori', compact('kategori'));
    }

    public function updatekategori(Request $request, $id){
        $this->validate($request, [
            'namakategori' => 'required',
            'deskripsi' => 'required',
        ]);
        $kategori = Kategori::find($id);
        $kategori->update($request->all());
        return redirect()->route('kategori')->with('toast_success','Data Berhasil Diupdate');
    }

    public function hapuskategori($id){
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori')->with('toast_success','Data Berhasil Dihapus');
    }
}