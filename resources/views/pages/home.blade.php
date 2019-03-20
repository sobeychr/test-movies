@extends('layouts.default')

@section('asset')
@endsection

@section('title', 'Home')

@section('body')
    <h1>home</h1>

    <nav>
        <a href="{{$movielist}}">Movie List</a>
        <a href="{{$userlist}}">User List</a>
    </nav>
@endsection