<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    //
    protected $table = 'mahasiswas';

    use HasFactory, Notifiable;

    protected $fillable = [
        'nama_lengkap_mahasiswa',
        'jenis_kelamin',
        'agama',
        'no_hp_wa',
        'email',
        'password',
        'tempat_lahir',
        'tgl_lahir',
        'lulusan_jenjang_sekolah',
        'program_studi',
        'alamat',
        'status',
        'foto_gambar',
    ];
}
