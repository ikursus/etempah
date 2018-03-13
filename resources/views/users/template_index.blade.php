@extends('layouts/app')

@section('content')

<p>
  <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah</a>
</p>

<table class="table table-bordered">

  <thead>
    <tr>
      <th>ID</th>
      <th>NAMA</th>
      <th>EMAIL</th>
      <th>USERNAME</th>
      <th>TINDAKAN</th>
    </tr>
  </thead>

  <tbody>

    @foreach( $senarai_users as $user )
    <tr>
      <td>{{ $user['id'] }}</td>
      <td>{{ $user['nama'] }}</td>
      <td>{{ $user['email'] }}</td>
      <td>{{ $user['username'] }}</td>
      <td>
        <a href="{{ route('users.edit', ['id' => $user['id'] ]) }}" class="btn btn-sm btn-info">Edit</a>
        <button type="reset" class="btn btn-sm btn-danger">Delete</button>
      </td>
    </tr>
    @endforeach


  </tbody>
</table>

@endsection
