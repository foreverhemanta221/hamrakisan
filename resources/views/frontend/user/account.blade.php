@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/main.css')}}">
@endsection
@section('content')
    <!-- dashboard wrapper------------------------- -->
    <div class="bg-light-wrapper">
        <div class="db-wrapper">
            <!-- Sidebar -->
            @include('frontend.dashboardincludes.usersidebar')
            <div id="db-content">

                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-right"></i>
                        <!-- <i class="fas fa-arrow-left d-none"></i> -->
                    </button>
                </div>
               @include('frontend.dashboardincludes.accountform')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
    <script src="{{URL::asset('frontend/js/axios.min.js')}}"></script>
    {{--  <script src="{{URL::asset('frontend/js/addressAjax.js')}}"></script>  --}}
    <script src="{{URL::asset('frontend/js/farmerFarmLisingAjax.js')}}"></script>
    <script src="{{URL::asset('frontend/js/far.js')}}"></script>
    <script src="{{URL::asset('frontend/js/handleFiles.js')}}"></script>

    <script>
        AOS.init({  
            once:true,
        });


        $('#acc-edit').hide()
        $('#edit-acc-btn').click(function(){
            $('#acc-preview').hide()
            $('#acc-edit').fadeIn()
        })


        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#db-sidebar').toggleClass('active');
                $(this).toggleClass('active');
                // $(this).find('svg').css('transform','rotate(180deg)')




            });

        });
    </script>
    <!-- scripts end -->
@endsection
