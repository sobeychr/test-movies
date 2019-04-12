@extends('layouts.default')

@section('page', 'list')

@section('body')
    <h2>@yield('type') List</h2>
    <nav>
        <ul>
            @each($component, $list, 'entry')
        </ul>
    </nav>
@endsection

@section('footer')
    <h3>footer</h3>
@endsection