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
            <form class="form-horizontal" method="post" action="{{route('farmproduct.store',$listing->id)}}" enctype="multipart/form-data">
                @csrf
                {{method_field('put')}}
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" placeholder="Product Name" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Mimimum Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputName" placeholder="Minium Quantity" name="minimum_quantity">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Measurement Unit</label>
                    <div class="col-sm-10">
                        <select name="measure_unit" id="inputName" class="form-control" >
                            <option value="">Select Unit</option>
                            @foreach(measureUnit() as $key=>$value)
                                <option value="{{$value}}">{{$value}}</option>
                            @endforeach
                        </select>
{{--                        <input type="text" id="inputName" placeholder="Product Name" name="measure_unit">--}}
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Rate per  Unit</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="rate" placeholder="Rate" name="rate">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Image</label>

                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-danger" value="submit">
                    </div>
                </div>
            </form>
            @csrf
            {{method_field('PUT')}}
        </div>

    </section>

@endsection
@section('js')
    <script src="{{URL::asset('backend/plugin/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script src="{{URL::asset('backend/plugin/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>

    <script>

        $("#title").change(function() {
            var package_name = $("#title").val();
            $('#slug').val(package_name.toLowerCase().split(' ').join('_'));
        });

        tinymce.init({
            selector: 'textarea#about, textarea#features',
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
