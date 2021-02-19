@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('body')
    <section class="content-header">
        <h1>
            Users
            <small>All Users </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userdata as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}
                        </td>
                        <td>{{$user->role}}</td>
                        <td>
                        @if($user->role!='admin')
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-xs btn-info" style=" border-radius: 0px;"><i class="fa fa-edit"></i>edit</a>
                                <a href="#"  data-value="{{ $user->id }}" id="password_change"
                                   data-toggle="modal" data-target="#password_modal"
                                   title="Change Password" class="btn btn-success btn-xs"><i class="fa fa-trash" ></i>Change Password</a>
                        @endif
                        </td>

                    </tr>
                    @endforeach

                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.box -->
    {{--delete model--}}
    <div id="delete_modal" class="modal modal-danger fade" image="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <i class="fa fa-trash"></i> Are you sure you want to delete this image?
                    </h4>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="_token" id="token" value="{{ Session::token() }}">
                    <input type="submit" class="btn btn-danger pull-left" value="Yes, Delete this image"
                           id="delete_confirm">

                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>
    {{--password change model--}}
    <div id="password_modal" class="modal modal-default fade" image="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <i class="fa fa-pen"></i> Change Password?
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" class="form-control" id="password">

                    </div>


                        <span class="help-block password-error" style="color: red;"></span>

                    <div class="form-group">
                        <label for="re-password">Re enter Password</label>
                        <input type="password" name="password_confirm" class="form-control" id="re-password">
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="_token" id="token" value="{{ Session::token() }}">
                    <input type="submit" class="btn btn-success pull-left" value="Change"
                           id="change_confirm">

                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <!-- DataTables -->
    <script src="{{URL::asset('backend/plugin/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('backend/plugin/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
    <script>
        $(document).ready(function (e) {
            $(document).on('click', '#password_change', function (e) {
                var user_id = $(this).attr('data-value');



                $("#change_confirm").click(function () {
                    var password = $('#password').val()
                    var password_confirmation= $('#re-password').val()
                    // alert(virus_id)
                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': '{{ Session::token() }}'}
                    });

                    $.ajax({
                        url: '{{ url('/users/password_change') }}' + '/' + user_id,
                        type: 'PUT',  // gallery.destroy

                        data: {
                            "id": user_id,
                            "_method": 'PUT',
                            "password": password,
                            "password_confirmation":password_confirmation
                        },
                        success: function (result) {
                            console.log(result)
                            if(result.errors){
                                $('.password-error').empty()
                                jQuery.each(result.errors, function(key, value){
                                    // alert(value)
                                    $('.password-error').append(value)
                                });
                            }else{

                            }
                            window.location = '{{route('users.index')}}'

                        },
                        error: function (result) {
                            console.log(result)
                            {{--window.location = '{{route('/users.index')}}'--}}
                        }
                    });
                });
            });
        });
    </script>
@endsection
