<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="./register" class="h1"><b>Register</b>Page</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Register</p>

      <form action="/register" method="post">
        @csrf
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-marker-alt"></span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="no_hp">Nomor HP</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <div class="input-group mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>

      <a href="/login" class="text-center">Sudah Punya Akun? Login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
