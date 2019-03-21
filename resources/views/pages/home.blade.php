@extends('layouts.default')

@section('asset')
    <link rel='stylesheet' type='text/css' href='/asset/css/home.css'>
@endsection

@section('title', 'Home')

@section('aside')
    <h1>home</h1>

    <nav>
        <a href='{{$movielist}}'>Movie List</a>
        <a href='{{$userlist}}'>User List</a>
    </nav>
@endsection

@section('body')
    
@endsection

@section('footer')

@endsection