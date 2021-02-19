
@extends('backend.layout.layout')
@section('css')
    {{--<link rel="stylesheet" href="{{URL::asset('backend/plugin/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/select2/dist/css/select2.min.css')}}"
          xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" href="{{URL::asset('backend/plugin/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">

@endsection
@section('body')
    @php
        $allcat =  checkCategory($category,$listing->categories);

    @endphp
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
        <form method="post" action="{{route('listing.translate.submit',$listing->id)}}" enctype="multipart/form-data">
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
                                        <label>Nepali Name <span style="color: #ff0000">*</span> </label>

                                        <input type="text" name="nep_title" id="title" class="form-control" value="{{isset($listing->nep_name) ? $listing->nep_name : $listing->name}}">
                                        @if($errors->has('nep_title'))
                                            <span class="help-block">{{ $errors->first('nep_title') }}</span>
                                        @endif
                                    </div>
                                    <!-- /.form-group -->

                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                                        <label>Slug <span style="color: #ff0000">*</span></label>

                                        <input type="text" name="slug" id="slug" value="{{$listing->slug }}" class="form-control" disabled >
                                        @if($errors->has('slug'))
                                            <span class="help-block">{{ $errors->first('slug') }}</span>
                                        @endif
                                    </div>

                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                                        <label>Category <span style="color: #ff0000">*</span></label>
                                        {{--{{$listing->categories}}--}}
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
                                    <!-- Color Picker -->
                                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label>Phone Number:</label>

                                        <input type="text" class="form-control" name="phone" value="{{$listing->phone}}" disabled>
                                        @if($errors->has('phone'))
                                            <span class="help-block">{{ $errors->first('phone') }}</span>
                                    @endif
                                    <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Color Picker -->
                                    <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                        <label>Mobile Number:</label>

                                        <input type="text" class="form-control" name="mobile" value="{{$listing->mobile}}" disabled>
                                        @if($errors->has('mobile'))
                                            <span class="help-block">{{ $errors->first('mobile') }}</span>
                                    @endif
                                    <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Color Picker -->
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label>Email:</label>

                                        <input type="email" class="form-control" name="email" value="{{$listing->email}}" disabled >
                                        @if($errors->has('email'))
                                            <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                    <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('nep_about') ? ' has-error' : '' }}">
                                        <label>About <span style="color: #ff0000">*</span></label>
                                        @if($errors->has('nep_about'))
                                            <span class="help-block">{{ $errors->first('nep_about') }}</span>
                                        @endif
                                        <textarea name="nep_about" class="form-control" id="about" rows="5" cols="80" >
                                            {{isset($listing->nep_about) ? $listing->nep_about : $listing->about}}
                                        </textarea>
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
                                        <select class="form-control" name="province" id="province" disabled>
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
                                        <select name="district" id="district" class="form-control " disabled>
                                            {{--<option value="">Please select District</option>--}}
                                            @foreach(checkProvinceDistrict($listing->address()->first()->province) as $key=>$value)

                                                <option value="{{$key}}" @if($listing->address()->first()->district == $key) selected @endif>{{check_nepali($key)}}</option>
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

                                        <input type="text" class="form-control" name="city" value="{{isset($listing->address()->first()->nep_city) ? $listing->address()->first()->nep_city : $listing->address()->first()->city}}">
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                                                <!-- /.col -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="box box-info">--}}
                        {{--<div class="box-header">--}}
                            {{--<h3 class="box-title">Contact Person Detail</h3>--}}
                            {{--<div class="pull-right box-tools">--}}
                                {{--<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">--}}
                                    {{--<i class="fa fa-minus"></i></button>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="box box-body">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group {{ $errors->has('cp_name') ? ' has-error' : '' }}">--}}
                                        {{--<label> Name <span style="color: #ff0000">*</span> </label>--}}
                                        {{--@if($errors->has('cp_name'))--}}
                                            {{--<span class="help-block">{{ $errors->first('cp_name') }}</span>--}}
                                        {{--@endif--}}
                                        {{--<input type="text" name="cp_name" id="cp_name" class="form-control" value="">--}}
                                    {{--</div>--}}
                                    {{--<!-- /.form-group -->--}}

                                    {{--<!-- /.form-group -->--}}
                                {{--</div>--}}
                                {{--<!-- /.col -->--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group {{ $errors->has('cp_role') ? ' has-error' : '' }}">--}}
                                        {{--<label> Role <span style="color: #ff0000">*</span></label>--}}
                                        {{--@if($errors->has('cp_role'))--}}
                                            {{--<span class="help-block">{{ $errors->first('cp_role') }}</span>--}}
                                        {{--@endif--}}
                                        {{--<input type="text" name="cp_role" id="cp_role" class="form-control" value="{{$listing->website}} " >--}}
                                    {{--</div>--}}


                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group {{ $errors->has('cp_phone') ? ' has-error' : '' }}">--}}
                                        {{--<label>Phone <span style="color: #ff0000">*</span></label>--}}
                                        {{--@if($errors->has('cp_phone'))--}}
                                            {{--<span class="help-block">{{ $errors->first('cp_phone') }}</span>--}}
                                        {{--@endif--}}
                                        {{--<input type="text" name="cp_phone" class="form-control">--}}
                                    {{--</div>--}}

                                    {{--<!-- /.form-group -->--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<!-- Color Picker -->--}}
                                    {{--<div class="form-group {{ $errors->has('cp_email') ? ' has-error' : '' }}">--}}
                                        {{--<label>Email</label>--}}
                                        {{--@if($errors->has('cp_email'))--}}
                                            {{--<span class="help-block">{{ $errors->first('cp_email') }}</span>--}}
                                        {{--@endif--}}
                                        {{--<input type="email" class="form-control" name="cp_email">--}}
                                        {{--<!-- /.input group -->--}}
                                    {{--</div>--}}
                                    {{--<!-- /.form group -->--}}
                                {{--</div>--}}



                                {{--<!-- /.col -->--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
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
                                        <input type="text" name="website" id="website" class="form-control" value="{{$listing->website}}" disabled>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">
                                        <label> Facebook  </label>
                                        @if($errors->has('facebook'))
                                            <span class="help-block">{{ $errors->first('facebook') }}</span>
                                        @endif
                                        <input type="text" name="facebook" id="facebook" class="form-control" value="{{$listing->facebook}}" disabled>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('twitter') ? ' has-error' : '' }}">
                                        <label> Twitter  </label>
                                        @if($errors->has('twitter'))
                                            <span class="help-block">{{ $errors->first('twitter') }}</span>
                                        @endif
                                        <input type="text" name="twitter" id="twitter" class="form-control" value="{{$listing->twitter}}" disabled>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('instagram') ? ' has-error' : '' }}">
                                        <label> Instagram  </label>
                                        @if($errors->has('instagram'))
                                            <span class="help-block">{{ $errors->first('instagram') }}</span>
                                        @endif
                                        <input type="text" name="instagram" id="instagram" class="form-control" value="{{$listing->instagram}}" disabled>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('youtube') ? ' has-error' : '' }}">
                                        <label> Youtube  </label>
                                        @if($errors->has('youtube'))
                                            <span class="help-block">{{ $errors->first('youtube') }}</span>
                                        @endif
                                        <input type="text" name="youtube" id="youtube" class="form-control" value="{{$listing->youtube}}" disabled>
                                    </div>

                                </div>
                                <!-- /.col -->
                            {{--<!-- /.form-group -->--}}
                            {{--</div>--}}

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
                            <h3 class="box-title">Other Relevent Information</h3>
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                    <i class="fa fa-minus"></i></button>

                            </div>
                        </div>
                        <div class="box box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Color Picker -->
                                    <div class="form-group ">
                                        <label>Color picker with addon:</label>
                                        @if($errors->has('title'))
                                            <span class="help-block">{{ $errors->first('title') }}</span>
                                        @endif
                                        <div class="input-group my-colorpicker2">
                                            <input type="text" class="form-control" name="color" value="#20910E" disabled>

                                            <div class="input-group-addon">
                                                <i></i>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Featured <span style="color: #ff0000">*</span></label>
                                        <select class="form-control" name="featured" disabled>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        {{--<input type="text" name="slug" id="slug" class="form-control" disabled >--}}
                                    </div>

                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Year <span style="color: #ff0000">*</span></label>
                                        <input type="text" name="start_year" class="form-control" disabled>
                                    </div>

                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-6">
                                    <!-- Color Picker -->
                                    <div class="form-group">
                                        <label>Expiry Date:</label>
                                        <input type="date" class="form-control" name="expiry_date" disabled>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>

                                {{--<!-- /.form-group -->--}}
                                {{--</div>--}}
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success pull-right">
                                </div>
                                <!-- /.col -->
                            </div>
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