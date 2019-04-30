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
            <h2 data-collapse='info'>
                <i class='fas fa-angle-double-down'></i>
                Main Info
            </h2>
        </header>

        <div data-collapse-c='info'>
            <article>
                <header>
                    <h2 data-collapse='basic'>
                        <i class='fas fa-angle-down'></i>
                        Basic
                    </h2>
                </header>

                <div class='info-basic' data-collapse-c='basic'>
                    <ul class='blank'>
                        <li>
                            <span class='info-basic__title'>Title</span>
                            <span class='info-basic__data'>{{$entry->name}}</span>
                        </li>
                        <li>
                            <span class='info-basic__title info-basic__title-date'>Release date</span>
                            <span class='info-basic__data'>
                                @include('components.date.display', ['timestamp' => $entry->release])
                            </span>
                        </li>

                        @if($entry->release - NOW < 60*60*24*14)
                            <li>
                                <span class='info-basic__title info-basic__title-date'>Time remaining</span>
                                <span class='info-basic__data'>
                                    @include('components.date.delay', ['timestamp' => $entry->release])
                                </span>
                            </li>
                        @endif

                        @if($entry->boxoffice)
                            <li>
                                <a class='info-basic__box' href='//www.boxofficemojo.com/movies/{{$entry->boxoffice}}' target='_blank'>
                                    View Box Office
                                    <i class='fas fa-external-link-alt'></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </article>

            <article>
                <header>
                    <h2 data-collapse='desc'>
                        <i class='fas fa-angle-down'></i>
                        Description
                    </h2>
                </header>

                <div data-collapse-c='desc'>
                    Cras ut ultricies dolor. Cras venenatis velit magna, quis tincidunt ante viverra porttitor. In sagittis elementum massa, at vehicula nisl laoreet sit amet. Etiam erat odio, accumsan vel erat et, aliquam tristique turpis. Donec sagittis rhoncus mi. Aliquam a aliquet mi. Donec porta vestibulum quam, vitae pharetra lacus finibus ut. Morbi efficitur ligula sed eros eleifend iaculis. Etiam pretium sem id lorem suscipit facilisis. In hac habitasse platea dictumst. Proin id nulla nisl. Donec ornare euismod ligula, vel lobortis justo pretium non. Aliquam porttitor, risus a vulputate tincidunt, ipsum urna cursus mauris, tristique rutrum leo mi in ipsum. Fusce et enim aliquet ante tincidunt mollis. Quisque condimentum quam vel libero lobortis rhoncus. Nulla facilisi.
                </div>
            </article>

            <article>
                <header>
                    <h2 data-collapse='rating'>
                        <i class='fas fa-angle-down'></i>
                        Rating
                    </h2>
                </header>

                <div class='info-rating' data-collapse-c='rating'>
                    @if(count($rating) > 0)
                        <p class='info-rating__sum'>avg. {{$avg}}&#47;10 from {{$count}} rates</p>
                        <div class='info-rating__graph'>
                            @foreach($rating as $date=>$rate)
                                <div class='info-rating__graph__entry' title='{{$rate * .1}}'>
                                    <div style='height: {{$rate}}%' data-date='{{date("Y-m-d H:i:s", $date)}}'></div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        Ratings not yet available
                    @endif
                </div>
            </article>

            <article>
                <header>
                    <h2 data-collapse='trailer'>
                        <i class='fas fa-angle-down'></i>
                        Trailers
                    </h2>
                </header>

                <div class='info-trailer' data-collapse-c='trailer'>
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
