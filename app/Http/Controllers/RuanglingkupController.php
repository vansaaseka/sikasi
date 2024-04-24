<?php

namespace App\Http\Controllers;

use App\Models\RuangLingkup;
use App\Models\ruanglingkup_lainnya;
use Illuminate\Http\Request;

class RuanglingkupController extends Controller
{
      public function index(){

      // ruanglingkup tanpa dolar = nama database
      $ruanglingkup = RuangLingkup::all();
      return view('admin\Ruanglingkup\tampilRuanglingkup', compact('ruanglingkup'));
      // yang bertanda dolar harus sama dengan isi compact
      }

public function insertruanglingkup(Request $request){
    $ruanglingkupId = $request->input('ruanglingkup_id');

    if (in_array('lainnya', $ruanglingkupId)) {
        // Jika opsi 'lainnya' dipilih, simpan nilai 'lainnya'
        $lainnyaValue = $request->input('ruanglingkup_id');

        // Dapatkan model Ruanglingkup berdasarkan id
        $ruanglingkup = Ruanglingkup::find($ruanglingkupId);

        // Gunakan relasi untuk membuat record baru di dalam RuanglingkupLainnya
        $ruanglingkup->ruanglingkupLainnyas()->create([
            'nama' => $ruanglingkup->nama, // Gunakan nilai 'nama' dari Ruanglingkup
            'lainnya' => $lainnyaValue,
        ]);
    } else {
        // Jika opsi 'lainnya' tidak dipilih, proses seperti biasa
        // ...
    }
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
