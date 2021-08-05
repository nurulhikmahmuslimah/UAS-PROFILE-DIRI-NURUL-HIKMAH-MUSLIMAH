@extends('layouts.app')

@section('title','historys')

@section('content')
<form action="/historys" method="POST">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">no_tlp</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="no_tlp" aria-describedby="emailHelp" value="{{old('no_tlp')}}">
    @error('no_tlp')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 

@endsection
  

