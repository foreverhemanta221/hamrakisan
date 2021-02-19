@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tags
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="">Image</li>
            <li class="active">create</li>
        </ol>
    </section>
    <br>
    <div class="box box-body">
        <form method="post" action="{{route('image.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image title</label>
                        <input type="text" name="tag" id="tag" class="form-control">
                    </div>
                    <!-- /.form-group -->

                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image Alt</label>
                        <input type="text" name="slug" id="slug" class="form-control" disabled >
                    </div>

                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" name="image" id="slug" class="form-control" >
                    </div>

                    <!-- /.form-group -->
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success pull-right">
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- /.row -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        Tag is used to ...............
    </div>

    <!-- /.box -->
@endsection
@section('js')

@endsection