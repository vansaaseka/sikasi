<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
            public function index(){

                // Prodi tanpa dolar = nama database
                $prodi = Prodi::all();
                 if (Auth()->user()->role == 1){
                return view('admin\Prodi\tampilprodi', compact('prodi'));
                 }
                 else{
                 abort(403);
                 }
            
            }
           

            public function insertprodi(Request $request){
                // dd($request->all());
                $this->validate($request, [
                 'namaprodi' => 'required',
                ]);
                Prodi::create($request->all());
                return redirect()->route('prodi')->with('toast_success', 'Data Berhasil Ditambahkan');
            }

          

            public function updateprodi(Request $request, $id){
                $this->validate($request, [
                    'namaprodi' => 'required',
                ]);
                $prodi = Prodi::find($id);
                $prodi->update($request->all());
                return redirect()->route('prodi')->with('toast_success','Data Berhasil Diupdate');
            }

            public function hapusProdi($id){
            $prodi = Prodi::find($id);
            $prodi->delete();
            return redirect()->route('prodi');
            }
        }
