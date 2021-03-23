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
            Farm Listing
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="">Listing</li>
            <li class="active">create</li>
        </ol>
    </section>
    <br>
    <section class="content">
        <form method="post" action="{{route('listing.update',$listing->id)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Farm Basic Info</h3>
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
                                        <input type="text" name="title" id="title" class="form-control" value="{{$listing->name}}">
                                        @if($errors->has('title'))
                                            <span class="help-block">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                                        <label>Category <span style="color: #ff0000">*</span></label>
                                        {{--{{$listing->categories}}--}}
                                        <select class="form-control" name="category" >
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if($category->id == $listing->category_id) selected="selected" @endif>{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category'))
                                            <span class="help-block">{{ $errors->first('category') }}</span>
                                        @endif
                                    </div>

                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label>Email:</label>
                                        <input type="email" class="form-control" name="email" value="{{$listing->email}}" >
                                        @if($errors->has('email'))
                                            <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Color Picker -->
                                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label>Phone Number:</label>

                                        <input type="text" class="form-control" name="phone" value="{{$listing->phone}}">
                                        @if($errors->has('phone'))
                                            <span class="help-block">{{ $errors->first('phone') }}</span>
                                    @endif
                                    <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('user') ? ' has-error' : '' }}">
                                        <label>User <span style="color: #ff0000">*</span></label>
                                        <select class="form-control" name="user">
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}" @if($user->id==$listing->id) selected="selected" @endif>    {{ $user->name }}  ({{$user->email!=null ? $user->email : $user->phone_no }})</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category'))
                                            <span class="error">{{ $errors->first('category') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Featured <span style="color: #ff0000">*</span></label>
                                        <select class="form-control" name="featured">
                                            <option value="0" @if($listing->featured == 0) selected="selected" @endif>No</option>
                                            <option value="1" @if($listing->featured == 1) selected="selected" @endif>Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status <span style="color: #ff0000">*</span></label>
                                        <select class="form-control" name="status">
                                            <option value="0" @if($listing->status == 0) selected="selected" @endif>No</option>
                                            <option value="1" @if($listing->status == 1) selected="selected" @endif>Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('about') ? ' has-error' : '' }}">
                                        <label>About <span style="color: #ff0000">*</span></label>
                                        @if($errors->has('about'))
                                            <span class="help-block">{{ $errors->first('about') }}</span>
                                        @endif
                                        <textarea name="about" class="form-control" id="about" rows="5" cols="80" >{{$listing->about}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Address Detail</h3>
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('province') ? ' has-error' : '' }}">
                                        <label>Provience <span style="color: #ff0000">*</span></label>
                                        @if($errors->has('province'))
                                            <span class="help-block">{{ $errors->first('province') }}</span>
                                        @endif
                                        <select class="form-control" name="province" id="province">
                                            <option value="">Select Province</option>
                                            @foreach($province as $key=>$value)
                                                <option value="{{$key}}" @if($listing->address()->first()->province == $key) selected @endif >{{$value}}</option>
                                            @endforeach
                                        </select>
                                        {{--<input type="text" name="provience" class="form-control">--}}
                                    </div>

                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('district') ? ' has-error' : '' }}">
                                        <label> District <span style="color: #ff0000">*</span></label>
                                        @if($errors->has('district'))
                                            <span class="help-block">{{ $errors->first('district') }}</span>
                                        @endif
                                        <select name="district" id="district" class="form-control enableOnInput">
                                            {{--<option value="">Please select District</option>--}}
                                            @foreach(checkProvinceDistrict($listing->address()->first()->province) as $key=>$value)

                                                <option value="{{$key}}" @if($listing->address()->first()->district == $key) selected @endif>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Color Picker -->
                                    <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                                        <label>City</label>
                                        @if($errors->has('city'))
                                            <span class="help-block">{{ $errors->first('city') }}</span>
                                        @endif
                                        <input type="text" class="form-control" name="city" value="{{$listing->address()->first()->city}}">
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('landmark') ? ' has-error' : '' }}">
                                        <label> Landmark <span style="color: #ff0000">*</span> </label>
                                        @if($errors->has('landmark'))
                                            <span class="help-block">{{ $errors->first('landmark') }}</span>
                                        @endif
                                        <input type="text" name="landmark" id="title" class="form-control" value="{{$listing->address()->first()->landmark}}">
                                    </div>
                                    <!-- /.form-group -->

                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->



                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="map">Map</label>
                                        <input type="text" class="form-control" name="map" id="searchmap">
                                        <div id="map-canvas"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lat">Latitude</label>
                                        <input type="text" class="form-control" name="lat" id="lat">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lat">Longitude</label>
                                        <input type="text" class="form-control" name="lng" id="lng">
                                    </div>
                                </div>



                                <!-- /.col -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Social Media / Website</h3>
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('website') ? ' has-error' : '' }}">
                                        <label> Website  </label>
                                        @if($errors->has('website'))
                                            <span class="help-block">{{ $errors->first('website') }}</span>
                                        @endif
                                        <input type="text" name="website" id="website" class="form-control" value="{{$listing->website}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">
                                        <label> Facebook  </label>
                                        @if($errors->has('facebook'))
                                            <span class="help-block">{{ $errors->first('facebook') }}</span>
                                        @endif
                                        <input type="text" name="facebook" id="facebook" class="form-control" value="{{$listing->facebook}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('youtube') ? ' has-error' : '' }}">
                                        <label> Youtube  </label>
                                        @if($errors->has('youtube'))
                                            <span class="help-block">{{ $errors->first('youtube') }}</span>
                                        @endif
                                        <input type="text" name="youtube" id="youtube" class="form-control" value="{{$listing->youtube}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
{{--  
             <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Image And Gallery</h3>
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                    <i class="fa fa-minus"></i></button>

                            </div>
                        </div>
                        <div class="box box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('feature_image') ? ' has-error' : '' }}">
                                        <label>Feature <span style="color: #ff0000">*</span></label>
                                        @if($errors->has('feature_image'))
                                            <span class="error">{{ $errors->first('feature_image') }}</span>
                                        @endif
                                        <input type="file" name="feature_image"  class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('gallery_image') ? ' has-error' : '' }}">
                                        <label>Gallery <span style="color: #ff0000">*</span></label>
                                        @if($errors->has('gallery_image'))
                                            <span class="error">{{ $errors->first('gallery_image') }}</span>
                                        @endif
                                        <input type="file"  name="gallery_image[]" class="form-control" multiple >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>  --}}
            <div class="row">

                <div class="col-md-12">
                    <input type="submit" class="btn btn-success pull-right">
                </div>
                <!-- /.col -->
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
                    url: '{{url('api/districts')}}',
                    dataType: 'json',
                    success: function (result) {
                        $( "#district" ).empty();
                        var appenddata1 = "";
                        var jsonData1 = result.data;
                        i = 0 ;
                        $.each(jsonData1, function( index, value ) {
                            if(value.province_id == province){
                                appenddata1 += "<option value = '" + value.district_id+ " '>" + value.district_name + " </option>";
                            }
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
