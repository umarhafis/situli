<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\DikerjakanController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\SliderController;
use App\Models\Dokumentasi;
use App\Models\Portofolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


// middleware auth //
Route::middleware(['auth'])->group(function () {

    // Super Admin //
    Route::get('/admin/management', [HomeController::class, 'adminManagement'])->name('admin.management');
    Route::post('/admin/make-super-admin/{userId}', [HomeController::class, 'makeSuperAdmin'])->name('admin.makeSuperAdmin');
    Route::post('/admin/revoke-super-admin/{userId}', [HomeController::class, 'revokeSuperAdmin'])->name('admin.revokeSuperAdmin');
    Route::put('/admin/edit-password/{userId}', [HomeController::class, 'editPassword'])->name('editPassword');
    Route::delete('/admin/{id}', [HomeController::class, 'deleteUser'])->name('deleteUser')->middleware('auth');

    // Admin //
    Route::get('/admin', [HomeController::class, 'index'])->name('admin.index');
    Route::get('/profil', [HomeController::class, 'profile'])->name('profile');
    Route::post('admin/update/profil', [AuthController::class, 'updateProfile'])->name('update.profile');
    Route::get('/admin/password', [HomeController::class, 'password'])->name('password');

    // Portofolio //
    Route::get('/admin/portofolio', [PortofolioController::class, 'index'])->name('portofolios.index');
    Route::get('admin/portofolio/create', [PortofolioController::class, 'create'])->name('portofolios.create');
    Route::post('/admin/portofolio', [PortofolioController::class, 'store'])->name('portofolios.store');
    Route::get('/admin/portofolio/{portofolio}/edit', [PortofolioController::class, 'edit'])->name('portofolios.edit');
    Route::put('/admin/portofolio/{portofolio}', [PortofolioController::class, 'update'])->name('portofolios.update');
    Route::delete('/admin/portofolio/{portofolio}', [PortofolioController::class, 'destroy'])->name('portofolios.destroy');

    // Sedang dikerjakan //
    Route::get('/admin/dikerjakan', [DikerjakanController::class, 'index'])->name('dikerjakan.index');
    Route::get('/admin/dikerjakan/create', [DikerjakanController::class, 'create'])->name('dikerjakan.create');
    Route::post('admin/dikerjakan', [DikerjakanController::class, 'store'])->name('dikerjakan.store');
    Route::get('/admin/dikerjakan/{dikerjakan}/edit', [DikerjakanController::class, 'edit'])->name('dikerjakan.edit');
    Route::put('/admin/dikerjakan/{dikerjakan}', [DikerjakanController::class, 'update'])->name('dikerjakan.update');
    Route::delete('/admin/dikerjakan/{dikerjakan}', [DikerjakanController::class, 'destroy'])->name('dikerjakan.destroy');

    // Kontak //
    Route::get('/admin/kontak', [KontakController::class, 'index'])->name('kontaks.index');
    Route::get('/admin/kontak/{id}/edit', [KontakController::class, 'edit'])->name('kontaks.edit');
    Route::put('/admin/kontak/{id}', [KontakController::class, 'update'])->name('kontaks.update');

    // Dokumentasi //
    Route::get('/admin/dokumentasi', [DokumentasiController::class, 'index'])->name('dokumentasi.index');
    Route::get('/admin/dokumentasi/create', [DokumentasiController::class, 'create'])->name('dokumentasi.create');
    Route::post('/admin/dokumentasi', [DokumentasiController::class, 'store'])->name('dokumentasi.store');
    Route::get('/admin/dokumentasi/{id}', [DokumentasiController::class, 'show'])->name('dokumentasi.show');
    Route::get('/admin/dokumentasi/{id}/edit', [DokumentasiController::class, 'edit'])->name('dokumentasi.edit');
    Route::put('/admin/dokumentasi/{id}', [DokumentasiController::class, 'update'])->name('dokumentasi.update');
    Route::delete('/admin/dokumentasi/{id}', [DokumentasiController::class, 'destroy'])->name('dokumentasi.destroy');

    // Slider //
    Route::get('/admin/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/admin/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/admin/slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/admin/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/admin/slider/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/admin/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');

    Route::put('/password/update', [AuthController::class, 'updatePassword'])->name('password.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Auth //
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('admin/register', [AuthController::class, 'registerStore'])->name('registerPost');
Route::get('/forgotpass', [AuthController::class, 'forgetpass'])->name('forgetpass');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('verify/{token}', [AuthController::class, 'verify'])->name('verify');
Route::post('/', [AuthController::class, 'loginStore'])->name('loginPost');
Route::get('/download', [DownloadController::class, 'download'])->name('download');


// User //
Route::get('/beranda', [SliderController::class, 'show'])->name('homepage');
Route::get('/portofolio', [PortofolioController::class, 'view'])->name('portofoliopage');
Route::get('/dikerjakan', [DikerjakanController::class, 'show'])->name('dikerjakanpage');
Route::get('/dokumentasi', [DokumentasiController::class, 'view'])->name('dokumentasi.view');
Route::get('/layananKami', [UserController::class, 'layanan'])->name('layananpage');
Route::get('/kontak', [KontakController::class, 'contact'])->name('contactpage');



