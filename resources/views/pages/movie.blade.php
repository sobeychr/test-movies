@extends('layouts.default')

@section('asset')
    <script src='/asset/js/jquery.min.js'></script>
    <script src='/asset/js/movie.js'></script>
@endsection

@section('body')
    <h1>{{$entry->name}}</h1>
    <section>
    </section>
@endsection