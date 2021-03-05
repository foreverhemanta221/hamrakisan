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
            @include('frontend.dashboardincludes.farmersidebar')
            <div id="db-content">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
                <!-- dashboard cards -->
                <div class="db-body">
                    <h1>{{__('dashboard.dashboard')}}</h1>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-3 col-6">
                                        <div class="db-insight">
                                            <div class="db-insight-icon">
                                                <img src="{{URL::asset('frontend/img/icons/neworders.png')}}" alt="">
                                            </div>
                                            <div class="db-insight-info">
                                                <h6>{{__('dashboard.new_orders')}}</h6>
                                                <h5>{{$orders_count}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-6">
                                        <div class="db-insight">
                                            <div class="db-insight-icon">
                                                <img src="{{URL::asset('frontend/img/icons/products.png')}}" alt="">
                                            </div>
                                            <div class="db-insight-info">
                                                <h6>{{__('dashboard.product_listed')}}</h6>
                                                <h5>{{$product_count}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  <div class="col-xl-3 col-6">
                                        <div class="db-insight">
                                            <div class="db-insight-icon">
                                                <img src="{{URL::asset('frontend/img/icons/todaysales.png')}}" alt="">
                                            </div>
                                            <div class="db-insight-info">
                                                <h6>Today's Sales</h6>
                                                <h5>Rs. 3000</h5>
                                            </div>
                                        </div>
                                    </div>  --}}

                                    {{--  <div class="col-xl-3 col-6">
                                        <div class="db-insight">
                                            <div class="db-insight-icon">
                                                <img src="{{URL::asset('frontend/img/icons/visitors.png')}}" alt="">
                                            </div>
                                            <div class="db-insight-info">
                                                <h6>Daily Visitors</h6>
                                                <h5>90</h5>
                                            </div>
                                        </div>
                                    </div>  --}}

                                </div>
                            </div>
                            <div class="col-xl-4">
                                <img src="{{URL::asset('frontend/img/trainings/illustration.png')}}" alt="">
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-xl-6">
                                <h6>{{__('dashboard.hot_products')}}</h6>
                                <div class="db-table-wrapper">
                                    <table id="hotproducts-table" class="table  dashboard-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">{{__('dashboard.products')}}</th>
                                            <th scope="col">{{__('dashboard.sold_to')}}</th>
                                            <th scope="col">{{__('dashboard.sales_volume')}}</th>
                                            <th scope="col">{{__('dashboard.sales_worth')}}</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($products_listed  as $product)
                                            {{-- {{dd($product)}} --}}
                                            <tr>
                                                <td>
                                                    <div class="dashboard-table-product">
                                                        <img src="{{$product->getFeatureImage('small')}}" alt="{{$product->name}}">
                                                        {{-- <br/> --}}
                                                        {{$product->name}}, 
                                                    </div>
                                                </td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->minimum_quantity}}</td>
                                                <td>Rs. {{$product->minimum_quantity*$product->price}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <h6>Recent Orders</h6>
                                <div class="db-table-wrapper">
                                    <table id="recent-order-table" class="table table-responsive-sm dashboard-table">
                                        <thead>
                                        @if($orders_count==0)
                                            <tr>
                                                <th scope="col">{{__('dashboard.no_order_found')}}</th>
                                            </tr>
                                        @else
                                        <tr>
                                            <th scope="col">{{__('dashboard.customer')}}</th>
                                            <th scope="col">{{__('dashboard.orders')}}</th>
                                            <th scope="col">{{__('dashboard.status')}}</th>
                                            <th scope="col">{{__('dashboard.worth')}}</th>
                                        </tr>
                                        @endif

                                        </thead>
                                        <tbody>
                                            @isset($new_orders)

                                            @foreach($new_orders as $order)
                                            {{--  {{dd($order,$order->format())}}  --}}
                                            <tr>
                                                <td>
                                                    <div class="customer">
                                                        <div class="name">{{$order->format()['user']['name'] ? $order->format()['user']['name'] : $order->format()['user']['phone'] ?? $order->format()['user']['email'] }}</div>
                                                        <span>{{$order->format()['user']['address']}}</span>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="cus-orders">
                                                      @foreach($order->rel_orderItems as $item)
                                                           <p>{{$item->rel_products->name}},</p>                                                      
                                                      @endforeach
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="order-status  @if($order->status=='initial') pending @elseif($order->status=='success') delivered  @else cancelled @endif ">{{$order->status}}</span>
                                                </td>
                                                <td>
                                                    <span class="order-worth">
                                                        Rs. {{$order->format()['price']}}
                                                    </span>
                                                </td>

                                            </tr>
                                            @endforeach

                                            @endisset
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END  dashboard wrapper------------------------- -->
@endsection
@section('scripts')
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
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


