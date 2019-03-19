<html>
    <head>
        <title>User profile - @yield('fullname')</title>
        @yield('asset')
    </head>
    <body>
        <h1>{{$title}}. @yield('fullname')</h1>

        @yield('content')
    </body>
</html>