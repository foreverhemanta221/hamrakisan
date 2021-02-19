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
