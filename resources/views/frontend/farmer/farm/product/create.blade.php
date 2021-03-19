@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/main.css')}}">
@endsection
@section('content')
    <!-- ---------------------------product listing form-------------------------------------- -->
    <section id="listfarm" class="bg-light-wrapper">
        <div class="section-title">
            <h2>List your Product</h2>
        </div>
        <div class="container">
            <form class="row" method="post" action="{{route('myproduct.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto">
                    <div class="form-card">
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" class="form-control" name="name" id="">
                        </div>
                        <div class="form-group">
                            <label for="">Upload Product Image</label>
                            <input id="upload-foto-input" type="file" name="image" class="custom-file-input" onchange="handleFiles(this.files)" accept="image/*">
                            <div class="upload-decor" id="up-img-decor">
                                <img src="{{URL::asset('frontend/img/icons/img_up.png')}}" alt="">
                                <p>upload an image of suqare dimension</p>
                                <a href="#" class="btn btn-primary">Browse</a>
                            </div>
                            <ul id="upload-img-rack">
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="">Sales Unit</label>
                            <div class="form-flex-group">
                                <input type="number" placeholder="Minimum Order" class="form-control" name="minimum_quantity" id="">
                                <input type="number" placeholder="price per unit" name="price" id="" class="form-control" >
                                <div class="input-group">
                                    <select class="custom-select" id="unitSelect" name="measure_unit" required>
                                        <option selected>Unit</option>
                                         @foreach(measureUnit() as $key=>$value)
                                            <option value="{{$value}}">{{$value}}</option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-between align-items-center">
                            <label for="">Available</label>
                            <label class="switch">
                                <input type="checkbox" name="is_available" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary" style="width: calc(50% - 30px);"  type="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- ---------------------------END product listing form-------------------------------------- -->
@endsection
@section('scripts')
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
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
    </script>
    <!-- scripts end -->
@endsection
