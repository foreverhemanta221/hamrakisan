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
                    <h1>Dashboard</h1>
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col-xl-12">
                                <h6>Recent Orders</h6>
                                <div class="db-table-wrapper">
                                    <table id="asdas" class="table table-responsive-sm dashboard-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Farm</th>
                                            <th scope="col">Ordered</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Worth</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                        {{--  {{dd($order->format()['price'])}}  --}}
                                        <tr>
                                            <td>
                                                <div class="customer">
                                                    <div class="name">{{$order->rel_farm->name}}</div>
                                                    <span>{{$order->created_at->format('d,M-Y')}}</span>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="cus-orders">
                                                    @foreach ($order->rel_orderItems as $item)
                                                       {{$item->rel_products->name}}
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>
                                                {{--  <span class="order-status pending">Pending</span>  --}}
                                               <div class="dropdown">
                                                    <button class="order-status btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{$order->status}}
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                        <button class="dropdown-item info" type="button">cancel order</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                              <a href="{{URL::to('my-order')}}" class="order-status btn btn-info">View Details</a>
                                            </td>
                                            <td>
                                              <span class="order-worth">
                                                {{$order->format()['price']}}
                                              </span>
                                            </td>
                                        </tr>
                                        @endforeach

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
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
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


