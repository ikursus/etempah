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
      <th>STATUS</th>
      <th>ROLE</th>
      <th>TINDAKAN</th>
    </tr>
  </thead>

  <tbody>



    @foreach( $senarai_users as $user )
        <!-- Comment dalam HTML {{ $user->nama }} -->
        <?php // {{ $user->nama }}; ?>
        {{-- Ini komen $user->nama --}}

    <tr>
      <td>{{ $user->id}}</td>
      <td>{{ $user->nama }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->username }}</td>
      <td>{{ $user->status }}</td>
      <td>{{ $user->role }}</td>
      <td>
        <a href="{{ route('users.edit', ['id' => $user->id ]) }}" class="btn btn-sm btn-info">Edit</a>
        <button type="reset" class="btn btn-sm btn-danger">Delete</button>
      </td>
    </tr>
    @endforeach


  </tbody>
</table>

<p>Jumlah keseluruhan users: {{  $senarai_users->total() }}</p>

{{ $senarai_users->links() }}





@endsection
