@extends('layouts.admin')

@section('title', 'Input Data Mahasiswa : CRUD MAHASISWA')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Form Input Data Mahasiswa <br>
                    <small>Berikut adalah form input data mahasiswa</small>
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
                                <h3 class="box-title">Form Input Data Mahasiswa UNIVERSITAS XYZ</h3>


                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form class="form-horizontal" action="{{ route('mahasiswa.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf <!-- Token CSRF untuk keamanan -->
                                    <div class="box-body">
                                        <!-- Nama Lengkap Mahasiswa -->
                                        <div class="form-group">
                                            <label for="nama_lengkap_mahasiswa" class="col-sm-2 control-label">Nama
                                                Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_lengkap_mahasiswa"
                                                    name="nama_lengkap_mahasiswa" placeholder="Nama Lengkap" required>
                                            </div>
                                        </div>

                                        <!-- Jenis Kelamin -->
                                        <div class="form-group">
                                            <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                                    required>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Agama -->
                                        <div class="form-group">
                                            <label for="agama" class="col-sm-2 control-label">Agama</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="agama" name="agama" required>
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Buddha">Buddha</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                        </div>


                                        <!-- No HP/WA -->
                                        <div class="form-group">
                                            <label for="no_hp_wa" class="col-sm-2 control-label">No HP/WA</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="no_hp_wa" name="no_hp_wa"
                                                    placeholder="No HP/WA" required>
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Email" required>
                                            </div>
                                        </div>

                                        <!-- Password -->
                                        <div class="form-group">
                                            <label for="password" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="password" name="password"
                                                    placeholder="Password" required>
                                            </div>
                                        </div>

                                        <!-- Tempat Lahir -->
                                        <div class="form-group">
                                            <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tempat_lahir"
                                                    name="tempat_lahir" placeholder="Tempat Lahir" required>
                                            </div>
                                        </div>

                                        <!-- Tanggal Lahir -->
                                        <div class="form-group">
                                            <label for="tgl_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                                    required>
                                            </div>
                                        </div>

                                        <!-- Lulusan Jenjang Sekolah -->
                                        <div class="form-group">
                                            <label for="lulusan_jenjang_sekolah" class="col-sm-2 control-label">Lulusan
                                                Jenjang Sekolah</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="lulusan_jenjang_sekolah"
                                                    name="lulusan_jenjang_sekolah" placeholder="Lulusan Jenjang Sekolah"
                                                    required>
                                            </div>
                                        </div>

                                        <!-- Program Studi -->
                                        <div class="form-group">
                                            <label for="program_studi" class="col-sm-2 control-label">Program
                                                Studi</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="program_studi"
                                                    name="program_studi" placeholder="Program Studi" required>
                                            </div>
                                        </div>

                                        <!-- Alamat -->
                                        <div class="form-group">
                                            <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" required></textarea>
                                            </div>
                                        </div>

                                        <!-- Status -->
                                        <div class="form-group">
                                            <label for="status" class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="status" name="status" required>
                                                    <option value="aktif">Aktif</option>
                                                    <option value="non-aktif">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Foto Gambar -->
                                        <div class="form-group">
                                            <label for="foto_gambar" class="col-sm-2 control-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="foto_gambar"
                                                    name="foto_gambar">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success btn-block"><i
                                                class="fa fa-check"></i> Simpan Data</button>
                                        <button type="reset" class="btn btn-danger btn-block mt-1"><i
                                                class="fa fa-times"></i> Reset</button>
                                    </div>
                                    <!-- /.box-footer -->
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
