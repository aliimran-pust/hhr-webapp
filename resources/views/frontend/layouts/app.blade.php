<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'হরিখালী উচ্চ বিদ্যালয় পুনর্মিলনী-২০২৬')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://fonts.googleapis.com/css2?family=Nikosh&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AdminLTE (using Bootstrap 4) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <style>
        body {
            font-family: 'Source Sans Pro', 'Nikosh', sans-serif;
        }
        .hero-section {
            background-image: url('{{ asset("assets/backend/img/school_bg.jpg") }}'); /* Placeholder */
            background-size: cover;
            background-position: center;
            min-height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
            padding: 50px 0;
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem !important;
            }
            .hero-section .lead {
                font-size: 1.1rem !important;
            }
        }
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background-color: #007bff;
            margin: 10px auto;
        }
        .navbar-brand img {
            max-height: 40px;
            margin-right: 10px;
        }
        .counter-box i {
            font-size: 2.5rem;
        }
        @media (max-width: 576px) {
            .counter-box h2 {
                font-size: 1.5rem;
            }
        }
    </style>
    @stack('css')
</head>
<body class="layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{ url('/') }}" class="navbar-brand">
        <img src="{{ asset('assets/backend/img/new_logo_PM.jpg') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light"><b>Harikhali High School Reunion 2026</b></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">হোম</a>
          </li>
          <li class="nav-item">
            <a href="#about" class="nav-link">আমাদের সম্পর্কে</a>
          </li>
          <li class="nav-item">
            <a href="#schedule" class="nav-link">অনুষ্ঠান সূচি</a>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link">যোগাযোগ</a>
          </li>
            <li class="nav-item">
                <a href="{{url('/login')}}" class="nav-link">লগইন </a>
            </li>
          <li class="nav-item">
              <a href="{{ route('register') }}" class="btn btn-primary nav-link text-white px-3 ml-2">রেজিস্ট্রেশন করুন</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <strong>Copyright &copy; 2026 <a href="#">HHS Reunion Committee</a>.</strong> All rights reserved.
            </div>
            <div class="col-md-6 text-md-right">
                Developed by <b>Datamen</b>
            </div>
        </div>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
@stack('js')
</body>
</html>
