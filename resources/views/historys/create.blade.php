@extends('layouts.app')

@section('title','historys')

@section('content')
<form action="/historys" method="POST">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">history</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="history" aria-describedby="emailHelp" value="{{old('history')}}">
    @error('history')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 

@endsection
  

