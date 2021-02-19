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
        <form method="post" action="{{route('category.tranlate.submit',$category->id)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('put')}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>Category Name</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ isset($category->nep_title) ? $category->nep_title : $category->title}}">
                        @if($errors->has('title'))
                            <span class="help-block">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <!-- /.form-group -->

                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                        <label>Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" value="{{$category->slug}}" disabled >
                    </div>
                    @if($errors->has('slug'))
                        <span class="help-block">{{ $errors->first('slug') }}</span>
                @endif

                <!-- /.form-group -->
                </div>

                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('feature') ? ' has-error' : '' }}">
                        <label>Feature </label>
                        <select name="feature" class="form-control">
                            <option value="1" @if($category->featured ==1 ) selected @endif>Yes</option>
                            <option value="0" @if($category->featured ==0 ) selected @endif>No</option>
                        </select>
                    </div>
                    @if($errors->has('feature'))
                        <span class="help-block">{{ $errors->first('feature') }}</span>
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label>Description</label>
                        <textarea  name="description" id="description" class="form-control" >{{ isset($category->nep_description) ?$category->nep_description: $category->description}}</textarea>
                    </div>
                    @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                @endif

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
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()


    </script>
@endsection