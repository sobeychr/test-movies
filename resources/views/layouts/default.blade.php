<html>
    <head>
        <link rel='icon' href='/asset/image/favicon/favicon.png'>
        <title>@yield('title')</title>
        @yield('asset')
    </head>
    <body>
        <aside>
            @yield('aside')
        </aside>
        <main>
            @yield('body')
        </main>
        <footer>
            @yield('footer')
        </footer>
    </body>
</html>