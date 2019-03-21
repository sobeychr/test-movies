@extends('layouts.list')

@section('asset')
    <link rel='stylesheet' type='text/css' href='/asset/css/list.css'>
@endsection

@section('title', 'Movie List')

@section('aside')
    <h1>movie list</h1>

    <nav>
        <span>Movie List</span>
        <a href='{{$userlist}}'>User List</a>
    </nav>
@endsection

@section('body')
    
@endsection

@section('footer')

@endsection