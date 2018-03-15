@extends('layouts/app')

@section('content')

@include('layouts/alerts')
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

        <!-- Button trigger modal delete -->
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $user->id }}">
          Delete
        </button>


        <!-- Modal delete -->
        <form method="POST" action="{{ route('users.destroy', ['id' => $user->id] ) }}">
          @csrf
          <input type="hidden" name="_method" value="DELETE">

        <div class="modal fade" id="modal-delete-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengesahan Delete Akaun {{ $user->nama }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <p>Adakah anda bersetuju untuk menghapuskan akaun {{ $user->nama }}?

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
              </div>
            </div>
          </div>
        </div>

        </form>

      </td>
    </tr>
    @endforeach


  </tbody>
</table>

<p>Jumlah keseluruhan users: {{  $senarai_users->total() }}</p>

{{ $senarai_users->links() }}





@endsection
