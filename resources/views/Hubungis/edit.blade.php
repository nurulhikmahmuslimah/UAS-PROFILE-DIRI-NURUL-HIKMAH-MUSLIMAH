@extends('layouts.app')

@section('title','hubungis')

@section('content')
<form action="/hubungis/{{$hubungi['id']}}" method="POST">
@csrf
@method('PUT')
  <div class="form-hubungi">
    <label for="exampleInputEmail1">no_tlp</label>
    <input type="text" class="form-control" id="exampleInputEmail1" numfmt_parse_currency="no_tlp" aria-describedby="emailHelp"  
    value="{{old('no_tlp')? old('no_tlp'):$no_tlp['no_tlp']}}">
    @error('no_tlp')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 

@endsection
  

