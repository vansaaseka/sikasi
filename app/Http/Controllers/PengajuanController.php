<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Prodi;
use App\Models\Kategori;
use App\Models\Pengajuan;
use App\Models\RuangLingkup;
use Illuminate\Http\Request;
use App\Models\KategoriMitra;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index(){
        $pengajuan = Pengajuan::all();
        $mitra = Mitra::all();
        return view('dosen\Pengajuan\detailpengajuan' , compact('pengajuan' , 'mitra'));
        }
        

    public function tambahpengajuan(){
        $kategorimitra = KategoriMitra::all();
        $prodi = Prodi::all();
        $ruanglingkup = RuangLingkup::all();
        return view('dosen\Pengajuan\tambahpengajuan' , compact('kategorimitra' , 'prodi' , 'ruanglingkup'));
        }
    
    public function insertpengajuan (Request $request){
        
         //mengambil data file yang diupload
         $logo = $request->file('logo');
         $dokumen = $request->file('dokumen');

         //mengambil extension
        //  $ext_foto = $request->file('logo')->getClientOriginalExtension();
        //  $ext_dokumen = $request->file('dokumen')->getClientOriginalExtension();

         //mengambil nama file
         $namalogo = $logo->getClientOriginalName();
         $namadokumen = $dokumen->getClientOriginalName();

         $foto_file = $namalogo;
         $dokumen_file = $namadokumen;
 
         $path = $request->file('logo')->storeAs('logomitra/', $foto_file);
         $path = $request->file('dokumen')->storeAs('dokumenkerjasama/', $dokumen_file);

        //  //memindahkan file ke folder ke tujuan
        //  $logo->move('logomitra/') ;
        //  $dokumen->move('dokumenkerjasama/');

            $data = $request->all();

            $mitra = new Mitra;
            $kategorimitra = new KategoriMitra;

            $mitra->namamitra = $data['namamitra'];
            $mitra->namadagangmitra = $data['namadagangmitra'];
            $mitra->logo = $foto_file;
            $mitra->kategori_id = $kategorimitra->namakategori;
            $mitra->alamat = $data['alamat'];
            $mitra->email = $data['email'];
            $mitra->namapenandatangan = $data['namapenandatangan'];
            $mitra->jabatanpenandatangan = $data['jabatanpenandatangan'];
            $mitra->narahubung = $data['narahubung'];
            $mitra->no_hp = $data['no_hp'];
            $mitra->save();
            
            
           
            $user = Auth::user();
            $kategori = new Kategori;
            $ruanglingkup = new RuangLingkup;
            $prodi = new Prodi;

            $ajuan = new Pengajuan;
            $ajuan->user_id = Auth::user()->id;
            $ajuan->id_kategori = $kategori->id;
            $ajuan->mitra_id = $mitra->id;
            $ajuan->ruanglingkup_id = $ruanglingkup->id;
            $ajuan->prodi_id = $prodi->id;
            $ajuan->tanggalmulai = $data['tanggalmulai'];
            $ajuan->tanggalakhir = $data['tanggalakhir'];
            $ajuan->dokumen = $dokumen_file;
            $ajuan->save();

            return redirect()->route('pengajuan');
            


        }
        

       
}


