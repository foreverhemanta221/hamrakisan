@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
@endsection
@section('content')
    <section id="login-section">
        <div class="form-body">


            <h6>Forgot Passowrd</h6>
            <p class="px-5">
                enter your phone or email to get verification code
            </p>
            <form>
                <div class="form-group">
                    <label for="userId">Email or Phone</label>
                    <input type="text" class="form-control" id="userId" aria-describedby="userHel" placeholder="Email or Phone">
                    <i class="fas fa-user"></i>
                </div>

                <a href="code-verify.html" class="btn btn-primary d-block mt-4">Send Verification Code</a>


            </form>


            <p class="mt-4">Don't have an account? <a href="{{URL::to('register')}}">Sign up</a></p>
        </div>

    </section>
@endsection
@section('scripts')
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
@endsection
