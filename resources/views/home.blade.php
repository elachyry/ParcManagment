<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bienvenue</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/auth/img/dakhla-region.png" rel="icon">
  <link href="/assets/auth/img/dakhla-region.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/auth/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/auth/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/auth/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/auth/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/auth/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/auth/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/auth/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/auth/css/style.css" rel="stylesheet">


</head>

<body>


  <main>
    <div class="container">

    <div class="jumbotron">
    <section class="section error-404 min-vh-50 d-flex flex-column align-items-center justify-content-center">
      <center><img src="/assets/auth/img/region-logo2.png" class="img-fluid py-2" ></center>
      <h1 class="display-4" ><center><span class="homeh1">Gestion Parc</span> </center> </h1>
      @if (Route::has('login'))
                    <div style="margin-top:10%;">
                        @auth
                           <center> <a class="btn" href="{{route('dashboard')}}"><h3>Tableau de Bord</h3></a></center>
                        @else
                            <center><a class="btn" href="{{route('login')}}"><h3>Connexion</h3></a></center>
                        @endif
                    </div>
                @endif
                </section>
    </div>
    

      <!-- <section class="section error-404 min-vh-50 d-flex flex-column align-items-center justify-content-center">
      <img src="/assets/auth/img/region-logo2.png" class="img-fluid py-2" >
        <h1>Gestion Parc</h1>
        @if (Route::has('login'))
                    <div style="margin-top:5%;">
                        @auth
                            <a class="btn" href="{{route('dashboard')}}"><h3>Tableau de Bord</h3></a>
                        @else
                            <a class="btn" href="{{route('login')}}"><h3>Connexion</h3></a>
                        @endif
                    </div>
                @endif
        </div> -->
      <!-- </section> -->

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/auth/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/auth/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/auth/vendor/chart.js/chart.min.js"></script>
  <script src="/assets/auth/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/auth/vendor/quill/quill.min.js"></script>
  <script src="/assets/auth/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/auth/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/auth/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/auth/js/main.js"></script>

</body>

</html>