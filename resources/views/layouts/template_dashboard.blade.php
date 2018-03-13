@extends('layouts/app')

@section('content')

<h1> {{ $headline }}</h1>
<hr>
<p>Selamat Datang {{ $nama }}!</p>
<p>
<img src="{{ asset('/images/avatar.png') }}" title="avatar">
<img src="/images/avatar2.png" title="avatar">
</p>

@endsection
