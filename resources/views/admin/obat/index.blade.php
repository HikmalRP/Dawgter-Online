@extends('layout.app')

@section('title','Obat')

@section('nav-item')
<li class="nav-item">
  <a href="/admin/dashboard" class="nav-link">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-item">
  <a href="/admin/mengelola_dokter" class="nav-link">
    <i class="nav-icon fas fa-solid fa-hospital-user"></i>
    <p>Dokter</p>
  </a>
</li>
<li class="nav-item">
  <a href="/admin/mengelola_pasien" class="nav-link">
    <i class="nav-icon fas fa-solid fa-bed"></i>
    <p>Pasien</p>
  </a>
</li>
<li class="nav-item">
  <a href="/admin/mengelola_poli" class="nav-link">
    <i class="nav-icon fas fa-solid fa-hospital"></i>
    <p>Poli</p>
  </a>
</li>
<li class="nav-item">
  <a href="/admin/obat" class="nav-link">
    <i class="nav-icon fas fa-solid fa-capsules"></i>
    <p>Obat</p>
  </a>
</li>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Obat</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Obat</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Obat</h3>
            <a href="/admin/obat/create" class="btn btn-sm btn-info ml-2">Tambah Obat</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Obat</th>
                  <th>Kemasan</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($obats as $obat)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$obat->nama_obat}}</td>
                  <td>{{$obat->kemasan}}</td>
                  <td>Rp {{number_format($obat->harga, 0,',', '.')}}</td>
                  <td>
                    <div class="row">
                      <a href="/admin/obat/{{ $obat->id }}/edit" class="btn btn-warning">Edit</a>
                      <form action="/admin/obat/{{ $obat->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data obat {{ $obat->nama_obat }}?')" class="btn btn-danger ml-2">Delete</button>
                      </form>
                    </div>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="text-center">Tidak ada data obat</td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="mt4">
              {{ $obats->links() }}
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection