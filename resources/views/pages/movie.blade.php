@extends('layouts.default')

@section('asset')
    <link rel='stylesheet' type='text/css' href='/asset/css/movie.css'>
    <link rel='stylesheet' type='text/css' href='/asset/css/fontawesome.min.css'>
    <script src='/asset/js/jquery.min.js'></script>
    <script src='/asset/js/movie.js'></script>
@endsection

@section('title', $entry->name)

@section('body')
    <section class='info'>
        <header>
            <i class='fas fa-angle-double-down'></i>
            <h2>Info</h2>
        </header>

        <article>
            <header>
                <i class='fas fa-angle-down'></i>
                <h2>Basic</h2>
            </header>
        </article>
    </section>
@endsection