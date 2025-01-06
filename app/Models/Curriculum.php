<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $fillable = [
        'tentang_kurikulum',
        'info_kurikulum',
        'kalender_akademik',
        'jadwal_pelajaran',
        'format_nilai',
        'jadwal_ujian',
    ];
}
