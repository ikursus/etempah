@extends('layouts/app')

@section('content')

@include('layouts/alerts')

<h1> {{ $headline }}</h1>
<hr>
@if( Auth::user()->role == 'admin')
<p>Selamat Datang Admin Yang Hebat {{ Auth::user()->nama }}!</p>
@else
<p>Selamat Datang User {{ Auth::user()->nama }}</p>
@endif
<p>
<img src="{{ asset('/images/avatar.png') }}" title="avatar">
<img src="/images/avatar2.png" title="avatar">
</p>

@endsection
