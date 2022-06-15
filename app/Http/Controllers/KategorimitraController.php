<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriMitra;

class KategorimitraController extends Controller
{
           public function index(){

           // Kategorimitra tanpa dolar = nama database
           $kategorimitra = KategoriMitra::all();
           return view('admin\Kategorimitra\tampilKategorimitra', compact('kategorimitra'));
           // yang bertanda dolar harus sama dengan isi compact
           }
           public function tambahkategorimitra(){
           return view('admin\Kategorimitra\tambahKategorimitra');
           }

           public function insertkategorimitra(Request $request){
           // dd($request->all());
           $this->validate($request, [
           'kategorimitra' => 'required',
           ]);
           KategoriMitra::create($request->all());
           return redirect()->route('kategorimitra')->with('success', 'Data Berhasil Ditambahkan');
           }

           public function editkategorimitra($id){
           $kategorimitra = KategoriMitra::find($id);
           //dd($kategorimitra);
           return view('admin\Kategorimitra\editKategorimitra', compact('kategorimitra'));
           }

           public function updatekategorimitra(Request $request, $id){
           $this->validate($request, [
           'kategorimitra' => 'required',
           ]);
           $kategorimitra = KategoriMitra::find($id);
           $kategorimitra->update($request->all());
           return redirect()->route('kategorimitra')->with('toast_success','Data Berhasil Diupdate');
           }

           public function hapuskategorimitra($id){
           $kategorimitra = KategoriMitra::find($id);
           $kategorimitra->delete();
           return redirect()->route('kategorimitra')->with('toast_success','Data Berhasil Dihapus');
           }
           
}
