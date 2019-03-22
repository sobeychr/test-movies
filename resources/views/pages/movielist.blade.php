@extends('layouts.list')

@section('title', 'Movie List')

@section('loop')
    @foreach($list as $entry)
        <li>
            <a href='{{$entry->route}}'>
                <span class='id'>{{$entry->id}}</span>
                <span class='name'>{{$entry->name}}</span>
                <span class='release'>{{$entry->releaseString}}</span>
            </a>
        </li>
    @endforeach
@endsection