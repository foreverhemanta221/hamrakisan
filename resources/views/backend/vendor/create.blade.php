@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <style>
        .text-danger{
            color: red;
        }
    </style>
@endsection
@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Vendor
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="">Vendor</li>
            <li class="active">create</li>
        </ol>
    </section>
    <br>
    <div class="box box-body">
        <form method="post" action="{{route('vendor.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name <span style="color: #FF0000;">*</span></label>
                        <input type="text" name="title" id="tag" class="form-control">
                    </div>
                    @if($errors->has('title'))
                        <span class="help-block text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address <span style="color: #FF0000;">*</span></label>
                        <input type="text" name="address" id="tag" class="form-control">
                    </div>
                    @if($errors->has('address'))
                        <span class="help-block text-danger">{{ $errors->first('address') }}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email <span style="color: #FF0000;">*</span></label>
                        <input type="email" name="email" id="tag" class="form-control">
                    </div>
                    @if($errors->has('email'))
                        <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Contact Person Name <span style="color: #FF0000;">*</span></label>
                        <input type="text" name="cp_name" id="cp_name" class="form-control">
                    </div>
                    @if($errors->has('cp_name'))
                        <span class="help-block text-danger">{{ $errors->first('cp_name') }}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone No <span style="color: #FF0000;">*</span></label>
                        <input type="text" name="cp_phone" id="tag" class="form-control">
                    </div>
                    @if($errors->has('cp_phone'))
                        <span class="help-block text-danger text-danger">{{ $errors->first('cp_phone') }}</span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="slug" class="form-control" ></textarea>
                        @if($errors->has('description'))
                            <span class="help-block text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
                <!-- /.col -->


                <div class="col-md-12">
                    <input type="submit" class="btn btn-success pull-right">
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!-- /.row -->
    </div>
    <!-- /.box-body -->


    <!-- /.box -->
@endsection
@section('js')

@endsection
