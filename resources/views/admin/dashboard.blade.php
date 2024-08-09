@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Welcome {{ auth()->user()->name }}</h1>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$racks->count()}}</h3>
            <p>Jumlah Rak</p>
          </div>
          <div class="icon">
            <i class="fa fa-archive"></i>
          </div>
          <a href="/admin/rack" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$books->count()}}</h3>
            <p>Jamlah Arsip</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-contract"></i>
          </div>
          <a href="/admin/book" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$categories->count()}}</h3>
            <p>Jumlah Kategori</p>
          </div>
          <div class="icon">
            <i class="fa fa-th-large"></i>
          </div>
          <a href="/admin/category" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
      </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection