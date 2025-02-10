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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap_mahasiswa');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('agama');
            $table->string('no_hp_wa');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('lulusan_jenjang_sekolah');
            $table->string('program_studi');
            $table->longText('alamat');
            $table->enum('status', ['aktif', 'non-aktif']);
            $table->string('foto_gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
