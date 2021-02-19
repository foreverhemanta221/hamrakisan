@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection
@section('body')
    <section class="content-header">
        <h1>
            Farms Listing
            <small>All Farmrer </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>
    <section class="content">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab">All Listing</a></li>
                <li><a href="#timeline" data-toggle="tab">Processing Listing</a></li>
                <li><a href="#settings" data-toggle="tab">Active listing</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>phone</th>
                                <th>Address</th>
                                <th>Listing Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listings as $listing)
                                <tr>
                                    <td><a href="{{route('listing.show',$listing->id)}}" style="text-decoration: none"><strong>{{$listing->name}}</strong></a></td>
                                    <td>{{$listing->phone}}</td>
                                    <td>
                                        @isset($listing->short_address)
                                            {{$listing->short_address}}
                                        @endisset
                                    </td>
                                    <td>
                                        {{$listing->created_at->format('d,M-Y')}}
                                        <br/>
                                        {{($listing->created_at->diffForHumans())}}
                                    </td>
                                    <td> <span class="{{$listing->status==0 ? 'badge-danger':'badge-success'}}" onclick="changeStatus({{$listing->id}},{{$listing->status}})"> {{$listing->status==1 ? 'Active':'Processing'}}</span></td>
                                    <td>
                                        <a href="{{route('listing.edit',$listing->id)}}" class="btn btn-xs btn-info" style=" border-radius: 0px;"><i class="fa fa-edit"></i>edit</a>
                                        <a href="#" class="btn btn-xs btn-danger"  data-value="{{ $listing->id }}" id="delete_image"
                                           data-toggle="modal" data-target="#delete_modal"
                                           title="Remove from this gallery" style=" border-radius: 0px;">Delete <i class="fa fa-trash" style="color: #ffffff"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>phone</th>
                                <th>Address</th>
                                 <th>Listing Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listings->where('status',0) as $listing)
                                <tr>
                                    <td><a href="{{route('listing.show',$listing->id)}}" style="text-decoration: none"><strong>{{$listing->name}}</strong></a></td>
                                    <td>{{$listing->phone}}</td>
                                    <td>
                                        @isset($listing->short_address)
                                            {{$listing->short_address}}
                                        @endisset
                                    </td>
                                    <td>
                                        {{$listing->created_at->format('d,M-Y')}}
                                        <br/>
                                        {{($listing->created_at->diffForHumans())}}
                                    </td>
                                    <td> <span class="{{$listing->status==0 ? 'badge-danger':'badge-success'}}" onclick="changeStatus({{$listing->id}},{{$listing->status}})"> {{$listing->status==1 ? 'Active':'Processing'}}</span></td>
                                    <td>
                                        <a href="{{route('listing.edit',$listing->id)}}" class="btn btn-xs btn-info" style=" border-radius: 0px;"><i class="fa fa-edit"></i>edit</a>
                                        <a href="#" class="btn btn-xs btn-danger"  data-value="{{ $listing->id }}" id="delete_image"
                                           data-toggle="modal" data-target="#delete_modal"
                                           title="Remove from this gallery" style=" border-radius: 0px;">Delete <i class="fa fa-trash" style="color: #ffffff"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>phone</th>
                                <th>Address</th>
                                 <th>Listing Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listings->where('status',1) as $listing)
                                <tr >
                                    <td><a href="{{route('listing.show',$listing->id)}}" style="text-decoration: none"><strong>{{$listing->name}}</strong></a></td>
                                    <td>{{$listing->phone}}</td>
                                     <td>
                                        @isset($listing->short_address)
                                            {{$listing->short_address}}
                                        @endisset
                                    </td>
                                    <td>
                                        {{$listing->created_at->format('d,M-Y')}}
                                        <br/>
                                        {{($listing->created_at->diffForHumans())}}
                                    </td>
                                    <td> <span class="{{$listing->status==0 ? 'badge-danger':'badge-success'}}" onclick="changeStatus({{$listing->id}},{{$listing->status}})"> {{$listing->status==1 ? 'Active':'Processing'}}</span>}</td>
                                    <td>
                                        <a href="{{route('listing.edit',$listing->id)}}" class="btn btn-xs btn-info" style=" border-radius: 0px;"><i class="fa fa-edit"></i>edit</a>
                                        <a href="#" class="btn btn-xs btn-danger"  data-value="{{ $listing->id }}" id="delete_image"
                                           data-toggle="modal" data-target="#delete_modal"
                                           title="Remove from this gallery" style=" border-radius: 0px;">Delete <i class="fa fa-trash" style="color: #ffffff"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
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
                    <input type="submit" class="btn btn-danger pull-left" value="Yes, Delete this"
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
            $(document).on('click', '#delete_image', function (e) {
                var listing_id = $(this).attr('data-value');
                $("#delete_confirm").click(function () {

                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': '{{ Session::token() }}'}
                    });

                    $.ajax({
                        url: '{{ url('/listing') }}' + '/' + listing_id,
                        type: 'DELETE',
                        data: {
                            "id": listing_id,
                            "_method": 'DELETE',
                        },
                        success: function (result) {
                            console.log(result)
                            window.location = '{{route('listing.index')}}';
                        },
                        error: function (result) {
                            console.log(result)
                            window.location = '{{route('listing.index')}}';
                        }
                    });
                });
            });
            //change status
        });
    </script>
    <script>
        function changeStatus(listing_id,status) {
            var message = status==0  ? 'activate' : 'deactivate';
            if( confirm('are you sure want to '+message +' status')){
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': '{{ Session::token() }}'}
                });

                $.ajax({
                    url: '{{ url('listing/changeStatus') }}',
                    type: 'POST',
                    data: {
                        "listingId": listing_id,
                    },
                    success: function (result) {
                        console.log(result);
                        window.location = '{{route('listing.index')}}';
                    },
                    error: function (result) {
                        console.log(result);
                        window.location = '{{route('listing.index')}}';
                    }
                });
            }

        }
    </script>

@endsection
