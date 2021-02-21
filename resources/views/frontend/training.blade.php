@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
@endsection
@section('content')
    <!-------------------------------------- Training PAGE WRAPPER -->
    <div class="light-bg-wrapper">
        <!-- cover section -->
        <div class="training-cover">
            <div class="bg-img">
                <img src="{{$trainingDetail->getFeatureImage()}}" alt="{{$trainingDetail->training_name}}">
            </div>
            <div class="training-cover-overlay"></div>
            <div class="training-cover-info">
                <h1>{{$trainingDetail->training_name}}</h1>
                <p>{!!$trainingDetail->short_description!!}</p>
                @if($trainingDetail->rel_instructor->count()>0)
                <ul class="cover-instructor">
                    @foreach($trainingDetail->rel_instructor as $instructor)
                    <li>
                        <img src="{{$instructor->getInstructorImage('small')}}" alt="">
                        <div class="instructor-info">
                            <h6>{{$instructor->instructor_name}}</h6>
                            <p>{{$instructor->instructor_profession}}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
                <div class="mx-auto mt-4">
                    <a class="btn btn-outline-secondary" href="">थप जानकारी </a>
                    <a href="#" onclick="loadEsewa()" class="btn btn-secondary">सुरु गर्नुहोस</a>
                </div>
            </div>
        </div>
        <!--End  cover section -->

        <!-- training Nav -->

        <nav id="training-nav" class="navbar navbar-light bg-light sticky-top">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="#training-about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#training-syllabus">Syllabus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#training-instructors">Instructors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#training-pricing">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#training-faq">Faq</a>
                </li>

            </ul>
        </nav>

        <section id="training-about" class="training-page-section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2>About the training</h2>
                        {!! $trainingDetail->description !!}
                        <ul class="sells">
                            @php
                                $tags = explode(',',$trainingDetail->training_tags);
                            @endphp
                            @if(count($tags)>0)
                                @foreach($tags as $key=>$value)
                                    <li>{{$value}}</li>
                                @endforeach
                            @endif
                        </ul>
                        <div style="padding:56.25% 0 0 0;position:relative;">
                            {!! $trainingDetail->feature_video !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end about training -->
        <!-- syllabus  -->
        <section id="training-syllabus" class="training-page-section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2>Syllabus</h2>
                        <ul class="chapters">
                            <li>
                                <span class="count"></span>
                                <div>
                                    <h3>बाख्रा पालन का आधारभूत आवस्यकता </h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                    </p>
                                    <span>45 min</span>
                                </div>
                            </li>
                            <li>
                                <span class="count"></span>
                                <div>
                                    <h3>सफल व्यायास्यिक योजना कसरी बनाउने </h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, accusantium voluptatum odio debitis ni
                                        si, recusandae quos expedita similique minus corrupti officia aspernatur, ad ullam vel ducimus ipsa explicabo quibusdam repellendus.</p>
                                    <span>39 min</span>
                                </div>
                            </li>
                            <li>
                                <span class="count"></span>
                                <div>
                                    <h3>बजारीकरण गर्दा ध्यान दिनुपर्ने कुराहरु </h3>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.'
                                        ' Pariatur sed quos ad autem repellendus natus cons
                                        equuntur totam amet, distinctio qui! Minima dolorum illo quo error, natus iusto eius est cum?</p>
                                    <span>41 min</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end syllabus  -->
        <!-- instructors -->
        <section id="training-instructors" class="training-page-section">
            <div class="container">
                <h2>
                    Instructors
                </h2>
                <div class="row">
                    @if($trainingDetail->rel_instructor->count()>0)
                        @foreach($trainingDetail->rel_instructor as $instructor)
                         <div class="col-md-4">
                            <div class="instructor">
                                <img src="{{$instructor->getInstructorImage('medium')}}" alt="">
                                <div class="instructor-name">{{$instructor->instructor_name}}</div>
                                <div class="instructor-designation">{{$instructor->profession}}</div>
                                <p>
                                    {{$instructor->instructor_detail}}
                                </p>
                                <ul class="social-tray">
                                    @if($instructor->instructor_social_site_detail!=null)
                                        <?php
                                        $socialDeatil = json_decode($instructor->instructor_social_site_detail);
                                        ?>
                                            <li class="fb"><a href="{{$socialDeatil->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="twitter"><a href="{{$socialDeatil->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                            <li class="insta"><a href=""><i class="fab fa-instagram"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!-- end instructors -->
        <!-- pricing -->
        <section id="training-pricing" class="training-page-section">
            <div class="container">
                <h2>Pricing</h2>
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <div class="bill-box">
                            <div class="price">Rs. {{$trainingDetail->price}}</div>
                            <a href="" class="btn btn-primary">PAY & LEARN</a>
                        </div>
                        <ul class="payment-methods">
                            <li><a href="#" onclick="loadEsewa()">
                                    <img  src="{{URL::asset('frontend/img/trainings/esewa.png')}}" alt="">
                                    esewa
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end pricing -->
        <!-- faq -->
        @if($trainingDetail->rel_faq->count()>0)
         <section id="training-faq" class="training-page-section">
            <div class="container">
                <h2>FAQ</h2>
                <div class="faq-list">
                    <ul>
                        <?php $i=0; ?>
                        @foreach($trainingDetail->rel_faq as $faq)
                        <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="{{$i+100}}">
                            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">{{$faq->question}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                                <p>
                                   {{$faq->answer}}
                                </p>
                            </div>
                        </li>
                            <?php $i++; ?>
                        @endforeach

                    </ul>
                </div>
            </div>
        </section>
        @endif
        <!-- end faq -->
    </div>
    <!-------------------------------------- END Trainings PAGE WRAPPER -->
@endsection
@section('scripts')
    <script src="{{URL::asset('frontend/js/aos.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script>
        function loadEsewa() {
            window.location ='https://esewa.com.np/';
        }
    </script>
    <script>
        AOS.init({
            once:true
        });
        $('#toTop').css({'opacity':'0.5'});
        $('#toTop').click(function(){
            $('html, body').animate({scrollTop : 0}, 1000);
        });
        $(document).ready(function(){
            // Add scrollspy to <body>
            $('body').scrollspy({target: "#training-nav", offset: 60});
            // Add smooth scrolling on all links inside the navbar
            $("#training-nav a").on('click', function(event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();
                    // Store hash
                    var hash = this.hash;
                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function(){
                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                }  // End if
            });
        });
    </script>

@endsection
