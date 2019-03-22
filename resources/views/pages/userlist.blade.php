@extends('layouts.list')

@section('title', 'User List')

@section('loop')
    @foreach($list as $entry)
        <li>
            <a href='{{$entry->route}}'>
                <span class='id'>{{$entry->id}}</span>
                <span class='name'>{{$entry->name}}</span>
            </a>
        </li>
    @endforeach
@endsection