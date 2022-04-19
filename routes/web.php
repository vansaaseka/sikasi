<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\DrafController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\PengajuanController;
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

//umm

Route::get('/', function () {
    return view('landingpage');
});


Route::get('/layoutAdmin', function () {
    return view('admin/layoutAdmin');
});

// Route::get('/home', function () {
//     return view('home');
// });


route::get('/redirects',[HomeController::class,"index"]);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Kategori
route::get('/kategori',[KategoriController::class,"index"])->name('kategori');

route::get('/tambahkategori',[KategoriController::class,"tambahkategori"])->name('tambahkategori');

route::post('/insertkategori',[KategoriController::class,"insertkategori"])->name('insertkategori');

route::get('/editkategori/{id}',[KategoriController::class,"editkategori"])->name('editkategori');

route::post('/updatekategori/{id}',[KategoriController::class,"updatekategori"])->name('updatekategori');

route::get('/hapuskategori/{id}',[KategoriController::class,"hapuskategori"])->name('hapuskategori');

//Draf Kerjasama
route::get('/draf',[DrafController::class,"index"])->name('draf');

route::get('/tambahdraf',[DrafController::class,"tambahdraf"])->name('tambahdraf');

// route::post('/insertdraf', 'App\Http\Controllers\DrafController@insertdraf');
route::post('/insertdraf',[DrafController::class,"insertdraf"])->name('insertdraf');

route::get('/editdraf/{id}',[DrafController::class,"editdraf"])->name('editdraf');

route::post('/updatedraf/{id}',[DrafController::class,"updatedraf"])->name('updatedraf');

route::get('/hapusdraf/{id}',[DrafController::class,"hapusdraf"])->name('hapusdraf');

Route::get('data/{id}/download', [DrafController::class,"download"])->name('data.download');


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

//Profile Dosen

route::get('/editprofile',[ProfileController::class,"editprofile"])->name('editprofile');
route::post('/insertprofile',[ProfileController::class,"insertprofile"])->name('insertprofile');


//Unduh Template
route::get('/unduhtemplate',[TemplateController::class,"unduhtemplate"])->name('unduhtemplate');

//Pengajuan
route::get('/pengajuan',[PengajuanController::class,"index"])->name('pengajuan');
route::get('/tambahpengajuan',[PengajuanController::class,"tambahpengajuan"])->name('tambahpengajuan');
route::post('/insertpengajuan',[PengajuanController::class,"insertpengajuan"])->name('insertpengajuan');




