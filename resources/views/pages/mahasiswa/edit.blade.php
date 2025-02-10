@extends('layouts.admin')

@section('title', 'Edit Data Mahasiswa : CRUD MAHASISWA')

@section('content')

    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Form Edit Data Mahasiswa <br>
                    <small>Berikut adalah form edit data mahasiswa</small>
                </h1>



            </section>

            <!-- Main content -->
            <section class="content">


                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Form Edit Data Mahasiswa UNIVERSITAS XYZ</h3>


                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!-- Nama Lengkap -->
                                    <div class="form-group">
                                        <label for="nama_lengkap_mahasiswa">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap_mahasiswa"
                                            name="nama_lengkap_mahasiswa" value="{{ $mahasiswa->nama_lengkap_mahasiswa }}"
                                            required>
                                    </div>
                                    <!-- Jenis Kelamin -->
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option value="Laki-laki"
                                                {{ $mahasiswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki
                                            </option>
                                            <option value="Perempuan"
                                                {{ $mahasiswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>
                                    </div>
                                    <!-- Agama -->
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select class="form-control" id="agama" name="agama" required>
                                            <option value="Islam" {{ $mahasiswa->agama == 'Islam' ? 'selected' : '' }}>
                                                Islam</option>
                                            <option value="Kristen" {{ $mahasiswa->agama == 'Kristen' ? 'selected' : '' }}>
                                                Kristen</option>
                                            <option value="Katolik" {{ $mahasiswa->agama == 'Katolik' ? 'selected' : '' }}>
                                                Katolik</option>
                                            <option value="Hindu" {{ $mahasiswa->agama == 'Hindu' ? 'selected' : '' }}>
                                                Hindu</option>
                                            <option value="Buddha" {{ $mahasiswa->agama == 'Buddha' ? 'selected' : '' }}>
                                                Buddha</option>
                                            <option value="Konghucu"
                                                {{ $mahasiswa->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                            </option>
                                        </select>
                                    </div>
                                    <!-- No HP/WA -->
                                    <div class="form-group">
                                        <label for="no_hp_wa">No HP/WA</label>
                                        <input type="text" class="form-control" id="no_hp_wa" name="no_hp_wa"
                                            value="{{ $mahasiswa->no_hp_wa }}" required>
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $mahasiswa->email }}" required>
                                    </div>
                                    <!-- Password -->
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Kosongkan jika tidak ingin mengubah password">
                                    </div>
                                    <!-- Tempat Lahir -->
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                            value="{{ $mahasiswa->tempat_lahir }}" required>
                                    </div>
                                    <!-- Tanggal Lahir -->
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                            value="{{ $mahasiswa->tgl_lahir }}" required>
                                    </div>
                                    <!-- Lulusan Jenjang Sekolah -->
                                    <div class="form-group">
                                        <label for="lulusan_jenjang_sekolah">Lulusan Jenjang Sekolah</label>
                                        <input type="text" class="form-control" id="lulusan_jenjang_sekolah"
                                            name="lulusan_jenjang_sekolah"
                                            value="{{ $mahasiswa->lulusan_jenjang_sekolah }}" required>
                                    </div>
                                    <!-- Program Studi -->
                                    <div class="form-group">
                                        <label for="program_studi">Program Studi</label>
                                        <input type="text" class="form-control" id="program_studi" name="program_studi"
                                            value="{{ $mahasiswa->program_studi }}" required>
                                    </div>
                                    <!-- Alamat -->
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" required>{{ $mahasiswa->alamat }}</textarea>
                                    </div>
                                    <!-- Status -->
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="aktif" {{ $mahasiswa->status == 'aktif' ? 'selected' : '' }}>
                                                Aktif</option>
                                            <option value="non-aktif"
                                                {{ $mahasiswa->status == 'non-aktif' ? 'selected' : '' }}>Tidak Aktif
                                            </option>
                                        </select>
                                    </div>
                                    <!-- Foto Gambar -->
                                    <div class="form-group">
                                        <label for="foto_gambar">Foto</label>
                                        <input type="file" class="form-control" id="foto_gambar" name="foto_gambar">
                                        <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="/mahasiswa" class="btn btn-default">Tutup</a>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>


                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
@endsection
