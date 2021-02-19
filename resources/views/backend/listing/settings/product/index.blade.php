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
            View Product
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
            <div class="box-header">
                <h3 class="box-title">Products</h3>
                <a href="{{route('farmproduct.create',$listing->id)}}" class="pull-right btn btn-sm btn-primary">Add Product</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th >Name</th>
                        <th>Image</th>
                        <th>Price per Unit</th>
                        <th>Minimum Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td><img src="{{$product->getFeatureImage('small')}}"></td>
                            <td>{{$product->price}} </td>
                            <td>{{$product->minimum_quantity}}   {{$product->measure_unit}}</td>
                            <td>
                                <a href="{{route('farmproduct.edit',$product->id)}}" class="btn btn-xs btn-info" style=" border-radius: 0px;"><i class="fa fa-edit"></i>edit</a>
                                <a href="#" class="btn btn-xs btn-danger"  data-value="{{ $product->id }}" id="delete_image"
                                   data-toggle="modal" data-target="#delete_modal"
                                   title="Remove from this gallery" style=" border-radius: 0px;">Delete <i class="fa fa-trash" style="color: #ffffff"></i></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
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
