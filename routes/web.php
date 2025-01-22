<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// our real route

Route::get('/dashboard', function () {
    return view('index');
})->middleware('auth');

// authentication

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

// client
Route::name('client.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/baca/{id}', [HomeController::class, 'read'])->name('read');
    Route::get('/berita', [HomeController::class, 'news'])->name('news');
    Route::get('/visi-misi', [HomeController::class, 'visiMisi'])->name('visiMisi');
    Route::get('/struktur-organisasi', [HomeController::class, 'strukturOrganisasi'])->name('strukturOrganisasi');
    Route::get('/komite-sekolah', [HomeController::class, 'komiteSekolah'])->name('komiteSekolah');
    Route::get('/guru-dan-tenaga-kependidikan', [HomeController::class, 'guruDanTenagaKependidikan'])->name('guruDanTenagaKependidikan');
    Route::get('/peserta-didik', [HomeController::class, 'pesertaDidik'])->name('pesertaDidik');
    Route::get('/tentang-kurikulum', [HomeController::class, 'tentangKurikulum'])->name('tentangKurikulum');
    Route::get('/info-kurikulum', [HomeController::class, 'infoKurikulum'])->name('infoKurikulum');
    Route::get('/kalender-akademik', [HomeController::class, 'kalenderAkademik'])->name('kalenderAkademik');
    Route::get('/jadwal-pelajaran', [HomeController::class, 'jadwalPelajaran'])->name('jadwalPelajaran');
    Route::get('/format-nilai', [HomeController::class, 'formatNilai'])->name('formatNilai');
    Route::get('/jadwal-ujian', [HomeController::class, 'jadwalUjian'])->name('jadwalUjian');
    Route::get('/tentang-kesiswaan', [HomeController::class, 'tentangKesiswaan'])->name('tentangKesiswaan');
    Route::get('/ekstra-kurikuler', [HomeController::class, 'ekstraKurikuler'])->name('ekstraKurikuler');
    Route::get('/program-kerja-osis', [HomeController::class, 'programKerjaOsis'])->name('programKerjaOsis');
    Route::get('/kegiatan-osis', [HomeController::class, 'kegiatanOsis'])->name('kegiatanOsis');
    Route::get('/daftar-nama-siswa', [HomeController::class, 'daftarNamaSiswa'])->name('daftarNamaSiswa');
    Route::get('/p-lima', [HomeController::class, 'pLima'])->name('pLima');
    Route::get('/tata-tertib-siswa', [HomeController::class, 'tataTertibSiswa'])->name('tataTertibSiswa');
    Route::get('/bp-bk', [HomeController::class, 'bpBk'])->name('bpBk');
    Route::get('/tupoksi-sarana-prasarana', [HomeController::class, 'tupoksi'])->name('tupoksi');
    Route::get('/ruang-kasek', [HomeController::class, 'ruangKasek'])->name('ruangKasek');
    Route::get('/ruang-guru', [HomeController::class, 'ruangGuru'])->name('ruangGuru');
    Route::get('/aula', [HomeController::class, 'aula'])->name('aula');
    Route::get('/perpustakaan', [HomeController::class, 'perpustakaan'])->name('perpustakaan');
    Route::get('/tupoksi-humas', [HomeController::class, 'tupoksiHumas'])->name('tupoksiHumas');
    Route::get('/info-humas', [HomeController::class, 'infoHumas'])->name('infoHumas');
    Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri');
    Route::get('/hubungi-kami', [HomeController::class, 'hubungiKami'])->name('hubungiKami');
    Route::get('/prestasi', [HomeController::class, 'prestasi'])->name('prestasi');
});

Route::view('/users/profile', 'users.profile');
Route::view('/users/user-account-settings', 'users.user-account-settings');

Route::view('/pages/knowledge-base', 'pages.knowledge-base');
Route::view('/pages/contact-us', 'pages.contact-us');
Route::view('/pages/faq', 'pages.faq');
Route::view('/pages/coming-soon', 'pages.coming-soon');
Route::view('/pages/error404', 'pages.error404');
Route::view('/pages/error500', 'pages.error500');
Route::view('/pages/error503', 'pages.error503');
Route::view('/pages/maintenence', 'pages.maintenence');

Route::view('/auth/boxed-lockscreen', 'auth.boxed-lockscreen');
Route::view('/auth/boxed-signin', 'auth.boxed-signin');
Route::view('/auth/boxed-signup', 'auth.boxed-signup');
Route::view('/auth/boxed-password-reset', 'auth.boxed-password-reset');
Route::view('/auth/cover-login', 'auth.cover-login');
Route::view('/auth/cover-register', 'auth.cover-register');
Route::view('/auth/cover-lockscreen', 'auth.cover-lockscreen');
Route::view('/auth/cover-password-reset', 'auth.cover-password-reset');


// error
Route::any('{any}', [HomeController::class, 'notfound']);
