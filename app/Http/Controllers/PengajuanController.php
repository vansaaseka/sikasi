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
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\KategoriMitra;
use Illuminate\Support\Facades\Validator;
use App\Exports\PengajuanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::all();
        $mitra = Mitra::all();
        $user = User::all();
        $dokumen = Dokumen::all();
        $status = Status::all();
        $trxstatus = Trxstatus::all();
        $kategori = Kategori::all();

        return view('dosen\Pengajuan\detailpengajuan' , compact('pengajuan' , 'mitra','dokumen', 'trxstatus', 'status','user', 'kategori'));
        }

    public function tambahpengajuan()
    {
        if(empty(auth()->user()->nomorhp)){
            abort(404);
        }


        $kategorimitra = KategoriMitra::all();
        $prodi = Prodi::all();
        $ruanglingkup = RuangLingkup::all();
        $kategori = Kategori::all();
        return view('dosen\Pengajuan\tambahpengajuan' , compact('kategorimitra' , 'prodi' , 'ruanglingkup', 'kategori'));
    }

    public function editdokumen($id)
    {
        $draf = Pengajuan::find($id);
        $dokumen = Dokumen::where('pengajuan_id', $id)->first();
        return view('admin\Draf\editdokumen', compact('draf', 'dokumen'));
    }

    public function insertpengajuan (Request $request)
    {
        $validasi = Validator::make($request->all(),[
            'namamitra' => 'required',
            // 'namadagangmitra' => 'required',
            'logo' => 'required|image|mimes:jpg,png,jpeg' ,
            'kategorimitra_id' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'namapenandatangan' => 'required',
            'jabatanpenandatangan' => 'required',
            // 'narahubung' => 'required',
            'no_hp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'tanggalmulai' => 'required',
            'tanggalakhir' => 'required',
            'kategori_id' => 'required',
            'prodiid' => 'required'

            ]);

        if($validasi->fails()) {
            Alert::warning('Warning', 'Mohon isikan data secara lengkap dan benar!');
            return redirect()->back();
        } else {
        //mengambil data file yang diupload
        $logo = $request->file('logo');
        // $dokumen = $request->file('dokumen');

        //mengambil extension
        // $ext_foto = $request->file('logo')->getClientOriginalExtension();
        // $ext_dokumen = $request->file('dokumen')->getClientOriginalExtension();

        //mengambil nama file
        $namalogo = $logo->getClientOriginalName();
        // $namadokumen = $dokumen->getClientOriginalName();

        $foto_file = $namalogo;
        // $dokumen_file = $namadokumen;

        $path = $request->file('logo')->storeAs('logomitra/', $foto_file);
        // $path = $request->file('dokumen')->storeAs('dokumenkerjasama/', $dokumen_file);



        $mitra = new Mitra;
        $kategorimitra = new KategoriMitra;


        $mitra->namamitra = $request->namamitra;
        $mitra->namadagangmitra = $request->namadagangmitra;
        $mitra->logo = $foto_file;
        $mitra->kategorimitra_id = $request->kategorimitra_id;
        $mitra->alamat = $request->alamat;
        $mitra->email = $request->email;
        $mitra->namapenandatangan = $request->namapenandatangan;
        $mitra->jabatanpenandatangan = $request->jabatanpenandatangan;
        $mitra->narahubung = $request->narahubung;
        $mitra->no_hp = $request->no_hp;

        $mitra->save();



        $user = Auth::user();
        $kategori = new Kategori;
        $ruanglingkup = new RuangLingkup;
        $prodi = new Prodi;

        $pengajuan = new Pengajuan;
        $pengajuan->user_id = Auth::user()->id;

                $ruanglingkup = $request->ruanglingkup_id;
                if($ruanglingkup){
                    $i = 0;
                    foreach ($ruanglingkup as $item) {
                        // dd($item);
                        $dataa1[$i] = ([
                            'id' => (int) $item,
                        ]);
                        $i++;
                    }
                } else {
                    $dataa1 = [];
                }

                $proditerlibat = $request->proditerlibat_id;
                if($proditerlibat){
                    $i = 0;
                    foreach ($proditerlibat as $item) {
                        // dd($item);
                        $dataa2[$i] = ([
                            'id' => (int) $item,
                        ]);
                        $i++;
                    }
                } else {
                    $dataa2 = [];
                }

        $pengajuan->kategori_id = $request->kategori_id;
        $pengajuan->mitra_id = $mitra->id;
        $pengajuan->ruanglingkup_id = json_encode($dataa1);
        $pengajuan->proditerlibat_id = json_encode($dataa2);
        $pengajuan->tanggalmulai = $request->tanggalmulai;
        $pengajuan->tanggalakhir = $request->tanggalakhir;
        $pengajuan->prodiid = $request->prodiid;
        $pengajuan->save();


        $relatedMajor = array();
        foreach ($dataa2 as $majorId) {
            $major = Prodi::where('id', '=', $majorId)->first();

            array_push($relatedMajor, $major);
        }

        $alphabetIndex = range('a', 'z');
        $startDateParsed = \Carbon\Carbon::parse($pengajuan->tanggalmulai);
        $startDateHari = $startDateParsed->translatedFormat('l');
        $startDateDay = $startDateParsed->translatedFormat('d');
        $startDateMonth = $startDateParsed->translatedFormat('F');
        $startDateYear = $startDateParsed->translatedFormat('Y');
        $endDateParsed = \Carbon\Carbon::parse($pengajuan->tanggalakhir);


        if($pengajuan->kategori_id == 1){
            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $section = $phpWord->addSection();

            $section->addText('DRAFT', array('bold' => true, 'size' => 18), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('PERJANJIAN KERJA SAMA', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText($mitra->namamitra, array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('DENGAN', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('SEKOLAH VOKASI', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('UNIVERSITAS SEBELAS MARET', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('Nomor:....../UN27....../KS/2021', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('Nomor:..................../2021', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('............................................', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('............................................', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('Pada hari ini, ' . $startDateHari . ' tanggal ' . $startDateDay . ' bulan ' . $startDateMonth . ' tahun ' . $startDateYear. ', kami yang bertanda tangan dibawah ini:', array('size' => 11), array("align" => "thaiDistribute"));
            $table = $section->addTable();
            $table->addRow();
            $table->addCell(5000)->addText('I. Drs. Santoso Tri Hananto, M,Acc., Ak', array('bold' => true, 'size' => 11));
            $table->addCell(5000)->addText(': Dekan Sekolah Vokasi Universitas Sebelas Maret, yang berkedudukan di Jl. Kol Sutarto No. 150K Jebres Surakarta, Jawa Tengah, selanjutnya disebut PIHAK KESATU.', array('size' => 11), array("align" => "thaiDistribute"));
            $table->addRow();
            $table->addCell(5000)->addText('II. '. $mitra->namapenandatangan, array('bold' => true, 'size' => 11));
            $table->addCell(5000)->addText(': ' . $mitra->jabatanpenandatangan . ', dalam hal ini bertindak untuk dan atas nama ' . $mitra->namamitra . ', yang berkedudukan di ' . $mitra->alamat . ', selanjutnya disebut PIHAK KEDUA;', array('size' => 11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $pageOneMixedStyle = $section->createTextRun();
            $pageOneMixedStyle->addText('PIHAK KESATU',array('bold' => true, 'size' => 11), array("align" => "thaiDistribute"));
            $pageOneMixedStyle->addText(' dan ');
            $pageOneMixedStyle->addText('PIHAK KEDUA ',array('bold' => true, 'size' => 11));
            $pageOneMixedStyle->addText('secara sendiri-sendiri disebut', array('size' => 11), array("align" => "thaiDistribute"));
            $pageOneMixedStyle->addText(' PIHAK ',array('bold' => true, 'size' => 11));
            $pageOneMixedStyle->addText(', dan secara bersama-sama selanjutnya disebut sebagai', array('size' => 11), array("align" => "thaiDistribute"));
            $pageOneMixedStyle->addText(' PARA PIHAK ',array('bold' => true, 'size' => 11));


            $section->addTextBreak();

            $section->addText('PARA PIHAK secara bersama setuju dan bersepakat untuk membuat Perjanjian Kerja Sama Kerjasama tentang
            ”…………………………………………………………………………”, dengan ketentuan dan syarat sebagai berikut:', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addTextBreak();
            $section->addText('Pasal 1', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('UMUM', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('(1) Perjanjian Kerja Sama kerjasama ini dilaksanakan dalam rangka “………………………………….”, maka PARA PIHAK akan saling
            membantu, melakukan dan/atau menyediakan hal-hal yang diperlukan untuk tercapainya tujuan pelaksanaan kerjasama.', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(2) Perjanjian Kerja Sama ini didasarkan pada Nota Kesepahaman/ Kesepakatan Bersama antara Universitas Sebelas Maret
            dengan ...................................... Nomor: ......................... dan Nomor: ..............................
            Tanggal ..................... tentang .............................. .', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(3) …………………. .', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(4) …………………. .', array('size' => 11), array("align" => "thaiDistribute"));


            $section->addTextBreak();
            $section->addText('Pasal 2', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('MAKSUD DAN TUJUAN', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('(1) Maksud Perjanjian Kerja Sama Kerja Sama ini adalah untuk ………………………………………. .', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(2) Tujuan Perjanjian Kerja Sama kerja Sama ini adalah ………………………………………………', array('size' => 11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $section->addText('Pasal 3', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('LOKASI DAN KEGIATAN', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('(optional bisa ada bisa tidak)', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('Lokasi Kegiatan di dalam Perjanjian Kerja Sama Kerja Sama ini berada di …………………………………….', array('size' => 11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $section->addText('Pasal 4', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('RUANG LINGKUP', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('(1) Ruang Lingkup Perjanjian Kerja Sama Kerja Sama ini adalah :', array('size' => 11), array("align" => "left"));
            $section->addText('a) ……………..', array('size' => 11), array("align" => "left"));
            $section->addText('b) …………….., dst', array('size' => 11), array("align" => "left"));
            // for ($i=0; $i < count($relatedMajor) ; $i++) {
            //     $section->addText($alphabetIndex[$i] .  ') ' . $relatedMajor[$i]->namaprodi, array('size' => 11), array("align" => "left"));
            // }

            $section->addText('(2) Detail lingkup pekerjaan yang dilaksanakan adalah sebagai berikut:', array('size' => 11), array("align" => "left"));
            $section->addText('a) ……………..', array('size' => 11), array("align" => "left"));
            $section->addText('b) ……………..,dst', array('size' => 11), array("align" => "left"));


            $section->addTextBreak();
            $section->addText('Pasal 5', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('HAK DAN KEWAJIBAN', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('(1) Hak PIHAK KESATU', array('size' => 11), array("align" => "left"));
            $section->addText('a) ……………..', array('size' => 11), array("align" => "left"));
            $section->addText('b) …………….., dst', array('size' => 11), array("align" => "left"));
            $section->addText('(2) Kewajiban PIHAK KESATU', array('size' => 11), array("align" => "left"));
            $section->addText('a) ……………..', array('size' => 11), array("align" => "left"));
            $section->addText('b) …………….., dst', array('size' => 11), array("align" => "left"));
            $section->addText('(3) Hak PIHAK KEDUA', array('size' => 11), array("align" => "left"));
            $section->addText('a) ……………..', array('size' => 11), array("align" => "left"));
            $section->addText('b) …………….., dst', array('size' => 11), array("align" => "left"));
            $section->addText('(4) Kewajiban PIHAK KEDUA', array('size' => 11), array("align" => "left"));
            $section->addText('a) ……………..', array('size' => 11), array("align" => "left"));
            $section->addText('b) …………….., dst', array('size' => 11), array("align" => "left"));

            $section->addTextBreak();
            $section->addText('Pasal 6', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('PEMBIAYAAN', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('Biaya yang timbul dari Perjanjian Kerja Sama ini ditanggung oleh PARA PIHAK dengan pembebanan sebagai berikut:', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('1. Beban PIHAK KESATU ………………………..', array('size' => 11), array("align" => "left"));
            $section->addText('2. Beban PIHAK KEDUA ………………………….', array('size' => 11), array("align" => "left"));
            $section->addText('3. Prosedur pembayaran', array('size' => 11), array("align" => "left"));
            $section->addText('a. Biaya yang menjadi beban PIHAK KESATU sebagaimana dimaksud dalam Pasal 6 ayat (1) huruf a, dibayarkan kepada PIHAK
            KEDUA sesuai jadwal pelaksanaan dan diatur sebagai berikut:', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('1) …………………..', array('size' => 11), array("align" => "left"));
            $section->addText('2) ………………….., dst', array('size' => 11), array("align" => "left"));
            $section->addText('b. Pembayaran oleh PIHAK KESATU dilakukan secara transfer bank ke rekening PIHAK KEDUA sebagai berikut:', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('Nama Bank : ………………………………', array('size' => 11), array("align" => "left"));
            $section->addText('Nomor Rekening : ………………………………', array('size' => 11), array("align" => "left"));
            $section->addText('Nama Rekening : …………………………………', array('size' => 11), array("align" => "left"));
            $section->addText('Nomor Virtual Account : …………………………………………', array('size' => 11), array("align" => "left"));

            $section->addTextBreak();
            $section->addText('Pasal 7', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('KEWAJIBAN INSTITUTIONAL FEE', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('Sesuai dengan Peraturan Rektor Universitas Sebelas Maret Nomor 1 Tahun 2019 tentang Pedoman Kerjasama Universitas
            Sebelas Maret maka Pendapatan dari Kewajiban hasil kerjasama sebesar 6% dari total nilai kontrak disetorkan ke rekening
            operasional Universitas Sebelas Maret.', array('size' => 11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $section->addText('Pasal 8', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('JANGKA WAKTU', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('(1) Perjanjian Kerja Sama ini berlaku selama …….. ( …….. ) tahun terhitung sejak tanggal ditandatanganinya.', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(2) Apabila salah satu pihak akan memperpanjang atau memperpendek masa berlakunya Perjanjian Kerja Sama ini, maka pihak
            yang berkeinginan memperpanjang atau memperpendek masa berlakunya harus mengajukan secara tertulis kepada pihak lain
            paling lambat 7 (tujuh) hari kalender sebelum berakhirnya Perjanjian Kerja Sama ini.', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(3) Dengan berakhirnya jangka waktu pelaksanaan sebagaimana dimaksud pada ayat (1) dan tidak dilakukan perubahan atas
            jangka waktu tersebut maka Perjanjian Kerja Sama kerjasama ini berakhir dengan sendirinya dan PARA PIHAK tidak terikat
            atas hak dan kewajiban yang tertuang dalam Perjanjian Kerja Sama kerjasama ini.', array('size' => 11), array("align" => "thaiDistribute"));


            $section->addTextBreak();
            $section->addText('Pasal 9', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('KORESPONDENSI', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('Setiap pemberitahuan dan/atau surat-menyurat akan dialamatkan sebagai berikut:', array('size' => 11), array("align" => "left"));
            $section->addText('PIHAK KESATU :', array('bold'=>true, 'size' => 11), array("align" => "left"));
            $section->addText('SEKOLAH VOKASI UNIVERSITAS SEBELAS MARET', array('size' => 11), array("align" => "left"));
            $section->addText('U.p : ' . $user->name, array('size' => 11), array("align" => "left"));
            $section->addText('Alamat : Jl. KolSutarro No.150k Jebres Surakarta 57126', array('size' => 11), array("align" => "left"));
            $section->addText('Telepon :'. $user->nomorhp, array( 'size' => 11), array("align" => "left"));
            $section->addText('Email :'. $user->email, array('size' => 11), array("align" => "left"));
            $section->addText('PIHAK KEDUA:', array('bold' => true, 'size' => 11), array("align" => "left"));
            $section->addText($mitra->namamitra, array('size' => 11), array("align" => "left"));
            $section->addText('U.p : ' . $mitra->jabatanpenandatangan, array('size' => 11),array("align" => "left"));
            $section->addText('Alamat : ' . $mitra->alamat, array('size' => 11), array("align" =>"left"));
            $section->addText('Telepon : ' . $mitra->no_hp, array('size' => 11), array("align" =>"left"));
            $section->addText('Email : ' . $mitra->email, array('size' => 11), array("align" => "left"));


            $section->addTextBreak();
            $section->addText('Pasal 10', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('PENYELESAIAN PERSELISIHAN', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('(1) Apabila dalam pelaksanaan kerjasama terjadi perbedaan, maka yang dipakai sebagai acuan adalah ketentuan-ketentuan
            yang tercantum dalam Perjanjian Kerja Sama ini;', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(2) Apabila timbul perselisihan akibat Perjanjian Kerja Sama ini, maka PARA PIHAK akan menyelesaikan perselisihan
            tersebut secara musyawarah untuk mencapai mufakat.', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(3) Apabila penyelesaian perselisihan secara musyawarah untuk mufakat tidak berhasil, maka PARA PIHAK sepakat untuk
            menyelesaikan melalui Pengadilan Negeri Surakarta.', array('size' => 11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $section->addText('Pasal 11', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('PENUTUP', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('Perjanjian Kerja Sama ini dibuat di ......................, pada hari dan tanggal sebagaimana dimaksud di atas, dalam
            rangkap 2 (dua) bermeterai cukup, masing-masing mempunyai kekuatan hukum yang sama, dan diserahkan kepada masing-masing
            pihak untuk digunakan sebagai dasar dan pedoman dalam pelaksanaan kerjasama.', array('size' => 11), array("align" => "thaiDistribute"));



            $section->addTextBreak();
            $table = $section->addTable();

            $table->addRow();
            $table->addCell(5000)->addText('PIHAK KESATU', array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addCell(5000)->addText('PIHAK KEDUA', array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addRow();
            $table->addCell(5000)->addTextBreak();
            $table->addCell(5000)->addTextBreak();
            $table->addRow();
            $table->addCell(5000)->addTextBreak();
            $table->addCell(5000)->addTextBreak();
            $table->addRow();
            $table->addCell(5000)->addText('Mengetahui', array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addCell(5000)->addText('', array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addRow();
            $table->addCell(5000)->addText('Wakil Rektor Perencanaan, Kerjasama, Bisnis, dan Informasi ', array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addCell(5000)->addText($mitra->jabatanpenandatangan, array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addRow();
            $table->addCell(5000)->addText('Universitas Sebelas Maret', array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addCell(5000)->addText($mitra->namamitra, array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addRow();
            $table->addCell(5000)->addTextBreak();
            $table->addCell(5000)->addTextBreak();
            $table->addRow();
            $table->addCell(5000)->addTextBreak();
            $table->addCell(5000)->addTextBreak();
            $table->addRow();
            $table->addCell(5000)->addText('Prof. Dr. rer.nat. Sajidan, M.Si.', array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addCell(5000)->addText($mitra->namapenandatangan, array('bold' => true, 'size' => 11), array("align" => "center"));

            $text = $section->addText($request->get('number'),array('name'=>'Arial','size' => 20,'bold' => true));
            // $section->addImage("./images/Krunal.jpg");
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save('PKS2022.docx');


            return response()->download(public_path('PKS2022.docx'));
            Alert::success('Sukses', 'Data berhasil diinput!');
            }


        if($pengajuan->kategori_id == 2){
            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $section = $phpWord->addSection();


            $section->addText('DRAFT', array('bold' => true, 'size' => 18), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('NOTA KESEPAHAMAN', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('antara', array('size' => 11), array("align" => "center"));
            $section->addText('UNIVERSITAS SEBELAS MARET', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('dan', array('size' => 11), array("align" => "center"));
            $section->addText($mitra->namamitra, array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('Nomor:....../UN27/KS/2021', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('Nomor:..................../2021', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('tentang', array('size' => 11), array("align" => "center"));
            $section->addText('PENYELENGGARAAN TRI DHARMA PERGURUAN TINGGI DAN PENYELENGGARAAN MERDEKA BELAJAR – KAMPUS MERDEKA', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('Pada hari ini, ' . $startDateHari . ' tanggal ' . $startDateDay . ' bulan ' . $startDateMonth . ' tahun ' . $startDateYear. ' kami yang bertanda tangan dibawah ini:', array('size' =>11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $table = $section->addTable();
            $table->addRow();
            $table->addCell(5000)->addText('I. Prof. Dr. JAMAL WIWOHO, S.H., M.Hum.', array('bold' => true, 'size' => 11));
            $table->addCell(5000)->addText(': Rektor Universitas Sebelas Maret, yang diangkat berdasarkan Surat Keputusan Menteri Riset, Teknologi, dan Pendidikan Tinggi Nomor 12449/M/KP/2019 tanggal 11 April 2019 tentang Pengangkatan Rektor Universitas Sebelas Maret periode Tahun 2019 – 2023, dalam hal ini secara sah bertindak untuk dan atas nama Universitas Sebelas Maret, berkedudukan di Jalan Ir. Sutami No. 36A, Kentingan, Jebres, Kota Surakarta, Jawa Tengah 57126, yang selanjutnya disebut PIHAK KESATU;', array('size' => 11), array("align" => "thaiDistribute"));
            $table->addRow();
            $table->addCell(5000)->addText('II. ...........................', array('bold' => true, 'size' => 11));
            $table->addCell(5000)->addText(': .........................., yang diangkat berdasarkan ........................ tanggal ................... tentang ..............., dalam hal ini secraa sah bertindak untuk dan atas nama ........................................., berkedudukan di .............................., yang  selanjutnya disebut PIHAK KEDUA.', array('size' => 11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $section->addText('PIHAK KESATU dan PIHAK KEDUA secara bersama-sama disebut PARA PIHAK, dan masing-masing disebut PIHAK, terlebih dahulu menerangkan hal-hal sebagai berikut :', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('1. Bahwa PIHAK KESATU adalah Perguruan Tinggi Negeri Badan Hukum (PTNBH) dibawah Kementerian Pendidikan dan Kebudayaan yang bergerak dalam penyelenggaraan Tri Dharma Perguruan Tinggi yaitu, pendidikan, penelitian, dan pengabdian kepada masyarakat, serta mempunyai visi “Menjadi pusat pengembangan ilmu, teknologi, dan seni yang unggul di tingkat internasional dengan berlandaskan pada nilai-nilai luhur budaya nasional”.', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('2. PIHAK KEDUA adalah ......................................', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addTextBreak();
            $section->addText('Berdasarkan   pada   hal-hal  tersebut   di  atas,  PARA  PIHAK   sesuai    dengan kedudukan  dan  kewenangan  masing-masing,  sepakat untuk   menandatangani Nota  Kesepahaman  tentang   ........................................, dengan ketentuan sebagai berikut:', array('size' => 11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $section->addText('Pasal 1', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('KETENTUAN UMUM', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('Dalam Nota Kesepahaman ini yang dimaksud dengan :', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('1. Lembaga adalah lembaga-lembaga yang ada di lingkup tugas Universitas Sebelas Maret.', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('2. Merdeka Belajar Kampus Merdeka adalah ................', array('size' => 11), array("align" => "left"));
            $section->addText('3. Tri Dharma Perguruan Tinggi adalah tugas perguruan tinggi dalam rangka mengembangkan dan memberdayakan masyarakat melalui proses pendidikan, penelitian dan pengabdian masyarakat.', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('4. …………………………………… .', array('size' => 11), array("align" => "left"));
            $section->addText('5. ……………………………………, dst', array('size' => 11), array("align" => "left"));

            $section->addTextBreak();
            $section->addText('Pasal 2', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('MAKSUD DAN TUJUAN', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('Dalam Nota Kesepahaman ini yang dimaksud dengan :', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(1) Maksud Nota Kesepahaman ini adalah untuk mengaplikasikan dan meningkatkan pelaksanaan Tri Dharma Perguruan Tinggi dan Penyelenggaraan Merdeka Belajar – Kampus Merdeka.', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(2) Tujuan Nota Kesepahaman ini adalah mensinergikan dan mengoptimalkan potensi dan sumber daya PARA PIHAK dalam rangka pengembangan pendidikan, kelembagaan, dan pengembangan sumber daya manusia', array('size' => 11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $section->addText('Pasal 3', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('RUANG LINGKUP', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('Ruang Lingkup Nota Kesepahaman ini meliputi :', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('1. Pelaksanaan Pendidikan, Penelitian, dan Pengabdian kepada Masyarakat;', array('size' => 11), array("align" => "left"));
            $section->addText('2. Penyelenggaraan Merdeka Belajar – Kampus Merdeka;', array('size' => 11), array("align" => "left"));
            $section->addText('3. Kegiatan lain yang disepakati PARA PIHAK.', array('size' => 11), array("align" => "left"));

            $section->addTextBreak();
            $section->addText('Pasal 4', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('PELAKSANAAN', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('(1) Nota Kesepahaman ini akan ditindaklanjuti dengan Perjanjian Kerjasama antara PARA PIHAK', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(2) Perjanjian Kerjasama sebagaimana dimaksud pada ayat (1) akan dilaksanakan oleh Fakultas/Lembaga/unit kerja yang ada pada PIHAK KESATU dan pada ..................... PIHAK KEDUA yang mempunyai tugas pokok dan fungsi yang berkaitan dengan pelaksanaan Nota Kesepahaman ini.', array('size' => 11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $section->addText('Pasal 5', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('PEMBIAYAAN', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('Biaya yang timbul sebagai akibat pelaksanaan Nota Kesepahaman ini dibebankan kepada PARA PIHAK yang dibuat dengan perencanaan bersama sesuai dengan ketentuan peraturan perundang-undangan yang berlaku.', array('size' => 11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $section->addText('Pasal 6', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('JANGKA WAKTU', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('(1)	Nota Kesepahaman ini berlaku untuk jangka waktu ........... (............) tahun sejak tanggal ditandatangani, dan dapat diperpanjang, diakhiri dan dievaluasi atas dasar kesepakatan PARA PIHAK.', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(2)	Dalam hal salah satu pihak berkeinginan untuk mengakhiri Nota Kesepahaman ini sebelum jangka waktu sebagaimana dimaksud pada ayat (1), maka pihak tersebut wajib memberitahukan maksud tersebut secara tertulis kepada pihak lainnya, selambat-lambatnya 3 (tiga) bulan sebelumnya.', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(3)	Dalam hal Nota Kesepahaman ini tidak diperpanjang lagi sebagaimana dimaksud pada ayat (2), tidak akan mempengaruhi hak dan kewajiban masing-masing pihak yang harus diselesaikan terlebih dahulu sebagai akibat pelaksanaan sebelum berakhirnya Nota Kesepahaman ini.', array('size' => 11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $section->addText('Pasal 7', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('KORESPONDENSI', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('(1)	Seluruh pemberitahuan dan komunikasi selama Nota Kesepahaman ini berlangsung, dilakukan secara tertulis, dapat dilakukan melalui faksimile, email, pos tercatat atau melalui perusahaan ekspedisi/kurir   intern.', array('size' => 11), array("align" => "thaiDistribute"));
            $section->addText('(2)	Seluruh  pemberitahuan  dan  komunikasi  dikirim  kepada:', array('size' => 11), array("align" => "left"));
            $section->addText('PIHAK KESATU', array('bold' => true, 'size' => 11), array("align" => "left"));
            $section->addText('U.p      : Wakil Rektor Perencanaan, Kerjasama, Bisnis dan Informasi', array('bold' => false, 'size' => 11), array("align" => "left"));
            $section->addText('Alamat   : Jalan Ir. Sutami 36 A Kentingan Jebres Surakarta 57126', array('bold' => false, 'size' => 11), array("align" => "left"));
            $section->addText('Telepon  : 0271-646994, 646624, 646761', array('bold' => false, 'size' => 11), array("align" => "left"));
            $section->addText('Fax      : 0271-646655', array('bold' => false, 'size' => 11), array("align" => "left"));
            $section->addText('Email    : warek4@uns.ac.id', array('bold' => false, 'size' => 11), array("align" => "left"));


            $section->addText('PIHAK KEDUA', array('bold' => true, 'size' => 11), array("align" => "left"));
            $section->addText('U.p      : ' . $mitra->namamitra, array('bold' => false, 'size' => 11), array("align" => "left"));
            $section->addText('Alamat   : ' . $mitra->alamat, array('bold' => false, 'size' => 11), array("align" => "left"));
            $section->addText('Telepon  : ' . $mitra->email, array('bold' => false, 'size' => 11), array("align" => "left"));
            $section->addText('Email    : ' . $mitra->no_hp, array('bold' => false, 'size' => 11), array("align" => "left"));

            $section->addTextBreak();
            $section->addText('Pasal 8', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('LAIN - LAIN', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('Hal-hal yang belum diatur serta perubahan dalam Nota Kesepahaman ini akan diatur dan ditetapkan kemudian dalam addendum yang disepakati oleh PARA PIHAK serta merupakan bagian yang tidak terpisahkan dari Nota Kesepahaman ini.', array('size' => 11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $section->addText('Pasal 9', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addText('PENUTUP', array('bold' => true, 'size' => 11), array("align" => "center"));
            $section->addTextBreak();
            $section->addText('Nota Kesepahaman ini dibuat dalam rangkap 2 (dua) bermeterai cukup, ditandatangani oleh kedua belah pihak, mempunyai kekuatan hukum yang sama, dan mulai berlaku sejak tanggal ditandatangani.', array('size' => 11), array("align" => "thaiDistribute"));

            $section->addTextBreak();
            $table = $section->addTable();

            $table->addRow();
            $table->addCell(5000)->addText('PIHAK KESATU', array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addCell(5000)->addText('PIHAK KEDUA', array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addRow();
            $table->addCell(5000)->addTextBreak();
            $table->addCell(5000)->addTextBreak();
            $table->addRow();
            $table->addCell(5000)->addTextBreak();
            $table->addCell(5000)->addTextBreak();
            $table->addRow();
            $table->addCell(5000)->addText('Prof. Dr. JAMAL WIWOHO, S.H., M.Hum.', array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addCell(5000)->addText($mitra->jabatanpenandatangan, array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addRow();
            $table->addCell(5000)->addText('REKTOR', array('size' => 11), array("align" => "center"));
            $table->addCell(5000)->addText($mitra->namapenandatangan, array('bold' => true, 'size' => 11), array("align" => "center"));
            $table->addRow();
            $table->addCell(5000)->addText('UNIVERSITAS SEBELAS MARET', array('size' => 11), array("align" => "center"));
            $table->addCell(5000)->addText('', array('bold' => true, 'size' => 11), array("align" => "center"));


            $text = $section->addText($request->get('number'),array('name'=>'Arial','size' => 20,'bold' => true));
            // $section->addImage("./images/Krunal.jpg");
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save('MOU2022.docx');



            return response()->download(public_path('MOU2022.docx'));
            Alert::success('Sukses', 'Data berhasil diinput!');
        }
        }
    }

    public function editpengajuan($id)
    {
        $pengajuan = Pengajuan::find($id);
        //dd($draf);
        return view('dosen\pengajuan\editpengajuan', compact('pengajuan'));
    }

    public function updatepengajuan(Request $request, $id)
    {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->update($request->all());
        if ($request->hasFile('dokumen')) {
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

	public function export_excel(Request $request)
	{
		return Excel::download(new PengajuanExport, 'pengajuan.xlsx');
    }
}
