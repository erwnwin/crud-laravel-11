@extends('layouts.admin')

@section('title', 'Data Mahasiswa : CRUD MAHASISWA')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Data Mahasiswa <br>
                    <small>Berikut adalah data mahasiswa yang aktif</small>
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

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                        {{ session('success') }}
                    </div>
                @endif


                @if (session('deleted'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Deleted!</h4>
                        {{ session('deleted') }}
                    </div>
                @endif


                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Mahasiswa UNIVERSITAS XYZ</h3>

                                <div class="box-tools">
                                    <a href="{{ route('mahasiswa.input-data') }}" class="btn btn-sm btn-success text-white">
                                        Tambah Data Mahasiswa
                                    </a>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Tempat & Tanggal Lahir</th>
                                        <th>Email/Akun</th>
                                        <th>Status</th>
                                        <th>Program Studi</th>
                                        <th>Aksi</th>
                                    </tr>
                                    @if ($mahasiswas->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                <img src="{{ asset('assets/no-data.svg') }}" alt="No Data"
                                                    style="width: 150px; height: auto; margin-top:40px">
                                                <p>No Data Available</p>
                                                <!-- Opsional: untuk memberikan konteks lebih lanjut -->
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($mahasiswas as $index => $mahasiswa)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $mahasiswa->nama_lengkap_mahasiswa }}</td>
                                                <td>{{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tgl_lahir }}</td>
                                                <td>{{ $mahasiswa->email }}</td>
                                                <td>
                                                    <span
                                                        class="label label-{{ $mahasiswa->status == 'Aktif' ? 'success' : 'danger' }}">
                                                        {{ $mahasiswa->status }}
                                                    </span>
                                                </td>
                                                <td>{{ $mahasiswa->program_studi }}</td>
                                                <td>
                                                    <!-- Tombol Edit dengan Modal -->
                                                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    {{-- <button class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#editModal{{ $mahasiswa->id }}">
                                                    <i class="fa fa-pencil"></i>
                                                </button> --}}
                                                    <!-- Tombol Hapus -->
                                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </table>
                                <br>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.container -->
    </div>
@endsection
