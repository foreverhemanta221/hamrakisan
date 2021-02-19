@extends('backend.layout.layout')
@section('css')
    {{--<link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    {{--<link rel="stylesheet" href="{{URL::asset('backend/plugin/iconpicker/css/fontawesome-iconpicker.min.css')}}">--}}
    <style>
        footer {
            font-style: italic;
            background: #f7f7f7;
            padding: 60px;
            text-align: center;
            margin-top: 60px;
        }

        pre {
            text-align: left;
        }

        .form-control, .form-group {
            position: relative;
        }

        p.lead {
            max-width: 800px;
            margin: 0 auto 20px auto;
        }

        div.lead {
            margin: 30px 0;
        }

        a.action-placement {
            margin: 0 4px 4px 4px;
            display: inline-block;
            /*border-bottom: 1px dotted #428BCA;*/
            text-decoration: none;
        }

        a.action-placement.active {
            color: #5CB85C;
        }

        .form-group {
            text-align: left;
            margin-bottom: 30px;
        }

        .form-group label {
            display: block;
            margin-bottom: 15px;
        }

        .lead iframe {
            display: inline-block;
            vertical-align: middle;
        }
    </style>
@endsection
@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="">Category</li>
            <li class="active">create</li>
        </ol>
    </section>
    <br>
    <div class="box box-body">
        <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <!-- /.form-group -->

                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" disabled >
                    </div>

                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>icon</label>
                        <input type="text" name="icon" class="form-control" value="fa fa-" >
                    </div>

                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <!-- Color Picker -->
                    <div class="form-group">
                        <label>Color picker with addon:</label>

                        <div class="input-group my-colorpicker2">
                            <input type="text" class="form-control" name="color" value="#20910E">

                            <div class="input-group-addon">
                                <i></i>
                            </div>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image</label>
                        <input name="image" class="form-control"  type="file"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Feature </label>
                        <select name="feature" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea  name="description" id="description" class="form-control" ></textarea>
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
        Category is used to ...............
    </div>
    </div>
    <!-- /.box -->
@endsection
@section('js')

    <script src="{{URL::asset('backend/plugin/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>

    <script>

        $("#title").change(function() {
            var package_name = $("#title").val();
            // alert(package_name.toLowerCase().split(' ').join('_')) ;
            $('#slug').val(package_name.toLowerCase().split(' ').join('_'));
        });
    </script>

    <script>
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()


    </script>
@endsection