@extends('layouts.app')

@section('title', 'profil')

@section ('content')
<div class="card">
    <div class="card-body">
        <h3>nama : {{ $profil['nama'] }}</h3>
        <h3>ttl : {{ $profil['ttl'] }}</h3>
        <h3>alamat : {{ $profil['alamat'] }}</h3>
        
    </div>
</div>
@endsection