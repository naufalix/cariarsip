@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>{{ $title }}</h1>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex">
        <h3 class="card-title my-auto">Data Arsip</h3>
        <button class="ml-auto btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah</button>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive">
          <table id="myTable" class="table table-bordered" style="min-width: 800px">
            <thead>
              <tr>
                <th style="width: 10px">No.</th>
                <th>Nama arsip</th>
                <th style="width: 100px">Kode</th>
                <th style="width: 150px">Rak</th>
                <th style="width: 200px">Terakhir diubah</th>
                <th style="width: 200px">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($books as $b)
              @php
                  $updated = date_create($b->updated_at);
              @endphp
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $b->name }}</td>
                <td>{{ $b->code }}</td>
                <td>
                  <span class="badge bg-success">{{ $b->rack->name }}</span>
                </td>
                <td>{{ date_format($updated,"d F Y H:i") }}</td>
                <td>
                  <button class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#edit" onclick="edit({{$b->id}})"><i class="fa fa-pen"></i></buuton>
                  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus" onclick="hapus({{$b->id}})"><i class="fa fa-times"></i></buuton>
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
        <h4 class="modal-title">Tambah Arsip</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Nama arsip</label>
            <input class="form-control" name="name" id="name" required>
          </div>
          <div class="form-group row">
            <div class="col-6">
              <label>Kode arsip</label>
              <input type="number" class="form-control" id="code" name="code" required>
            </div>
            <div class="col-6">
              <label>Pilih Rak</label>
              <select class="form-control" id="rack_id" name="rack_id" required>
                @foreach ($racks as $r)
                  <option value="{{$r->id}}">{{$r->name}}</option>
                @endforeach
              </select>
            </div>
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
        <h4 class="modal-title" id="et">Edit Arsip</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        @csrf
        <input type="hidden" class="d-none" id="eid" name="id">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama arsip</label>
            <input class="form-control" name="name" id="enm" required>
          </div>
          <div class="form-group row">
            <div class="col-6">
              <label>Kode arsip</label>
              <input type="number" class="form-control" id="ecd" name="code" required>
            </div>
            <div class="col-6">
              <label>Pilih Rak</label>
              <select class="form-control" id="eri" name="rack_id" required>
                @foreach ($racks as $r)
                  <option value="{{$r->id}}">{{$r->name}}</option>
                @endforeach
              </select>
            </div>
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
        <h4 class="modal-title">Hapus Arsip</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        @csrf
        <input type="hidden" class="d-none" id="hi" name="id">
        <div class="modal-body">
          <p id="hd">Apakah anda yakin ingin menghapus Arsip ini?</p>
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
      url: "/api/book/"+id,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(response) {
        var mydata = response.data;
        $("#eid").val(id);
        $("#enm").val(mydata.name);
        $("#ecd").val(mydata.code);
        $("#eri").val(mydata.rack_id);
        $("#et").text("Edit "+mydata.name);
      }
    });
  }
  function hapus(id){
    $.ajax({
      url: "/api/book/"+id,
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