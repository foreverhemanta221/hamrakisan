@extends('backend.layout.layout')
@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Report
            <small>Generate</small>
        </h1>
        <ol class="breadcrumb">

            <li><a href="#">Dashboard</a></li>
            <li class="">Report</li>
            <li class="active">create</li>
        </ol>
    </section>
    <div class="box box-body">
        <form method="post" action="{{URL::to('report/farm')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Categories</label>
                        <select type="text" name="categories" id="title" class="form-control">
                            <option value="">All Categories</option>
                            @foreach($allcategories as $categories)
                                <option value="{{$categories->id}}">{{$categories->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="form-group">
                        <label>Province</label>
                        <select type="text" name="province" id="province" class="form-control">
                            <option value="">All Province</option>
                            @foreach(getProvince() as $k=>$v)

                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>District</label>
                        <select type="text" name="district" id="district" class="form-control">
                            <option value="">All District</option>

                        </select>
                    </div>
                </div>



                <div class="col-md-3">
                    <div class="form-group">
                        <label>Action</label>
                        <br>
                        <input type="submit" class="btn btn-success" value="Generate">
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#province').change(function (e) {
                e.preventDefault();
                var province = $('#province').val();
                $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': 'SC1HKotLuw5BH6JJRuNiFsjNHxGs5vEGRmGolmbK'}
                });
                // alert($.ajaxSetup())
                $.ajax({
                    type: 'GET',
                    url: '{{url('api/getdistrict')}}' + '/' + province,
                    dataType: 'json',
                    success: function (result) {
                        $( "#district" ).empty();
                        var appenddata1 = "";
                        var jsonData1 = result.data;
                        i = 0 ;
                        appenddata1 +="<option value=''>District</option>";
                        $.each(jsonData1, function( index, value ) {
                            appenddata1 += "<option value = '" + index+ " '>" + value + " </option>";
                        });
                        $("#district").append(appenddata1);
                        $('.enableOnInput').prop('disabled',false)
                    },
                    error: function (result) {
                        console.log(result)
                        // window.location = 'http://bucketlistbtl.com/dashboard/package';
                    }
                });
            })
        })
    </script>
@endsection