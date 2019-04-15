@php
    $trailers = [];

    for($i=1; $i<=3; $i++)
    {
        $e = 'trailer' . $i;
        if($entry->$e) {
            $trailers[] = $entry->$e;
        }
    }
@endphp

@extends('layouts.default')

@section('page', 'movie')

@section('title', $entry->name)

@section('body')
    <section class='info'>
        <header>
            <h2><i class='fas fa-angle-double-down' data-collapse='info'></i>Main Info</h2>
        </header>

        <div data-collapse='info'>
            <article>
                <header>
                    <h2><i class='fas fa-angle-down' data-collapse='basic'></i>basic</h2>
                </header>

                <div class='info-basic' data-collapse='basic'>
                    <ul>
                        <li>
                            <span class='info-basic__title'>Title</span>
                            <span class='info-basic__data'>{{$entry->name}}</span>
                        </li>
                        <li>
                            <span class='info-basic__title'>Release date</span>
                            <span class='info-basic__data'>{{$entry->release}}</span>
                        </li>
                        <li>
                            <span class='info-basic__title'>Time remaining</span>
                            <span class='info-basic__data'>00:00:00</span>
                        </li>
                        <li>
                            <span class='info-basic__title'>
                                <a href='//www.boxofficemojo.com/movies/{{$entry->boxoffice}}' target='_blank'>
                                    View Box Office
                                </a>
                            </span>
                        </li>
                    </ul>
                </div>
            </article>

            <article>
                <header>
                    <h2><i class='fas fa-angle-down' data-collapse='desc'></i>Description</h2>
                </header>

                <div data-collapse='desc'>
                    Cras ut ultricies dolor. Cras venenatis velit magna, quis tincidunt ante viverra porttitor. In sagittis elementum massa, at vehicula nisl laoreet sit amet. Etiam erat odio, accumsan vel erat et, aliquam tristique turpis. Donec sagittis rhoncus mi. Aliquam a aliquet mi. Donec porta vestibulum quam, vitae pharetra lacus finibus ut. Morbi efficitur ligula sed eros eleifend iaculis. Etiam pretium sem id lorem suscipit facilisis. In hac habitasse platea dictumst. Proin id nulla nisl. Donec ornare euismod ligula, vel lobortis justo pretium non. Aliquam porttitor, risus a vulputate tincidunt, ipsum urna cursus mauris, tristique rutrum leo mi in ipsum. Fusce et enim aliquet ante tincidunt mollis. Quisque condimentum quam vel libero lobortis rhoncus. Nulla facilisi.
                </div>
            </article>

            <article>
                <header>
                    <h2><i class='fas fa-angle-down' data-collapse='trailer'></i>Trailers</h2>
                </header>

                <div class='info-trailer' data-collapse='trailer'>
                    @foreach($trailers as $id)
                    <div>
                        <iframe src='https://www.youtube.com/embed/{{$id}}' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                    </div>
                    @endforeach
                </div>
            </article>
        </div>
    </section>
@endsection
