<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>   @yield('title')</title>
        <!-- Font Icon -->
        <link rel="stylesheet" href="{{URL::asset('frontend/auth/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

        <!-- CSS -->
        <link rel="stylesheet" href="{{URL::asset('frontend/auth/css/auth.css')}}">
        @yield('css')
    </head>
    <body>
    <div class="main">
        @yield('content')
    </div>

    </body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{URL::asset('frontend/auth/js/main.js')}}"></script>
        @yield('scripts')
</html>
