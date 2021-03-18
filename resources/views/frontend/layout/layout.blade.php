<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamrakisan</title>
    @yield('og')
    <link rel="icon" href="{{URL::asset('frontend/img/logo.png')}}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/fontawesome.min.css')}}">
    @yield('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/main.css')}}"><!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143020627-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-143020627-1');
    </script>

</head>
<body>
    @include('frontend.layout.navigation')
        @yield('content')
    @include('frontend.layout.footer')
    <!-- side fixed buttons -->
    <ul class="notifiers vertical-flex sticky">
        <li class="event-notifications">
            <i class="fas fa-fire"></i>
            <div class="new-events-alert">New</div>
            <div class="toggle-tray">Click me, I will take you to events section</div>
        </li>
        <li id="phone_fixed">
            <i class="fas fa-phone-alt"></i>
            <div class="toggle-tray">9805412557</div>
        </li>
        <li id="mail_fixed">
            <i class="fas fa-envelope"></i>
            <div class="toggle-tray">hamrakisan@gmail.com</div>
        </li>
        <li>
            <a href="">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
    </ul>
    <a href="#" id="toTop" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>
{{--    <div id="preloader"></div>--}}
    <!-- scripts start -->
    <script src="{{URL::asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/bootstrap.min.js')}}"></script>
    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

     @if(session()->has('message'))
        <script>
            swal({
                buttons: false,
                icon: "success",
                timer: 2500,
                text: '{{ session()->get('message') }}'
            });
        </script>
    @endif
    @if(session()->has('danger'))
        <script>
            swal({
                buttons: false,
                icon: "warning",
                timer: 2500,
                text: '{{ session()->get('danger') }}'
            });
        </script>
    @endif


</body>
</html>



