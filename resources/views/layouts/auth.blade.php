
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <!-- Favicons -->
  <link href="/dist/img/favicon.png" rel="icon">

  <!-- CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">

  <!-- JS -->
  <script src="/plugins/sweetalert2/sweetalert2.all.min.js"></script>


</head>
<body class="hold-transition login-page">
  <script>
    @if(session()->has('success'))
      Swal.fire({title:'Berhasil', text:'{{session('success')}}', icon:'success'})
    @endif
    @if(session()->has('error'))
      Swal.fire({title:'Error!', text:'{{session('error')}}', icon:'error'})
    @endif
  </script>
  @yield('content')
  <!-- jQuery -->
  <script src="/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/dist/js/adminlte.min.js"></script>
</body>
</html>
