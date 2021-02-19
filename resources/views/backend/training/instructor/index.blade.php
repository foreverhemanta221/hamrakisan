@extends('backend.layout.layout')
@section('css')
    {{--<link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/select2/dist/css/select2.min.css')}}"
          xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">

@endsection
@section('body')
    <section class="content-header">
        <h1>
            Instructor
            <small>All Instructor</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Instructor</a></li>
            <li class="active">View Instructor</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-body">
            <div class="box-header">
                <h3 class="box-title">Images</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Profession</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allinstructor as $instructor)
                        <tr>
                            <td>{{$instructor->instructor_name}}</td>
                            <td><img src="{{$instructor->getInstructorImage('small')}}" alt=""> </td>
                            <td>{{$instructor->instructor_profession}} </td>
                            <td>
                                <a href="{{route('trainings-instructor.edit',$instructor->id)}}" class="btn btn-xs btn-info" style=" border-radius: 0px;"><i class="fa fa-edit"></i>edit</a>
                                <a href="#" class="btn btn-xs btn-danger"  data-value="{{ $instructor->id }}" id="delete_instructor"
                                   data-toggle="modal" data-target="#delete_modal"
                                   title="Remove Insturctor" style=" border-radius: 0px;">Delete <i class="fa fa-trash" style="color: #ffffff"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <div id="delete_modal" class="modal fade" image="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <i class="fa fa-trash"></i> Are you sure you want to delete this Listing? it will delete its product too
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
    <!-- /.box -->
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
            $(document).on('click', '#delete_instructor', function (e) {
                var instructorId = $(this).attr('data-value');


                $("#delete_confirm").click(function () {

                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': '{{ Session::token() }}'}
                    });

                    $.ajax({
                        url: '{{ url('/trainings-instructor') }}' + '/' + instructorId,
                        type: 'DELETE',
                        data: {
                            "id": instructorId,
                            "_method": 'DELETE',
                        },
                        success: function (result) {
                            console.log(result)
                            window.location = '{{route('trainings-instructor.index')}}';
                        },
                        error: function (result) {
                            console.log(result)
                            window.location = '{{route('trainings-instructor.index')}}';
                        }
                    });
                });
            });
        });
    </script>

@endsection



