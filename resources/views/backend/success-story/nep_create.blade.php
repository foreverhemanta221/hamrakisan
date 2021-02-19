@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Success Story In Nepali
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
                        <label>Title In Nepali<span style="color: #FF0000;">*</span></label>
                        <input type="text" name="nep_title" id="title" class="form-control">
                    </div>
                    <!-- /.form-group -->

                    <!-- /.form-group -->
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description In nepali </label>
                        <textarea name="nep_description" id="description" class="form-control" ></textarea>
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