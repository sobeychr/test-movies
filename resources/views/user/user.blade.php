@extends('layouts.user')

@section('asset')
    <script src='/asset/js/jquery.min.js'></script>
    <script src='/asset/js/user.js'></script>
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