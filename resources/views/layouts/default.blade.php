<html>
    <head>
        <link rel='icon' href='/asset/image/favicon/favicon.png'>
        <title>@yield('title')</title>
        <link rel='stylesheet' type='text/css' href='/asset/css/fontawesome.min.css'>
        <link rel='stylesheet' type='text/css' href='/asset/css/@yield('page').css'>
        <script src='/asset/js/jquery.min.js'></script>
        <script src='/asset/js/@yield('page').js'></script>
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