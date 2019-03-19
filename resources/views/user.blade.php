@extends('layouts.default')

@section('asset')
    <script src='/asset/js/jquery.min.js'></script>
    <script src='/asset/js/user.js'></script>
@endsection

@section('title')
    {{ $title . '. ' .$first . ' ' . $last }}
@endsection

@section('fullname')
    {{ $first . ' ' . $last }}
@endsection

@section('body')
    <h1>@yield('fullname')</h1>
    <section>
        <h2>Rating</h2>
        <p>Rate: {{$rating}}</p>
        <p>{{$total}} votes</p>
    </section>
@endsection