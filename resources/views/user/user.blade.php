@extends('layouts.user')

@section('asset')
    
@endsection

@section('fullname')
    {{ $first . ' ' . $last }}
@endsection

@section('content')
    <section>
        <h2>Rating</h2>
        <p>Rate: {{$rating}}</p>
        <p>{{$total}} votes</p>
    </section>
@endsection