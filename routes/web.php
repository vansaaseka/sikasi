<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\DrafController;
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


// Route::get('/', function () {
//     return view('landingpage');
// });

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/layoutAdmin', function () {
    return view('admin/layoutAdmin');
});



// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/dashboardadmin', function () {
return view('admin.dashboard');
});

Route::get('/dashboarddosen', function () {
return view('dosen.dashboard');
});

Route::get('/dashboardreviewer', function () {
return view('reviewer.dashboard');
});

Route::get('/dashboardverifikator', function () {
return view('verifikator.dashboard');
});

route::get('/redirects',[HomeController::class,"index"]);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//Manajemen User
// Admin
route::get('/tampiladmin',[AkunController::class,"tampiladmin"])->name('tampiladmin');
route::get('/tambahadmin',[AkunController::class,"tambahadmin"])->name('tambahadmin');

// Dosen
route::get('/tampildosen',[AkunController::class,"tampildosen"])->name('tampildosen');
route::get('/tambahdosen',[AkunController::class,"tambahdosen"])->name('tambahdosen');

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
Route::resource('template', TemplateController::class);
route::get('/hapustemplate/{id}',[TemplateController::class,"hapustemplate"])->name('hapustemplate');

//Profile 
route::get('/editprofile',[ProfileController::class,"editprofile"])->name('editprofile');
route::post('/insertprofile',[ProfileController::class,"insertprofile"])->name('insertprofile');


//Unduh Template
route::get('/unduhtemplate',[TemplateController::class,"unduhtemplate"])->name('unduhtemplate');

//Pengajuan
route::get('/pengajuan',[PengajuanController::class,"index"])->name('pengajuan');
route::get('/tambahpengajuan',[PengajuanController::class,"tambahpengajuan"])->name('tambahpengajuan');
route::post('/insertpengajuan',[PengajuanController::class,"insertpengajuan"])->name('insertpengajuan');
route::get('/editpengajuan/{id}',[PengajuanController::class,"editpengajuan"])->name('editpengajuan');
route::post('/updatepengajuan/{id}',[PengajuanController::class,"updatepengajuan"])->name('updatepengajuan');
route::get('/hapuspengajuan/{id}',[PengajuanController::class,"hapuspengajuan"])->name('hapuspengajuan');

//Admin Pengajuan
route::get('/datapengajuan',[StatusController::class,"dataajuan"])->name('dataajuan');
route::get('/cetakpengajuan',[StatusController::class,"cetakpengajuan"])->name('cetakpengajuan');

//Status Verifikasi
route::get('/verifikasi',[StatusController::class,"verifikasi"])->name('verifikasi');
route::get('/newstatus',[StatusController::class,"newstatus"])->name('newstatus');
route::post('/insertnewstatus',[StatusController::class,"insertnewstatus"])->name('insertnewstatus');

//Reviewer
route::get('/validasi',[StatusController::class,"validasi"])->name('validasi');
route::get('/newstatus',[StatusController::class,"newstatus"])->name('newstatus');
route::post('/insertnewstatus',[StatusController::class,"insertnewstatus"])->name('insertnewstatus');


//Tambah Status Admin
route::get('/status',[StatusController::class,"index"])->name('status');
route::get('/tambahstatus',[StatusController::class,"tambahstatus"])->name('tambahstatus');
route::post('/insertstatus',[StatusController::class,"insertstatus"])->name('insertstatus');
route::get('/editstatus',[StatusController::class,"editstatus"])->name('editstatus');
route::post('/insertupdate',[StatusController::class,"insertupdate"])->name('insertupdate');

//Tambah Prodi Admin
route::get('/prodi',[ProdiController::class,"index"])->name('prodi');
route::get('/tambahprodi',[ProdiController::class,"tambahprodi"])->name('tambahprodi');
route::post('/insertprodi',[ProdiController::class,"insertprodi"])->name('insertprodi');
route::get('/editprodi/{id}',[ProdiController::class,"editprodi"])->name('editprodi');
route::post('/updateprodi/{id}',[ProdiController::class,"updateprodi"])->name('updateprodi');
route::get('/hapusprodi/{id}',[prodiController::class,"hapusprodi"])->name('hapusprodi');


//Tambah Kategori Mitra Admin
route::get('/kategorimitra',[KategorimitraController::class,"index"])->name('kategorimitra');
route::get('/tambahkategorimitra',[KategorimitraController::class,"tambahkategorimitra"])->name('tambahkategorimitra');
route::post('/insertkategorimitra',[KategorimitraController::class,"insertkategorimitra"])->name('insertkategorimitra');
route::get('/editkategorimitra/{id}',[KategorimitraController::class,"editkategorimitra"])->name('editkategorimitra');
route::post('/updatekategorimitra/{id}',[KategorimitraController::class,"updatekategorimitra"])->name('updatekategorimitra');
route::get('/hapuskategorimitra/{id}',[KategorimitraController::class,"hapuskategorimitra"])->name('hapuskategorimitra');

//Tambah RuangLingkup Mitra Admin
route::get('/ruanglingkup',[RuanglingkupController::class,"index"])->name('ruanglingkup');
route::get('/tambahruanglingkup',[RuanglingkupController::class,"tambahruanglingkup"])->name('tambahruanglingkup');
route::post('/insertruanglingkup',[RuanglingkupController::class,"insertruanglingkup"])->name('insertruanglingkup');
route::get('/editruanglingkup/{id}',[RuanglingkupController::class,"editruanglingkup"])->name('editruanglingkup');
route::post('/updateruanglingkup/{id}',[RuanglingkupController::class,"updateruanglingkup"])->name('updateruanglingkup');
route::get('/hapusruanglingkup/{id}',[RuanglingkupController::class,"hapusruanglingkup"])->name('hapusruanglingkup');

//Unggah Dokumen
route::post('/insertdokumen',[DokumenController::class,"insertdokumen"])->name('insertdokumen');
route::post('/updatedokumen/{id}',[DokumenController::class,"updatedokumen"])->name('updatedokumen');

//Detail Pengajuan Admin

route::get('/email',[EmailController::class,"kirim"]);
route::get('/pesan',[EmailController::class,"notif"]);
