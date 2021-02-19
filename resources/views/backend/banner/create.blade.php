@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Banner
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="">Banner</li>
            <li class="active">create</li>
        </ol>
    </section>
    <br>
    <div class="box box-body">
        <form method="post" action="{{route('banner.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" name="image" id="image" class="form-control" >
                    </div>
                    @error('image')
                        <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6 col-md-offset-2">
                    <input type="submit" class="btn btn-success pull-right">
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')

@endsection
