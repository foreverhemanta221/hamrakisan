@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
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
            User
            <small>create new user</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="">user management</li>
            <li class="active">create</li>
        </ol>
    </section>
    <br>
    <div class="box box-body">
        <form method="post" action="{{route('users.update',$userDetail->id)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$userDetail->name}}">
                    </div>
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$userDetail->email}}">
                    </div>
                    @error('email')
                    {{$message}}
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" id="role" class="form-control">
                            @foreach(getRole() as $role)
                                <option value="{{$role}}" @if($role== $userDetail->role) selected="selected" @endif>{{$role}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('role')
                    {{$message}}
                    @enderror
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
