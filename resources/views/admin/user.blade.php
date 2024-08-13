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
        <h3 class="card-title my-auto">Data User</h3>
        <button class="ml-auto btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah</button>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="table-responsive">
          <table id="myTable" class="table table-bordered" style="min-width: 800px">
            <thead>
              <tr>
                <th style="width: 10px">No.</th>
                <th>Nama user</th>
                <th>Username</th>
                <th>Role</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $u)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->username }}</td>
                <td>
                  @if ($u->role=="admin")
                  <span class="badge bg-primary">{{ $u->role }}</span>
                  @else
                  <span class="badge bg-success">{{ $u->role }}</span>
                  @endif
                </td>
                <td>
                  <button class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#edit" onclick="edit({{$u->id}})"><i class="fa fa-pen"></i></buuton>
                  <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus" onclick="hapus({{$u->id}})"><i class="fa fa-times"></i></buuton>
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
        <h4 class="modal-title">Tambah User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        @csrf
        <div class="modal-body">
          <div class="form-group row">
            <div class="col-8">
              <label>Nama user</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nama user..." required>
            </div>
            <div class="col-4">
              <label>Role</label>
              <select class="form-control" id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-6">
              <label>Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username..." required>
            </div>
            <div class="col-6">
              <label>Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-end">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
        <h4 class="modal-title" id="et">Edit User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        @csrf
        <input type="hidden" class="d-none" id="eid" name="id">
        <div class="modal-body">
          <div class="form-group row">
            <div class="col-8">
              <label>Nama user</label>
              <input type="text" class="form-control" id="enm" name="name" placeholder="Nama user..." required>
            </div>
            <div class="col-4">
              <label>Role</label>
              <select class="form-control" id="erl" name="role" required>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-5">
              <label>Username</label>
              <input type="text" class="form-control" id="eun" name="username" placeholder="Username..." required>
            </div>
            <div class="col-7">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
              <sub class="text-danger">*Kosongkan jika tidak ingin mengubah password</sub>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-end">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
        <h4 class="modal-title">Hapus User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        @csrf
        <input type="hidden" class="d-none" id="hi" name="id">
        <div class="modal-body">
          <p id="hd">Apakah anda yakin ingin menghapus User ini?</p>
          <p>Logbook dari user ini juga akan terhapus</p>
        </div>
        <div class="modal-footer justify-content-end">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
      url: "/api/user/"+id,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(response) {
        var mydata = response.data;
        $("#eid").val(id);
        $("#enm").val(mydata.name);
        $("#erl").val(mydata.role);
        $("#eun").val(mydata.username);
        $("#et").text("Edit "+mydata.name);
      }
    });
  }
  function hapus(id){
    $.ajax({
      url: "/api/user/"+id,
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