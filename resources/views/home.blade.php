@extends('layouts.default')

@section('asset')
@endsection

@section('title', 'Home')

@section('body')
    <h1>home</h1>

    <nav>
        <a href="{{$movieList}}">Movie List</a>
        <a href="{{$userList}}">User List</a>
    </nav>
@endsection