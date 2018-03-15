@extends('layouts/app')

@section('content')
@include('layouts/alerts')
<p>
  <a href="{{ route('kenderaan.create') }}" class="btn btn-primary">Tambah</a>
  <a href="{{ route('kenderaan.export') }}" class="btn btn-warning">Export</a>
</p>

<table class="table table-bordered" id="kenderaan-table">

  <thead>
    <tr>
      <th>BIL</th>
      <th>ID</th>
      <th>JENIS</th>
      <th>MODEL</th>
      <th>NO PLAT</th>
      <th>GAMBAR</th>
      <th>STATUS</th>
      <th>TINDAKAN</th>
    </tr>
  </thead>

</table>

@endsection


@section('script')
<script>
$(function() {
    $('#kenderaan-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('kenderaan.datatables') !!}',
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index', orderable: false, searchable: false},
            { data: 'id', name: 'id' },
            { data: 'jenis', name: 'jenis' },
            { data: 'model', name: 'model' },
            { data: 'no_plat', name: 'no_plat' },
            { data: 'gambar', name: 'gambar' },
            { data: 'status', name: 'status' },
            { data: 'tindakan', name: 'tindakan', orderable: false, searchable: false}
        ]
    });
});
</script>
@endsection
