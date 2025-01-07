<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Curriculum;
use App\Models\Gallery;
use App\Models\Photo;
use App\Models\Post;
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
        $posts = Post::all();
        $featured = Post::where('is_featured', 1)->get();
        $galleries = Gallery::with('category')->latest()->take(5)->get();
        return view('clients.utama.beranda', compact('posts', 'featured', 'galleries'));
    }
    public function read($id)
    {
        $berita = Post::find($id);
        if (!$berita) {
            return redirect()->route('home');
        }
        $berita->view_number += 1;
        $berita->save();
        return view('clients.utama.detail-berita', compact('berita'));
    }
    public function news(Request $request)
    {
        // Initialize the query
        $query = Post::query();

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
    public function pesertaDidik()
    {
        return view('clients.direktori.peserta-didik');
    }
    public function tentangKurikulum()
    {
        $kurikulum = Curriculum::select('tentang_kurikulum')
            ->latest('created_at')
            ->first();
        return view('clients.kurikulum.tentang-kurikulum', compact('kurikulum'));
    }
    public function infoKurikulum()
    {
        $kurikulum = Curriculum::select('info_kurikulum')
            ->latest('created_at')
            ->first();
        return view('clients.kurikulum.info-kurikulum', compact('kurikulum'));
    }
    public function kalenderAkademik()
    {
        $kurikulum = Curriculum::select('kalender_akademik')
            ->latest('created_at')
            ->first();
        return view('clients.kurikulum.kalender-akademik', compact('kurikulum'));
    }
    public function jadwalPelajaran()
    {
        $kurikulum = Curriculum::select('jadwal_pelajaran')
            ->latest('created_at')
            ->first();
        return view('clients.kurikulum.jadwal-pelajaran', compact('kurikulum'));
    }
    public function formatNilai()
    {
        $kurikulum = Curriculum::select('format_nilai')
            ->latest('created_at')
            ->first();
        return view('clients.kurikulum.format-nilai', compact('kurikulum'));
    }
    public function jadwalUjian()
    {
        $kurikulum = Curriculum::select('jadwal_ujian')
            ->latest('created_at')
            ->first();
        return view('clients.kurikulum.jadwal-ujian', compact('kurikulum'));
    }
    public function tentangKesiswaan()
    {
        $kesiswaan = Studentship::select('tentang_kesiswaan')
            ->latest('created_at')
            ->first();
        return view('clients.kesiswaan.tentang-kesiswaan', compact('kesiswaan'));
    }
    public function ekstraKurikuler()
    {
        $kesiswaan = Studentship::select('ekstrakurikuler')
            ->latest('created_at')
            ->first();
        return view('clients.kesiswaan.ekstra-kurikuler', compact('kesiswaan'));
    }
    public function programKerjaOsis()
    {
        $kesiswaan = Studentship::select('program_kerja_osis')
            ->latest('created_at')
            ->first();
        return view('clients.kesiswaan.osis.program-kerja-osis', compact('kesiswaan'));
    }
    public function kegiatanOsis()
    {
        $kesiswaan = Studentship::select('kegiatan_osis')
            ->latest('created_at')
            ->first();
        return view('clients.kesiswaan.osis.kegiatan-osis', compact('kesiswaan'));
    }
    public function daftarNamaSiswa()
    {
        $kesiswaan = Studentship::select('daftar_nama_siswa')
            ->latest('created_at')
            ->first();
        return view('clients.kesiswaan.daftar-nama-siswa', compact('kesiswaan'));
    }
    public function pLima()
    {
        $kesiswaan = Studentship::select('p5')
            ->latest('created_at')
            ->first();
        return view('clients.kesiswaan.p-lima', compact('kesiswaan'));
    }
    public function tataTertibSiswa()
    {
        $kesiswaan = Studentship::select('tata_tertib_siswa')
            ->latest('created_at')
            ->first();
        return view('clients.kesiswaan.tata-tertib-siswa', compact('kesiswaan'));
    }
    public function bpBk()
    {
        $kesiswaan = Studentship::select('bp-bk')
            ->latest('created_at')
            ->first();
        return view('clients.kesiswaan.bp-bk', compact('kesiswaan'));
    }
    public function tupoksi()
    {
        return view('clients.sarana_prasarana.tupoksi');
    }
    public function ruangKasek()
    {
        return view('clients.sarana_prasarana.ruang-kasek');
    }
    public function ruangGuru()
    {
        return view('clients.sarana_prasarana.ruang-guru');
    }
    public function aula()
    {
        return view('clients.sarana_prasarana.aula');
    }
    public function perpustakaan()
    {
        return view('clients.sarana_prasarana.perpustakaan');
    }
    public function tupoksiHumas()
    {
        return view('clients.humas.tupoksi');
    }
    public function infoHumas()
    {
        return view('clients.humas.info-humas');
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
}
