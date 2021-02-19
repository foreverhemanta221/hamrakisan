@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('body')
    <section class="content-header">
        <h1>
            Farm List Request
            <small>All Farm </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Farm</a></li>
            <li><a href="#">Farm List</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-body">
            <div class="box-header">
                <h3 class="box-title">Farm List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Farm Name</th>
                        <th>Farmer Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Stauts</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($farmlist as $farmrequest)
                        <tr>
                            <td>{{$farmrequest->farmName}}</td>
                            <td>{{$farmrequest->farmerName}}</td>
                            <td>{{$farmrequest->farmPhone}}</td>
                            <td>{{$farmrequest->farmLocation}}</td>
                            <td>{{$farmrequest->status == 0 ? 'new':'viewed'}}</td>
                            <td>
                                <a href="{{URL::to('farmlistingrequest/'.$farmrequest->id)}}" class="btn btn-xs btn-info" style=" border-radius: 0px;"><i class="fa fa-edit"></i>Show</a>
                                <a href="#" class="btn btn-xs btn-danger"  data-value="{{ $farmrequest->id }}" id="delete_image"
                                   data-toggle="modal" data-target="#delete_modal"
                                   title="Remove from this gallery" style=" border-radius: 0px;">Delete <i class="fa fa-trash" style="color: #ffffff"></i></a>

                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.box -->

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
            $(document).on('click', '#delete_image', function (e) {
                var form_id = $(this).attr('data-value');


                $("#delete_confirm").click(function () {

                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': '{{ Session::token() }}'}
                    });

                    $.ajax({
                        url: '{{ url('farmlistingrequest') }}' + '/' + form_id,
                        type: 'DELETE',
                        data: {
                            "id": form_id,
                            "_method": 'DELETE',
                        },
                        success: function (result) {
                            console.log(result)
                            window.location = '{{route('farmlistrequest.index')}}';
                        },
                        error: function (result) {
                            console.log(result)
                            window.location = '{{route('farmlistrequest.index')}}';
                        }
                    });
                });
            });
        });
    </script>
@endsection
