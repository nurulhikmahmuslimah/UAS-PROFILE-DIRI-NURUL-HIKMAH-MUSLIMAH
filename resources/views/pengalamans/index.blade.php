@extends('layouts.app')

@section('title','pengalamans')

@section('content')
<a href="/pengalamans/create" class="card-link btn-primary">Tambah Daftar pengalaman</a>
@foreach ($pengalamans as $pengalaman)
<div class="card" style="width: 20rem;">
  <div class="card-body">
    <a href="/pengalamans/{{$pengalaman['id']}}"class="card-title">{{ $pengalaman['pengalaman'] }}</a>
  
    <a href="/pengalamans/{{$pengalaman['id']}}/edit" class="card-link btn-warning">Edit Data pengalaman</a>
    <form action="/pengalamans/{{$pengalaman['id']}}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete pengalaman</button>
    </form>
  </div>
</div>
   
@endforeach
{{$pengalamans->links()}}
@endsection