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
      <td>
        @if( $kenderaan->gambar )
        <img src="/uploads/{{ $kenderaan->gambar }}" style="max-width: 300px">
        @else
        Tiada Gambar
        @endif
      </td>
      <td>{{ $kenderaan->status }}</td>
      <td>
        <a href="{{ route('kenderaan.edit', ['id' => $kenderaan->id ]) }}" class="btn btn-sm btn-info">Edit</a>
        <!-- Button trigger modal delete -->
        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $kenderaan->id }}">
          Delete
        </button>


        <!-- Modal delete -->
        <form method="POST" action="{{ route('kenderaan.destroy', ['id' => $kenderaan->id] ) }}">
          @csrf
          <input type="hidden" name="_method" value="DELETE">

        <div class="modal fade" id="modal-delete-{{ $kenderaan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengesahan Delete Maklumat {{ $kenderaan->id }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <p>Adakah anda bersetuju untuk menghapuskan akaun {{ $kenderaan->jenis }}?

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

@else
<div class="alert alert-info">
  Tiada rekod kenderaan dijumpai
</div>
@endif

@endsection
