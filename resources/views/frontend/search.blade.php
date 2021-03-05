@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
    <style>
        #loading{
            text-align: center;
            background: url({{URL::asset('frontend\img\loading.gif')}}) no-repeat center;
            height: 250px;
            display: none;
        }
    </style>
@endsection
@section('content')
        {{--  SEARCH PAGE WRAPPER  --}}
    <section class="search-page-wrapper">
        <div class="container">
            <div class="row">
               {{--  filters aside   --}}
                <div class="col-lg-3">
                    <div class="sp-filters mb-3">
                        <div class="btn-typo">{{__('farm.filters')}}</div>


                        <form autocomplete="off" action="" id="search-bar" class="search-bar">
                            <div class="form-group">
                                <label for="">{{__('farm.province')}}</label>
                                <div class="input-group">
                                    <select class="custom-select province_dropdown province" id="province">

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">{{__('farm.district')}}</label>
                                <div class="input-group">
                                    <select class="custom-select district_dropdown district" id="district">

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" >{{__('farm.categories')}} </label>
                                @php
                                    $requestCategory  = $request->has('category')  ? explode(',',$request->get('category')) : null
                                @endphp
                                @foreach($categories as $category)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input category_checkbox" id="{{$category->slug}}" value="{{$category->id}}" @if( $requestCategory!=null && in_array($category->id,$requestCategory)==true)  {{"checked"}} @endif >
                                        <label class="custom-control-label" for="{{$category->slug}}">{{$category->title}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
                <!-- --------END filters aside ----------------->
                <!-- Search Content -->
                <div class="col-lg-9 search-content">

                    {{--  <form action="" class="search-bar">
                        <div class="form-group sp-general-search">
                            <input type="text" class="form-control query" name="" id="query">
                            <button type="submit" class="btn btn-secondary">Search</button>
                        </div>
                    </form>  --}}

                    <div class="row bg-white">
                        <div class="col">
                            <div class="search-view-controls">
                                <h3 class="result_count">{{$searchCount}} {{__('farm.farms_found')}}</h3>
                                <ul class="view-switch">
                                    <li class="active"><i class="fas fa-th-large"></i> Grid View</li>
                                    <li><i class="fas fa-th-list"></i> List View</li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="row bg-white">
                        <div id="loading"></div>
                        <div class="col" id="result-content">

                            <div id="viewSwitchable" class="sp-farm-grid">
                                @foreach($items as $item)
                                <div class="farm-card result">
                                    <div class="img-box">
                                        <a href="{{URL::to('listings/'.$item->slug)}}">
                                            <img src="{{$item->getFeatureImage('medium')}}" class="img-fluid feature-image" alt="">
                                        </a>
                                    </div>

                                        <div class="farm-info p-2 mt-2 mb-0">
                                            <h5><a href="{{URL::to('listings/'.$item->slug)}}">{{$item->name}}</a></h5>
                                            <h6>{{$item->short_address}}</h6>
                                            <div class="prod-rating">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                            <div>
                                                Sells:
                                                <ul class="sells withPrice">
                                                    {{--  @if($item->products!=null)
                                                        @foreach($item->products as $product)
                                                            <li>{{$product->name}}</li>
                                                            <li>{{$product->price}}</li>
                                                        @endforeach
                                                    @endif  --}}
                                                     @if($item->minPriceSellsProduct()!=null)
                                                        {{--  @foreach($item->products as $product)  --}}
                                                            <li>{{$item->minPriceSellsProduct()->name}}</li>
                                                            <li>{{$item->minPriceSellsProduct()->price}}</li>
                                                        {{--  @endforeach  --}}
                                                    @endif
                                                </ul>
                                            </div>
                                            <a href="{{URL::to('listings/'.$item->slug)}}" class="btn btn-primary">Order Now</a>
                                        </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div class="row bg-white">
                        <div class="col">
                            <div class="d-flex">
                                <div class="mx-auto">
                                    {{--  {{$items->links("pagination::bootstrap-4")}}  --}}
                                    @php
                                        $data = $request->all();
                                    @endphp
                                    {{ $items->appends($data)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    {{--  <div class="row bg-white">
                        <div class="col">
                            <nav aria-label="Page navigation example" class="mt-5 d-flex justify-content-center">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item ">
                                        <a class="page-link" href="#" tabindex="-1"><</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>  --}}
                </div>
                <!-- Search Content END -->
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{URL::asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.min.js')}}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{URL::asset('frontend/js/basic_axios.js')}}"></script>
    <script>
          AOS.init();
         {{--  autocomplete(document.getElementById("search-page-district"), districtArray);  --}}
        // switching views grid and column
        $('.view-switch li').click(function(){
            if($(this).index()=='0'){

                $('#viewSwitchable').removeClass('sp-farm-list').addClass('sp-farm-grid')
            }else{

                $('#viewSwitchable').removeClass('sp-farm-grid').addClass('sp-farm-list')
            }
            // switch color
            $(this).siblings().removeClass('active')
            $(this).addClass('active')
        })
    </script>
    <script>
        document.querySelector('.search-bar').addEventListener('change',function (e) {
            // e.preventDefault();
            filter_data(1)
        });
        function filter_data() {
            var province = document.querySelector('.province_dropdown').value;
            var district = document.querySelector('.district_dropdown').value;
            var categories = new Array();
            var categoryDom=  document.getElementsByClassName('category_checkbox');
            var categoryCount = document.getElementsByClassName('category_checkbox').length;
            for(var i=0 ; i<categoryCount;i++){
                if(categoryDom[i].checked ===true){
                    if(categories.includes(categoryDom[i].checked)===false){
                        categories.push(categoryDom[i].value)
                    }
                }
            }

            var searchParams = new URLSearchParams();
            var province = $('.province').val();
            var district = $('.district').val();
            if(province!=""){
                searchParams.set("province", province);
            }else{
                searchParams.delete("province");
            }
            if(province==null){
               searchParams.delete("province");
            }

            if(district!=""){
                searchParams.set("district", district);
            }else{
                searchParams.delete("district");
            }
            if(district==null){
               searchParams.delete("district");
            }

            if(categories.length>0){
                searchParams.set('category',categories)
            }else{
                searchParams.delete('category');
            }
             console.log(searchParams.toString())
            window.location.href = "{{route('farm.search')}}"+"?"+searchParams.toString()
        }
    </script>
@endsection
