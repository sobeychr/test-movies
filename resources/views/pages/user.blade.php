@extends('layouts.default')

@section('asset')
    <script src='/asset/js/jquery.min.js'></script>
    <script src='/asset/js/user.js'></script>
@endsection

@section('body')
    <h1>
        <span class='title'>{{$entry->title}}</span>
        <span class='first'>{{$entry->first}}</span>
        <span class='last'>{{$entry->last}}</span>
    </h1>
    <section>
        <h2>Rating</h2>
        <p>Rate: {{$entry->rating}}</p>
        <p>{{$entry->total}} votes</p>
    </section>
@endsection