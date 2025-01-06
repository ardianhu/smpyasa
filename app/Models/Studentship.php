<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentship extends Model
{
    use HasFactory;
    protected $fillable = [
        'tentang_kesiswaan',
        'ekstrakurikuler',
        'program_kerja_osis',
        'kegiatan_osis',
        'daftar_nama_siswa',
        'p5',
        'tata_tertib_siswa',
        'bp-bk',
    ];
}
