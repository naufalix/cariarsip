<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.admin-head')
</head>

<body class="hold-transition sidebar-mini">

  <script>
    @if(session()->has('success'))
      Swal.fire({title:'Berhasil', text:'{{session('success')}}', icon:'success'})
    @endif
    @if(session()->has('error'))
      Swal.fire({title:'Error!', text:'{{session('error')}}', icon:'error'})
    @endif
    @if(session()->has('info'))
      Swal.fire({title:'Info', text:'{{session('info')}}', icon:'info'})
    @endif
    @if($errors->any())
      Swal.fire({title:'Error!', html:'{!! implode('', $errors->all(':message<br>')) !!}', icon:'error'})
    @endif
  </script>

  <div class="wrapper">
    
    @include('partials.admin-navbar')
    @include('partials.admin-sidebar')
      
    <div class="content-wrapper">
      @yield('content')
    </div>
    
    @include('partials.admin-footer')

    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>

  </div>
  <!-- ./wrapper -->

  @include('partials.admin-script')

</body>
</html>