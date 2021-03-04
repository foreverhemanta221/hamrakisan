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
                <!-- dashboard cards -->
                <div class="db-body">
                    <h1>Orders</h1>
                    <div class="container">
                        <ul class="nav nav-tabs" id="orders-Tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#pedning-orders-tab" role="tab" aria-selected="true">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#delivered-orders-tab" role="tab" aria-controls="profile" aria-selected="false">Delivered</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#cancelled-orders-tab" role="tab" aria-controls="contact" aria-selected="false">Cancelled</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pedning-orders-tab" role="tabpanel" aria-labelledby="home-tab">
                                <h4>New Orders</h4>
                                <div class="orders-grid mb-5">
                                @foreach($initialOrder as $newOrder)
                                    {{--  {{dd($newOrder['farm'])}}  --}}
                                        <div class="orders-card">
                                            <div class="orders-card-header">
                                                <h6>{{$newOrder['farm']['farm_name']}}</h6>
                                                <div class="farm-rating">
                                                    @for($i=0;$i<$newOrder['farm']['farm_review'];$i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for($i=$newOrder['farm']['farm_review'];$i<5;$i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                                <p>{{$newOrder['ordered_at']}}</p>
                                            </div>
                                            <div class="orders-card-body">
                                                @foreach($newOrder['orderItem']['productlist']  as $product)
                                                    <div class="order-item">
                                                        <div class="order-item-info">
                                                            <img src="{{$product['productDetail']['image']}}" alt="">
                                                            <div>
                                                                <h6>{{$product['productDetail']['name']}}</h6>
                                                                <p>{{$product['orderDetail']['qty']}} {{$product['productDetail']['measure_unit']}} | Rs. {{$product['productDetail']['rate']}} per {{$product['productDetail']['measure_unit']}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            Rs. {{$product['orderDetail']['price']}}
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="orders-card-summary">
                                                    <ul class="buyer-info">

                                                        <li><i class="fas fa-map-marker"></i>{{$newOrder['farm']['farm_address']}}</li>
                                                        <li><i class="fas fa-phone-alt"></i> {{$newOrder['farm']['phone']}}</li>
                                                    </ul>
                                                    <div class="total-order-price">Rs. {{$newOrder['orderItem']['totalPrice']}} </div>
                                                    
                                                </div>
                                                <div class="orders">
                                                    <form method="POST" action="{{route('cancelOrder',$newOrder['id'])}}">
                                                        @csrf
                                                        <button type="submit" value="submit" class="btn btn-outline-danger">Cancel Order</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                <h4><span><i class="fas fa-truck-loading"></i></span> Dispatched Orders</h4>
                                <p>These orders are dispatched from farm and could reach you soon</p>
                                <div class="orders-grid">
                                    @foreach($dispatchOrder as $dispatchItem)
                                        <div class="orders-card">
                                            <div class="orders-card-header">
                                                <h6>{{$dispatchItem['farm']['farm_name']}}</h6>
                                                <div class="farm-rating">
                                                    @for($i=0;$i<$dispatchItem['farm']['farm_review'];$i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for($i=$dispatchItem['farm']['farm_review'];$i<5;$i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                                <p>{{$dispatchItem['ordered_at']}}</p>
                                            </div>
                                            <div class="orders-card-body">
                                                @foreach($dispatchItem['orderItem']['productlist']  as $product)
                                                    <div class="order-item">
                                                        <div class="order-item-info">
                                                            <img src="{{$product['productDetail']['image']}}" alt="">
                                                            <div>
                                                                <h6>{{$product['productDetail']['name']}}</h6>
                                                                <p>{{$product['orderDetail']['qty']}} {{$product['productDetail']['measure_unit']}} | Rs. {{$product['productDetail']['rate']}} per {{$product['productDetail']['measure_unit']}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            Rs. {{$product['orderDetail']['price']}}
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="orders-card-summary">
                                                    <ul class="buyer-info">

                                                        <li><i class="fas fa-map-marker"></i>{{$dispatchItem['farm']['farm_address']}}</li>
                                                        <li><i class="fas fa-phone-alt"></i> {{$dispatchItem['farm']['phone']}}</li>
                                                    </ul>
                                                    <div class="total-order-price">Rs. {{$dispatchItem['orderItem']['totalPrice']}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="delivered-orders-tab" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="orders-grid">
                                    @foreach($deliveredOrder as $deliveredItem)
                                        <div class="orders-card">
                                            <div class="orders-card-header">
                                                <h6>{{$deliveredItem['farm']['farm_name']}}</h6>
                                                <div class="farm-rating">
                                                    @for($i=0;$i<$deliveredItem['farm']['farm_review'];$i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for($i=$deliveredItem['farm']['farm_review'];$i<5;$i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                                <p>{{$deliveredItem['ordered_at']}}</p>
                                            </div>
                                            <div class="orders-card-body">
                                                @foreach($deliveredItem['orderItem']['productlist']  as $product)
                                                    <div class="order-item">
                                                        <div class="order-item-info">
                                                            <img src="{{$product['productDetail']['image']}}" alt="">
                                                            <div>
                                                                <h6>{{$product['productDetail']['name']}}</h6>
                                                                <p>{{$product['orderDetail']['qty']}} {{$product['productDetail']['measure_unit']}} | Rs. {{$product['productDetail']['rate']}} per {{$product['productDetail']['measure_unit']}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            Rs. {{$product['orderDetail']['price']}}
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="orders-card-summary">
                                                    <ul class="buyer-info">
                                                        <li><i class="fas fa-map-marker"></i>{{$deliveredItem['farm']['farm_address']}}</li>
                                                        <li><i class="fas fa-phone-alt"></i> {{$deliveredItem['farm']['phone']}}</li>
                                                    </ul>
                                                    <div class="total-order-price">Rs. {{$deliveredItem['orderItem']['totalPrice']}} </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cancelled-orders-tab" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="orders-grid">
                                    @foreach($cancelOrder as $cancelItem)
                                        <div class="orders-card">
                                            <div class="orders-card-header">
                                                <h6>{{$cancelItem['farm']['farm_name']}}</h6>
                                                <div class="farm-rating">
                                                    @for($i=0;$i<$cancelItem['farm']['farm_review'];$i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for($i=$cancelItem['farm']['farm_review'];$i<5;$i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                </div>
                                                <p>{{$cancelItem['ordered_at']}}</p>
                                            </div>
                                            <div class="orders-card-body">
                                                @foreach($cancelItem['orderItem']['productlist']  as $product)
                                                    <div class="order-item">
                                                        <div class="order-item-info">
                                                            <img src="{{$product['productDetail']['image']}}" alt="">
                                                            <div>
                                                                <h6>{{$product['productDetail']['name']}}</h6>
                                                                <p>{{$product['orderDetail']['qty']}} {{$product['productDetail']['measure_unit']}} | Rs. {{$product['productDetail']['rate']}} per {{$product['productDetail']['measure_unit']}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            Rs. {{$product['orderDetail']['price']}}
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="orders-card-summary">
                                                    <ul class="buyer-info">

                                                        <li><i class="fas fa-map-marker"></i>{{$cancelItem['farm']['farm_address']}}</li>
                                                        <li><i class="fas fa-phone-alt"></i> {{$cancelItem['farm']['phone']}}</li>
                                                    </ul>
                                                    <div class="total-order-price">Rs. {{$cancelItem['orderItem']['totalPrice']}} </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- dashboard cards -->
        </div>
    </div>
    </div>
    <!--END  dashboard wrapper------------------------- -->
@endsection
@section('scripts')
    <script src="{{URL::asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>

    <script>
        AOS.init({
            once:true,
        });
        $('.venobox').venobox({
            share      : ['facebook', 'twitter','linkedin']
        });

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#db-sidebar').toggleClass('active');
                $(this).toggleClass('active');
                // $(this).find('svg').css('transform','rotate(180deg)')




            });

        });



    </script>
@endsection
