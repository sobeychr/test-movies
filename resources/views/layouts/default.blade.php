<html>
    <head>
        <link rel='icon' href='/asset/image/favicon/favicon.png'>
        <title>@yield('title')</title>
        @component('components.assets')@endcomponent
    </head>
    <body>
        @component('components.aside')@endcomponent
        
        <main>
            @yield('body')
        </main>
        <footer>
            @yield('footer')
        </footer>
    </body>
</html>