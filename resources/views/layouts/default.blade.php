<html>
    <head>
        <link rel='icon' href='/asset/image/favicon/favicon.png'>
        <title>@yield('title')</title>
        @yield('asset')
    </head>
    <body>
        <aside>
            <h1>@yield('title')</h1>
            <nav>
                @isset($nav['home'])
                    <a href="{{$nav['home']}}">home</a>
                @endisset

                @isset($nav['movie'])
                    <a href="{{$nav['movie']}}">Movie List</a>
                @else
                    <span>Movie List</span>
                @endisset

                @isset($nav['user'])
                    <a href="{{$nav['user']}}">User List</a>
                @else
                    <span>User List</span>
                @endisset
            </nav>
        </aside>
        <main>
            @yield('body')
        </main>
        <footer>
            @yield('footer')
        </footer>
    </body>
</html>