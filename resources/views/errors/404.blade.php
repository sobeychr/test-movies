@extends('layouts.default')

@section('asset')
    <link rel='stylesheet' type='text/css' href='/asset/css/404.css'>
@endsection

@section('title', '404')

@section('body')
    @isset($viewtype)
        <h1>{{$viewType}} not found</h1>
    @else
        <h1>page not found</h1>
    @endisset
@endsection