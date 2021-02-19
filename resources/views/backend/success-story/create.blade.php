@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Success Story
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="">Success Story</li>
            <li class="active">create</li>
        </ol>
    </section>
    <br>
    <div class="box box-body">
        <form method="post" action="{{route('farmstory.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Title <span style="color: #FF0000;">*</span></label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    @error('title')
                    <span style="color: #FF0000;">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Feature Image <span style="color: #FF0000;">*</span></label>
                        <input type="file" name="image" id="image" class="form-control" >
                    </div>
                    @error('image')
                    <span style="color: #FF0000;">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Video URL <span style="color: #FF0000;">*</span></label>
                        <input type="text" name="url" id="url" class="form-control" >
                    </div>
                    @error('url')
                    <span style="color: #FF0000;">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success pull-right">
                </div>
            </div>
        </form>

        <!-- /.row -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">

    </div>

    <!-- /.box -->
@endsection
@section('js')

@endsection
