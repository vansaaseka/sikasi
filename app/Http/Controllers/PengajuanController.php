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
use App\Models\RuangLingkup;
use Illuminate\Http\Request;
use App\Models\KategoriMitra;
use App\Exports\PengajuanExport;
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

  

    public function insertpengajuan (Request $request)
    {
        $validasi = Validator::make($request->all(),[
            // 'namamitra' => 'required',
            // // 'namadagangmitra' => 'required',
            // 'logo' => 'required|image|mimes:jpg,png,jpeg' ,
            // 'kategorimitra_id' => 'required',
            // 'alamat' => 'required',
            // 'email' => 'required|email',
            // 'namapenandatangan' => 'required',
            // 'jabatanpenandatangan' => 'required',
            // // 'narahubung' => 'required',
            // 'no_hp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            // 'tanggalmulai' => 'required',
            // 'tanggalakhir' => 'required',
            // 'kategori_id' => 'required',
            // 'prodiid' => 'required'

            ]);

        if($validasi->fails()) {
            Alert::warning('Warning', 'Mohon isikan data secara lengkap dan benar!');
            return redirect()->back();
        } else {
        
        #untuk upload file logo mitra
        $path = 'logomitra/';

        $file = $request->file('logo');
        $name_file = time() . '.' . $file->extension();
        $file->move($path, $name_file);


        $mitra = new Mitra;
        $kategorimitra = new KategoriMitra;


        $mitra->namamitra = $request->namamitra;
        $mitra->namadagangmitra = $request->namadagangmitra;
        $mitra->logo = $name_file;
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
        ];


        if($pengajuan->kategori_id == 1){
            #generate template pks
            $path = Template::where('template', 'pks.docx')->first();

            $templateProcessor = new TemplateProcessor(public_path('template/'.$path->template));
            // $templateProcessor = new TemplateProcessor('pks.docx');
            $templateProcessor->setValues($dataTemplate);
            $templateProcessor->setImageValue('logo', public_path('logomitra/'.$name_file));
            $fileName = 'PKS '.$mitra->namamitra.' Tahun '. $startDateYear;
            $templateProcessor->saveAs($fileName . '.docx');
            return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
            
            Alert::success('Sukses', 'Data berhasil diinput!');
            }


        if($pengajuan->kategori_id == 2){
            #generate template mou
            $templateProcessor = new TemplateProcessor('mou.docx');
            $templateProcessor->setValues($dataTemplate);
            $templateProcessor->setImageValue('logo', public_path('logomitra/'.$name_file));
            $fileName = $fileName = 'MOU '.$mitra->namamitra.' Tahun '. $startDateYear;;
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
}
