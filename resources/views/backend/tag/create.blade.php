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
            <li class="">Tags</li>
            <li class="active">create</li>
        </ol>
    </section>
    <br>
    <div class="box box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tags</label>
                   <input type="text" name="tag" class="form-control">
                </div>
                <!-- /.form-group -->

                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" disabled >
                </div>

                <!-- /.form-group -->
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-success pull-right">
            </div>
            <!-- /.col -->
        </div>

        <!-- /.row -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        Tag is used to ...............
    </div>
    </div>
    <!-- /.box -->
@endsection