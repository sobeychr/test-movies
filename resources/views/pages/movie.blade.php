@php
    use App\Component\DateDelay;
    use App\Component\RateGraph;

    $isBeforeDelay = DateDelay::isBeforeDelay(NOW - $entry->release);

    $count = $rate->getCount();
    $rows  = $rate->getRows();

    $trailers = $entry->getTrailers();
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

                        @if($isBeforeDelay)
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
                    @if($isBeforeDelay)
                        Ratings not yet available
                    @else
                        @if($rate->isEmpty())
                            No ratings yet
                        @else
                            <p class='info-rating__sum'>
                                <span class='info-rating__sum__title'>Summary:</span>
                                avg.
                                <span class='info-rating__sum__rate'>{{$rate->getAvg()}}&#37;</span>
                                over
                                <span class='info-rating__sum__votes'>{{$count}}</span>
                                votes
                            </p>
                            <div class='info-rating__row'>
                                @foreach($rows as $vote => $row)
                                    @php
                                        $percent = round($row / $count * 100, 2);
                                        $rowClass = RateGraph::getRowClass($row);

                                        // RateGraph::getRowClass();
                                        /*
                                        <span class='info-rating__row__entry__vote'>{{$vote}}</span>
                                        <span class='info-rating__row__entry__sum'>{{$row}} &#47; {{$count}} - {{$percent}}&#37;</span>
                                         */
                                    @endphp
                                    <div class='info-rating__row__entry'>
                                        <div class='info-rating__row__entry__bar {{$rowClass}}' style='width: {{$percent}}%'></div>
                                        <p class='info-rating__row__entry__sum'>
                                            {{$count}} voted
                                            <span class='info-rating__row__entry__vote'>{{$vote}}</span>
                                            <span class='info-rating__row__entry__percent'>{{$percent}}&#37;</span>
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
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
                    @empty($trailers)
                        No trailers yet
                    @else
                        @foreach($trailers as $id)
                        <div>
                            <iframe src='https://www.youtube.com/embed/{{$id}}' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                        </div>
                        @endforeach
                    @endif
                </div>
            </article>
        </div>
    </section>
@endsection
