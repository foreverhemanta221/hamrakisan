@extends('backend.layout.layout')
@section('css')
    <style>
        .table-header{
            border-bottom: 3px solid yellow;
        }
        .products{
            padding-top: 20px;
        }
    </style>
@endsection
@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{$listing->name}}'s Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Listings</a></li>
            <li class="active">{{$listing->name}}'s profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{$listing->getFeatureImage('small')}}" alt="User profile picture">
                        <div class="profile">
                            {{--  <button type="button" class="btn-primary btn-sm center" data-toggle="modal" data-target="#updateImage">Update Image</button>  --}}
                            <a  class="btn btn-sm btn-info" data-toggle="modal" data-target="#updateImage" style=" border-radius: 0px;"><i class="fa fa-edit"></i>Update Image</a>
                        </div>
                        
                        <h3 class="profile-username text-center">{{$listing->name}}</h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <a href="{{route('farmproduct.index',$listing->id)}}"> <b>Total Products</b> <span class="pull-right">{{count($listing->products)}}</span></a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('review.index',$listing->id)}}"> <b>Total Review</b>  <span class="pull-right">{{$listing->rel_review->count()}}</span></a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{URL::to('gallery/'.$listing->id)}}">  <strong>Image Gallery</strong> <span class="pull-right">{{count($listing->images)}}</span></a>
                            </li>
                        </ul>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About {{$listing->name}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Category</strong>
                        <br>
                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">{{$listing->short_address}}</p>
                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Contact Detail</strong>

                        <p>{{$listing->phone}}</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">

                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <span class="username">
                                        <a href="#">About</a>
                                    </span>
                                    <span class="description"></span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    {!! $listing->about !!}
                                </p>
                            </div>
                            <!-- /.post -->

                            <!-- Post -->
                            <div class="post clearfix">
                                <div class="user-block">
                                    <span class="username">
                          <a href="#">Features and Services</a>
                        </span>
                                    {{--<span class="description">Sent you a message - 3 days ago</span>--}}
                                </div>
                                <!-- /.user-block -->
                                <p>
                                   {!! $listing->services !!}
                                </p>

                            </div>
                            <!-- /.post -->

                            <!-- Post -->

                            <!-- /.post -->
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
            <div id="updateImage" class="modal fade" image="dialog">
            <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <i class="fa fa-image"></i> Choose New Feature Image For farm.
                    </h4>
                </div>

                <div class="modal-footer">
                    <form method="post" action="{{route('updateFarmFeatureImage',$listing->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-info">
                            
                                <div class="box box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label> Feature Image <span style="color: #ff0000">*</span> </label>
                                            <div class="form-group {{ $errors->has('feature_image') ? ' has-error' : '' }}">
                                                <input type="file" name="feature_image" id="feature_image" class="form-control">
                                                @if($errors->has('feature_image'))
                                                    <span class="error">{{ $errors->first('feature_image') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success pull-right" value="submit">Submit</button>
                </div>
            </div>

        </div>
    </div>
    </section>

@endsection
@section('js')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>


        tinymce.init({
            selector: ' textarea#description',
            menubar:false,
            height: 75,
            width: 'auto',
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
            content_css: '//www.tinymce.com/css/codepen.min.css'
        });



    </script>
@endsection
