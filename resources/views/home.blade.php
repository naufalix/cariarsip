@extends('layouts.index')

@section('hero')
  @include('sections.hero')
@endsection

@section('content')

<section class="about">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Data Arsip</h2>
    </div>

    <div class="row">
      <div class="col-12">
        <table id="myTable" class="table table-striped border">
          <thead>
            <tr>
              <th>Nama arsip</th>
              <th style="width: 100px">Kode</th>
              <th style="width: 150px">Rak</th>
              <th style="width: 200px">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($books as $b)
              @php
                $updated = date_create($b->updated_at);
              @endphp
              <tr>
                <td>{{ $b->name }}</td>
                <td>{{ $b->code }}</td>
                <td>
                  <span class="badge bg-success">{{ $b->rack->name }}</span>
                </td>
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
    

  </div>
</section><!-- End About Us Section -->
@endsection

@section('script')
<script>
  var table = $('#myTable').DataTable({
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All Pages"]],
    "pageLength": 25,
    "language": {
      "paginate": {
        "previous": "<",
        "next": ">"
      }
    }
  });

  // Fungsi untuk menetapkan nilai dari input pencarian
  function setSearchValue() {
    var value = $('#keyword').val();
    var searchInput = $('#myTable_filter input[type="search"]');
    if (searchInput.length) {
      searchInput.val(value);
      table.search(value).draw();
    }
  }

</script>
@endsection