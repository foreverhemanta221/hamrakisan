@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('body')
    <section class="content-header">
        <h1>
            Images
            <small>All Images </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
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
                        <th>Rating</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allreview as $review)
                        <tr>
                            <td>{{$review->rel_user->name}}</td>
                            <td>{{$review->star}}</td>
                            <td><p>{{$review->description}}</p></td>
                            <td><a class="label label-approve {{$review->status==1 ? 'bg-green': 'bg-red'}} ">{{$review->status==1 ? 'approved': 'unapproved'}}</a> </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"> Delete </i></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.box -->
@endsection

@section('js')
    <script src="{{URL::asset('backend/plugin/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('backend/plugin/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
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

            $('.label-approve').on('click',function (e) {
                e.preventDefault()
                if(confirm("are you sure change status")){

                }
            })
        });
    </script>
@endsection
