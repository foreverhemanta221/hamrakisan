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
                        <!-- <i class="fas fa-arrow-left d-none"></i> -->
                    </button>
                </div>
                <!-- dashboard cards -->
                 <div class="db-body">
                    <h1>Orders</h1>
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col-xl-12">
                                <h6>Recent Orders</h6>
                                <div class="db-table-wrapper">
                                    <table id="asdas" class="table table-responsive-sm dashboard-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Ordered</th>
                                            <th scope="col">Worth</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                <div class="customer">
                                                       <div class="name">{{$order->format()['user']['name'] ? $order->format()['user']['name'] : $order->format()['user']['phone'] ?? $order->format()['user']['email'] }}</div>
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
                                              <span class="order-worth">
                                                {{$order->format()['price']}}
                                              </span>
                                            </td>
                                            <td>
                                                {{-- {{dd($order->status)}} --}}
                                                <span class="order-status  @if($order->status=='initial') pending @elseif($order->status=='success') delivered  @else cancelled @endif ">{{$order->status}}</span>
                                            </td>
                                            <td>
                                              <a href="{{URL::to('farmorder/'.$order->id)}}" class="">
                                                  <i class="fa fa-eye" aria-hidden="true"></i>
                                                  View </a>
                                                  <br/>
                                                  @if($order->status=='initial')
                                                    <a onclick="acceptOrder({{$order->id}})"  class="remove-cart-item"  href="">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            Accept
                                                        </a>
                                                        <br/>
                                                        <a onclick="rejectOrder({{$order->id}})"  class="remove-cart-item" style="color: red"  href="">
                                                        <i class="far fa-times-circle"  ></i>
                                                        Reject
                                                        </a>
                                                    @endif
                                            </td>

                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                        
                                <div class="row bg-white">
                                    <div class="col">
                                        <div class="d-flex">
                                            <div class="mx-auto">
                                                {{$orders->links("pagination::bootstrap-4")}}
                                                {{--  {{ $orders->links() }}  --}}
                                            </div>
                                        </div>
                                    </div>
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
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.min.js')}}"></script>
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

        function acceptOrder(orderId) {
            if(confirm('are you sure you want to accept this order ?')){
                let status = '<?php echo App\Models\Order::ORDER_SUCCESS ?>'
                ajaxForStatusChange(orderId,status)
            }
        }

        function rejectOrder(orderId) {
            if(confirm('are you sure you want to accept this order ?')){
                let status = '<?php echo App\Models\Order::ORDER_REJECT ?>'
                ajaxForStatusChange(orderId,status)
            }
        }

        function ajaxForStatusChange(orderId,status) {
           let base_url = 'https://hamrakisan.com';
            axios.post(base_url+'/order/change-status', {
                orderId: orderId,
                orderStatus: status
            }).then(function (response) {

                if(response.data.status===false){

                    window.location = '{{route('userlogin')}}'
                }
                if(response.data.status===true){
                    swal({
                        buttons: false,
                        icon: "success",
                        timer: 2500,
                        text: 'Order Status Changed Successfully !!!'
                    });

                    window.location.reload();
                    // document.getElementById('minicart').innerHTML = '';
                }
            }).catch(function (error) {
                console.log(error);
            });
        }


    </script>
@endsection
