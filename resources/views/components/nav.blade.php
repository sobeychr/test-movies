@php
    if(!defined('NAV_LINKS')) define('NAV_LINKS', [
        'home' => [
            'paths' => ['/', 'home'],
            'route' => 'home',
            'empty' => true,
        ],
        'movie' => [
            'paths' => ['movie'],
            'route' => 'movielist',
            'empty' => false,
        ],
        'user' => [
            'paths' => ['user'],
            'route' => 'userlist',
            'empty' => false,
        ],
    ]);

    $path = app('request')->path();
    $links = [];

    foreach(NAV_LINKS as $name => $entry)
    {
        extract($entry);

        if(!in_array($path, $paths)) {
            $links[$name] = route($route);
        }
        elseif(!$empty) {
            $links[$name] = false;
        }
    }
@endphp

<nav>
    @foreach($links as $name => $path)
        @if($path)
            <a href="{{$path}}">{{$name}}</a>
        @else
            <span>{{$name}}</span>
        @endif
    @endforeach
</nav>