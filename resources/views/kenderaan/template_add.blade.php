@extends('layouts/app')

@section('content')

  <form method="POST" action="{{ route('kenderaan.store') }}">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('MODEL') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" name="model" value="{{ old('model') }}" required autofocus>

            @if ($errors->has('model'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('model') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('NO PLAT') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('no_plat') ? ' is-invalid' : '' }}" name="no_plat" value="{{ old('no_plat') }}" required autofocus>

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
              <option value="pending">Available</option>
              <option value="active">Booked</option>
            </select>

            @if ($errors->has('status'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Tambah') }}
            </button>
        </div>
    </div>
</form>

@endsection
