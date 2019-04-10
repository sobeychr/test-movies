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
            <h2><i class='fas fa-angle-double-down' data-collapse='info'></i>Info</h2>
        </header>

        <article data-collapse='info'>
            <header>
                <h2><i class='fas fa-angle-down' data-collapse='basic'></i>Basic</h2>
            </header>

            <div data-collapse='basic'>
                Cras ut ultricies dolor. Cras venenatis velit magna, quis tincidunt ante viverra porttitor. In sagittis elementum massa, at vehicula nisl laoreet sit amet. Etiam erat odio, accumsan vel erat et, aliquam tristique turpis. Donec sagittis rhoncus mi. Aliquam a aliquet mi. Donec porta vestibulum quam, vitae pharetra lacus finibus ut. Morbi efficitur ligula sed eros eleifend iaculis. Etiam pretium sem id lorem suscipit facilisis. In hac habitasse platea dictumst. Proin id nulla nisl. Donec ornare euismod ligula, vel lobortis justo pretium non. Aliquam porttitor, risus a vulputate tincidunt, ipsum urna cursus mauris, tristique rutrum leo mi in ipsum. Fusce et enim aliquet ante tincidunt mollis. Quisque condimentum quam vel libero lobortis rhoncus. Nulla facilisi.
            </div>
        </article>
    </section>
@endsection