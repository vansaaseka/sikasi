<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Prodi;
use App\Models\Status;
use App\Models\Dokumen;
use App\Models\Kategori;
use App\Models\Template;
use App\Models\Pengajuan;
use App\Models\Trxstatus;
use Illuminate\Support\Str;
use App\Models\RuangLingkup;
use Illuminate\Http\Request;
use App\Models\KategoriMitra;
use App\Exports\PengajuanExport;
use App\Models\MitraKategori;
use App\Models\ruanglingkup_lainnya;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\TemplateProcessor;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

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
        // foreach ($pengajuan as $datapengajuan){
        //   $trs = Trxstatus::orderBy('id', 'desc')
        //   ->where('pengajuan_id', $datapengajuan->id)
        //   ->first();
        // }
        // dd($maxdata);
        if (Auth()->user()->role == 0){
        return view('dosen\Pengajuan\detailpengajuan' , compact('pengajuan' , 'mitra','dokumen', 'trxstatus', 'status','user',
        'kategori'));
        }
        else{
        abort(403);
        }
    }

    public function tambahpengajuan()
    {
        if (empty(auth()->user()->nomorhp)) {
            abort(404);
        }

        $kategorimitra = KategoriMitra::all();
        $prodi = Prodi::all();
        $ruanglingkup = RuangLingkup::all();
        $kategori = Kategori::all();
        $ruanglingkup_lainnya = ruanglingkup_lainnya::all();
        $mitraKategori  = MitraKategori::all();
        $lainnya_id = null;
        if ($ruanglingkup_lainnya->isNotEmpty()) {
            $lainnya_id = $ruanglingkup_lainnya->last()->id;
        }

        if (Auth()->user()->role == 0) {
            return view('dosen\Pengajuan\tambahpengajuan', compact('mitraKategori','kategorimitra', 'prodi', 'ruanglingkup', 'kategori', 'ruanglingkup_lainnya', 'lainnya_id'));
        } else {
            abort(403);
        }
    }




    public function insertpengajuan (Request $request)
    {
        $rule = [
            'namamitra' => 'required',
            // 'logo' => 'required|image|mimes:jpg,png,jpeg' ,
            'kategorimitra_id' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'namapenandatangan' => 'required',
            'jabatanpenandatangan' => 'required',
            'narahubung' => 'required',
            'no_hp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'tentang' => 'required',
            'tanggalmulai' => 'required',
            'tanggalakhir' => 'required',
            'kategori_id' => 'required',
            'seremoni' => 'required',
            // 'prodiid' => 'required',

        ];

        // if ($request->id) {
        //     unset($rule['logo']);
        // }
        $validasi = Validator::make($request->all(),$rule);

        if($validasi->fails()) {
            return $validasi->errors();
            Alert::warning('Warning', 'Mohon isikan data secara lengkap dan benar!');
            return redirect()->back();
        } else {


        #untuk upload file logo mitra
        // $path = 'logomitra/';

        // if (!$request->id) {
        // $file = $request->file('logo');
        // $name_file = time() . '.' . $file->extension();
        // $file->move($path, $name_file);
        // }else{
        //     $mit = Mitra::find($request->id);
        //     $name_file =  $mit->logo;
        // }

        $mitra = new Mitra;
        $kategorimitra = new KategoriMitra;

        if ($request->id) {
            $mitra->id = $request->id;
        }


        $mitra->namamitra = Str::upper($request->namamitra);
        $mitra->namadagangmitra = $request->namadagangmitra;
        $mitra->kategorimitra_id = $request->kategorimitra_id;
        $mitra->alamat = $request->alamat;
        $mitra->email = $request->email;
        $mitra->website = $request->website;
        $mitra->sosmed = $request->sosmed;
        $mitra->namapenandatangan = $request->namapenandatangan;
        $mitra->jabatanpenandatangan = $request->jabatanpenandatangan;
        $mitra->narahubung = $request->narahubung;
        $mitra->no_hp = $request->no_hp;

        if (!$request->id) {
            $mitra->save();
        }




        $user = Auth::user();
        $kategori = new Kategori;
        $ruanglingkup = new RuangLingkup;
        $prodi = new Prodi;
        $mitraKategori = new MitraKategori;

        $pengajuan = new Pengajuan;
        $pengajuan->lainnya_id = $ruanglingkup->id;
        $pengajuan->user_id = Auth::user()->id;
        $lainnya_id = null;


                $ruanglingkup = $request->ruanglingkup_id;
                if ($ruanglingkup) {
                    $i = 0;
                    foreach ($ruanglingkup as $item) {
                        if ($item == '4') {
                            $lainnya = new ruanglingkup_lainnya;
                            $lainnya->ruanglingkup_id = $item;
                            $lainnya->nama = $request->lainnya;
                            $lainnya->lainnya = true;
                            $lainnya->save();
                            $lainnya_id = $lainnya->id;
                        }
                        $dataa1[$i] = ([
                            'id' => (int)$item,
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

        $pengajuan->lainnya_id = $lainnya_id;
        $pengajuan->kategori_id = $request->kategori_id;
        $pengajuan->mitra_id = $mitra->id;
        $pengajuan->mitraKategori_id = $request->mitraKategori_id;
        $pengajuan->ruanglingkup_id = json_encode($dataa1);
        $pengajuan->proditerlibat_id = json_encode($dataa2);
        $pengajuan->tentang = $request->tentang;
        $pengajuan->tanggalmulai = $request->tanggalmulai;
        $pengajuan->tanggalakhir = $request->tanggalakhir;
        $pengajuan->tentang = $request->tentang;
        $pengajuan->prodiid = $request->prodiid;
        $pengajuan->seremoni = $request->seremoni;
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

        $dataTemplate = [
            'nama_dosen' => Auth::user()->name,
            'telepon_dosen' => Auth::user()->nomorhp,
            'email_dosen' => Auth::user()->email,
            'mitra' => $mitra->namamitra,
            'alamat_mitra' => $mitra->alamat,
            'email_mitra' => $mitra->email,
            'telepon_mitra' => $mitra->no_hp,
            'hari' => $startDateHari,
            'tanggal' => $startDateDay,
            'bulan' => $startDateMonth,
            'tahun' => $startDateYear,
            'nama_lengkap_penandatangan' => $mitra->namapenandatangan,
            'jabatan_penandatangan_mitra' => $mitra->jabatanpenandatangan,
            'tentang' => $pengajuan->tentang,
        ];


        if($pengajuan->kategori_id == 1){
            #generate template pks
            $path = Template::where('template', 'pks.docx')->first();

            $templateProcessor = new TemplateProcessor(public_path('template/'.$path->template));
            // $templateProcessor = new TemplateProcessor('pks.docx');
            $templateProcessor->setValues($dataTemplate);
            // $templateProcessor->setImageValue('logo', public_path('logomitra/'.$name_file));
            $fileName = 'PKS '.$mitra->namamitra.' Tahun '. $startDateYear;
            $templateProcessor->saveAs($fileName . '.docx');
            return response()->download($fileName . '.docx')->deleteFileAfterSend(true);

            Alert::success('Sukses', 'Data berhasil diinput!');
            }


        if($pengajuan->kategori_id == 2){
            #generate template mou
            $path2 = Template::where('template', 'mou.docx')->first();

            $templateProcessor = new TemplateProcessor(public_path('template/'.$path2->template));
            $templateProcessor = new TemplateProcessor('mou.docx');
            $templateProcessor->setValues($dataTemplate);
            // $templateProcessor->setImageValue('logo', public_path('logomitra/'.$name_file));
            $fileName = $fileName = 'MOU '.$mitra->namamitra.' Tahun '. $startDateYear;;
            $templateProcessor->saveAs($fileName . '.docx');
            return response()->download($fileName . '.docx')->deleteFileAfterSend(true);

            Alert::success('Sukses', 'Data berhasil diinput!');
        }

        if($pengajuan->kategori_id == 3){
            #generate template mou
            $path2 = Template::where('template', 'pks.docx')->first();

            $templateProcessor = new TemplateProcessor(public_path('template/'.$path2->template));
            $templateProcessor = new TemplateProcessor('pks.docx');
            $templateProcessor->setValues($dataTemplate);
            // $templateProcessor->setImageValue('logo', public_path('logomitra/'.$name_file));
            $fileName = $fileName = 'PKS_Turunan_dari_PKS_Induk'.$mitra->namamitra.' Tahun '. $startDateYear;;
            $templateProcessor->saveAs($fileName . '.docx');
            return response()->download($fileName . '.docx')->deleteFileAfterSend(true);

            Alert::success('Sukses', 'Data berhasil diinput!');
        }

        if($pengajuan->kategori_id == 4){
            #generate template mou
            $path2 = Template::where('template', 'mou.docx')->first();

            $templateProcessor = new TemplateProcessor(public_path('template/'.$path2->template));
            $templateProcessor = new TemplateProcessor('mou.docx');
            $templateProcessor->setValues($dataTemplate);
            // $templateProcessor->setImageValue('logo', public_path('logomitra/'.$name_file));
            $fileName = $fileName = 'Addendum_PKS'.$mitra->namamitra.' Tahun '. $startDateYear;;
            $templateProcessor->saveAs($fileName . '.docx');
            return response()->download($fileName . '.docx')->deleteFileAfterSend(true);

            Alert::success('Sukses', 'Data berhasil diinput!');
        }

        if($pengajuan->kategori_id == 5){
            #generate template mou
            $path2 = Template::where('template', 'pks.docx')->first();

            $templateProcessor = new TemplateProcessor(public_path('template/'.$path2->template));
            $templateProcessor = new TemplateProcessor('pks.docx');
            $templateProcessor->setValues($dataTemplate);
            // $templateProcessor->setImageValue('logo', public_path('logomitra/'.$name_file));
            $fileName = $fileName = 'PKS(perpanjangan)'.$mitra->namamitra.' Tahun '. $startDateYear;;
            $templateProcessor->saveAs($fileName . '.docx');
            return response()->download($fileName . '.docx')->deleteFileAfterSend(true);

            Alert::success('Sukses', 'Data berhasil diinput!');
        }

        if($pengajuan->kategori_id == 6){
            #generate template mou
            $path2 = Template::where('template', 'mou.docx')->first();

            $templateProcessor = new TemplateProcessor(public_path('template/'.$path2->template));
            $templateProcessor = new TemplateProcessor('mou.docx');
            $templateProcessor->setValues($dataTemplate);
            // $templateProcessor->setImageValue('logo', public_path('logomitra/'.$name_file));
            $fileName = $fileName = 'MoU(perpanjangan)'.$mitra->namamitra.' Tahun '. $startDateYear;;
            $templateProcessor->saveAs($fileName . '.docx');
            return response()->download($fileName . '.docx')->deleteFileAfterSend(true);

            Alert::success('Sukses', 'Data berhasil diinput!');
        }

        }
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

    public function getMitra(Request $request)
    {
        return Mitra::where('namamitra','like','%'.$request->q.'%')->get();
    }

    public function getDetailMitra(Request $request)
    {
        return Mitra::find($request->id);
    }

    public function datamitra(){
           $mitra = Mitra::all();
           $kategorimitra = KategoriMitra::all();
             if (Auth()->user()->role == 1){
              return view('admin\Mitra\datamitra' , compact('mitra', 'kategorimitra'));
             }
             else{
             abort(403);
             }
    }
}
