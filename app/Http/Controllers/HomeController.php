<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
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
        $photos = Photo::all(); // Retrieve all photos
        return view('clients.utama.beranda', compact('posts', 'featured', 'photos'));
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
        return view('clients.kurikulum.tentang-kurikulum');
    }
    public function infoKurikulum()
    {
        return view('clients.kurikulum.info-kurikulum');
    }
    public function kalenderAkademik()
    {
        return view('clients.kurikulum.kalender-akademik');
    }
    public function jadwalPelajaran()
    {
        return view('clients.kurikulum.jadwal-pelajaran');
    }
    public function formatNilai()
    {
        return view('clients.kurikulum.format-nilai');
    }
    public function jadwalUjian()
    {
        return view('clients.kurikulum.jadwal-ujian');
    }
    public function tentangKesiswaan()
    {
        return view('clients.kesiswaan.tentang-kesiswaan');
    }
    public function ekstraKurikuler()
    {
        return view('clients.kesiswaan.ekstra-kurikuler');
    }
    public function programKerjaOsis()
    {
        return view('clients.kesiswaan.osis.program-kerja-osis');
    }
    public function kegiatanOsis()
    {
        return view('clients.kesiswaan.osis.kegiatan-osis');
    }
    public function daftarNamaSiswa()
    {
        return view('clients.kesiswaan.daftar-nama-siswa');
    }
    public function pLima()
    {
        return view('clients.kesiswaan.p-lima');
    }
    public function tataTertibSiswa()
    {
        return view('clients.kesiswaan.tata-tertib-siswa');
    }
    public function bpBk()
    {
        return view('clients.kesiswaan.bp-bk');
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
        $photos = Photo::all(); // Retrieve all photos
        return view('clients.lainnya.galeri', compact('photos'));
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
