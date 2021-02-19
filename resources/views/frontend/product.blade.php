@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
@endsection
@section('content')
    <!-------------------------------------- PRODUCTS PAGE WRAPPER -->
    <section class="product-page-wrapper">
        <div class="container-xl bg-white">
            <div class="row pt-3">
                <div class="col-lg-6">
                    <div class="zoom-section">
                        <div class="zoom-small-image">
                            <a href='{{$productdetail->getGalleryImage()[0]}}' class = 'cloud-zoom' id='zoom1' rel="adjustX: 10, adjustY:-4">
                                <img title="Hamrakisan" src="{{$productdetail->getGalleryImage()[0]}}" alt='' title="Optional title display" />
                            </a>
                        </div>
                        <div class="zoom-desc">
                            <p>
                                <?php $i=0; ?>

                                @foreach($productdetail->getGalleryImage() as $image)
                                    <a href='{{$image}}' class='cloud-zoom-gallery {{$i==0 ? 'active-thumb' : ''}} ' title='Red' rel="useZoom: 'zoom1', smallImage: '{{$image}}' ">
                                        <img title="hamrakisan" class="zoom-tiny-image" src="{{\App\Helpers::getAnotherSizeOfImage('small',$image)}}" alt = "Thumbnail 1"/>
                                    </a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hp-details">
                        <h2>{{$productdetail->name}}</h2>

                        <div class="tag">
                            available all over nepal
                        </div>
                        <div class="description">
                          {!! $productdetail->description !!}
                        </div>
                        <div class="price mb-4">
                            Rs {{$productdetail->price}}
                        </div>
                        <a href="tel:" class="btn btn-primary"><i class="fas fa-phone-alt"></i> Call & Book</a>
                        <ul class="hp-seller">
                            <li><a href=""><i class="fas fa-store"></i>{{$productdetail->vendor_name}}</a></li>
                            <li><a href="tel:01-5108054"><i class="fas fa-phone-alt"></i>{{$productdetail->vendor_contact}}</a></li>
                            <li><a href=""><i class="fas fa-envelope"></i>{{$productdetail->vendor_email}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------------------------------------- END PRODUCTS PAGE WRAPPER -->

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
@endsection

@section('scripts')

    <script src="{{URL::asset('frontend/js/aos.js')}}"></script>
    <script src="{{URL::asset('frontend/js/cloudzoom.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script>
        AOS.init();

        $('.zoom-desc a').click(function(){
            $(this).siblings().removeClass('active-thumb')
            $(this).addClass('active-thumb')
        })

    </script>
@endsection
