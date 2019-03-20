@extends('layouts.default')

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