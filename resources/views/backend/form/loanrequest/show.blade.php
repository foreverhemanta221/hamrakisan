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
                        <button id="editloanDetail" class="pull-right btn btn-info">Edit</button>
                    </div>
                    <hr>
                    <form action="{{route('loanrequest.update',$loanDetail->id)}}" method="post">
                        {{method_field('put')}}
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="farmName">FarmName</label>
                                    <input type="text"  name="farmName" class="form-control loanDetail" value="{{$loanDetail->farmName}}" disabled >
                                </div>
                                <div class="col-md-6 ">
                                    <label for="farmName">Farm Status</label>
                                    <select name="farmType" id="" class="form-control loanDetail" disabled>
                                        <option value="new" {{'new'== $loanDetail->farmType ? 'selected="selected"' :''}} >New</option>
                                        <option value="running" {{'running'== $loanDetail->farmType ? 'selected="selected"' :''}} >Running</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <label for="farmName">Email</label>
                                    <input type="email"  name="email" class="form-control loanDetail" value="{{$loanDetail->email}}" disabled >
                                </div>
                                <div class="col-md-6 ">
                                    <label for="farmName">Phone</label>
                                    <input type="text"  name="phone" class="form-control loanDetail" value="{{$loanDetail->phone}}" disabled >
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <label for="farmName">loanType</label>
                                    <select name="loanType" id="" class="form-control loanDetail" disabled>

                                        @foreach(loanType() as $type)
                                            <option value="{{$type}}" {{$type == $loanDetail->loanType ? 'selected="selected"' :''}} >{{$type}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <label for="farmName">Description</label>
                                    <textarea type="text"  name="description" class="form-control loanDetail" disabled >{{$loanDetail->description}}</textarea>
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
            $('#editloanDetail').on('click',function (e) {
                e.preventDefault();
                if(this.innerHTML ==='Edit'){
                    this.innerHTML = 'Cancel';
                    $('#editloanDetail').removeClass('btn-info');
                    $('#editloanDetail').addClass('btn-danger');
                    $('.loanDetail').prop("disabled", false);
                    $('#editFarmSumbit').css({"display":"inline-block"});
                }else{
                    this.innerHTML = 'Edit';
                    $('#editloanDetail').removeClass('btn-danger');
                    $('#editloanDetail').addClass('btn-info');
                    $('.loanDetail').prop("disabled", true);
                    $('#editFarmSumbit').css({"display":"none"});
                }
            })
        })
    </script>
@endsection
