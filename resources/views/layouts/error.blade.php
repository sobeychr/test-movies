@extends('layouts.default')

@section('asset')
    <link rel='stylesheet' type='text/css' href='/asset/css/list.css'>
@endsection

@section('title', 'error')

@section('body')
    <h1>@yield('title')</h1>
    @yield('description')
@endsection