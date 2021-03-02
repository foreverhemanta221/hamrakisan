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
                         <div class="form-group">
                                <h5> <span><i class="fas fa-image"></i></span> Upload Farm Images</h5>
                                <div class="custom-file">
                                    <input type="file" name="gallery_image[]" multiple onchange="handleFiles(this.files)"  class="custom-file-input" accept="image/*" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                         </div>
                        {{--  <input id="upload-foto-input" type="file" name="gallery_image[]" class="custom-file-input" multiple onchange="handleFiles(this.files)" accept="image/*">  --}}
                        {{--  <div class="form-group">
                            <div class="upload-decor" id="up-img-decor">
                                <img src="{{URL::asset('frontend/img/icons/img_up.png')}}" alt="">
                                <p>upload 3-5 images of dimension 1920*1080</p>
                                <a href="#" class="btn btn-primary">Browse</a>
                            </div>
                            <ul id="upload-img-rack">
                            </ul>
                        </div>  --}}
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="latitude" id="latitude" placeholder="Latitude">
                            <input type="hidden" class="form-control" name="longitude" id="longitude" placeholder="Longitude">
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

    <script>
        {{--  AOS.init({
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
        $("#up-img-decor").click(function(){
            alert('test')
            $('#upload-foto-input').trigger("click")
        });
        //displaying image thumbnails
        window.URL = window.URL || window.webkitURL;

        const fileSelect = document.getElementById("custom-choose-file"),
            fileList = document.getElementById("upload-img-rack");


        function handleFiles(files) {
            if (!files.length) {
                fileList.innerHTML = "<p>No files selected!</p>";
            } else {

                // fileList.appendChild(list);
                for (let i = 0; i < 10; i++) {
                    let li = document.createElement("li");
                    fileList.appendChild(li);

                    const img = document.createElement("img");
                    img.src = window.URL.createObjectURL(files[i]);
                    img.onload = function() {
                        window.URL.revokeObjectURL(this.src);
                    }
                    //li.appendChild(img);
                    const info = document.createElement("div");
                    info.innerHTML = `<span class="info-image-name">` + files[i].name + `</span><p>`+ (files[i].size/1048576).toFixed(2) + " MB";
                    //li.appendChild(info);
                    const imgBox=document.createElement("div")
                    imgBox.setAttribute("class","img-Box");
                    imgBox.append(img)
                    imgBox.append(info)

                    li.append(imgBox)

                    const removeBtn=document.createElement("button")
                    removeBtn.setAttribute('class','remove-btn')
                    removeBtn.innerHTML=`<i class="far fa-times-circle"></i>`
                    li.appendChild(removeBtn)

                    $(".remove-btn").on('click',function(e){
                        e.preventDefault()
                        //alert("hhello")
                        console.log("deleted")
                        $(this).parent().fadeOut(
                            300, function() { $(this).remove(); }
                        );
                    })
                }
            }
        }


        // for edit ad system-single input

        function handleFileEdit(files) {
            if (!files.length) {
                fileList.innerHTML = " ";
            } else {
                let li = document.createElement("li");
                fileList.appendChild(li);
                const img = document.createElement("img");
                img.src = window.URL.createObjectURL(files[0]);
                //img.height = 60;
                img.onload = function() {
                    window.URL.revokeObjectURL(this.src);
                    li.appendChild(img);
                    // img.append()
                    console.log($(this).parent().append(`<a href="">X</a>`))
                    console.log( $(this).parent().find('a').addClass('img-del'))
                    $('a.img-del').click(function(e){
                        e.preventDefault()
                        //alert("hu")
                        $(this).parent().fadeOut();
                        $(this).parent().remove();
                    })
                }
            }
        }
        $('.remove-btn').click(function(){
            console.log("deleted")
            $(this).parents().find('li').fadeOut();
        })


    </script>
    <script src="{{URL::asset('frontend/js/googleMap.js')}}"></script>
    <!-- scripts end -->
@endsection
