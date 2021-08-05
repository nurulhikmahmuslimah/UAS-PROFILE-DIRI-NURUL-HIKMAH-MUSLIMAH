@extends('layouts.app')

@section('title','historys')

@section('content')
<a href="/historys/create" class="card-link btn-primary">Tambah Daftar history </a>
@foreach ($historys as $history)
<div class="card" style="width: 20rem;">
  <div class="card-body">
    <a href="/historys/{{$history['id']}}"class="card-title">{{ $history['history'] }}</a>

    <a href="/historys/{{$history['id']}}/edit" class="card-link btn-warning">Edit Data history</a>
    <form action="/historys/{{$history['id']}}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete history</button>
    </form>
  </div>
</div>
   
@endforeach
{{$historys->links()}}
@endsection