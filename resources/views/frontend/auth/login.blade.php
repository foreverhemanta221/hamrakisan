@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
@endsection
@section('content')
    <section id="login-section">
        <div class="form-body">
            <p>Welcome to</p>
            <h5>Hamrakisan</h5>
            @if(Session::has('danger'))
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('danger') }}
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('success') }}
                </div>
            @endif
            <form id="loginForm" method="post" action="{{URL::to('login')}}">
                @csrf
                <div class="form-group">
                    <label for="userId">Email or Phone</label>
                    <input type="text" class="form-control" id="userId" name="userId" aria-describedby="userHel" placeholder="Email or Phone">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="userPassword" name="password" placeholder="Password">
                    <i class="fas fa-lock"></i>
                </div>
                <a href="" class="">Forgot Password?</a>
                <button type="submit" class="btn btn-primary d-block mt-4">Login</button>
            </form>
            <div class="social-login">
                <a href="" class="fb-login"><img src="{{URL::asset('frontend/img/icons/fb-icon.png')}}" alt=""> Login with Facebook</a>
                <a href="" class="google-login"><img src="{{URL::asset('frontend/img/icons/google-icon.png')}}" alt=""> Login with Google</a>
            </div>
            <p class="mt-4">Don't have an account? <a href="{{URL::to('register')}}">Sign up</a></p>
        </div>
    </section>
    <!-- map start -->
    <section id="map">
        <div class="section-title">
            <h2>Locate Us</h2>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.3325557306243!2d85.32183031494972!3d27.676114733470893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19c5ff9dd227%3A0xd54e8bd02cf8160b!2sLumbini%20Heritage%20Home!5e0!3m2!1sen!2snp!4v1585125550599!5m2!1sen!2snp" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </section>
    <!-- map end -->
@endsection

@section('scripts')
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
@endsection

