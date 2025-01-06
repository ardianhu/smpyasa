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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

// dashboard

Route::get('/dashboard/user', [UserController::class, 'index'])->middleware('auth');
Route::post('/dashboard/user', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/dashboard/post', [PostController::class, 'index'])->middleware('auth');
Route::get('/dashboard/post/tambah', [PostController::class, 'create'])->middleware('auth');
Route::post('/dashboard/post', [PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::get('/dashboard/galeri', [PhotoController::class, 'index'])->middleware('auth');
Route::post('/dashboard/galeri', [PhotoController::class, 'store'])->name('photos.store')->middleware('auth');

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


// vristo example here
// Route::view('/', 'index');
Route::view('/analytics', 'analytics');
Route::view('/finance', 'finance');
Route::view('/crypto', 'crypto');

Route::view('/apps/chat', 'apps.chat');
Route::view('/apps/mailbox', 'apps.mailbox');
Route::view('/apps/todolist', 'apps.todolist');
Route::view('/apps/notes', 'apps.notes');
Route::view('/apps/scrumboard', 'apps.scrumboard');
Route::view('/apps/contacts', 'apps.contacts');
Route::view('/apps/calendar', 'apps.calendar');

Route::view('/apps/invoice/list', 'apps.invoice.list');
Route::view('/apps/invoice/preview', 'apps.invoice.preview');
Route::view('/apps/invoice/add', 'apps.invoice.add');
Route::view('/apps/invoice/edit', 'apps.invoice.edit');

Route::view('/components/tabs', 'ui-components.tabs');
Route::view('/components/accordions', 'ui-components.accordions');
Route::view('/components/modals', 'ui-components.modals');
Route::view('/components/cards', 'ui-components.cards');
Route::view('/components/carousel', 'ui-components.carousel');
Route::view('/components/countdown', 'ui-components.countdown');
Route::view('/components/counter', 'ui-components.counter');
Route::view('/components/sweetalert', 'ui-components.sweetalert');
Route::view('/components/timeline', 'ui-components.timeline');
Route::view('/components/notifications', 'ui-components.notifications');
Route::view('/components/media-object', 'ui-components.media-object');
Route::view('/components/list-group', 'ui-components.list-group');
Route::view('/components/pricing-table', 'ui-components.pricing-table');
Route::view('/components/lightbox', 'ui-components.lightbox');

Route::view('/elements/alerts', 'elements.alerts');
Route::view('/elements/avatar', 'elements.avatar');
Route::view('/elements/badges', 'elements.badges');
Route::view('/elements/breadcrumbs', 'elements.breadcrumbs');
Route::view('/elements/buttons', 'elements.buttons');
Route::view('/elements/buttons-group', 'elements.buttons-group');
Route::view('/elements/color-library', 'elements.color-library');
Route::view('/elements/dropdown', 'elements.dropdown');
Route::view('/elements/infobox', 'elements.infobox');
Route::view('/elements/jumbotron', 'elements.jumbotron');
Route::view('/elements/loader', 'elements.loader');
Route::view('/elements/pagination', 'elements.pagination');
Route::view('/elements/popovers', 'elements.popovers');
Route::view('/elements/progress-bar', 'elements.progress-bar');
Route::view('/elements/search', 'elements.search');
Route::view('/elements/tooltips', 'elements.tooltips');
Route::view('/elements/treeview', 'elements.treeview');
Route::view('/elements/typography', 'elements.typography');

Route::view('/charts', 'charts');
Route::view('/widgets', 'widgets');
Route::view('/font-icons', 'font-icons');
Route::view('/dragndrop', 'dragndrop');

Route::view('/tables', 'tables');

Route::view('/datatables/advanced', 'datatables.advanced');
Route::view('/datatables/alt-pagination', 'datatables.alt-pagination');
Route::view('/datatables/basic', 'datatables.basic');
Route::view('/datatables/checkbox', 'datatables.checkbox');
Route::view('/datatables/clone-header', 'datatables.clone-header');
Route::view('/datatables/column-chooser', 'datatables.column-chooser');
Route::view('/datatables/export', 'datatables.export');
Route::view('/datatables/multi-column', 'datatables.multi-column');
Route::view('/datatables/multiple-tables', 'datatables.multiple-tables');
Route::view('/datatables/order-sorting', 'datatables.order-sorting');
Route::view('/datatables/range-search', 'datatables.range-search');
Route::view('/datatables/skin', 'datatables.skin');
Route::view('/datatables/sticky-header', 'datatables.sticky-header');

Route::view('/forms/basic', 'forms.basic');
Route::view('/forms/input-group', 'forms.input-group');
Route::view('/forms/layouts', 'forms.layouts');
Route::view('/forms/validation', 'forms.validation');
Route::view('/forms/input-mask', 'forms.input-mask');
Route::view('/forms/select2', 'forms.select2');
Route::view('/forms/touchspin', 'forms.touchspin');
Route::view('/forms/checkbox-radio', 'forms.checkbox-radio');
Route::view('/forms/switches', 'forms.switches');
Route::view('/forms/wizards', 'forms.wizards');
Route::view('/forms/file-upload', 'forms.file-upload');
Route::view('/forms/quill-editor', 'forms.quill-editor');
Route::view('/forms/markdown-editor', 'forms.markdown-editor');
Route::view('/forms/date-picker', 'forms.date-picker');
Route::view('/forms/clipboard', 'forms.clipboard');

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
