@extends('layouts.default')

@section('body')
    <h1>@yield('type') List</h1>
    <nav>
        <ul>
            @foreach($list as $entry)
                <li>
                    <a href="{{$entry['link']}}">{{$entry['name']}}</a>
                </li>
            @endforeach
        </ul>
    </nav>
@endsection