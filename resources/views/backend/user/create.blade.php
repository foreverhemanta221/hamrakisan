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
         .error{
            color:red;
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
        <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                          @if($errors->has('name'))
                                        <span class="error">{{ $errors->first('name') }}</span>
                         @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                          @if($errors->has('email'))
                                        <span class="error">{{ $errors->first('email') }}</span>
                         @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>password</label>
                        <input type="password" name="password" id="password" class="form-control" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Re enter password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                </div>
            </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="">Phone No</label>
                          <input type="text" name="phone_no" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Role</label>
                          <select name="role" id="role" class="form-control">
                              <option value="admin">Admin</option>
                              <option value="user">User</option>
                              <option value="farmer">farmer</option>
                          </select>
                      </div>
                      @error('role')
                      {{$message}}
                      @enderror
                  </div>
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
