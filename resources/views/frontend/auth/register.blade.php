@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
@endsection
@section('content')
    <section id="register-section">
        <div class="title">
            <h2>Hamrakisan.com</h2>
            <p>किनकि किसान ले प्रगति गरे देशले प्रगति गर्नेछ </p>
        </div>


        <form id="registerForm" method="post" action="{{route('register.store')}}">
            @csrf
            @if(Session::has('danger'))
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ Session::get('danger') }}
                </div>
            @endif

            <h3>{{__('auth.sign_up')}}</h3>


            <div class="form-group">
                <label for="userId">{{__('auth.phone_email')}}</label>
                <input type="text" class="form-control " id="userId" name="userId" aria-describedby="userHel" placeholder="Email or Phone">
                <i class="fas fa-user"></i>
            </div>
            <div class="alert alert-danger" id="errorUserId" role="alert">
                @error('userId')
                    {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">{{__('auth.password')}}</label>
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                <i class="fas fa-lock"></i>
            </div>
            <div class="alert alert-danger " id="errorPassword" role="alert">
                @error('password')
                {{$message}}
                @enderror
            </div>

            <div class="form-group">
                <label for="">{{__('auth.select_account_type')}}</label>
                <div id="acc-type-register">
                    <label>
                        <input type="radio" name="role" value="user" class="inputRole" checked>
                        <div>
                            <img src="{{URL::asset('frontend/img/icons/nonfarmer.png')}}">
                            <span>
                                <h4>{{__('auth.non_farmer')}}</h4>
                                <p>{{__('auth.non_farmer_description')}}</p>
                            </span>
                        </div>
                    </label>
                    <label>
                        <input type="radio" name="role" value="farmer">
                        <div>
                            <img src="{{URL::asset('frontend/img/icons/farmer.png')}}">
                            <span>
                                <h4>{{__('auth.farmer')}}</h4>
                                <p>{{__('auth.farmer_description')}}</p>
                            </span>
                        </div>
                    </label>
                </div>
            </div>
            <div class="alert alert-danger errorRole" role="alert">
                @error('role')
                {{$message}}
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{__('auth.register')}}</button>
            <div class="social-login">
                <a href="" class="fb-login"><img src="{{URL::asset('frontend/img/icons/fb-icon.png')}}" alt=""> {{__('auth.login_with_facebook')}}</a>
                <a href="" class="google-login"><img src="{{URL::asset('frontend/img/icons/google-icon.png')}}" alt=""> {{__('auth.login_with_google')}}</a>
            </div>
            <p>Already a member? <a href="{{URL::to('login')}}">{{__('auth.login')}}</a></p>
        </form>
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
    <script src="{{URL::asset('frontend/js/aos.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
    {{--    //validation--}}
    <script type="module" src="{{URL::asset('frontend/js/validations/registerValidation.js')}}"></script>
@endsection
