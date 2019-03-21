@extends('layouts.default')

@section('asset')
    <link rel='stylesheet' type='text/css' href='/asset/css/list.css'>
@endsection

@section('body')
    <h1>@yield('type') List</h1>
    <nav>
        <ul>
            @foreach($list as $entry)
                <li>
                    <a href="{{$entry->route}}">{{$entry->name}}</a>
                </li>
            @endforeach
        </ul>
    </nav>
@endsection