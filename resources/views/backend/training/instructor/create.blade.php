@extends('backend.layout.layout')
@section('css')
    {{--<link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/select2/dist/css/select2.min.css')}}"
          xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">

@endsection
@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Instructor(Teacher)
            <small>Form</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="">Trainings</li>
            <li class="">Instructor</li>
            <li class="active">create</li>
        </ol>
    </section>
    <br>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Instructor Create Form</h3>
                    </div>
                    <form role="form" method="post" action="{{route('trainings-instructor.store')}}" enctype="multipart/form-data" >
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" id="title" name="instructor_name" placeholder="Enter Name ">
                                    @error('instructor_name')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name="instructor_image" >
                                    @error('instructor_image')
                                         <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Features">Profession</label>
                                    <input type="text" class="form-control" id="instructor_profession" name="instructor_profession">
                                    @error('instructor_profession')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Features">Facebook</label>
                                    <input type="text" class="form-control" id="instructor_facebok_detail" name="instructor_facebook_detail">
                                    @error('instructor_facebook_detail')
                                         <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Features">Twitter</label>
                                    <input type="text" class="form-control" id="instructor_twitter_detail" name="instructor_twitter_detail">
                                    @error('instructor_twitter_detail')
                                         <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Features">Instagram</label>
                                    <input type="text" class="form-control" id="instructor_instagram_detail" name="instructor_instagram_detail">
                                    @error('instructor_instagram_detail')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <textarea  class="form-control" id="instructor_detail" name="instructor_detail"></textarea>
                                    @error('instructor_detail')
                                    <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
        </div>
    </section>

@endsection
@section('js')


@endsection



