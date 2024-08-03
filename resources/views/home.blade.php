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

    <style>
      @media (max-width: 992px) {
        .about {padding: 140px 0;}
      }
      #myTable_filter{display:none}
    </style>

    <div class="row">
      <div class="col-12 table-responsive">
        <table id="myTable" class="table table-striped border" style="min-width: 1000px">
          <thead>
            <tr>
              <th class="d-none">No</th>
              <th style="width: 100px">Rak</th>
              <th style="width: 150px">Nomor ordner</th>
              <th style="width: 150px">Tahun</th>
              <th>Nama arsip</th>
              <th style="width: 200px">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($books as $b)
              @php
                $updated = date_create($b->updated_at);
              @endphp
              <tr>
                <th class="d-none">{{$loop->iteration}}</th>
                <td>
                  {{-- <span class="badge bg-success">{{ $b->rack->name }}</span> --}}
                  {{ $b->rack->name }}
                </td>
                <td>{{ $b->outner }}</td>
                <td>{{ $b->year }}</td>
                <td>{{ $b->title }}</td>
                <td>
                  @if ($b->recap)
                    <a class="btn btn-sm btn-primary" target="_blank" href="/recap/{{ $b->recap }}">Detail</a>
                  @endif
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
    "serverSide": false,
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
    console.log(value);
  }

  $("#keyword").keyup(function(){
    setSearchValue();
  });
</script>
@endsection