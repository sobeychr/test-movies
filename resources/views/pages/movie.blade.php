@extends('layouts.default')

@section('asset')
    <link rel='stylesheet' type='text/css' href='/asset/css/movie.css'>
    <script src='/asset/js/jquery.min.js'></script>
    <script src='/asset/js/movie.js'></script>
@endsection

@section('title', $entry->name)

@section('body')
    <h1>{{$entry->name}}</h1>
    <section>
    </section>
@endsection