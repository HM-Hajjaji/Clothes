<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}" defer></script>
    @yield('style')
</head>
<body class="hold-transition @yield('class-navigation','sidebar-mini')">
    <div class="wrapper">
        @yield("content")

        @include('layouts.footer')
    </div>
</body>
</html>
