@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('body')
    <section class="content-header">
        <h1>
            Orders
        </h1>

    </section>
    <section class="content">
        <div class="box box-body">
            <div class="box-header">
                <h3 class="box-title">Order  Detail </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- Main content -->
                <section class="invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> {{$order->format()['farm']['farm_name'] ? $order->format()['farm']['farm_name'] : $order->format()['farm']['phone'] ?? $order->format()['farm']['farm_email'] }}
                                <small class="pull-right">Date: {{$order->created_at->format('d,M-Y')}}</small>
                            </h2>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>{{$order->format()['farm']['farm_name'] ? $order->format()['farm']['farm_name'] : $order->format()['farm']['phone'] ?? $order->format()['farm']['farm_email'] }}</strong><br>
                                {{$order->format()['farm']['farm_address']}}<br>

                                Phone: {{$order->format()['farm']['phone']}}<br>
                                Email: {{$order->format()['farm']['farm_email']}}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>{{$order->format()['user']['name'] ? $order->format()['user']['name'] : $order->format()['user']['phone'] ?? $order->format()['user']['email'] }}</strong><br>
                                {{$order->format()['user']['address']}}<br>
                                Phone: {{$order->format()['user']['phone']}}<br>
                                Email: {{$order->format()['user']['email']}}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Order Id:  {{$order->id}}</b><br>
                            <b>Amount:</b> {{$order->format()['price']}}
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($order->rel_orderItems as $products)
                                    <tr>
                                        <td><img src="{{$products->format()['productDetail']['image']}}" alt=""></td>
                                        <td>{{$products->format()['productDetail']['name']}}</td>
                                        <td>{{$products->format()['orderDetail']['qty']}} </td>
                                        <td>    {{$products->format()['orderDetail']['price']}} </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->


                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            @if($order->status=='initial')
                                <a onclick="acceptOrder({{$order->id}})"  class="btn btn-success">Accpt Order</a>
                                <a onclick="rejectOrder({{$order->id}})"  class="btn btn-danger">Reject Order</a>
                            @endif
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.box-body -->
        </div>
    </section>

@endsection

@section('js')
    <script>
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

            let base_url = 'http://127.0.0.1:8000';
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
