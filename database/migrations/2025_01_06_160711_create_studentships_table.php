<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('studentships', function (Blueprint $table) {
            $table->id();
            $table->text('tentang_kesiswaan');
            $table->text('ekstrakurikuler');
            $table->text('program_kerja_osis');
            $table->text('kegiatan_osis');
            $table->text('daftar_nama_siswa');
            $table->text('p5');
            $table->text('tata_tertib_siswa');
            $table->text('bp-bk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentships');
    }
};
