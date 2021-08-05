@extends('layouts.app')

@section('title','historys')

@section('content')
<form action="/historys/{{$history['id']}}" method="POST">
@csrf
@method('PUT')
  <div class="form-history">
    <label for="exampleInputEmail1">history</label>
    <input type="text" class="form-control" id="exampleInputEmail1" numfmt_parse_currency="history" aria-describedby="emailHelp"  
    value="{{old('history')? old('history'):$history['history']}}">
    @error('history')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 

@endsection
  

