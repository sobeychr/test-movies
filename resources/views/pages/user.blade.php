@extends('layouts.default')

@section('page', 'user')

@section('title', $entry->name)

@section('body')
    <h1>
        <span class='title'>{{$entry->title}}</span>
        <span class='first'>{{$entry->first}}</span>
        <span class='last'>{{$entry->last}}</span>
    </h1>
    <section>
        <h2>Rating</h2>
        <p>Rate: {{$entry->rating}}</p>
        <p>{{$entry->total}} votes</p>
    </section>
@endsection

@section('footer')
    <h3>footer</h3>
@endsection