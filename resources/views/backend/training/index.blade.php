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
            Trainings
            <small>All Trainings</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Trainings</a></li>
            <li class="active">View Trainings</li>
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
                        <th>Price</th>
                        <th>FAQS</th>
                        <th>Syllabus</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trainings as $training)
                        <tr>
                            <td>{{$training->training_name}}</td>
                            <td>{{$training->price}} </td>
                            <td><a href="{{route('faq.index',$training->id)}}"><small class="label pull-right bg-red">FAQ</small></a></td>
                            <td><small class="label pull-right bg-green">Syllabus</small></td>
                            <td>
                                <a href="{{route('trainings.edit',$training->id)}}" class="btn btn-xs btn-info" style=" border-radius: 0px;"><i class="fa fa-edit"></i>edit</a>
                                <a href="#" class="btn btn-xs btn-danger"  data-value="{{ $training->id }}" id="delete_image"
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

@endsection



