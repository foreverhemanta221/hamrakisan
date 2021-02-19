@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('body')
    <section class="content-header">
        <h1>
            Vendors
            <small>All Vendor </small>
        </h1>
        {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
            {{--<li><a href="#">Tables</a></li>--}}
            {{--<li class="active">Data tables</li>--}}
        {{--</ol>--}}
    </section>
    <section class="content">
        <div class="box box-body">
            <div class="box-header">
                <h3 class="box-title">Vendor Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped dataTable no-footer">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>email</th>
                        <th>Phone</th>

                        <th>Contact Person</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allvendor as $vendor)
                        <tr>
                            <td>{{$vendor->name}}</td>
                            <td>{{$vendor->address}}</td>
                            <td>{{$vendor->email}}</td>
                            <td>{{$vendor->cp_phone}}</td>
                            <td>{{$vendor->cp_name}}</td>
                            <td>
                                <a href="{{route('vendor.edit',$vendor->id)}}" class="btn btn-primary btn-xs">Edit <i class="fa fa-edit"></i></a>|
                                <a href="#" data-value="{{$vendor->id}}" id="delete_vendor"  data-toggle="modal" data-target="#delete_modal" class="btn btn-danger btn-xs"> Delete <i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
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
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
    <script>
        $(document).ready(function (e) {
            $(document).on('click', '#delete_vendor', function (e) {
                var vendor_id = $(this).attr('data-value');


                $("#delete_confirm").click(function () {

                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': '{{ Session::token() }}'}
                    });

                    $.ajax({
                        url: '{{ url('/vendor') }}' + '/' + vendor_id,
                        type: 'DELETE',
                        data: {
                            "id": vendor_id,
                            "_method": 'DELETE',
                        },
                        success: function (result) {
                            console.log(result)
                            window.location = '{{route('vendor.index')}}';
                        },
                        error: function (result) {
                            console.log(result)
                            window.location = '{{route('vendor.index')}}';
                        }
                    });
                });
            });
        });
    </script>
@endsection
