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
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#delivered-orders-tab" role="tab" aria-controls="profile" aria-selected="false">Dispatched / Delivered</a>
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
                                        <div class="orders-card">
                                            <div class="orders-card-header">
                                                <h6>{{$newOrder['user']['name']}}</h6>
                                                <p>{{$newOrder['ordered_at']}}</p>
                                            </div>
                                            <div class="orders-card-body">
                                                @foreach($newOrder['orderItem']['productlist'] as $product)
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
                                                        <li><i class="fas fa-map-marker"></i>{{$newOrder['user']['address']}}</li>
                                                        <li><i class="fas fa-phone-alt"></i> {{$newOrder['user']['phone']}}</li>
                                                    </ul>
                                                    <div class="total-order-price">Rs. {{$newOrder['orderItem']['totalPrice']}} </div>
                                                </div>
                                                <div class="orders-card-footer">
                                                    <button class="btn btn-outline-danger" onclick="reject({{$newOrder['id']}})">Reject</button>
                                                    <button onclick="accept({{$newOrder['id']}})" class="btn btn-primary">Receive</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <h4><span><i class="fas fa-truck-loading"></i></span> Pending Orders</h4>
                                <div class="orders-grid">
                                    @foreach($pendingOrder as $pendingItem)
                                        <div class="orders-card">
                                            <div class="orders-card-header">
                                                <h6>{{$pendingItem['user']['name']}}</h6>
                                                <p>{{$pendingItem['ordered_at']}}</p>
                                            </div>
                                            <div class="orders-card-body">
                                                @foreach($pendingItem['orderItem']['productlist'] as $product)
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
                                                        <li><i class="fas fa-map-marker"></i>{{$pendingItem['user']['address']}}</li>
                                                        <li><i class="fas fa-phone-alt"></i> {{$pendingItem['user']['phone']}}</li>
                                                    </ul>
                                                    <div class="total-order-price">Rs. {{$pendingItem['orderItem']['totalPrice']}} </div>
                                                </div>
                                                <div class="orders-card-footer">
                                                    <button onclick="dispatch({{$pendingItem['id']}})" class="btn btn-outline-success">Dispatch</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="delivered-orders-tab" role="tabpanel" aria-labelledby="profile-tab">
                                <h4>Dispatched Orders</h4>
                                <div class="orders-grid mb-5">
                                    @foreach($dispatchOrder as $dispatchedItem)
                                        <div class="orders-card">
                                            <div class="orders-card-header">
                                                <h6>{{$dispatchedItem['user']['name']}}</h6>
                                                <p>{{$dispatchedItem['ordered_at']}}</p>
                                            </div>
                                            <div class="orders-card-body">
                                                @foreach($dispatchedItem['orderItem']['productlist'] as $product)
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
                                                        <li><i class="fas fa-map-marker"></i>{{$dispatchedItem['user']['address']}}</li>
                                                        <li><i class="fas fa-phone-alt"></i> {{$dispatchedItem['user']['phone']}}</li>
                                                    </ul>
                                                    <div class="total-order-price">Rs. {{$dispatchedItem['orderItem']['totalPrice']}} </div>
                                                </div>
                                                <div class="orders-card-footer">

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <h4><span><i class="fas fa-truck-loading"></i></span> Delivered  Orders</h4>
                                <div class="orders-grid">
                                    @foreach($deliveredOrder as $deliveredItem)
                                        <div class="orders-card">
                                            <div class="orders-card-header">
                                                <h6>{{$deliveredItem['user']['name']}}</h6>
                                                <p>{{$deliveredItem['ordered_at']}}</p>
                                            </div>
                                            <div class="orders-card-body">
                                                @foreach($deliveredItem['orderItem']['productlist'] as $product)
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
                                                        <li><i class="fas fa-map-marker"></i>{{$deliveredItem['user']['address']}}</li>
                                                        <li><i class="fas fa-phone-alt"></i> {{$deliveredItem['user']['phone']}}</li>
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
    <script src="{{URL::asset('frontend/js/aos.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
    <script src="{{URL::asset('frontend/js/axios.min.js')}}"></script>

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
            });
        });

        function accept(orderId) {
            if(confirm('are you sure you want to accept this order ?')){
                let status = '<?php echo App\Models\Order::ORDER_PENDING ?>'
                ajaxForStatusChange(orderId,status)
            }
        }

        function reject(orderId) {
            if(confirm('are you sure you want to accept this order ?')){
                let status = '<?php echo App\Models\Order::ORDER_REJECT ?>'
                ajaxForStatusChange(orderId,status)
            }
        }
        function dispatch(orderId) {
            if(confirm('are you sure you want to accept this order ?')){
                let status = '<?php echo App\Models\Order::ORDER_DISPATCH ?>'
                ajaxForStatusChange(orderId,status)
            }
        }
        function ajaxForStatusChange(orderId,status) {
            let base_url = 'https://hamrakisan.com';
            axios.post('/change-status', {
                orderId: orderId,
                orderStatus: status
            }).then(function (response) {

                if(response.data.status===false){
                    {{--window.location = '{{route('userlogin')}}'--}}
                }
                if(response.data.status===true){
                    console.log('change status');
                    window.location.reload();
                    // document.getElementById('minicart').innerHTML = '';
                }
            }).catch(function (error) {
                console.log(error);
            });
        }


    </script>
@endsection
