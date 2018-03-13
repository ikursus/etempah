@extends('layouts/app')

@section('content')

<p>
  <a href="{{ route('kenderaan.create') }}" class="btn btn-primary">Tambah</a>
</p>

<table class="table table-bordered">

  <thead>
    <tr>
      <th>ID</th>
      <th>MODEL</th>
      <th>NO PLAT</th>
      <th>STATUS</th>
      <th>TINDAKAN</th>
    </tr>
  </thead>

  <tbody>

    @foreach( $senarai_kenderaan as $kenderaan )
    <tr>
      <td>{{ $kenderaan['id'] }}</td>
      <td>{{ $kenderaan['model'] }}</td>
      <td>{{ $kenderaan['no_plat'] }}</td>
      <td>{{ $kenderaan['status'] }}</td>
      <td>
        <a href="{{ route('kenderaan.edit', ['id' => $kenderaan['id'] ]) }}" class="btn btn-sm btn-info">Edit</a>
        <button type="reset" class="btn btn-sm btn-danger">Delete</button>
      </td>
    </tr>
    @endforeach


  </tbody>
</table>

@endsection
