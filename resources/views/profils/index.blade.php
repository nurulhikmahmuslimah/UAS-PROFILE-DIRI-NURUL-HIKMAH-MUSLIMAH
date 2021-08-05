@extends('layouts.app')

@section('title','profils')

@section('content')
<a href="/profils/create" class="card-link btn-primary">Tambah Daftar profil</a>
@foreach ($profils as $profil)
<div class="card" style="width: 20rem;">
  <div class="card-body">
    <a href="/profils/{{$profil['id']}}"class="card-title">{{ $profil['nama'] }}</a>
    <p class="card-text">{{ $profil['ttl'] }}.</p>
    <p class="card-text">{{ $profil['alamat'] }}.</p>
  
    <a href="/profils/{{$profil['id']}}/edit" class="card-link btn-warning">Edit Data profil</a>
    <form action="/profils/{{$profil['id']}}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete profil</button>
    </form>
  </div>
</div>
   
@endforeach
<div>
{{$profils->links()}}
</div>
@endsection