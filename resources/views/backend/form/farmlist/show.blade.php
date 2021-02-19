@extends('backend.layout.layout')
@section('css')
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="text-align: center !important;">Farm Request </h3>
                            <button id="editFarmDetail" class="pull-right btn btn-info">Edit</button>
                        </div>
                    <hr>
                    <form action="{{route('farmlistrequest.update',$farmdetail->id)}}" method="post">
                        {{method_field('put')}}
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="farmName">FarmName</label>
                                    <input type="text"  name="farmName" class="form-control farmdetail" value="{{$farmdetail->farmName}}" disabled >
                                </div>
                                <div class="col-md-6 ">
                                    <label for="farmName">FarmerName</label>
                                    <input type="text"  name="farmerName" class="form-control farmdetail" value="{{$farmdetail->farmerName}}" disabled >
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <label for="farmName">Email</label>
                                    <input type="email"  name="farmEmail" class="form-control farmdetail" value="{{$farmdetail->farmEmail}}" disabled >
                                </div>
                                <div class="col-md-6 ">
                                    <label for="farmName">Phone</label>
                                    <input type="text"  name="farmerPhone" class="form-control farmdetail" value="{{$farmdetail->farmPhone}}" disabled >
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <label for="farmName">Location</label>
                                    <textarea type="email"  name="farmLocation" class="form-control farmdetail" disabled >{{$farmdetail->farmLocation}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 ">

                                    <label for="farmName">Description</label>
                                    <textarea type="text"  name="farmDescription" class="form-control farmdetail" disabled >{{$farmdetail->farmDescription}}</textarea>

                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button id="editFarmSumbit" class="pull-right btn btn-info" style="display: none">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#editFarmDetail').on('click',function (e) {
                e.preventDefault();
                if(this.innerHTML ==='Edit'){
                    this.innerHTML = 'Cancel';
                    $('#editFarmDetail').removeClass('btn-info');
                    $('#editFarmDetail').addClass('btn-danger');
                    $('.farmdetail').prop("disabled", false);
                    $('#editFarmSumbit').css({"display":"inline-block"});
                }else{
                    this.innerHTML = 'Edit';
                    $('#editFarmDetail').removeClass('btn-danger');
                    $('#editFarmDetail').addClass('btn-info');
                    $('.farmdetail').prop("disabled", true);
                    $('#editFarmSumbit').css({"display":"none"});
                }
            })
        })
    </script>
@endsection
