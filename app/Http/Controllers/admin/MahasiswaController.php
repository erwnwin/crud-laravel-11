<?php

namespace App\Http\Controllers\admin;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    //
    public function index()
    {
        $mahasiswas = Mahasiswa::all();

        return view('pages.mahasiswa.index', compact('mahasiswas'));
    }


    public function create()
    {
        return view('pages.mahasiswa.create');
    }


    public function edit($id)
    {
        // Ambil data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Tampilkan view edit dengan data mahasiswa
        return view('pages.mahasiswa.edit', compact('mahasiswa'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap_mahasiswa' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'no_hp_wa' => 'required|string',
            'email' => 'required|email|unique:mahasiswas,email',
            'password' => 'required|string|min:8',
            'tempat_lahir' => 'required|string',
            'tgl_lahir' => 'required|date',
            'lulusan_jenjang_sekolah' => 'required|string',
            'program_studi' => 'required|string',
            'alamat' => 'required|string',
            'status' => 'required|string',
            'foto_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:22048',
        ]);

        // Simpan data ke database
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama_lengkap_mahasiswa = $request->nama_lengkap_mahasiswa;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->agama = $request->agama;
        $mahasiswa->no_hp_wa = $request->no_hp_wa;
        $mahasiswa->email = $request->email;
        $mahasiswa->password = bcrypt($request->password); // Enkripsi password
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tgl_lahir = $request->tgl_lahir;
        $mahasiswa->lulusan_jenjang_sekolah = $request->lulusan_jenjang_sekolah;
        $mahasiswa->program_studi = $request->program_studi;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->status = $request->status;

        // Upload foto jika ada
        if ($request->hasFile('foto_gambar')) {
            $fotoPath = $request->file('foto_gambar')->store('foto_mahasiswa', 'public');
            $mahasiswa->foto_gambar = $fotoPath;
        }

        $mahasiswa->save();

        // Redirect dengan pesan sukses
        return redirect()->route('mahasiswa')->with('success', 'Data mahasiswa berhasil disimpan!');
    }



    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap_mahasiswa' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'no_hp_wa' => 'required|string',
            'email' => 'required|email|unique:mahasiswas,email,' . $id,
            'tempat_lahir' => 'required|string',
            'tgl_lahir' => 'required|date',
            'lulusan_jenjang_sekolah' => 'required|string',
            'program_studi' => 'required|string',
            'alamat' => 'required|string',
            'status' => 'required|string',
            'foto_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Ambil data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Update data
        $mahasiswa->nama_lengkap_mahasiswa = $request->nama_lengkap_mahasiswa;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->agama = $request->agama;
        $mahasiswa->no_hp_wa = $request->no_hp_wa;
        $mahasiswa->email = $request->email;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tgl_lahir = $request->tgl_lahir;
        $mahasiswa->lulusan_jenjang_sekolah = $request->lulusan_jenjang_sekolah;
        $mahasiswa->program_studi = $request->program_studi;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->status = $request->status;

        // Update password jika diisi
        if ($request->filled('password')) {
            $mahasiswa->password = bcrypt($request->password);
        }

        // Update foto jika diupload
        if ($request->hasFile('foto_gambar')) {
            $fotoPath = $request->file('foto_gambar')->store('foto_mahasiswa', 'public');
            $mahasiswa->foto_gambar = $fotoPath;
        }

        $mahasiswa->save();

        // Redirect dengan pesan sukses
        return redirect()->route('mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Ambil data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Hapus file foto dari storage jika ada
        if ($mahasiswa->foto_gambar) {
            Storage::delete('public/' . $mahasiswa->foto_gambar);
        }

        // Hapus data dari database
        $mahasiswa->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('mahasiswa')->with('deleted', 'Data mahasiswa berhasil dihapus!');
    }
}
