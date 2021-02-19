@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('body')
    <section class="content-header">
        <h1>
            Images
            <small>All Images </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-body">
            <div class="box-header">
                <h3 class="box-title">Images</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table style="width: 100%" id="example1" class="table table-bordered table-striped dataTable no-footer">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allbanner as $banner)
                        <tr>
                            <td><img src="{{URL::to($banner->rel_image->medium_thumb)}}"></td>
                            <td>
                                <a href="#"  data-value="{{ $banner->id }}" id="delete_banner"
                                   data-toggle="modal" data-target="#delete_modal"
                                   title="Remove from this gallery" class="btn btn-danger btn-xs"><i class="fa fa-trash" ></i>Delete</a>
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
                        <i class="fa fa-trash"></i> Are you sure you want to delete this Listing?
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
            $(document).on('click', '#delete_banner', function (e) {
                var cat_id = $(this).attr('data-value');


                $("#delete_confirm").click(function () {

                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': '{{ Session::token() }}'}
                    });

                    $.ajax({
                        url: '{{ url('/banner') }}' + '/' + cat_id,
                        type: 'DELETE',
                        data: {
                            "id": cat_id,
                            "_method": 'DELETE',
                        },
                        success: function (result) {
                            console.log(result)
                            window.location = '{{route('banner.index')}}';
                        },
                        error: function (result) {
                            console.log(result)
                            window.location = '{{route('banner.index')}}';
                        }
                    });
                });
            });
        });
    </script>
@endsection
