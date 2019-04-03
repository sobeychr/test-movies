@extends('layouts.default')

@section('asset')
    <link rel='stylesheet' type='text/css' href='/asset/css/list.css'>
@endsection

@section('body')
    <h2>@yield('type') List</h2>
    <nav>
        <ul>
            @each($component, $list, 'entry')
        </ul>
    </nav>
@endsection