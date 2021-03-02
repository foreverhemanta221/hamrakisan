@extends('backend.layout.layout')
@section('css')
    {{--<link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/select2/dist/css/select2.min.css')}}"
          xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <style>
        #map{
            width: 100%;
            height: 500px;
            box-shadow: 0px 0px 20px;
        }
        .error{
            color:red;
        }
    </style>
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
        <form method="post" action="{{route('listing.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
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
                                    <input type="text" name="title" id="title" class="form-control">
                                    @if($errors->has('title'))
                                        <span class="error">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                                    <label>Category <span style="color: #ff0000">*</span></label>

                                    <select class="form-control" name="category">
                                        @foreach($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category'))
                                        <span class="error">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <!-- Color Picker -->
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label>Email:<span style="color: #ff0000">*</span></label>

                                    <input type="email" class="form-control" name="email" required />
                                    @if($errors->has('email'))
                                        <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label>Phone Number:</label>
                                    <input type="text" class="form-control" name="phone">
                                    @if($errors->has('phone'))
                                        <span class="error">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('user') ? ' has-error' : '' }}">
                                    <label>User <span style="color: #ff0000">*</span></label>


                                    <select class="form-control select2" name="user">
                                        <option value="">Select</option>
                                        @foreach($users as $user)

                                            <option value="{{$user->id}}">{{ $user->name }}  ({{$user->email!=null ? $user->email : $user->phone_no }})</option>

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
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('about') ? ' has-error' : '' }}">
                                    <label>About <span style="color: #ff0000">*</span></label>
                                    @if($errors->has('about'))
                                        <span class="error">{{ $errors->first('about') }}</span>
                                    @endif
                                    <textarea name="about" class="form-control" id="about" rows="5" cols="80" ></textarea>
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
                                            <span class="error">{{ $errors->first('province') }}</span>
                                        @endif
                                        <select class="form-control" name="province" id="province">
                                            <option value="">Select Province</option>
                                            @foreach($province as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
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
                                            <span class="error">{{ $errors->first('district') }}</span>
                                        @endif
                                        <select name="district" id="district" class="form-control enableOnInput" disabled="disabled">
                                            <option value="">Please select District</option>
                                        </select>
                                    </div>

                                    <!-- /.form-group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                                        <label>City: <span style="color: #ff0000">*</span></label>
                                        @if($errors->has('city'))
                                            <span class="error">{{ $errors->first('city') }}</span>
                                        @endif
                                        <input type="text" class="form-control" name="city"required />
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                                        <label>Search Location</label>
                                        @if($errors->has('location'))
                                            <span class="error">{{ $errors->first('location') }}</span>
                                        @endif
                                        <input type="text" class="form-control" name="location">
                                        <!-- /.input group -->
                                    </div>

                                </div>



                                <div class="col-lg-12 col-md-12 form-group row">
                                    <div class="col-lg-6 col-md-6" >
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="latitude" id="latitude" placeholder="Latitude">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6" >
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="longitude" id="longitude" placeholder="Longitude">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 form-group">
                                    <div id="map"></div>
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
                                            <span class="error">{{ $errors->first('website') }}</span>
                                        @endif
                                        <input type="text" name="website" id="website" class="form-control">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">
                                        <label> Facebook  </label>
                                        @if($errors->has('facebook'))
                                            <span class="error">{{ $errors->first('facebook') }}</span>
                                        @endif
                                        <input type="text" name="facebook" id="facebook" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('youtube') ? ' has-error' : '' }}">
                                        <label> Youtube  </label>
                                        @if($errors->has('youtube'))
                                            <span class="error">{{ $errors->first('youtube') }}</span>
                                        @endif
                                        <input type="text" name="youtube" id="youtube" class="form-control">
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
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="submit" class="btn btn-success pull-right">
                </div>
            </div>

        </form>
    </section>
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


    <script src="{{URL::asset('frontend/js/map.js')}}">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('constants.map.google_map_key')}}&callback=initMap"
            async defer></script>
@endsection
