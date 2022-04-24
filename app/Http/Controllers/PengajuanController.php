<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Prodi;
use App\Models\Status;
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

        // $this->validate($request, [
        //     'namamitra' => 'required',
        //     'namadagangmitra' => 'required',
        //     'logo' => 'required|mimes:jpg,jif,jpeg,png',
        //     'alamat' => 'required',
        //     'email' => 'required',
        //     'namapenandatangan' => 'required',
        //     'jabatanpenandatangan' => 'required',  
        //     'narahubung' => 'required', 
        //     'no_hp' => 'required',
        //      ]);
        
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
            $status = new Status;

            $pengajuan = new Pengajuan;
            $pengajuan = Pengajuan::create($request->all());
            $pengajuan->user_id = Auth::user()->id;
            $pengajuan->kategori_id = $kategori->id;
            $pengajuan->mitra_id = $mitra->id;
            $pengajuan->ruanglingkup_id = $ruanglingkup->id;
            $pengajuan->prodi_id = $prodi->id;
            $pengajuan->status_id = $status->id;
            $pengajuan->tanggalmulai = $data['tanggalmulai'];
            $pengajuan->tanggalakhir = $data['tanggalakhir'];
            $pengajuan->dokumen = $dokumen_file;
            $pengajuan->save();

            return redirect()->route('pengajuan');
            
        }

        public function editpengajuan($id){
            $pengajuan = Pengajuan::find($id);
            //dd($draf);
            return view('dosen\pengajuan\editpengajuan', compact('pengajuan'));
            }
        
            public function updatepengajuan(Request $request, $id){
            $pengajuan = Pengajuan::find($id);
            $pengajuan->update($request->all());
            if ($request->hasFile('dokumen')) 
                {
                    $request->file('dokumen')->move('dokumenkerjasama/', $request->file('dokumen')->getClientOriginalName());
                    $pengajuan->dokumen = $request->file('dokumen')->getClientOriginalName();
                    $pengajuan->save();
                }
            return redirect()->route('pengajuan')->with('toast_success','Data Berhasil Diupdate');
            }

            public function hapuspengajuan($id){
                $pengajuan = Pengajuan::find($id);
                $pengajuan->delete();
                return redirect()->route('pengajuan')->with('toast_success','Data Berhasil Dihapus');
                }

        public function verifikasi(){
            $pengajuan = Pengajuan::all();
            $mitra = Mitra::all();
            $status = Status::all();
            return view('verifikator\tampilverifikasi' , compact('pengajuan' , 'mitra', 'status'));
        }

        public function ubahstatus($id){
            $pengajuan = Pengajuan::find($id);
            $status = Status::all();
            return view('verifikator\ubahstatus' , compact('pengajuan' , 'status'));
         }

         public function updatestatus(Request $request, $id){
            $pengajuan = Pengajuan::find($id);
            $pengajuan->update($request->all());
            return redirect()->route('verifikasi');
         }
                    
                    
        

       
}


