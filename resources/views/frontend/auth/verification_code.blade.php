@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
@endsection
@section('content')
    <section id="login-section">
        <div class="form-body">

            <h6>Enter 6 digit verification Code</h6>
            <form>

                <div class="form-group verify-input">
                    <input class="form-control" type="number" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                    <input class="form-control" type="number" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                    <input class="form-control" type="number" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                    <input class="form-control" type="number" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                    <input class="form-control" type="number" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                    <input class="form-control" type="number" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                </div>

                <a href="newpwd.html" type="submit" class="btn btn-primary d-block mt-4">Confirm</a>


            </form>

            <div class="mt-3">Didn't receive code? <a href="">Send again</a></div>
            <div class="mb-3">No access to this medium? <a href="">Change method</a></div>

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
