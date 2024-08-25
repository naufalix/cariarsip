@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>{{ $title }}</h1>
  </div><!-- /.container-fluid -->
</section>

<style>
  
  @media (max-width: 1199px) {
    #chead {zoom: 0.8}
  }
</style>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex" id="chead">
        <h3 class="card-title my-auto">Data Kategori {{$year}}</h3>
        <div class="ml-auto d-flex border p-2 mr-3 rounded">
          <p class="my-auto mx-2">Year : </p>
          <form id="form-year" method="post">
            @csrf
            <select class="form-select" name="year" id="year" onchange="submitForm()">
              @foreach ($yearcount as $y)
              <option value="{{$y->year}}" @if($year==$y->year) selected @endif>{{$y->year}}</option>
              @endforeach
            </select>
            <button type="submit" class="d-none" id="btn-filter" name="submit" value="filter">Submit</button>
          </form>
        </div>
        <script>
          function submitForm() {
            document.getElementById('btn-filter').click();
          }
        </script>
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah</button>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive">
          <table id="myTable" class="table table-bordered" style="min-width: 800px">
            <thead>
              <tr>
                <th style="width: 10px">No.</th>
                <th>Nama Kategori</th>
                <th style="width: 200px">Jumlah arsip</th>
                <th style="width: 110px">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $c)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $c->name }}</td>
                <td>
                  <span class="badge bg-success">{{ $c->book()->where('year', $year)->count() }} Arsip</span>
                </td>
                <td>
                  <button class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#edit" onclick="edit({{$c->id}})"><i class="fa fa-pen"></i></buuton>
                  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus" onclick="hapus({{$c->id}})"><i class="fa fa-times"></i></buuton>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input class="form-control" name="name" id="name" required>
          </div>
        </div>
        <div class="modal-footer justify-content-end">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" name="submit" value="store">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="et">Edit Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        @csrf
        <input type="hidden" class="d-none" id="eid" name="id">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input class="form-control" name="name" id="enm" required>
          </div>
        </div>
        <div class="modal-footer justify-content-end">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" name="submit" value="update">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="hapus">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        @csrf
        <input type="hidden" class="d-none" id="hi" name="id">
        <div class="modal-body">
          <p id="hd">Apakah anda yakin ingin menghapus Kategori ini?</p>
        </div>
        <div class="modal-footer justify-content-end">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger" name="submit" value="destroy">Hapus</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  function edit(id){
    $.ajax({
      url: "/api/category/"+id,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(response) {
        var mydata = response.data;
        $("#eid").val(id);
        $("#enm").val(mydata.name);
        $("#et").text("Edit "+mydata.name);
      }
    });
  }
  function hapus(id){
    $.ajax({
      url: "/api/category/"+id,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(response) {
        var mydata = response.data;
        $("#hi").val(id);
        $("#hd").text("Apakah anda yakin ingin menghapus "+mydata.name+"?");
      }
    });
  }
</script>

@endsection