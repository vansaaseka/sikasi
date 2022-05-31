<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\Dokumen;
use App\Models\Kategori;
use App\Models\Pengajuan;
use App\Models\Trxstatus;
use App\Models\RuangLingkup;

use Illuminate\Http\Request;
use App\Models\KategoriMitra;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index(){
        $pengajuan = Pengajuan::all();
        $mitra = Mitra::all();
        $user = User::all();
        $dokumen = Dokumen::all();
        $status = Status::all();
        $trxstatus = Trxstatus::all();
        return view('dosen\Pengajuan\detailpengajuan' , compact('pengajuan' , 'mitra','dokumen', 'trxstatus', 'status','user'));
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
        //  $dokumen = $request->file('dokumen');

         //mengambil extension
        //  $ext_foto = $request->file('logo')->getClientOriginalExtension();
        //  $ext_dokumen = $request->file('dokumen')->getClientOriginalExtension();

         //mengambil nama file
         $namalogo = $logo->getClientOriginalName();
        //  $namadokumen = $dokumen->getClientOriginalName();

         $foto_file = $namalogo;
        //  $dokumen_file = $namadokumen;
 
         $path = $request->file('logo')->storeAs('logomitra/', $foto_file);
        //  $path = $request->file('dokumen')->storeAs('dokumenkerjasama/', $dokumen_file);

        //  //memindahkan file ke folder ke tujuan
        //  $logo->move('logomitra/') ;
        //  $dokumen->move('dokumenkerjasama/');

            $data = $request->all();

            $mitra = new Mitra;
            $kategorimitra = new KategoriMitra;
            // Mitra::create([
            //     'namamitra' => $request->namamitra,
            //     'namadagangmitra' => $request->namadagangmitra,
            //     'logo' => $foto_file,
            //     'kategorimitra_id' => $request->kategorimitra_id,
            //     'alamat' => $request->alamat,
            //     'email' => $request->email,
            //     'namapenandatangan' => $request->namapenandatangan,
            //     'jabatanpenandatangan' => $request->jabatanpenandatangan,
            //     'narahubung' => $request->narahubung,
            //     'no_hp' => $request->no_hp,
                
            // ]);

           
            


            $mitra->namamitra = $data['namamitra'];
            $mitra->namadagangmitra = $data['namadagangmitra'];
            $mitra->logo = $foto_file;
            $mitra->kategorimitra_id = $request->kategorimitra_id;
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
     
            $pengajuan = new Pengajuan;
            $pengajuan->user_id = Auth::user()->id;
            $pengajuan->kategori_id = $request->kategori_id;
            $pengajuan->mitra_id = $mitra->id;
            $pengajuan->ruanglingkup_id = $request->ruanglingkup_id;
            $pengajuan->proditerlibat_id = $request->proditerlibat_id;
            $pengajuan->tanggalmulai = $data['tanggalmulai'];
            $pengajuan->tanggalakhir = $data['tanggalakhir'];
            // $pengajuan->dokumen = $dokumen_file;
            $pengajuan->save();

            // Pengajuan::create([
            //     'user_id' => Auth::user()->id,
            //     'kategori_id' => $request->kategori_id,
            //     'mitra_id' => $request->mitra->id,
            //     'ruanglingkup_id' => $request->ruanglingkup_id,
            //     'proditerlibat_id' => $request->proditerlibat_id,
            //     'tanggalmulai' => $request->tanggalmulai,
            //     'tanggalakhir' => $request->tanggalakhir,
            //     // 'nomordokumen' => $request->nomordokumen,
            //     // 'dokumen' => $dokumen_file,
            // ]);
 

            //Generate Dokumen

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $text = $section->addText('
        

DRAFT


PERJANJIAN KERJA SAMA 
ANTARA
…………………………………………………..
DENGAN
FAKULTAS/ LEMBAGA ………………………………
UNIVERSITAS SEBELAS MARET 

Nomor: ……/UN27……/KS/2021
Nomor: ……………………… /2021

TENTANG
…………………………………………………….
………………………………….………………..


Pada hari ini, ………… tanggal …………… bulan ………… tahun …………………………, kami yang bertanda tangan dibawah ini:
I.	………………………………	:	Dekan Fakultas ............./ Ketua ....………../ Kepala ……………/ Direktur ………… Universitas Sebelas Maret, dalam hal ini bertindak untuk dan atas nama  Fakultas/ Lembaga/ Unit, yang berkedudukan di Jl. Ir. Sutami 36A, Kentingan Surakarta, Jawa Tengah, selanjutnya disebut PIHAK KESATU.
1I.	………………………………	:	…………………………….., yang diangkat berdasarkan ………… Nomor ……… tanggal …….. tentang …………., dalam hal ini bertindak untuk dan atas nama ……………………, yang berkedudukan di ……………, selanjutnya disebut PIHAK KEDUA;


PIHAK KESATU dan PIHAK KEDUA secara sendiri-sendiri disebut PIHAK, dan secara bersama-sama selanjutnya disebut sebagai PARA PIHAK.

        ');
        $section = $phpWord->addSection();
        $text = $section->addText('
        PARA PIHAK secara bersama setuju dan bersepakat untuk membuat Perjanjian Kerja Sama Kerjasama tentang ”…………………………………………………………………………”, dengan ketentuan dan syarat sebagai berikut:

Pasal 1
UMUM

(1)	Perjanjian Kerja Sama kerjasama ini dilaksanakan dalam rangka “………………………………….”, maka PARA PIHAK akan saling membantu, melakukan dan/atau menyediakan hal-hal yang diperlukan untuk tercapainya tujuan pelaksanaan kerjasama.
(2)	Perjanjian Kerja Sama ini didasarkan pada Nota Kesepahaman/ Kesepakatan Bersama antara Universitas Sebelas Maret dengan ...................................... Nomor: ......................... dan Nomor: .............................. Tanggal ..................... tentang .............................. .
(3)	…………………. .
(4)	…………………. .

Pasal 2
MAKSUD DAN TUJUAN 

(1)	Maksud Perjanjian Kerja Sama Kerja Sama ini adalah untuk ………………………………………. .
(2)	Tujuan Perjanjian Kerja Sama kerja Sama ini adalah ………………………………………………

Pasal 3
LOKASI KEGIATAN 
(optional bisa ada bisa tidak)

Lokasi Kegiatan di dalam Perjanjian Kerja Sama Kerja Sama ini berada di …………………………………….

Pasal 4
RUANG LINGKUP 

(1)	Ruang Lingkup Perjanjian Kerja Sama Kerja Sama ini adalah :
a)	…………….. (SEBUTKAN NAMA PRODI YANG TERLIBAT)
b)	…………….., dst.
(2)	Detail lingkup pekerjaan yang dilaksanakan adalah sebagai berikut:
a)	……………..
b)	…………….., dst.
');

$section = $phpWord->addSection();
        $text = $section->addText('
        Pasal 5
        HAK DAN KEWAJIBAN
        
        (1)	Hak PIHAK KESATU:
        a)	……………….
        b)	………………., dst.
        (2)	Kewajiban PIHAK KESATU:
        a)	……………….
        b)	………………., dst.
        (3)	Hak PIHAK KEDUA:
        a)	……………….
        b)	………………., dst.
        (4)	Kewajiban PIHAK KEDUA:
        a)	……………….
        b)	………………., dst.
        
        Pasal 6
        PEMBIAYAAN
        
        Biaya yang timbul dari Perjanjian Kerja Sama ini ditanggung oleh PARA PIHAK dengan pembebanan sebagai berikut:
        1.	Beban PIHAK KESATU ………………………..
        2.	Beban PIHAK KEDUA ………………………….
        3.	Prosedur pembayaran
        a.	Biaya yang menjadi beban PIHAK KESATU sebagaimana dimaksud dalam Pasal 6 ayat (1) huruf a, dibayarkan kepada PIHAK KEDUA sesuai jadwal pelaksanaan dan diatur sebagai berikut:
        1)	…………………..
        2)	………………….., dst
        b.	Pembayaran oleh PIHAK KESATU dilakukan secara transfer bank ke rekening PIHAK KEDUA sebagai berikut:
        Nama Bank                  : ………………………………
        Nomor Rekening           : ………………………………
        Nama Rekening            : …………………………………
        Nomor Virtual Account : …………………………………………
');     

$section = $phpWord->addSection();
        $text = $section->addText('
        Pasal 7
KEWAJIBAN INSTITUTIONAL FEE 

(pasal ini harus ada untuk pks yang mendatangkan revenue generating bagi UNS dari pihak mitra kecuali untuk beasiswa, hibah penelitian, hibah pemerintah untuk operasional)

Sesuai dengan Peraturan Rektor Universitas Sebelas Maret Nomor 1 Tahun 2019 tentang Pedoman Kerjasama Universitas Sebelas Maret maka Pendapatan dari Kewajiban hasil kerjasama sebesar 6% dari total nilai kontrak disetorkan ke rekening operasional Universitas Sebelas Maret.

Pasal 8
JANGKA WAKTU

(1)	Perjanjian Kerja Sama ini berlaku selama …….. ( …….. ) tahun terhitung sejak tanggal ditandatanganinya. 
(2)	Apabila salah satu pihak akan memperpanjang atau memperpendek masa berlakunya Perjanjian Kerja Sama ini, maka pihak yang berkeinginan memperpanjang atau memperpendek masa berlakunya harus mengajukan secara tertulis kepada pihak lain paling lambat 7 (tujuh) hari kalender sebelum berakhirnya Perjanjian Kerja Sama ini. 
(3)	Dengan berakhirnya jangka waktu pelaksanaan sebagaimana dimaksud pada ayat (1) dan tidak dilakukan perubahan atas jangka waktu tersebut maka Perjanjian Kerja Sama kerjasama ini berakhir dengan sendirinya dan PARA PIHAK tidak terikat atas hak dan kewajiban yang tertuang dalam Perjanjian Kerja Sama kerjasama ini. 

Pasal 9
KORESPONDENSI

Setiap pemberitahuan dan/atau surat-menyurat akan dialamatkan sebagai berikut:
PIHAK KESATU :
UNIVERSITAS SEBELAS MARET
U.p			: ……………………………………………….. 
Alamat 	: Universitas Universitas Sebelas Maret
	 		 Jl. Sutami No. 36 A, Kentingan, Surakarta 57126
Telepon 	: (0271) 646994 Ext. …………..
Email		: …………………..
PIHAK KEDUA: 
');

$section = $phpWord->addSection();
        $text = $section->addText('

        ………………………………………………
        U.p.		: ……………………………………………….
        Alamat	: ……………………………………………….
        Telepon 	: …………………..
        Email		: …………………..
        
        Pasal 10
        PENYELESAIAN PERSELISIHAN
        
        (1)	Apabila dalam pelaksanaan kerjasama terjadi perbedaan, maka yang dipakai sebagai acuan adalah ketentuan-ketentuan yang tercantum dalam Perjanjian Kerja Sama ini; 
        (2)	Apabila timbul perselisihan akibat Perjanjian Kerja Sama ini, maka PARA PIHAK akan menyelesaikan perselisihan tersebut secara musyawarah untuk mencapai mufakat. 
        (3)	Apabila penyelesaian perselisihan secara musyawarah untuk mufakat tidak berhasil, maka PARA PIHAK sepakat untuk menyelesaikan melalui Pengadilan Negeri Surakarta. 
        
        Pasal 11
        PENUTUP
        
        Perjanjian Kerja Sama ini dibuat di ......................, pada hari dan tanggal sebagaimana dimaksud di atas, dalam rangkap 2 (dua) bermeterai cukup, masing-masing mempunyai kekuatan hukum yang sama, dan diserahkan kepada masing-masing pihak untuk digunakan sebagai dasar dan pedoman dalam pelaksanaan kerjasama.
        
        PIHAK KESATU 
        
        
        
        ………………………………………..	PIHAK KEDUA
        
        
        
        ……………………………………..
        Mengetahui 
        Wakil Rektor Perencanaan, Kerjasama, Bisnis, dan Informasi
        Universitas Sebelas Maret
        
        
        Prof. Dr. rer.nat. Sajidan, M.Si.	
        
');        
        
        $text = $section->addText($request->get('name'));
        $text = $section->addText($request->get('email'));
        $text = $section->addText($request->get('number'),array('name'=>'Arial','size' => 20,'bold' => true));
        // $section->addImage("./images/Krunal.jpg");  
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('PKS2022.docx');
        return  response()->download(public_path('PKS2022.docx'));
        // return redirect()->route('pengajuan');
        

            
            
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
        

       
}


