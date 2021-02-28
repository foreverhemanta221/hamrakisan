@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/main.css')}}">
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
                                    <h5> <span><i class="fas fa-user"></i></span> Intro</h5>

                                    <div>
                                        <span>Farm Name</span>
                                        <span>{{$farmdetail->name}}</span>
                                    </div>

                                    <div>
                                        <span>Category</span>
                                        <span>
                                            {{$farmdetail->getCaegory()}}</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5> <span><i class="fas fa-map-marker"></i></span> Farm Address</h5>
                                    <div>
                                        <span>Location</span>
                                        <span>{{$farmdetail->address !=null? check_province($farmdetail->address->province)." ".check_district($farmdetail->address->district)." ".$farmdetail->address->city :null}}</span>
                                    </div>
                                    <div>
                                        <span>specific Location</span>
                                        <span>{{$farmdetail->specific_address}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5><span><i class="fas fa-phone-alt"></i></span>    Farm Contact</h5>

                                    <div>
                                        <span>Phone</span>
                                        <span>{{$farmdetail->phone}}</span>
                                    </div>

                                    <div>
                                        <span>mail</span><span>{{$farmdetail->email}}</span>
                                    </div>

                                    <div>
                                        <span>website</span>
                                        <span>{{$farmdetail->website}}</span>
                                    </div>

                                    <div>
                                        <span>facebook Url</span><span><a href="#">{{$farmdetail->facebook}}</a></span>
                                    </div>
                                    <div><span>Youtube Url</span>
                                        <span><a href="#">{{$farmdetail->youtube}}</a></span>
                                    </div>



                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5> <span><i class="fas fa-tractor"></i></span> About Farm</h5>
                                        {!! $farmdetail->about !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5><span><i class="fas fa-map-marked"></i></span>Farm in Map</h5>

                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14133.330835315954!2d85.324019!3d27.67611!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd54e8bd02cf8160b!2sLumbini%20Heritage%20Home!5e0!3m2!1sen!2snp!4v1592647109082!5m2!1sen!2snp"
                                            width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5> <span><i class="fas fa-image"></i></span> Uploaded Farm Images</h5>

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
                        <form class="row">

                            <div class="col-md-6">

                                <div class="form-card">
                                    <h5> <span><i class="fas fa-user"></i></span> Farm Introduction</h5>

                                    <div class="form-group">
                                        <label for="farm_name">Farm Name <span>*</span></label>
                                        <input type="text" class="form-control" id="farm_name" placeholder="FarmName" value="{{$farmdetail->name}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="farmer_name">Farm Category <span>*</span></label>
                                        <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect01" required>

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
                                    <h5> <span><i class="fas fa-map-marker"></i></span> Farm Address</h5>
                                    <div class="form-group">
                                        <label for="">Location <span>*</span></label>
                                        <div id="farmlocation">
                                            <div class="input-group">
                                                <select class="custom-select" id="inputGroupSelect01" required>
                                                    @foreach(getProvince() as $key=>$value)
                                                        <option value="{{$key}}" @if($key== $farmdetail->address->province) selected="selected" @endif >{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group">
                                                <select class="custom-select" id="inputGroupSelect01" required>
                                                    @foreach(checkProvinceDistrict($farmdetail->address->province) as $key=>$value)
                                                        <option value="{{$key}}" @if($key== $farmdetail->address->district) selected="selected" @endif >{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="text" class="form-control" name="" id="" placeholder="city" required value="{{$farmdetail->city}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Specific Location</label>
                                        <input type="text" class="form-control" name="" id="" value="{{$farmdetail->specific_address}}">
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5><span><i class="fas fa-phone-alt"></i></span>    Farm Contact</h5>
                                    <div class="form-group">
                                        <label for="farm_phone">Phone <span>*</span></label>
                                        <input type="text" class="form-control" id="farm_phone" placeholder="Phone" value="{{$farmdetail->phone}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="farm_mail">Email Address <span>*</span></label>
                                        <input type="text" class="form-control" id="farm_mail" placeholder="Email address" value="{{$farmdetail->email}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="farm_web">Website</label>
                                        <input type="text" class="form-control" id="farm_web" placeholder="URL of Website" value="{{$farmdetail->website}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="farm_fb">Facebook Page</label>
                                        <input type="text" class="form-control" id="farm_fb" placeholder="Farm's Facebook Page URL" value="{{$farmdetail->facebook}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="farm_yt">Youtube Channel</label>
                                        <input type="text" class="form-control" id="farm_yt" placeholder="Farm's Youtube Channel URL" value="{{$farmdetail->youtube}}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5> <span><i class="fas fa-tractor"></i></span> About Farm</h5>
                                    <div class="form-group">
                                        <label for="about-farm">Farm Introduction</label>
                                        <textarea class="form-control" id="about-farm" rows="15" placeholder="tell the buyers about your farm in 100 words">{{  strip_tags($farmdetail->about)}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5><span><i class="fas fa-map-marked"></i></span>Locate your Farm</h5>

                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14133.330835315954!2d85.324019!3d27.67611!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd54e8bd02cf8160b!2sLumbini%20Heritage%20Home!5e0!3m2!1sen!2snp!4v1592647109082!5m2!1sen!2snp"
                                            width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-card">
                                    <h5> <span><i class="fas fa-image"></i></span> Upload Farm Images</h5>
                                    <div class="form-group">

                                        <input id="upload-foto-input" type="file" name="img" class="custom-file-input" multiple onchange="handleFiles(this.files)" accept="image/*">

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
                                <a href="" class="btn btn-primary">Save and Continue</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>

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
