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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 40%">Name</th>
                        <th style="width: 40%;">Video</th>

                        <th style="width: 20%;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($farm_stories as $story)
                        <tr>
                            <td>{{$story->title}}</td>
                            <td> <div class="iframe-container">{!! $story->video !!}</div></td>

                            <td>

                                <a href="#"  data-value="{{ $story->id }}" id="delete_image"
                                   data-toggle="modal" data-target="#delete_modal"
                                   title="Remove from this gallery"><i class="fa fa-trash" style="color: red"></i></a>
                                   <a href="#"><i class="fa fa-language" style="color: #0d6aad"></i></a>

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
            $(document).on('click', '#delete_image', function (e) {
                var story_id = $(this).attr('data-value');


                $("#delete_confirm").click(function () {

                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': '{{ Session::token() }}'}
                    });

                    $.ajax({
                        url: '{{ url('/farmstory') }}' + '/' + story_id,
                        type: 'DELETE',
                        data: {
                            "id": story_id,
                            "_method": 'DELETE',
                        },
                        success: function (result) {
                            console.log(result)
                            window.location = '{{route('farmstory.index')}}';
                        },
                        error: function (result) {
                            console.log(result)
                            window.location = '{{route('farmstory.index')}}';
                        }
                    });
                });
            });
        });
    </script>
@endsection
