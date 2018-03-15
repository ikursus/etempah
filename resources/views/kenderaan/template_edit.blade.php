@extends('layouts/app')

@section('content')

  @include('layouts/alerts')

  <form method="POST" action="{{ route('kenderaan.update', ['id' => $kenderaan->id ]) }}" enctype="multipart/form-data">

    {{ csrf_field() }}
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PATCH">

    <div class="form-group row">
        <label for="jenis" class="col-md-4 col-form-label text-md-right">{{ __('JENIS') }}</label>

        <div class="col-md-6">
            <input id="jenis" type="text" class="form-control{{ $errors->has('jenis') ? ' is-invalid' : '' }}" name="jenis" value="{{ $kenderaan->jenis }}" required autofocus>

            @if ($errors->has('jenis'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('jenis') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="model" class="col-md-4 col-form-label text-md-right">{{ __('MODEL') }}</label>

        <div class="col-md-6">
            <input id="model" type="text" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" name="model" value="{{ $kenderaan->model }}" required autofocus>

            @if ($errors->has('model'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('model') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="no_plat" class="col-md-4 col-form-label text-md-right">{{ __('NO PLAT') }}</label>

        <div class="col-md-6">
            <input id="no_plat" type="text" class="form-control{{ $errors->has('no_plat') ? ' is-invalid' : '' }}" name="no_plat" value="{{ $kenderaan->no_plat }}" required autofocus>

            @if ($errors->has('no_plat'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('no_plat') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

        <div class="col-md-6">
            <select name="status" class="form-control">
              <option value="available"{{ ($kenderaan->status == 'available') ? 'selected=selected' : '' }}>Available</option>
              <option value="booked"{{ ($kenderaan->status == 'booked') ? 'selected=selected' : '' }}>Booked</option>
            </select>

            @if ($errors->has('status'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('GAMBAR') }}</label>

        <div class="col-md-6">
            <input type="file" name="gambar">

            @if ($errors->has('gambar'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('gambar') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Kemaskini') }}
            </button>
        </div>
    </div>
</form>

@endsection
