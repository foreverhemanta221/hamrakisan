@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('body')
    <section class="content-header">
        <h1>
            Orders
{{--            <small>All Products(tools) </small>--}}
        </h1>

    </section>
    <section class="content">
        <div class="box box-body">
            <div class="box-header">
                <h3 class="box-title">Orders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Farm Name</th>
                        <th>Order By</th>
                        <th>Items</th>
                        <th>Price</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allOrders as $order)

                        @if(!empty($order))
                        <tr>
                            <td>{{$order['farm']['farm_name']}}</td>
                            <td>{{($order['user']['name']!=null ? $order['user']['name'] : $order['user']['phone']!=null) ? $order['user']['phone'] : $order['user']['email']}}</td>
                            <td>{{$order['itemList']}}</td>
                            <td>{{$order['price']}} </td>
                            <td>{{$order['date']}} </td>
                            <td><span class="badge badge-light">{{$order['status']}}</span> </td>
                            <td>
                                <a href="{{route('orders.show',$order['id'])}}" class="btn btn-xs btn-info" style=" border-radius: 0px;"><i class="fa fa-edit"></i>Show</a>
                                {{--                                <a href="#" class="btn btn-xs btn-danger"  data-value="{{ $product->id }}" id="delete_product"--}}
                                {{--                                   data-toggle="modal" data-target="#delete_modal"--}}
                                {{--                                   title="Remove this Products" style=" border-radius: 0px;">Delete <i class="fa fa-trash" style="color: #ffffff"></i></a>--}}
                            </td>

                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <div id="delete_modal" class="modal fade" image="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <i class="fa fa-trash"></i> Are you sure you want to delete this Listing? it will delete its product too
                    </h4>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="_token" id="token" value="{{ Session::token() }}">
                    <input type="submit" class="btn btn-danger pull-left" value="Yes, Delete this image"
                           id="delete_confirm">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>
    <!-- /.box -->
@endsection

@section('js')
    <!-- DataTables -->
    <script src="{{URL::asset('backend/plugin/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('backend/plugin/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            // $('#example1').DataTable()
            $('#example1').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
    <script>
        $(document).ready(function (e) {
            $(document).on('click', '#delete_product', function (e) {
                var productId = $(this).attr('data-value');
                $("#delete_confirm").click(function () {
                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': '{{ Session::token() }}'}
                    });

                    $.ajax({
                        url: '{{ url('/products') }}' + '/' + productId,
                        type: 'DELETE',
                        data: {
                            "id": productId,
                            "_method": 'DELETE',
                        },
                        success: function (result) {
                            console.log(result)
                            window.location = '{{route('products.index')}}';
                        },
                        error: function (result) {
                            console.log(result)
                            window.location = '{{route('products.index')}}';
                        }
                    });
                });
            });
            //change status
        });
    </script>

@endsection
