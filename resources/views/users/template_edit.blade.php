@extends('layouts/app')

@section('content')

@include('layouts/alerts')

<form method="POST" action="{{ route('users.update', ['id' => $user->id ]) }}">
    @csrf
    <input type="hidden" name="_method" value="PATCH">

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" required autofocus>

            @if ($errors->has('username'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $user->nama }}" required autofocus>

            @if ($errors->has('nama'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="no_kp" class="col-md-4 col-form-label text-md-right">{{ __('No KP') }}</label>

        <div class="col-md-6">
            <input id="no_kp" type="text" class="form-control{{ $errors->has('no_kp') ? ' is-invalid' : '' }}" name="no_kp" value="{{ $user->no_kp }}" required autofocus>

            @if ($errors->has('no_kp'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('no_kp') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
            <span class="help-block">NOTA: Biarkan kosong jika tidak mahu tukar password</span>
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

        <div class="col-md-6">
            <select name="role" class="form-control">
              <option value="user"{{ ($user->role == 'user') ? ' selected=selected' : '' }}>User</option>
              <option value="admin"{{ ($user->role == 'admin') ? ' selected=selected' : '' }}>Admin</option>
            </select>

            @if ($errors->has('role'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('role') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

        <div class="col-md-6">
            <select name="status" class="form-control">
              <option value="pending"{{ ($user->status == 'pending') ? ' selected=selected' : '' }}>Pending</option>
              <option value="active"{{ ($user->status == 'active') ? ' selected=selected' : '' }}>Active</option>
              <option value="banned"{{ ($user->status == 'banned') ? ' selected=selected' : '' }}>Banned</option>
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
                {{ __('Kemaskini') }}
            </button>
        </div>
    </div>
</form>

@endsection
