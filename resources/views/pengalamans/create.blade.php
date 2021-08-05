@extends('layouts.app')

@section('title','pengalamans')

@section('content')
<form action="/pengalamans" method="POST">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">pengalaman</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="pengalaman" aria-describedby="emailHelp" value="{{old('pengalaman')}}">
    @error('pengalaman')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 

@endsection
  

