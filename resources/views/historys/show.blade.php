@extends('layouts.app')

@section('title', 'history')

@section ('content')
<div class="card">
    <div class="card-body">
        <h3>history : {{ $history['history'] }}</h3>
        
    </div>
</div>
@endsection