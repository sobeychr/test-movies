@extends('layouts.error')

@isset($title)
    @section('title', $title)
@else
    @section('title', '404')
@endif

@isset($description)
    @section('description', $description)
@else
    @section('description', 'Page not found')
@endif