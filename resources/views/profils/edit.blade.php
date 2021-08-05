@extends('layouts.app')

@section('title','profils')

@section('content')
<form action="/profils/{{$profil['id']}}" method="POST">
@csrf
@method('PUT')
  <div class="form-profil">
    <label for="exampleInputEmail1">nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" numfmt_parse_currency="nama" aria-describedby="emailHelp"  
    value="{{old('nama')? old('nama'):$profil['nama']}}">
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-profil">
    <label for="exampleInputPassword1">ttl</label>
    <input type="text" class="form-control" name="ttl" id="exampleInputPassword1"
    value="{{old('ttl')? old('ttl'):$profil['ttl']}}">
    @error('ttl')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-profil">
    <label for="exampleInputPassword1">alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1"
    value="{{old('alamat')? old('alamat'):$profil['alamat']}}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 

@endsection
  

