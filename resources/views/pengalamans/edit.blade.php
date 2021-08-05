@extends('layouts.app')

@section('title','pengalamans')

@section('content')
<form action="/pengalamans/{{$pengalaman['id']}}" method="POST">
@csrf
@method('PUT')
  <div class="form-pengalaman">
    <label for="exampleInputEmail1">pengalaman</label>
    <input type="text" class="form-control" id="exampleInputEmail1" numfmt_parse_currency="pengalaman" aria-describedby="emailHelp"  
    value="{{old('pengalaman')? old('pengalaman'):$pengalaman['pengalaman']}}">
    @error('pengalaman')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 

@endsection
  

