<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Curriculum;
use App\Models\Gallery;
use App\Models\Infrastructure;
use App\Models\Photo;
use App\Models\Post;
use App\Models\PublicRelation;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\Studentship;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $posts = Post::where('is_published', 1)->get();
        $featured = Post::where('is_featured', 1)->where('is_published', 1)->get();
        $galleries = Gallery::with('category')->latest()->take(5)->get();
        return view('clients.utama.beranda', compact('posts', 'featured', 'galleries'));
    }
    public function read($id)
    {
        $berita = Post::find($id);
        if (!$berita || $berita->is_published == 0) {
            $pesan = 'Halaman ini tidak tersedia';
            return view('clients.error.error', compact('pesan'));
        }
        $berita->view_number += 1;
        $berita->save();
        return view('clients.utama.detail-berita', compact('berita'));
    }
    public function news(Request $request)
    {
        // Initialize the query
        $query = Post::where('is_published', 1);

        // Check if the 'tags' query parameter is present
        if ($request->has('tags')) {
            $tags = $request->input('tags');
            $query->whereHas('tags', function ($q) use ($tags) {
                $q->where('name', $tags);
            });
        }

        // Check if the 'category' query parameter is present
        if ($request->has('category')) {
            $category = $request->input('category');
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('name', $category);
            });
        }

        if ($request->has('cari')) {
            $katakunci = $request->input('cari');

            $query->where(function ($q) use ($katakunci) {
                $q->where('title', 'LIKE', "%{$katakunci}%") // Search in the title
                    ->orWhere('description', 'LIKE', "%{$katakunci}%") // Search in the description
                    ->orWhereHas('tags', function ($q) use ($katakunci) { // Search in related tags
                        $q->where('name', 'LIKE', "%{$katakunci}%");
                    });
            });
        }

        // Get the results
        $posts = $query->get();

        $categories = Category::all();
        $tags = Tag::all();

        // Return the posts to the view
        return view('clients.utama.list-berita', compact('posts', 'categories', 'tags'));
    }
    public function visiMisi()
    {
        return view('clients.profile.visi-misi');
    }
    public function strukturOrganisasi()
    {
        $users = User::all();
        return view('clients.profile.struktur-organisasi', compact('users'));
    }
    public function komiteSekolah()
    {
        return view('clients.profile.komite-sekolah');
    }
    public function guruDanTenagaKependidikan()
    {
        return view('clients.direktori.guru-dan-tenaga-kependidikan');
    }
    public function pesertaDidik(Request $request)
    {
        $classes = StudentClass::with('student')->get();

        // Fetch all students initially
        $students = Student::query();

        // Filter by class if the 'class' parameter exists in the request
        if ($request->has('class')) {
            $class = $request->input('class');
            $students->whereHas('studentClass', function ($query) use ($class) {
                $query->where('id', $class); // Assuming 'class' contains the StudentClass ID
            });
        }

        // Filter by graduation year if the 'graduation_year' parameter exists in the request
        if ($request->has('graduation-year')) {
            $graduationYear = $request->input('graduation-year');
            $students->where('graduation_year', $graduationYear);
        }

        // Execute the query to get the filtered students
        $students = $students->get();
        // dd($students);

        $graduationYears = Student::select('graduation_year')
            ->distinct()
            ->orderBy('graduation_year', 'asc')
            ->pluck('graduation_year');

        // dd($classes, $graduationYears, $students);

        return view('clients.direktori.peserta-didik', compact('classes', 'students', 'graduationYears'));
    }
    public function tentangKurikulum()
    {
        $kurikulum = Curriculum::select('tentang_kurikulum')
            ->latest('created_at')
            ->first();
        $data = $kurikulum->tentang_kurikulum ?? null;
        $title = 'KURIKULUM';
        $sub_title = 'Tentang Kurikulum';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function infoKurikulum()
    {
        $kurikulum = Curriculum::select('info_kurikulum')
            ->latest('created_at')
            ->first();
        $data = $kurikulum->info_kurikulum ?? null;
        $title = 'KURIKULUM';
        $sub_title = 'Info Kurikulum';

        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function kalenderAkademik()
    {
        $kurikulum = Curriculum::select('kalender_akademik')
            ->latest('created_at')
            ->first();
        $data = $kurikulum->kalender_akademik ?? null;
        $title = 'KURIKULUM';
        $sub_title = 'Kalender Akademik';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function jadwalPelajaran()
    {
        $kurikulum = Curriculum::select('jadwal_pelajaran')
            ->latest('created_at')
            ->first();
        $data = $kurikulum->jadwal_pelajaran ?? null;
        $title = 'KURIKULUM';
        $sub_title = 'Jadwal Pelajaran';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function formatNilai()
    {
        $kurikulum = Curriculum::select('format_nilai')
            ->latest('created_at')
            ->first();
        $data = $kurikulum->format_nilai ?? null;
        $title = 'KURIKULUM';
        $sub_title = 'Format Nilai';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function jadwalUjian()
    {
        $kurikulum = Curriculum::select('jadwal_ujian')
            ->latest('created_at')
            ->first();
        $data = $kurikulum->jadwal_ujian ?? null;
        $title = 'KURIKULUM';
        $sub_title = 'Jadwal Ujian';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function tentangKesiswaan()
    {
        $kesiswaan = Studentship::select('tentang_kesiswaan')
            ->latest('created_at')
            ->first();
        $data = $kesiswaan->tentang_kesiswaan ?? null;
        $title = 'KESISWAAN';
        $sub_title = 'Tentang Kesiswaan';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function ekstraKurikuler()
    {
        $kesiswaan = Studentship::select('ekstrakurikuler')
            ->latest('created_at')
            ->first();
        $data = $kesiswaan->ekstrakurikuler ?? null;
        $title = 'KESISWAAN';
        $sub_title = 'Ekstrakurikuler';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function programKerjaOsis()
    {
        $kesiswaan = Studentship::select('program_kerja_osis')
            ->latest('created_at')
            ->first();
        $data = $kesiswaan->program_kerja_osis ?? null;
        $title = 'KESISWAAN';
        $sub_title = 'Program Kerja Osis';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function kegiatanOsis()
    {
        $kesiswaan = Studentship::select('kegiatan_osis')
            ->latest('created_at')
            ->first();
        $data = $kesiswaan->kegiatan_osis ?? null;
        $title = 'KESISWAAN';
        $sub_title = 'Kegiatan Osis';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function daftarNamaSiswa()
    {
        $kesiswaan = Studentship::select('daftar_nama_siswa')
            ->latest('created_at')
            ->first();
        $data = $kesiswaan->daftar_nama_siswa ?? null;
        $title = 'KESISWAAN';
        $sub_title = 'Daftar Nama Siswa';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function pLima()
    {
        $kesiswaan = Studentship::select('p5')
            ->latest('created_at')
            ->first();
        $data = $kesiswaan->p5 ?? null;
        $title = 'KESISWAAN';
        $sub_title = 'Kegiatan P5';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function tataTertibSiswa()
    {
        $kesiswaan = Studentship::select('tata_tertib_siswa')
            ->latest('created_at')
            ->first();
        $data = $kesiswaan->tata_tertib_siswa ?? null;
        $title = 'KESISWAAN';
        $sub_title = 'Tata Tertib Siswa';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function bpBk()
    {
        $kesiswaan = Studentship::select('bp-bk')
            ->latest('created_at')
            ->first();
        $data = $kesiswaan->{'bp-bk'} ?? null;
        $title = 'KESISWAAN';
        $sub_title = 'BP / BK';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function tupoksi()
    {
        $sarana = Infrastructure::select('tupoksi')
            ->latest('created_at')
            ->first();
        $data = $sarana->tupoksi ?? null;
        $title = 'SARANA & PRASARANA';
        $sub_title = 'Tupoksi';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function ruangKasek()
    {
        $sarana = Infrastructure::select('ruang_kasek')
            ->latest('created_at')
            ->first();
        $data = $sarana->ruang_kasek ?? null;
        $title = 'SARANA & PRASARANA';
        $sub_title = 'Ruang Kepala Sekolah';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function ruangGuru()
    {
        $sarana = Infrastructure::select('ruang_guru')
            ->latest('created_at')
            ->first();
        $data = $sarana->ruang_guru ?? null;
        $title = 'SARANA & PRASARANA';
        $sub_title = 'Ruang Guru';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function aula()
    {
        $sarana = Infrastructure::select('aula')
            ->latest('created_at')
            ->first();
        $data = $sarana->aula ?? null;
        $title = 'SARANA & PRASARANA';
        $sub_title = 'Aula';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function perpustakaan()
    {
        $sarana = Infrastructure::select('perpustakaan')
            ->latest('created_at')
            ->first();
        $data = $sarana->perpustakaan ?? null;
        $title = 'SARANA & PRASARANA';
        $sub_title = 'Perpustakaan';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function tupoksiHumas()
    {
        $humas = PublicRelation::select('tupoksi')
            ->latest('created_at')
            ->first();
        $data = $humas->tupoksi ?? null;
        $title = 'HUBUNGAN MASYARAKAT';
        $sub_title = 'Tupoksi';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function infoHumas()
    {
        $humas = PublicRelation::select('info_humas')
            ->latest('created_at')
            ->first();
        $data = $humas->info_humas ?? null;
        $title = 'HUBUNGAN MASYARAKAT';
        $sub_title = 'Info Humas';
        return view('clients.umum.umum', compact('data', 'title', 'sub_title'));
    }
    public function galeri()
    {
        $galleries = Gallery::with('category')->paginate(10);
        // dd($galleries);
        return view('clients.lainnya.galeri', compact('galleries'));
    }
    public function hubungiKami()
    {
        return view('clients.lainnya.hubungi-kami');
    }
    public function prestasi()
    {
        return view('clients.lainnya.prestasi');
    }

    public function notfound()
    {
        $pesan = 'Halaman yang anda tuju tidak ditemukan';
        return view('clients.error.error', compact('pesan'));
    }
}
