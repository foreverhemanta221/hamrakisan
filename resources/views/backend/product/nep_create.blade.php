@extends('backend.layout.layout')
@section('css')
    {{--<link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/select2/dist/css/select2.min.css')}}"
          xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">

@endsection
@section('body')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Translate Product
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="">Product</li>
            <li class="active">Nepali</li>
        </ol>
    </section>
    <br>
    <section class="content">
        @php
            $allcat =  checkCategory($category,$item->categories);

        @endphp
        <form method="post" action="{{route('products.translat.submit',$item->id)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Product Basic Info</h3>
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                    <i class="fa fa-minus"></i></button>

                            </div>
                        </div>

                        <div class="box box-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                        <label> Name <span style="color: #ff0000">*</span> </label>

                                        <input type="text" name="title" id="title" class="form-control" value="{{isset($item->nep_name) ? $item->nep_name : $item->name}}">
                                        @if($errors->has('title'))
                                            <span class="help-block">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->

                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                                        <label>Slug <span style="color: #ff0000">*</span></label>

                                        <input type="text" name="slug" id="slug" class="form-control" value="{{ $item->slug}}" disabled >
                                        @if($errors->has('slug'))
                                            <span class="help-block">{{ $errors->first('slug') }}</span>
                                        @endif
                                    </div>

                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                                        <label>Category <span style="color: #ff0000">*</span></label>

                                        <select class="form-control select2" name="category[]" multiple="multiple" disabled>
                                            @foreach($allcat as $key=>$value)
                                                {!! $value !!}

                                            @endforeach
                                        </select>
                                        @if($errors->has('category'))
                                            <span class="help-block">{{ $errors->first('category') }}</span>
                                        @endif
                                    </div>

                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                                        <label>Select Vendor <span style="color: #ff0000">*</span></label>

                                        <select class="form-control select2" name="vendor" disabled >
                                            @foreach($allvendor as $vendor)
                                                <option value="{{$vendor->id}}">{{$vendor->name}}</option>

                                            @endforeach
                                        </select>
                                        @if($errors->has('vendor'))
                                            <span class="help-block">{{ $errors->first('vendor') }}</span>
                                        @endif
                                    </div>

                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Color Picker -->
                                    <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                                        <label>Price:</label>

                                        <input type="text" class="form-control" name="price" disabled>
                                        @if($errors->has('price'))
                                            <span class="help-block">{{ $errors->first('price') }}</span>
                                    @endif
                                    <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Color Picker -->
                                    <div class="form-group {{ $errors->has('measure_unit') ? ' has-error' : '' }}">
                                        <label>Measure Unit:</label>

                                        <input type="text" class="form-control" name="measure_unit" disabled>
                                        @if($errors->has('measure_unit'))
                                            <span class="help-block">{{ $errors->first('measure_unit') }}</span>
                                    @endif
                                    <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Color Picker -->
                                    <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                        <label>Feature Image:</label>

                                        <input type="file" class="form-control" name="image" disabled>
                                        @if($errors->has('image'))
                                            <span class="help-block">{{ $errors->first('image') }}</span>
                                    @endif
                                    <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Color Picker -->
                                    <div class="form-group {{ $errors->has('gallery_image') ? ' has-error' : '' }}">
                                        <label>Gallery Image:</label>

                                        <input type="file" class="form-control" name="gallery_image[]" disabled>
                                        @if($errors->has('gallery_image'))
                                            <span class="help-block">{{ $errors->first('gallery_image') }}</span>
                                    @endif
                                    <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('about') ? ' has-error' : '' }}">
                                        <label>About <span style="color: #ff0000">*</span></label>
                                        @if($errors->has('about'))
                                            <span class="help-block">{{ $errors->first('about') }}</span>
                                        @endif
                                        <textarea name="about" class="form-control" id="about" rows="5" cols="80" >{{isset($item->nep_description) ? $item->nep_description : $item->description}}</textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"> Other Info </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="rawrowContainer">
                        <div class="rawrowContent"> <br>
                            <p style="text-align: center;"> <strong> Do you want to append some value ?</strong></p>
                            @php
                                if($item->nep_other_info == null){
                                    $data = json_decode($item->other_info);
                                }else{
                                    $data = json_decode($item->nep_other_info);
                                }

                            @endphp
                            @foreach($data as $key=>$value)
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group row">
                                        <label for="fullName" class="col-sm-3 col-form-label">Label ({{$key}})</label>
                                        <div class="col-sm-9">
                                            <input type="text"  class="form-control plaintext antichain-raw-label" name="label[]" value="{{$key}}" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group row">
                                        <label for="fullName" class="col-sm-3 col-form-label">Value ({{$value}})</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control plaintext" name="value[]" value="{{$value}}" required >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>


                        <div class="clearfix"> </div>


                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success pull-right">
                        </div>
                    </div>
                </div>
            </div>


        </form>
    </section>


    <!-- /.box-body -->
    {{--<div class="box-footer">--}}
    {{--Category is used to ...............--}}
    {{--</div>--}}

    <!-- /.box -->
@endsection
@section('js')
    <script src="{{URL::asset('backend/plugin/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script src="{{URL::asset('backend/plugin/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>

    <script>

        $("#title").change(function() {
            var package_name = $("#title").val();
            $('#slug').val(package_name.toLowerCase().split(' ').join('_'));
        });

        tinymce.init({
            selector: 'textarea#about, textarea#features',
            menubar:false,
            height: 75,
            width: 'auto',
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
            content_css: '//www.tinymce.com/css/codepen.min.css'
        });



    </script>

    <!--js code for package detail other-->
    <script type="text/javascript">
        var addrawbtn = document.getElementsByClassName('addrawbtn');
        var removerawbtn = document.getElementsByClassName('removerawbtn');
        var rawrowContent = document.getElementsByClassName('rawrowContent');
        function addrawrow(){
            var i = document.getElementsByClassName('antichain-raw-label').length + 1;
            $("#rawrowContainer").append("<div class='rawrowContent'><div class='row'><div class='col-md-6 col-sm-12'><div class='form-group row'><label for='fullName' class='col-sm-3 col-form-label'>Label</label><div class='col-sm-9'> <input type='text' class='form-control plaintext antichain-raw-label' name='label[]' ></div></div></div><div class='col-md-6 col-sm-12'><div class='form-group row'><label for='fullName' class='col-sm-3 col-form-label'>Value</label><div class='col-sm-9'> <input type='text' class='form-control plaintext' name='value[]' > </div></div></div> </div> </div> <div class='pull-right'> <a class='addrawbtn btn btn-primary btn-sm formaddremovebtn' onclick='addrawrow()'  style='padding:5px 10px!important;border:opx;background:#00C2ED;color:white;'>Add  </a><a class='removerawbtn btn btn-primary btn-sm formaddremovebtn' onclick='removerawrow()'  style='padding:5px 10px!important;border:opx;background:#DD4B39;color:white;'>Remove  </a> </div> <div class='clearfix'> </div>");
            var length = addrawbtn.length;
            if(length>1){
                for (var j=1 ; j< length ; j++){
                    addrawbtn[j-1].style.display="none";
                    removerawbtn[j-1].style.display="none";
                }
            }

        }
        function removerawrow(){
            var rawrowContent = document.getElementsByClassName('rawrowContent');
            var length = rawrowContent.length;
            var blength = removerawbtn.length;
            if(length>1){
                for (var j=length ; j> length-1 ; j--){
                    rawrowContent[j-1].style.display="none";
                    $(rawrowContent[j-1]).remove();
                }
            }

            if( length==2){
                for (var j=blength ; j> blength-1 ; j--){
                    removerawbtn[j-1].style.display="none";
                }
            }
        }
    </script>


    <script>
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
        //Initialize Select2 Elements
        $('.select2').select2()

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcGvgcDPBvgj8gF3oB-Z4nYBYJUnHDnzM"
            async defer></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    <script>
        function initMap() {
            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });
        }
    </script>
    {{--<script src="{{URL::asset('backend/js/ajaxdata.js')}}"></script>--}}
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