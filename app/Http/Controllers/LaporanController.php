<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Kategori;
use App\Models\Laporan;
use App\Models\Mitra;
use App\Models\Pengajuan;
use App\Models\Prodi;
use App\Models\User;
use App\Models\Status;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $mitra = Mitra::all();
        $user = User::all();
        $kategori = Kategori::all();
        $dokumen = Dokumen::all();
        $status = Status::all();
        $pengajuan = Pengajuan::all();
        $prodi = Prodi::all();

        if (Auth()->user()->role == 0){
        return view('dosen.laporan.detaillaporan' , compact('mitra','dokumen', 'status','user','pengajuan', 'kategori'));
        }
        else{
        abort(403);
        }
    }



    public function post(Request $request)
    {

        $request->validate([
            'hasilPelaksanaan' => 'required|string',
            'linkDokumen' => 'required|string',
        ]);

        $data = [
            'hasilPelaksanaan' => $request->input('hasilPelaksanaan'),
            'linkDokumen' => $request->input('linkDokumen'),
        ];


        session(['laporanData' => $data]);
        $laporan = new Laporan();
        $laporan->user_id = $request->input('user_id');
        $laporan->pengajuan_id = $request->input('pengajuan_id');
        $laporan->judulKerjasama = $request->input('judulKerjasama');
        $laporan->refrensiKerjasama = $request->input('refrensiKerjasama');
        $laporan->mitraKerjasama = $request->input('mitraKerjasama');
        $laporan->ruangLingkup = $request->input('ruangLingkup');
        $laporan->hasilPelaksanaan = $data['hasilPelaksanaan'];
        $laporan->linkDokumen = $data['linkDokumen'];
        $laporan->save();


        return redirect()->route('exportPDF', ['id' => $laporan->pengajuan_id]);
    }

    public function postword(Request $request)
    {

        $request->validate([
            'hasilPelaksanaan' => 'required|string',
            'linkDokumen' => 'required|string',
        ]);

        $data = [
            'hasilPelaksanaan' => $request->input('hasilPelaksanaan'),
            'linkDokumen' => $request->input('linkDokumen'),
        ];


        session(['laporanData' => $data]);
        $laporan = new Laporan();
        $laporan->user_id = $request->input('user_id');
        $laporan->pengajuan_id = $request->input('pengajuan_id');
        $laporan->judulKerjasama = $request->input('judulKerjasama');
        $laporan->mitraKerjasama = $request->input('mitraKerjasama');
        $laporan->ruangLingkup = $request->input('ruangLingkup');
        $laporan->hasilPelaksanaan = $data['hasilPelaksanaan'];
        $laporan->linkDokumen = $data['linkDokumen'];
        $laporan->save();


        return redirect()->route('exportWORD', ['id' => $laporan->pengajuan_id]);
    }



    public function exportPDF($id)
    {
        $data = session('laporanData');

        $user_id = Auth()->user()->id;
        $pengajuan = Pengajuan::with(['ruanglingkup', 'lainnya'])->where('user_id', $user_id)->findOrFail($id);

        if (!$pengajuan) {
            abort(404);
        }

        $ruanglingkup_ids = json_decode($pengajuan->ruanglingkup_id);

        $ruanglingkupMapping = [
            1 => 'Penyelenggara Pengajaran',
            2 => 'Penyelenggara Penelitian',
            3 => 'Penyelenggara Pengabdian kepada Masyarakat',
            4 => 'Lainnya',
        ];

        $ruanglingkups = [];

        foreach ($ruanglingkup_ids as $ruanglingkup_id) {
            if ($ruanglingkup_id->id == 4 && $pengajuan->lainnya) {
                $ruanglingkups[] =  $pengajuan->lainnya->nama;

            } elseif (isset($ruanglingkupMapping[$ruanglingkup_id->id])) {

                $ruanglingkups[] = $ruanglingkupMapping[$ruanglingkup_id->id];
            }
        }
        $ruanglingkup = implode(', ', $ruanglingkups);

        $data['dataPengaju'] = $pengajuan;
        $data['ruanglingkup'] = $ruanglingkup;
        $data['ruanglingkups'] = $ruanglingkups;
        $data['gambarMitra']= public_path('logomitra/' . $pengajuan->mitra->logo);

        $pdf = FacadePdf::loadView('dosen.laporan.exportPDF', $data);
        $pdf->setPaper('landscape', 'a4');

        return $pdf->download('LaporanPelaksanaanKerjasama.pdf');
    }

//     public function exportWORD($id)
// {
//     // Mengambil data dari session
//     $data = session('laporanData');

//     // Validasi bahwa session berisi data yang dibutuhkan
//     if (!$data || !isset($data['hasilPelaksanaan']) || !isset($data['linkDokumen'])) {
//         abort(404); // Misalnya, tampilkan halaman 404 jika data tidak lengkap
//     }

//     // Mengambil pengajuan berdasarkan ID
//     $pengajuan = Pengajuan::with(['mitra', 'ruanglingkup', 'lainnya'])->findOrFail($id);

//     // Validasi bahwa pengajuan ditemukan
//     if (!$pengajuan) {
//         abort(404); // Misalnya, tampilkan halaman 404 jika pengajuan tidak ditemukan
//     }

//     // Mengatur nilai-nilai dari session ke variabel yang sesuai
//     $hasilPelaksanaan = $data['hasilPelaksanaan'];
//     $linkDokumen = $data['linkDokumen'];

//     // Path template dan output
//     $templatePath = public_path('TemplateWORDLAPORAN.docx');
//     $outputPath = public_path('laporanWORD_' . $id . '.docx');

//     // Membuat TemplateProcessor
//     $templateProcessor = new TemplateProcessor($templatePath);

//     // Mengganti placeholder dengan nilai sesuai data
//     $templateProcessor->setValue('judulKerjasama', $pengajuan->tentang);
//     $templateProcessor->setValue('mitraKerjasama', $pengajuan->mitra->namamitra);
//     $templateProcessor->setValue('hasilPelaksanaan', $hasilPelaksanaan);
//     $templateProcessor->setValue('linkDokumen', $linkDokumen);

//     // Simpan sebagai file Word baru
//     $templateProcessor->saveAs($outputPath);

//     // Mengirim file Word sebagai respons download
//     return response()->download($outputPath)->deleteFileAfterSend(true);
// }






}

