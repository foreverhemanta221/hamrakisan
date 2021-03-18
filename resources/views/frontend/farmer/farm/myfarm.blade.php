@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/main.css')}}">
    <style>
        #mapShow {
            height: 250px;
        }
        #map{
            height: 450px;
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <!-- dashboard wrapper------------------------- -->
    <div class="bg-light-wrapper">
        <div class="db-wrapper">
            <!-- Sidebar -->
             @include('frontend.dashboardincludes.farmersidebar')
            <div id="db-content">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-right"></i>
                        <!-- <i class="fas fa-arrow-left d-none"></i> -->
                    </button>
                </div>
                <!-- dashboard cards -->
                <div class="db-body">
                    <div class="d-flex justify-content-between mb-2">
                        <h1>Farm</h1>
                        <button id="edit-farm-btn" class="btn-outline-primary p-2 mr-3">update details</button>
                    </div>
                    <div id="myfarm-preview" class="container db-my-farm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5> <span><i class="fas fa-user"></i></span> {{__('form.intro')}}</h5>
                                    <div>
                                        <span>{{__('form.farm_name')}}</span>
                                        <span>{{$farmdetail->name}}</span>
                                    </div>
                                    <div>
                                        <span>{{__('form.category')}}</span>
                                        <span>{{$farmdetail->getCaegory()}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5> <span><i class="fas fa-map-marker"></i></span> {{__('form.farm_address')}}</h5>
                                    <div>
                                        <span>{{__('form.location')}}</span>
                                        <span style="text-transform: capitalize">{{$farmdetail->address !=null? check_province($farmdetail->address->province)." ".check_district($farmdetail->address->district)." ".$farmdetail->address->city :null}}</span>
                                    </div>
                                    <div>
                                        <span>{{__('form.specific_location')}}</span>
                                        <span>{{$farmdetail->address->specific_address}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5><span><i class="fas fa-phone-alt"></i></span>    {{__('form.farm_contact')}}</h5>
                                    <div>
                                        <span>{{__('form.phone')}}</span>
                                        <span>{{$farmdetail->phone}}</span>
                                    </div>
                                    <div>
                                        <span>{{__('form.email')}}</span><span>{{$farmdetail->email}}</span>
                                    </div>
                                    <div>
                                        <span>{{__('farm.website')}}</span>
                                        <span><a href="">{{$farmdetail->website==null ? "-":$farmdetail->website}}</a></span>
                                    </div>
                                    <div>
                                        <span>{{__('form.facebook_link')}}</span><span><a href="#">{{$farmdetail->facebook==null?"-":$farmdetail->facebook}}</a></span>
                                    </div>
                                    <div><span>{{__('form.youtube_link')}}</span>
                                        <span><a href="#">{{$farmdetail->youtube==null ? "-":$farmdetail->youtube}}</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5> <span><i class="fas fa-tractor"></i></span> {{__('form.about_farm')}}</h5>
                                        {!! $farmdetail->about !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5><span><i class="fas fa-map-marked"></i></span>{{__('form.farm_in_map')}}</h5>

                                    <div id="mapShow"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5> <span><i class="fas fa-image"></i></span> {{__('form.uploaded_image')}}</h5>

                                    <div class="db-photo-grid">
                                        @foreach($farmdetail->getGalleryImage() as $image)
                                        <a class="venobox" href="{{$image}}" data-gall="galleryMyFarm">
                                            <img src="{{\App\Helpers::getAnotherSizeOfImage('medium',$image)}}" alt="image alt"/>
                                        </a>
                                        @endforeach
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="myfarm-edit" class="container">
                        <form method="post" action="{{route('updatemyfarm')}}"  class="row" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5> <span><i class="fas fa-user"></i></span> {{__('form.intro')}} </h5>

{{--                                    <div class="form-group">--}}
{{--                                        <label for="farm_name">{{__('form.farmer_name')}} <span>*</span></label>--}}
{{--                                        <input type="text" class="form-control" id="farmer_name" name="cp_name" placeholder="FarmName" value="{{$farmdetail->farmer_name}}" required>--}}
{{--                                    </div>--}}

                                    <div class="form-group">
                                        <label for="farm_name">{{__('form.farm_name')}} <span>*</span></label>
                                        <input type="text" class="form-control" id="farm_name" name="farmName" placeholder="FarmName" value="{{$farmdetail->name}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="farmer_name">{{__('form.category')}}  <span>*</span></label>
                                        <div class="input-group">
                                            <select class="custom-select" name="category_id" id="inputGroupSelect01" name="category_id" required>

                                                @foreach($allcategory as $category)
                                                    <option value="{{$category->id}}" @if($category->id==$farmdetail->category_id) selected="selected" @endif>{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5> <span><i class="fas fa-map-marker"></i></span> {{__('form.farm_address')}}</h5>
                                    <div class="form-group">
                                        <label for="">{{__('form.location')}} <span>*</span></label>
                                        <div id="farmlocation">
                                            <div class="input-group">
                                                <select class="custom-select" id="farmProvince" name="farmProvince" required>
                                                    @foreach(getProvince() as $key=>$value)
                                                        <option value="{{$key}}" @if($key== $farmdetail->address->province) selected="selected" @endif >{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group">
                                                <select class="custom-select" id="farmDistrict" name="farmDistrict" required>
                                                    @foreach(checkProvinceDistrict($farmdetail->address->province) as $key=>$value)
                                                        <option value="{{$key}}" @if($key== $farmdetail->address->district) selected="selected" @endif >{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="text" class="form-control" id="farmCity" placeholder="farmCity" name="farmCity" value="{{$farmdetail->address->city}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{__('form.specific_location')}}</label>
                                        <input type="text" class="form-control" id="FarmSpecificAddress" name="farmSpecificAddress" value="{{$farmdetail->address->specific_address}}">
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5><span><i class="fas fa-phone-alt"></i></span>    {{__('form.farm_contact')}}</h5>
                                    <div class="form-group">
                                        <label for="farm_phone">{{__('form.phone')}} <span>*</span></label>
                                        <input type="text" class="form-control" id="farm_phone" name="farmPhone" placeholder="Phone" value="{{$farmdetail->phone}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="farm_mail">{{__('form.email')}} <span>*</span></label>
                                        <input type="text" class="form-control" id="farm_mail" name="farmEmail" placeholder="Email address" value="{{$farmdetail->email}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="farm_web">{{__('farm.website')}}</label>
                                        <input type="text" class="form-control" id="farm_web" name="farmWebsite" placeholder="URL of Website" value="{{$farmdetail->website}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="farm_fb">{{__('form.facebook_link')}}</label>
                                        <input type="text" class="form-control" id="farm_fb" name="farmFacebook" placeholder="https://www.facebook.com/hamrakisan01/" value="{{$farmdetail->facebook}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="farm_yt">{{__('form.youtube_link')}}</label>
                                        <input type="text" class="form-control" id="farm_yt" name="farmYoutube" placeholder="Farm's Youtube Channel URL" value="{{$farmdetail->youtube}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5> <span><i class="fas fa-tractor"></i></span> {{__('form.about_farm')}}</h5>
                                    <div class="form-group">
                                        <label for="about-farm">{{__('form.farm_introduction')}}</label>
                                        <textarea class="form-control" id="about-farm" rows="15" name="description" placeholder="tell the buyers about your farm in 100 words">{{  strip_tags($farmdetail->about)}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5><span><i class="fas fa-map-marked"></i></span>{{__('form.locate_your_farm')}}</h5>
                                    <input type="hidden" name="latitude" id="latitude" value="{{$farmdetail->getLatitude()}}">
                                    <input type="hidden" name="longitude" id="longitude" value="{{$farmdetail->getLongtitude()}}">
                                    <div id="map"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5> <span><i class="fas fa-image"></i></span>{{__('form.upload_farm_image')}}</h5>
                                    <div class="form-group">

                                        <input id="upload-foto-input" type="file" name="gallery_image[]" class="custom-file-input" multiple onchange="handleFiles(this.files)" accept="image/*">

                                        <div class="upload-decor" id="up-img-decor">
                                            <img src="{{URL::asset('frontend/img/icons/img_up.png')}}" alt="">
                                            <p>upload 3-5 images of dimension 1920*1080</p>
                                            <a href="#" class="btn btn-primary">Browse</a>
                                        </div>


                                        <ul id="upload-img-rack">

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="submit" class="btn btn-primary" value="Save and Continue">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function initialize() {
            initMap2();
            initMap();
        }

        var lat_show =  document.getElementById('latitude').value===""? <?php echo config('constants.map.lat') ?>:parseFloat(document.getElementById('latitude').value);
        console.log(lat_show);
        // var lng_show =   parseFloat(document.getElementById('longitude').value);
        var lng_show =   document.getElementById('longitude').value===""? <?php echo config('constants.map.lng') ?>:parseFloat(document.getElementById('longitude').value);;
        console.log(lng_show);
        var map;

        function initMap2() {
            var myLatLng = { lat: lat_show, lng: lng_show };
            map = new google.maps.Map(document.getElementById("mapShow"), {
                zoom: 10,
                center: myLatLng,
            });
            new google.maps.Marker({
                position: myLatLng,
                map,
                title: "Hello World!",
            });
        }
        var map;
        var markers = [];

        function initMap() {
            // console.log(this.lat);
            // console.log(this.lng);
            var haightAshbury = {lat:lat_show , lng: lng_show};

            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: haightAshbury,
                disableDoubleClickZoom: true
            });

            // This event listener will call addMarker() when the map is clicked.
            map.addListener('click', function(event) {
                addMarker(event.latLng);
                handleEvent(event);
            });

            // Adds a marker at the center of the map.
            addMarker(haightAshbury);
        }

        // Adds a marker to the map and push to the array.
        function addMarker(location) {
            deleteMarkers();
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            setMapOnAll(null);
            markers = [];
        }

        function handleEvent(event) {
            document.getElementById('latitude').value = event.latLng.lat();
            document.getElementById('longitude').value =  event.latLng.lng();
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('constants.map.google_map_key')}}&callback=initialize&libraries=&v=weekly"
            async defer></script>
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
    <script src="{{URL::asset('frontend/js/handleFiles.js')}}"></script>

    <script>
        AOS.init({
            once:true,
        });
        $('.venobox').venobox({
            share      : ['facebook', 'twitter','linkedin']
        });

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#db-sidebar').toggleClass('active');
                $(this).toggleClass('active');
                // $(this).find('svg').css('transform','rotate(180deg)')
            });
        });
        $('#myfarm-edit').hide()
        $('#edit-farm-btn').click(function(){
            $(this).hide()
            $('#myfarm-edit').show();
            $('#myfarm-preview').hide()
        })
    </script>

@endsection
