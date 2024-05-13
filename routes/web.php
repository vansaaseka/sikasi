<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RuanglingkupController;
use App\Http\Controllers\KategorimitraController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PDFController;
use App\Http\Middleware\CheckDeadlineMiddleware;
use App\Models\Laporan;
use FontLib\Table\Type\name;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('landingpage');
});

Route::get('/login', function () {
    return view('auth/login');
});

// Route::get('/layoutAdmin', function () {
//     return view('admin/layoutAdmin');
// });



// Route::get('/home', function () {
//     return view('home');
// });


route::get('/dashboard',[HomeController::class,"index"])->name('dashboard');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');



//Manajemen User
// Admin
route::get('/tampiladmin',[AkunController::class,"tampiladmin"])->name('tampiladmin');
route::get('/tambahadmin',[AkunController::class,"tambahadmin"])->name('tambahadmin');

// Dosen
route::get('/tampildosen',[AkunController::class,"tampildosen"])->name('tampildosen');
route::get('/tambahdosen',[AkunController::class,"tambahdosen"])->name('tambahdosen');
route::post('/import_dosen', [AkunController::class, 'import_excel'])->name('import_dosen');


// Verifikator
route::get('/tampilverifikator',[AkunController::class,"tampilverifikator"])->name('tampilverifikator');
route::get('/tambahverifikator',[AkunController::class,"tambahverifikator"])->name('tambahverifikator');

// Reviewer
route::get('/tampilreviewer',[AkunController::class,"tampilreviewer"])->name('tampilreviewer');
route::get('/tambahreviewer',[AkunController::class,"tambahreviewer"])->name('tambahreviewer');

//ubahstatusakun
route::get('/ubahstatus/{id}',[AkunController::class,"ubahstatus"])->name('ubahstatus');

route::post('/insertakun',[AkunController::class,"insertakun"])->name('insertakun');
route::get('/hapusakun/{id}',[AkunController::class,"hapusakun"])->name('hapusakun');
route::get('/editakun/{id}',[AkunController::class,"editakun"])->name('editakun');
route::post('/updateakun/{id}',[AkunController::class,"updateakun"])->name('updateakun');

//Template
route::get('/draftemplate', [TemplateController::class, "index"])->name('template');
route::post('/inserttemplate',[TemplateController::class,"inserttemplate"])->name('inserttemplate');
route::post('/updatetemplate/{id}',[TemplateController::class,"updatetemplate"])->name('updatetemplate');



//Profile
route::get('/profileDosen',[ProfileController::class,"profileDosen"])->name('profileDosen');
route::get('/profileVerifikator',[ProfileController::class,"profileVerifikator"])->name('profileVerifikator');
route::get('/profileReviewer',[ProfileController::class,"profileReviewer"])->name('profileReviewer');
route::get('/profileAdmin',[ProfileController::class,"profileAdmin"])->name('profileAdmin');
route::post('/insertprofile',[ProfileController::class,"insertprofile"])->name('insertprofile');
route::post('/ubahpassword',[AkunController::class,"ubahpassword"])->name('ubahpassword');

//Unduh Template
route::get('/unduhtemplate',[TemplateController::class,"unduhtemplate"])->name('unduhtemplate');




//Pengajuan
route::get('/select-mitra',[PengajuanController::class,"getMitra"])->name('select.mitra');
route::get('/get-mitra',[PengajuanController::class,"getDetailMitra"])->name('get.mitra');
route::get('/datamitra',[PengajuanController::class,"datamitra"])->name('datamitra');
route::get('/pengajuan',[PengajuanController::class,"index"])->name('pengajuan');
route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
route::post('/laporan/prodi', [LaporanController::class, 'tampilData'])->name('post.tampilkan-data');
route::post('/postlaporan', [LaporanController::class, 'post'])->name('post.laporan');
route::post('/postlaporanword' , [LaporanController::class, 'postword'])->name('post.laporanword');
route::get('/export-pdf/{id}', [LaporanController::class, 'exportPDF'])->name('exportPDF');
route::get('/export-word/{id}', [LaporanController::class, 'exportWORD'])->name('exportWORD');
route::get('/tambahpengajuan',[PengajuanController::class,"tambahpengajuan"])->name('tambahpengajuan');
route::post('/insertpengajuan',[PengajuanController::class,"insertpengajuan"])->name('insertpengajuan');
route::post('/updatepengajuan/{id}',[PengajuanController::class,"updatepengajuan"])->name('updatepengajuan');
route::get('/hapuspengajuan/{id}',[PengajuanController::class,"hapuspengajuan"])->name('hapuspengajuan');

//Admin Pengajuan
route::get('/datapengajuan',[StatusController::class,"dataajuan"])->name('dataajuan');
Route::get('/getChartData', [HomeController::class, 'chartStatusPengajuan']);
Route::get('/getCategoryMitra', [HomeController::class, 'getCategoryMitra']);

route::get('detail/{id}', [StatusController::class,"detail"])->name('detail');
route::get('/cetakpengajuan',[StatusController::class,"cetakpengajuan"])->name('cetakpengajuan');
route::post('/filter',[StatusController::class,"filter"])->name('filter');
route::get('/export_pengajuan', [PengajuanController::class, 'export_excel'])->name('export_pengajuan');


//Status Verifikasi
route::get('/verifikasi',[StatusController::class,"verifikasi"])->name('verifikasi');
route::get('verifprodi/{id}', [StatusController::class,"verifprodi"])->name('verifprodi');
route::get('/filter',[StatusController::class,"filter"])->name('filter');
route::post('/insertnewstatus',[StatusController::class,"insertnewstatus"])->name('insertnewstatus');

//Reviewer
// route::get('/validasi',[StatusController::class,"validasi"])->name('validasi');
route::get('/riwayatvalidasi',[StatusController::class,"riwayatvalidasi"])->name('riwayatvalidasi');
route::post('/insertnewstatus',[StatusController::class,"insertnewstatus"])->name('insertnewstatus');


//Tambah Status Admin
route::get('/status',[StatusController::class,"index"])->name('status');
route::get('/tambahstatus',[StatusController::class,"tambahstatus"])->name('tambahstatus');
route::post('/insertstatus',[StatusController::class,"insertstatus"])->name('insertstatus');
route::get('/editstatus',[StatusController::class,"editstatus"])->name('editstatus');
route::post('/insertupdate',[StatusController::class,"insertupdate"])->name('insertupdate');

//Tambah Prodi Admin
route::get('/prodi',[ProdiController::class,"index"])->name('prodi');
route::post('/insertprodi',[ProdiController::class,"insertprodi"])->name('insertprodi');
route::post('/updateprodi/{id}',[ProdiController::class,"updateprodi"])->name('updateprodi');
route::get('/hapusprodi/{id}',[prodiController::class,"hapusprodi"])->name('hapusprodi');


//Tambah Kategori Mitra Admin
route::get('/kategorimitra',[KategorimitraController::class,"index"])->name('kategorimitra');
route::post('/insertkategorimitra',[KategorimitraController::class,"insertkategorimitra"])->name('insertkategorimitra');
route::post('/updatekategorimitra/{id}',[KategorimitraController::class,"updatekategorimitra"])->name('updatekategorimitra');
route::get('/hapuskategorimitra/{id}',[KategorimitraController::class,"hapuskategorimitra"])->name('hapuskategorimitra');

//Tambah RuangLingkup Mitra Admin
route::get('/ruanglingkup',[RuanglingkupController::class,"index"])->name('ruanglingkup');
route::get('/select-ruanglinkup',[RuanglingkupController::class,"getLinkup"])->name('select.ruanglingkup');
route::post('/insertruanglingkup',[RuanglingkupController::class,"insertruanglingkup"])->name('insertruanglingkup');
route::post('/updateruanglingkup/{id}',[RuanglingkupController::class,"updateruanglingkup"])->name('updateruanglingkup');
route::get('/hapusruanglingkup/{id}',[RuanglingkupController::class,"hapusruanglingkup"])->name('hapusruanglingkup');

//Unggah Dokumen
route::post('/insertdokumen',[DokumenController::class,"insertdokumen"])->name('insertdokumen');
route::post('/updatedokumen/{id}',[DokumenController::class,"updatedokumen"])->name('updatedokumen');
