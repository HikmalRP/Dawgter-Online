<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Landing Page</title>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('lte/plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">

  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      background-color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
      overflow: visible;
      /* <--- Ini penting agar scaling bisa keluar batas */
    }

    .container {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 60px 40px;
      /* tambahkan padding agar tidak mepet viewport */
      overflow: visible;
      /* <--- biarkan isi yang di-scale melebar */
    }

    .scaling-wrapper {
      transform: scale(1.5);
      /* atau 1.5 */
      transform-origin: center center;
      overflow: visible;
    }

    .card.custom-card {
      max-width: 700px;
      width: 100%;
      border: none;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: box-shadow 0.3s ease;
    }

    .card.custom-card:hover {
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
    }

    /* Garis biru atas */
    .card-border-top {
      height: 5px;
      background-color: #007bff;
    }

    /* Styling teks */
    .text-section h2 {
      font-size: 28px;
      margin-bottom: 8px;
    }

    .text-section span.fw-normal {
      font-weight: normal;
      margin-left: 4px;
    }

    .text-muted {
      font-size: 15px;
      color: #6c757d;
    }

    /* Tombol */
    .button-group a {
      white-space: nowrap;
    }

    @media (max-width: 768px) {
      .d-flex.justify-content-between {
        flex-direction: column;
        align-items: flex-start;
      }

      .button-group {
        margin-top: 1rem;
        margin-left: 0 !important;
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .fade-in {
      animation: fadeInUp 0.6s ease forwards;
      opacity: 0;
    }

    .fade-in-delay-1 {
      animation-delay: 0.3s;
    }

    .fade-in-delay-2 {
      animation-delay: 0.6s;
    }

    .fade-in-delay-3 {
      animation-delay: 0.9s;
    }
  </style>
</head>

<body>

  <!-- Ganti bagian card dan layout-nya seperti ini -->
  <!-- Bagian card -->

  <body>
    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">
      <div class="container d-flex justify-content-center align-items-center">
        <div class="scaling-wrapper">
          <div class="card shadow border-0 rounded-3 fade-in fade-in-delay-1" style="width: 600px;">
            <div style="height: 8px; background-color: #0041a3; border-radius: 6px 6px 0 0;"></div>

            <div class="card-body d-flex justify-content-between align-items-center px-4 py-4">
              <div class="me-3 fade-in fade-in-delay-2" style="flex: 1;">
                <div class="card-header text-center p-0 mb-1 border-0">
                  <a href="./" class="h2"><b>Selamat </b>Datang</a>
                </div>
                <div>
                  <hr style="width: 95%; margin: 12px auto 6px auto; border-top: 1px solid #dee2e6;">
                </div>
                <p class="text-muted text-center mb-0" style="max-width: 85%; margin: 0 auto;">
                  Silakan masuk atau daftar untuk melanjutkan ke sistem.
                </p>
              </div>
              <div class="d-flex flex-column fade-in fade-in-delay-3" style="width: 170px;">
                <a href="/login" class="btn btn-success mb-2">Login</a>
                <a href="/register" class="btn btn-primary">Register</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  <!-- Scripts -->
  <script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
</body>

</html>