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
                    <h1>Dashboard</h1>
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
                                                <h6>New Orders <span>5</span></h6>
                                                <h5>Rs. 20,000</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-6">
                                        <div class="db-insight">
                                            <div class="db-insight-icon">
                                                <img src="{{URL::asset('frontend/img/icons/products.png')}}" alt="">
                                            </div>
                                            <div class="db-insight-info">
                                                <h6>Products</h6>
                                                <h5>6</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-6">
                                        <div class="db-insight">
                                            <div class="db-insight-icon">
                                                <img src="{{URL::asset('frontend/img/icons/todaysales.png')}}" alt="">
                                            </div>
                                            <div class="db-insight-info">
                                                <h6>Today's Sales</h6>
                                                <h5>Rs. 3000</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-6">
                                        <div class="db-insight">
                                            <div class="db-insight-icon">
                                                <img src="{{URL::asset('frontend/img/icons/visitors.png')}}" alt="">
                                            </div>
                                            <div class="db-insight-info">
                                                <h6>Daily Visitors</h6>
                                                <h5>90</h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-4">
                                <img src="{{URL::asset('frontend/img/trainings/illustration.png')}}" alt="">
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-xl-6">
                                <h6>Recent Orders</h6>
                                <div class="db-table-wrapper">
                                    <table id="recent-order-table" class="table table-responsive-sm dashboard-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Orders</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Worth</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="customer">
                                                    <div class="name">Joe Tribbiani</div>
                                                    <span>Chitwan</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cus-orders">
                                                    Tomatoes, Spinach, Mushroom
                                                </div>
                                            </td>
                                            <td>
                                                <span class="order-status pending">Pending</span>
                                            </td>
                                            <td>
                      <span class="order-worth">
                        Rs 11,280
                      </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="customer">
                                                    <div class="name">Nacho Varga</div>
                                                    <span>Pokhara</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cus-orders">
                                                    Tomatoes, Spinach, Mushroom
                                                </div>
                                            </td>
                                            <td>
                                                <span class="order-status delivered">Delivered</span>
                                            </td>
                                            <td>
                      <span class="order-worth">
                        Rs 11,280
                      </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="customer">
                                                    <div class="name">Kim Wexler</div>
                                                    <span>Butwal</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cus-orders">
                                                    Tomatoes, Spinach, Mushroom
                                                </div>
                                            </td>
                                            <td>
                                                <span class="order-status cancelled">cancelled</span>
                                            </td>
                                            <td>
                      <span class="order-worth">
                        Rs 11,280
                      </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="customer">
                                                    <div class="name">Gustavo Fring</div>
                                                    <span>Butwal</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cus-orders">
                                                    Tomatoes, Spinach, Mushroom
                                                </div>
                                            </td>
                                            <td>
                                                <span class="order-status pending">Pending</span>
                                            </td>
                                            <td>
                      <span class="order-worth">
                        Rs 11,280
                      </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <h6>Hot Products</h6>
                                <div class="db-table-wrapper">
                                    <table id="hotproducts-table" class="table  dashboard-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Sold to</th>
                                            <th scope="col">Sales vol.</th>
                                            <th scope="col">Sales worth</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="dashboard-table-product">
                                                    <img src="{{URL::asset('frontend/img/farm/fp (2).png')}}" alt="">
                                                    Spianch
                                                </div>
                                            </td>
                                            <td>300</td>
                                            <td>270 kg</td>
                                            <td>Rs. 16200</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="dashboard-table-product">
                                                    <img src="{{URL::asset('frontend/img/farm/fp (5).png')}}" alt="">
                                                    Tomato
                                                </div>
                                            </td>
                                            <td>256</td>
                                            <td>76 Kg</td>
                                            <td>Rs. 2280</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="dashboard-table-product">
                                                    <img src="{{URL::asset('frontend/img/farm/fp (4).png')}}" alt="">
                                                    Mushroom
                                                </div>
                                            </td>
                                            <td>234</td>
                                            <td>70 Kg</td>
                                            <td>Rs. 3150</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="dashboard-table-product">
                                                    <img src="{{URL::asset('frontend/img/farm/fp (3).png')}}" alt="">
                                                    Bro coli
                                                </div>
                                            </td>
                                            <td>80</td>
                                            <td>160 Kg</td>
                                            <td>Rs. 5120</td>
                                        </tr>
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


