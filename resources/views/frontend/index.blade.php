@extends('frontend.layout.layout')

@section('og')
    <meta property="og:title" content="Hamrakishan || Home" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="हाम्रा किशान कृषि क्षत्रमा क्रिाशिल एक निज कम्पनी हो । हाम्रो उद्देष्य नेपालक कृषि क्षत्मा अनुशन्धनमा आधारित नाफामुखि व्यवायलाई प्रो्शाहन दिइ नाँ तथा पुराा कृषकहरुलाई व्यवसायिक तथा प्राविधक सेवा प्रदन गर्नु हो ।" />
    <meta property="og:url" content="https://hamrakisan.com/" />
    <meta property="og:image" content="{{URL::asset('frontend/img/logo.png')}}"   />
@endsection
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
  	<link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
@endsection


@section('content')
    @include('frontend.layout.searchbar')
    @include('frontend.layout.banner')
    <!-- farms start -->
    <section id="farm-landing" class="farm-landing" data-aos="fade-up">
        <div class="container">
            <div class="section-title">
                <h2>{{__('home.best_farm')}}</h2>
                {{__('home.best_farm_sub')}}
            </div>
            <div class="row">
                <div class="col">
                    <div class="farm-grid">
                        @foreach($listings as $listing)
                            <div class="farm-card">
                                <div class="img-box">
                                    <a href="{{URL::to('listings/'.$listing->slug)}}">
                                        <img src="{{$listing->getFeatureImage('medium')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="farm-info p-2 mt-2 mb-0">
                                    <div>
                                        <h5><a href="{{URL::to('listings/'.$listing->slug)}}">{{$listing->name}}</a></h5>
                                        <h6>{{$listing->short_address}}</h6>
                                        <div class="prod-rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                    </div>
                                    <div>
                                        Sells:
                                        <ul class="sells">
                                            @if($listing->products!=null)
                                                @foreach($listing->products as $product)
                                                    <li>{{$product->name}}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <a href="{{URL::to('listings/'.$listing->slug)}}" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- farms end -->
    <!-- trainings start -->
{{--    @if($alltraining!=null)--}}
{{--    <section id="training" class="training-section" >--}}
{{--        <div class="green-background"></div>--}}
{{--        <div id="training-carousel-container" class="container">--}}
{{--            <div class="section-title">--}}
{{--                <h2>Our Trainings</h2>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <div id="training-carousel" class="training-cards owl-theme owl-carousel">--}}
{{--                        @foreach($alltraining as $training)--}}
{{--                        <div class="training-card">--}}
{{--                            <div class="training-img-container">--}}

{{--                                <img src="{{$training->getFeatureImage('medium')}}" alt="">--}}
{{--                                <div class="training-price">--}}
{{--                                    Rs {{$training->price}} <span class="med-12"></span>--}}
{{--                                </div>--}}
{{--                                <div class="overlay"></div>--}}
{{--                            </div>--}}
{{--                            <h3>{{$training->training_name}}</h3>--}}

{{--                                @php--}}
{{--                                    $features = explode(',',$training->training_features);--}}
{{--                                @endphp--}}
{{--                                @isset($features)--}}
{{--                                    <ul class="includings-of-training">--}}
{{--                                       @foreach($features as $feature)--}}
{{--                                           <li>{{$feature}}</li>--}}
{{--                                       @endforeach--}}
{{--                                    </ul>--}}
{{--                                @endisset--}}

{{--                            <a href="{{URL::to('agrotraining/'.$training->id)}}" class="btn-success">दर्ता गर्नुोस </a>--}}
{{--                        </div>--}}
{{--                        @endforeach--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="all-training-btn">--}}
{{--            <a href="" class="btn btn-primary">View all</a>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    @endif--}}
{{--    <!-- trainings end -->--}}
{{--    <!-- hot products start -->--}}
{{--    <section id="hot-products" class="hot-products" >--}}
{{--        <div class="container">--}}
{{--            <div class="section-title">--}}
{{--                <h2>Hot Products</h2>--}}
{{--                <p>Grab the most popular and useful products from us in reasonable pricing</p>--}}
{{--            </div>--}}
{{--            <div id="hp-slider" class="row owl-theme owl-carousel">--}}
{{--                @isset($featureproduct)--}}
{{--                    @foreach($featureproduct as $product)--}}
{{--                        <div class="hp-card">--}}
{{--                            <div class="img-box">--}}
{{--                                <a href="{{URL::to('product',$product->slug)}}">--}}
{{--                                    <img src="{{$product->feature_image_medium}}" class="img-fluid" alt="{{$product->name}}">--}}
{{--                                </a>--}}
{{--                                <div class="overlay-info">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="p-3">--}}
{{--                                <h5><a href="{{URL::to('product',$product->slug)}}">{{$product->name}} </a></h5>--}}
{{--                                <div class="hp-price">Rs. {{$product->price}}</div>--}}
{{--                                <a href="tel:{{$product->vendor_contact}}" class="btn btn-primary">Call {{$product->vendor_contact}}</a>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                @endisset--}}


{{--            </div>--}}
{{--            <div class="d-flex justify-content-center">--}}
{{--                <a href="{{URL::to('allproducts')}}" class="btn btn-primary">View all</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- hot products end -->
    <!-- list your farm start -->
    <section id="list-your-farm" class="list-your-farm" >
        <div class="container">
            <div class="row">
                <!-- stats section -->
                <div class="col-md-6 stats-container" data-aos="fade-up">
                    <div class="stats">
                        <div class="stat-card"> <h1>200</h1><p>Farms</p> </div>
                        <div class="stat-card"> <h1>45</h1><p>Cities</p> </div>
                        <div class="stat-card"> <h1>5</h1><p>Trainings</p> </div>
                        <div class="stat-card"> <h1>3</h1><p>Years</p> </div>
                    </div>
                </div>
                <!-- form section -->
                <div class="col-md-6" data-aos="fade-up">
                    <form action="{{URL::to('farmregisterform')}}" method="POST" class="" name="listFarmFormRequest" id="listFarmFormRequest">
                        @csrf
                        <h4>{{__('home.list_your_farm')}}</h4>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="">{{__('form.farm_name')}} <small class="text-danger ">*</small></label>
                                    <input type="Text" class="form-control" name="farmName" id="inputFarmName" aria-describedby="emailHelp" placeholder="eg: kantipur Farm">
                                </div>
                                <div class="alert alert-danger" id="errfarmName" role="alert">
                                    @error('farmName')
                                        <small>{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="">{{__('form.full_name_of_farmer')}}<small class="text-danger ">*</small></label>
                                    <input type="Text" class="form-control" name="farmerName" id="inputFarmerName" aria-describedby="emailHelp" placeholder="eg: Rajesh Hamal">
                                </div>
                                <div class="alert alert-danger" id="errfarmerName" role="alert">
                                    @error('farmerName')
                                        <small>{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{__('form.email')}} <small class="text-danger ">*</small></label>
                                    <input type="email" class="form-control  @if($errors->has('farmEmail')) danger @endif" name="farmEmail" id="inputFarmEmail" aria-describedby="emailHelp" placeholder="eg: xyz@gmail.com">
                                </div>
                                <div class="alert alert-danger" id="errfarmEmail" role="alert">
                                  @error('farmEmail')
                                       <small>{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label for="">{{__('form.phone')}} <small class="text-danger ">*</small></label>
                                    <input type="number" class="form-control" name="farmPhone" id="inputFarmPhone" placeholder="eg: 986454131">
                                </div>
                                <div class="alert alert-danger" id="errfarmPhone" role="alert">
                                    @error('farmPhone')
                                         <small>{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="inputFarmLocation">{{__('form.location')}} <small class="text-danger ">*</small></label>
                            <input type="text" class="form-control" name="farmLocation" id="inputFarmLocation" aria-describedby="emailHelp" placeholder="eg: Patan Dhoka, Lalitpur">
                        </div>
                        <div class="alert alert-danger" id="errfarmLocation" role="alert">
                            @error('farmLocation')
                                <small>{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{__('form.description')}}</label>
                            <textarea class="form-control" name="farmDescription" id="inputFarmDescription" aria-describedby="emailHelp" placeholder="eg: Patan Dhoka, Lalitpur">
                            </textarea>
                        </div>
                        <div class="alert alert-danger" id="errfarmDescription" role="alert">
                            @error('farmDescription')
                                <small>{{$message}}</small>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-success" value="{{__('form.submit')}}" id="submitform" onclick="submitFormFunction()" />
                        {{--  <button type="submit" value="submit">Submit</button>  --}}
                        {{--  <button type="submit" form="listFarmFormRequest" class="btn btn-success" value="Submit">Submit</button>  --}}
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- list your farm end -->
    <!-- documentary videos start -->
    <section id="videos-section" class="videos-section">
        <div class="container">
            <div class="section-title">
                <h2>हक किसानको आफनै कथा हु्छ</h2>
                <p>आउनुहोस सुनौं तिनै किसानका  प्रेरणादाय कथाहरु </p>
            </div>
            <div class="row">
                @isset($featureVideo)
                    @foreach($featureVideo as $video)
                        <div class="col-md-4 col-sm-6 p-3">
                            <div class="video-thumb">
                                <a href="{{$video->video}}" class="venobox play-btn mb-4 vbox-item" data-vbtype="video" data-autoplay="true"></a>
                                <img src="{{$video->feature_image}}" class="img-fluid" alt="">
                            </div>
                            <p>{{$video->title}}</p>
                        </div>
                    @endforeach
                @endisset

            </div>
        </div>
    </section>
    <!-- documentary videos end -->
    <!-- map start -->
    <section id="map">
        <!-- <div id="map-msg"><div class="light-47">We are</div> Here</div> -->
        <div class="section-title">
            <h2>{{__('home.locate_us')}}</h2>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.3325557306243!2d85.32183031494972!3d27.676114733470893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19c5ff9dd227%3A0xd54e8bd02cf8160b!2sLumbini%20Heritage%20Home!5e0!3m2!1sen!2snp!4v1585125550599!5m2!1sen!2snp" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </section>
    <!-- map end -->
@endsection


@section('scripts')
    <script src="{{URL::asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>--}}
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
    <script type="module" src="{{URL::asset('frontend/js/validations/listFarmFormValidation.js')}}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{URL::asset('frontend/js/basic_axios.js')}}"></script>
    <script>

        AOS.init();
        $('.venobox').venobox({
            share      : ['facebook', 'twitter','linkedin']
        });
        // carousel banner--------------------------------------------------------------
        $('#hero-slider').owlCarousel({
            autoplay:true,
            autoplayTimeout:5000,
            smartSpeed:1000,
            autoplayHoverPause:true,
            loop:true,
            margin:10,
            nav:true,
            items:1
        })

        //training
        var trainingSlider = $('#training-carousel')
        trainingSlider.owlCarousel({
            loop:true,
            smartSpeed:550,
            margin:10,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                768:{
                    items:2,
                    nav:true
                },
                1200:{
                    items:3,
                    nav:true,
                }
            }
        })
        // getting active slide in owl carousel
        trainingSlider.on('changed.owl.carousel', function (e) {
            var currentChild = e.relatedTarget.current()
            $('#training-carousel .owl-item.active').each(function(key,value){
                $('.training-card').css({'transform':'scale(1)'});
                if( key == 2){
                    $(value).children().css({'transform':'scale(1.08)'});
                }
            })
        })
        $('#training-carousel .owl-item.active').each(function(key,value){
            if( key == 1){
                $(value).children().css({'transform':'scale(1.08)'});
            }
        })

        //products
        var hpslider = $('#hp-slider')
        hpslider.owlCarousel({
            autoplay:true,
            loop:true,
            smartSpeed:550,
            margin:10,
            responsiveClass:true,
            nav:true,
            responsive:{
                0:{
                    items:1,
                },
                479:{
                    items:2,
                },
                479:{
                    items:2,
                },
                768:{
                    items:4,
                },
                1200:{
                    items:5,
                }
            }
        })
        $('#hp-slider .owl-nav').removeClass('disabled')
        hpslider.on('changed.owl.carousel', function (e) {
            $('#hp-slider .owl-nav').removeClass('disabled')
        })
    </script>

    <script>
        // homepage search function
        document.querySelector('#indexSearch').addEventListener('click',evt => {
            evt.preventDefault();
            let url_string = "{{route('farm.search')}}";
            let url = new URL(url_string);
            var provinceNode = document.querySelector('#selectProvince');
            var province = provinceNode.options[provinceNode.selectedIndex].value;

            var districtNode = document.querySelector('#selectDistrict');
            var district = districtNode.options[districtNode.selectedIndex].value;

            var categoryNode = document.querySelector('#selectCategory');
            var category = categoryNode.options[categoryNode.selectedIndex].value;
            if(province){
                url.searchParams.set('province',province)
            }
            if(district){
                alert(district)
                url.searchParams.set('district',district)
            }
            if(category){
                url.searchParams.set('category',category)
            }
            window.location.href = url.toString();


        })
    </script>

     <script>
        function submitFormFunction() {
            document.getElementById('listFarmFormRequest').submit()
        }

    </script>
    <script type="text/javascript">
    (function () {
        var options = {
            facebook: "119291119472724", // Facebook page ID
            call_to_action: "Message us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

@endsection
