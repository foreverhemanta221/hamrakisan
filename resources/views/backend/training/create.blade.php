@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/select2/dist/css/select2.min.css')}}"
          xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Training
            <small>Form</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="">Product</li>
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
                        <h3 class="box-title">Quick Example</h3>
                    </div>
                    <form role="form" method="post" action="{{route('trainings.store')}}" enctype="multipart/form-data" >
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="training_name" placeholder="Enter Title ">
                                    @error('training_name')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image">Feature Image</label>
                                    <input type="file" class="form-control" id="image" name="feature_image" >
                                    @error('feature_image')
                                        <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                           <div class="row">
                               <div class="form-group col-md-6">
                                   <label for="feature_video">Feature Video Link</label>
                                   <input type="text" class="form-control" id="feature_video" name="feature_video" placeholder="Enter Youtube Video Link">
                                   @error('feature_video')
                                        <span style="color: red">{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="form-group col-md-6">
                                   <label for="price">Price</label>
                                   <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price">
                                   @error('price')
                                   <span style="color: red">{{$message}}</span>
                                   @enderror
                               </div>
                           </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="is_active">Status</label>
                                    <select name="is_active" id="is_active" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                    </select>
                                    @error('is_active')
                                    <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">Tags <small>(Seperate tag by comma)</small></label>
                                    <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter Tags (seperate by comma)">
                                    @error('tags')
                                    <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="price">Instructor</label>
                                    <select class="js-example-basic-multiple form-control"  name="training_instructor[]" multiple="multiple">
                                        @foreach($instructors as $instructor)
                                            <option value="{{$instructor->id}}">{{$instructor->instructor_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('training_instructor')
                                    <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="price">Features <small>(Seperate tag by comma)</small></label>
                                    <textarea  class="form-control" id="feature" name="features"></textarea>
                                    @error('features')
                                    <span style="color: red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    @error('short_description')
                                    <span style="color: red">{{$message}}</span>
                                    @enderror
                                    <label for="Features">Short Description</label>
                                    <textarea  class="form-control" id="short_description" name="short_description"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    @error('description')
                                    <span style="color: red">{{$message}}</span>
                                    @enderror
                                    <label for="description">Description</label>
                                    <textarea  class="form-control" id="description" name="description"></textarea>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description');
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

@endsection



