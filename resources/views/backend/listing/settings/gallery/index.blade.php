@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('body')
    <section class="content-header">
        <h1>
            Image Gallery
            <small>Someones name</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>
    <input type="hidden" id="listing_id" name="listing_id" value="{{$listing->id}}">
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Images of <span style="text-transform: capitalize"><strong>{{$listing->name}}</strong></span>  </h3>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#myModal">Add New Image to Gallery</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row ">
                    <div class="col-md-4 table-header"><strong>Name</strong></div>
                    <div class="col-md-4 table-header"><strong>Image</strong></div>
                    <div class="col-md-4 table-header"><strong>Action</strong></div>
                </div>
                @if(count($listing->images)>0)
                    @foreach($listing->images as $image)
                        <div class="row products">
                            <div class="col-md-4">{{$image->name}}</div>
                            <div class="col-md-4"><img src="{{URL::asset($image->small_thumb)}}" style="max-width: 100%;" alt=""></div>
                            <div class="col-md-4">

                                <a href="#"  data-value="{{ $image->id }}" id="delete_detail"
                                   data-toggle="modal" data-target="#delete_modal" class="btn btn-danger btn-sm"><i class="fa fa-trash" style="color: white"></i>Delete</a>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                @else
                    <span style="color: indianred;">No Image Available</span>
                @endif
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.box -->
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" action="{{route('insertgalleryimage',$listing->id)}}" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><strong>Insert New Image</strong></h4>
                </div>
                <div class="modal-body">

                        <input type="file" name="image" class="form-control">

                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit" value="Upload" class="btn btn-success">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>

        </div>
    </div>
    {{--delete modal--}}
    <div id="delete_modal" class="modal modal-danger fade" image="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <i class="fa fa-trash"></i> Are you sure you want to delete this image?
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

    <script>
        $(document).ready(function (e) {
            $(document).on('click', '#delete_detail', function (e) {
                var image_id = $(this).attr('data-value');
                var listing_id = $('#listing_id').val();



                $("#delete_confirm").click(function () {
                    // alert(virus_id)
                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': '{{ Session::token() }}'}
                    });

                    $.ajax({
                        url: '{{ url('/imagegallery') }}' + '/' + image_id,
                        type: 'DELETE',  // gallery.destroy
                        data: {
                            "id": image_id,
                            "_method": 'DELETE',
                        },
                        success: function (result) {
                            console.log(result)
                            window.location = '{{url('gallery')}}'+'/'+listing_id
                        },
                        error: function (result) {
                            console.log(result)
                            window.location = '{{url('gallery')}}'+'/'+listing_id;
                        }
                    });
                });
            });
        });
    </script>
@endsection