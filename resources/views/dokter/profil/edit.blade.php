@extends('layout.app')

@section('title', 'Profil')

@section('nav-item')
<li class="nav-item">
    <a href="/dokter/dashboard" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="/dokter/jadwal_periksa" class="nav-link">
        <i class="nav-icon fas fa-solid fa-calendar"></i>
        <p>Jadwal Periksa</p>
    </a>
</li>
<li class="nav-item">
    <a href="/dokter/memeriksa" class="nav-link">
        <i class="nav-icon fas fa-solid fa-stethoscope"></i>
        <p>Memeriksa Pasien</p>
    </a>
</li>
<li class="nav-item">
    <a href="/dokter/riwayat_pasien" class="nav-link">
        <i class="nav-icon fas fa-solid fa-book-medical"></i>
        <p>Riwayat Pasien</p>
    </a>
</li>
<li class="nav-item">
    <a href="/dokter/profil" class="nav-link">
        <i class="nav-icon fas fa-solid fa-hospital-user"></i>
        <p>Profil</p>
    </a>
</li>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profil Dokter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dokter/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Profil</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Profil Dokter</h3>
            </div>

            <!-- form start -->
            <form method="post" action="/dokter/profil">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Dokter</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $dokter->nama) }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $dokter->alamat) }}">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $dokter->no_hp) }}">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection