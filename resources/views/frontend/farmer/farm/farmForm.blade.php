@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/main.css')}}">
    <style>
        #map{
            height: 450px;
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <!-- ---------------------------farm listing form-------------------------------------- -->
    <section id="listfarm" class="bg-light-wrapper">
        <div class="section-title">
            <h2>List your Farm</h2>
        </div>
        <div class="container">
            <form id="farmFormRequest" class="row" method="post" action="{{URL::to('postmyfarm')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="form-card">
                        <h5> <span><i class="fas fa-user"></i></span> Farm Introduction</h5>
                        <div class="form-group">
                            <label for="farmer_name">Fullname <span>*</span></label>
                            <input type="text" class="form-control" id="farmer_name" name="cp_name" placeholder="Fullname of farmer">
                        </div>
                        <div class="alert alert-danger" id="errFarmerName" role="alert">
                            @error('cp_name')
                            <small>{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="farm_name">Farm Name <span>*</span></label>
                            <input type="text" class="form-control" id="farmName" name="farmName" placeholder="FarmName">
                        </div>
                        <div class="alert alert-danger" id="errfarmName" role="alert">
                            @error('farmName')
                            <small>{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="farm_name">Choose Farm Category<span>*</span></label>
                            <div class="input-group">
                                <select class="custom-select" id="selectCategory" name="category_id">
                                    <option >Choose category</option>
                                    @foreach ($allcategory as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{--  <input type="text" class="form-control" id="farmName" name="farmName" placeholder="FarmName">  --}}
                        </div>
                        <div class="alert alert-danger" id="errfarmName" role="alert">
                            @error('farmName')
                            <small>{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-card">
                        <h5> <span><i class="fas fa-map-marker"></i></span> Farm Address</h5>
                        <div class="form-group">
                            <label for="">Location <span>*</span></label>
                            <div class="alert alert-danger" id="errfarmAddress" role="alert">
                                @error('farmProvince')
                                <small>{{$message}}</small>
                                @enderror
                                @error('farmDistrict')
                                <small>{{$message}}</small>
                                @enderror
                                @error('farmCity')
                                <small>{{$message}}</small>
                                @enderror

                            </div>
                            <div id="farmlocation">
                                <div class="input-group">
                                    <select class="custom-select province_dropdown" id="farmProvince" name="farmProvince">
                                    </select>
                                </div>
                                <div class="input-group">
                                    <select class="custom-select district_dropdown" id="farmDistrict" name="farmDistrict">
                                    </select>
                                </div>
                                <input type="text" class="form-control" id="farmCity" placeholder="farmCity" name="farmCity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Specific Location</label>
                            <input type="text" class="form-control" id="FarmSpecificAddress" name="farmSpecificAddress">
                        </div>
                        <div class="alert alert-danger" id="errSpecificAddress" role="alert">
                            @error('farmSpecificAddress')
                            <small>{{$message}}</small>
                            @enderror
                        </div>


                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-card">
                        <h5><span><i class="fas fa-phone-alt"></i></span>Farm Contact</h5>
                        <div class="form-group">
                            <label for="farm_phone">Phone <span>*</span></label>
                            <input type="text" class="form-control" id="farmPhone" placeholder="Phone" name="farmPhone">
                        </div>
                        <div class="alert alert-danger" id="errFarmPhone" role="alert">
                            @error('phone')
                            <small>{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="farm_mail">Email Address <span>*</span></label>
                            <input type="text" class="form-control" id="farmEmail" placeholder="Email address" name="farmEmail">
                        </div>
                        <div class="alert alert-danger" id="errFarmEmail" role="alert">
                            @error('phone')
                            <small>{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="farm_web">Website</label>
                            <input type="text" class="form-control" id="farmWebsite" placeholder="URL of Website" name="farmWebsite">
                        </div>
                        <div class="form-group">
                            <label for="farm_fb">Facebook Page</label>
                            <input type="text" class="form-control" id="farmFacebook" placeholder="Farm's Facebook Page URL" name="farmFacebook">
                        </div>
                        <div class="form-group">
                            <label for="farm_yt">Youtube Channel</label>
                            <input type="text" class="form-control" id="farmYoutube" placeholder="Farm's Youtube Channel URL" name="farmYoutube">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-card">
<<<<<<< HEAD
                         <div class="form-group">
                                <h5> <span><i class="fas fa-image"></i></span> Upload Farm Images</h5>
                                <div class="custom-file">
                                    <input type="file" name="gallery_image[]" multiple onchange="handleFiles(this.files)"  class="custom-file-input" accept="image/*" id="gallery_image" >
                                    <label class="custom-file-label" for="gallery_image">Choose file</label>
                                </div>
                         </div>
                          <div class="alert alert-danger" id="errgallery_image" role="alert">
                            @error('gallery_image')
                            <small>{{$message}}</small>
                            @enderror
                        </div>
                        {{--  <input id="upload-foto-input" type="file" name="gallery_image[]" class="custom-file-input" multiple onchange="handleFiles(this.files)" accept="image/*">  --}}
                        {{--  <div class="form-group">
=======
                      <input id="upload-foto-input" type="file" name="gallery_image[]" class="custom-file-input" multiple onchange="handleFiles(this.files)" accept="image/*">
                        <div class="form-group">
>>>>>>> 55a5a11cfdcc192761d47b4de9877df8ff561cb2
                            <div class="upload-decor" id="up-img-decor">
                                <img src="{{URL::asset('frontend/img/icons/img_up.png')}}" alt="">
                                <p>upload 3-5 images of dimension 1920*1080</p>
                                <a href="#" class="btn btn-primary">Browse</a>
                            </div>
                            <ul id="upload-img-rack">
                            </ul>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="latitude" id="latitude" placeholder="Latitude">
                            <input type="hidden" class="form-control" name="longitude" id="longitude" placeholder="Longitude">
                            <input type="hidden" class="form-control" name="latitude_val" id="latitude_val" value="" placeholder="Latitude">
                            <input type="hidden" class="form-control" name="longitude_val" id="longitude_val" value="" placeholder="Longitude">
                            <h5><span><i class="fas fa-map-marked"></i></span>Locate your Farm</h5>
                            <div id="map">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-card">
                        <h5> <span><i class="fas fa-tractor"></i></span> About Farm</h5>
                        <div class="form-group">
                            <label for="about-farm">Farm Introduction</label>
                            <textarea class="form-control" id="about-farm" rows="5" placeholder="tell the buyers about your farm in 100 words" name="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save and Continue</button>
                </div>
            </form>
        </div>
    </section>
    <!-- ---------------------------END farm listing form-------------------------------------- -->
@endsection
@section('scripts')
    <script src="{{URL::asset('frontend/js/map.js')}}">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('constants.map.google_map_key')}}&callback=initMap"
            async defer></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
    <script src="{{URL::asset('frontend/js/axios.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/farmerFarmLisingAjax.js')}}"></script>

    <script type="module" src="{{URL::asset('frontend/js/validations/farmerListFormValidation.js')}}"></script>
    <script src="{{URL::asset('frontend/js/handleFiles.js')}}"></script>

    <script>
        {{--  AOS.init({errFarmAddress
            once:true,
        });
        autocomplete(document.getElementById("list-farm-district"), farmArray);
        autocomplete(document.getElementById("list-farm-district"), districtArray);   --}}
        $('.venobox').venobox({
            share      : ['facebook', 'twitter','linkedin']
        });
        $('.venobox').venobox({
            share      : ['facebook', 'twitter','linkedin']
        });
    </script>
    <!-- scripts end -->
@endsection
