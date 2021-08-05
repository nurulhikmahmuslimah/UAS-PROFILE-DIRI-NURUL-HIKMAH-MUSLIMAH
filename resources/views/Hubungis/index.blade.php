@extends('layouts.app')

@section('title','hubungis')

@section('content')
<a href="/hubungis/create" class="card-link btn-primary">Tambah Daftar hubungi</a>
@foreach ($hubungis as $hubungi)
<div class="card" style="width: 20rem;">
  <div class="card-body">
    <a href="/hubungis/{{$hubungi['id']}}"class="card-title">{{ $hubungi['no_tlp'] }}</a>
  
    <a href="/hubungis/{{$hubungi['id']}}/edit" class="card-link btn-warning">Edit Data hubungi</a>
    <form action="/hubungis/{{$hubungi['id']}}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete hubungi</button>
    </form>
  </div>
</div>
   
@endforeach
{{$hubungis->links()}}
@endsection