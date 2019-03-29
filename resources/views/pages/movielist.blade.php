@extends('layouts.list')

@section('title', 'Movie List')

@section('loop')
    @foreach($list as $entry)
        <li>
            {{ $entry->id }}
        </li>
    @endforeach
@endsection