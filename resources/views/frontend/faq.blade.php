@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
@endsection
@section('content')

    <!-- faqs -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
            </div>
            @isset($allfaq)
                <div class="faq-list">
                <ul>
                    @for($i=0;$i<$allfaq->count();$i++)
                    <li data-aos="fade-up" data-aos-delay="{{$i+100}}">
                        <i class="far fa-question-circle icon-help"></i> <a data-toggle="collapse" class="{{$i==0 ? 'collapse' :'collapsed'}}" href="#faq-list-{{$i+1}}">{{$allfaq[$i]->question}} <i class="fas fa-chevron-down icon-show"></i><i class="fas fa-chevron-up icon-close"></i></a>
                        <div id="faq-list-{{$i+1}}" class=" {{$i==0 ? 'collapse show' :'collapse'}}" data-parent=".faq-list">
                            <p>
                                {{$allfaq[$i]->answer}}
                           </p>
                        </div>
                    </li>


                    @endfor


                </ul>
            </div>
            @endisset

        </div>
    </section><!-- End Frequently Asked Questions Section -->

@endsection
@section('scripts')
    <script src="{{URL::asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
@endsection
