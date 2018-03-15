@extends('layouts/app')

@section('content')
@include('layouts/alerts')
<p>
  <a href="{{ route('kenderaan.create') }}" class="btn btn-primary">Tambah</a>
</p>

<div>
  <form method="GET" action="{{ route('kenderaan.show') }}">
    @csrf
    <div class="form-group">
      <label>Cari Kenderaan (No. PLAT)</label>
      <input type="text" name="no_plat" class="form-control">
    </div>
    <div>
      <button type="submit" class="btn btn-primary">Cari &amp; Edit</button>
    </div>
  </form>
</div>

<hr>

@if ( count( $senarai_kenderaan ) )

<table class="table table-bordered">

  <thead>
    <tr>
      <th>ID</th>
      <th>JENIS</th>
      <th>MODEL</th>
      <th>NO PLAT</th>
      <th>GAMBAR</th>
      <th>STATUS</th>
      <th>TINDAKAN</th>
    </tr>
  </thead>

  <tbody>

    @foreach( $senarai_kenderaan as $kenderaan )
    <tr>
      <td>{{ $kenderaan->id }}</td>
      <td>{{ $kenderaan->jenis }}</td>
      <td>{{ $kenderaan->model }}</td>
      <td>{{ $kenderaan->no_plat }}</td>
      <td>{{ $kenderaan->gambar }}</td>
      <td>{{ $kenderaan->status }}</td>
      <td>
        <a href="{{ route('kenderaan.edit', ['id' => $kenderaan->id ]) }}" class="btn btn-sm btn-info">Edit</a>
        <button type="reset" class="btn btn-sm btn-danger">Delete</button>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

@else
<div class="alert alert-info">
  Tiada rekod kenderaan dijumpai
</div>
@endif

@endsection
