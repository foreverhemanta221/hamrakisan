@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/select2/dist/css/select2.min.css')}}"
          xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
@endsection
@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Product
            <small>Preview</small>
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
        <div class="box box-body">
            <div class="row">
                <div class="col-md-8">
                    <form class="form-horizontal" method="post" action="{{route('farmproduct.update',$product->id)}}" enctype="multipart/form-data">
                        @csrf
                        {{method_field('put')}}
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="Product Name" name="name" value="{{$product->name}}">
                                @if($errors->has('name'))
                                    <span style="color: red">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Mimimum Quantity</label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputName" placeholder="Product Name" name="minimum_quantity" value="{{$product->minimum_quantity}}">
                                @if($errors->has('minimum_quantity'))
                                    <span style="color: red">{{$errors->first('minimum_quantity')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Measurement Unit</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="Measurement Unit" name="measure_unit" value="{{$product->measure_unit}}">
                                @if($errors->has('measure_unit'))
                                    <span style="color: red">{{$errors->first('measure_unit')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Rate</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="rate" placeholder="Rate" name="rate" value=" {{$product->price}}">
                                @if($errors->has('rate'))
                                    <span style="color: red">{{$errors->first('rate')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Image</label>

                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="image" name="image">
                                @if($errors->has('image'))
                                    <span style="color: red">{{$errors->first('image')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-danger" value="submit">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <h3 style="text-align: center;font-weight: bold">{{$product->name}}</h3>
                    <img src="{{$product->getFeatureImage('medium')}}" alt="">

                </div>
            </div>

        </div>
    </section>

@endsection
@section('js')
    <script src="{{URL::asset('backend/plugin/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script src="{{URL::asset('backend/plugin/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>

    <script>



        tinymce.init({
            selector: 'textarea#description',
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

    <script>
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
        //Initialize Select2 Elements
        $('.select2').select2()

    </script>


@endsection
