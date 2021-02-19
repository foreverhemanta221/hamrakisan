@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
@endsection
@section('content')
    <!-------------------------------------- PRODUCT PAGE WRAPPER -->

    <section class="products-page-wrapper">
        <div class="container">
            <div class="section-title">
                <h2>Hot Products</h2>
                <p>Grab the most popular and useful products from us in reasonable pricing</p>
            </div>
            <div class="row bg-white">
                <div class="col">
                    <div class="hot-products-grid">
                        @foreach($allproducts as $product)
                        <div class="hp-card">
                            <div class="img-box">
                                <a href="">
                                    <img src="{{$product->getFeatureImage('medium')}}" class="img-fluid" alt="">
                                </a>
{{--                                <div class="overlay-info">--}}
{{--                                    <h6>Features</h6>--}}
{{--                                    <ul>--}}
{{--                                        <li>Mowing</li>--}}
{{--                                        <li>Watering</li>--}}
{{--                                        <li>Power Saving</li>--}}
{{--                                    </ul>--}}
{{--                                    <a href="">Learn More</a>--}}
{{--                                </div>--}}
                            </div>
                            <div class="p-3">
                                <h5><a href="{{URL::to('product',$product->slug)}}">{{$product->name}}</a></h5>
                                <p>{{$product->vendor_contact}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row bg-white">
                <div class="col">
                    <nav aria-label="Page navigation example" class="mt-5 d-flex justify-content-center">
                        <ul class="pagination justify-content-center">
                            <li class="page-item ">
                                <a class="page-link" href="#" tabindex="-1"><</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">10</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <!-------------------------------------- END PRODUCT PAGE WRAPPER -->

    <!-- Search result section -->
    <!-- END Search result section -->


    <!-- ADD FARM SECTION -->
    <section class="offpage-farmlist">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
                    <h2>   आफ्नो उब्जनी देशका कुना कुनामा पुराउन आफ्नो फार्म आजै दर्ता गर्नुहोस  </h2>
                    <a href="#" class="btn btn-secondary">दर्ता गर्नुहोस</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ADD FARM SECTION END -->

    <!-- footer start -->

@endsection

@section('scripts')

@endsection
