<?php

namespace App\Http\Controllers;

use App\Models\RuangLingkup;
use Illuminate\Http\Request;

class RuanglingkupController extends Controller
{
      public function index(){

      // ruanglingkup tanpa dolar = nama database
      $ruanglingkup = RuangLingkup::all();
      return view('admin\Ruanglingkup\tampilRuanglingkup', compact('ruanglingkup'));
      // yang bertanda dolar harus sama dengan isi compact
      }
      public function tambahruanglingkup(){
      return view('admin\Ruanglingkup\tambahRuanglingkup');
      }

      public function insertruanglingkup(Request $request){
      // dd($request->all());
      $this->validate($request, [
      'ruanglingkup' => 'required',
      ]);
      RuangLingkup::create($request->all());
      return redirect()->route('ruanglingkup')->with('success', 'Data Berhasil Ditambahkan');
      }

      public function editruanglingkup($id){
      $ruanglingkup = RuangLingkup::find($id);
      //dd($ruanglingkup);
      return view('admin\Ruanglingkup\editRuanglingkup', compact('ruanglingkup'));
      }

      public function updateruanglingkup(Request $request, $id){
      $this->validate($request, [
      'ruanglingkup' => 'required',
      ]);
      $ruanglingkup = RuangLingkup::find($id);
      $ruanglingkup->update($request->all());
      return redirect()->route('ruanglingkup')->with('toast_success','Data Berhasil Diupdate');
      }

      public function hapusruanglingkup($id){
      $ruanglingkup = RuangLingkup::find($id);
      $ruanglingkup->delete();
      return redirect()->route('ruanglingkup')->with('toast_success','Data Berhasil Dihapus');
      }
}
