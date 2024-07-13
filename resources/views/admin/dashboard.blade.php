@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Welcome {{ auth()->user()->name }}</h1>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content d-none">
  <div class="container-fluid">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Icons</h3>
      </div> <!-- /.card-body -->
      <div class="card-body">
        <p>You can use any font library you like with AdminLTE 3.</p>
        <strong>Recommendations</strong>
        <div>
          <a href="https://fontawesome.com/">Font Awesome</a><br>
          <a href="https://useiconic.com/open/">Iconic Icons</a><br>
          <a href="https://ionicons.com/">Ion Icons</a><br>
        </div>
      </div><!-- /.card-body -->
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection