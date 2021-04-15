<!-- banner start -->
<section id="banner">
    <div class="container">
        <div class="row">
            <!-- slider here -->
            <div class="col-lg-9">
                <div id="hero-slider" class="owl-carousel owl-theme">
                    @isset($allbanner)
                        @foreach($allbanner as $banner)
                            <img src="{{URL::asset($banner->image)}}" alt="">
                        @endforeach
                    @endisset
                </div>
            </div>
            <div class="col-lg-3 order-lg-first">
                <ul class="categories d-none d-lg-block">
                    @isset($allcategory)
                        @foreach($allcategory as $category)
                            <?php //dd($category); ?>
                            <li><a href="{{URL::asset('farm?category='.$category->id)}}"><span><img src="{{URL::asset($category->category_image)}}" alt=""></span> {{$category->title}}</a></li>
                        @endforeach
                    @endisset
                </ul>
                <ul id="categories-slider" class="owl-carousel owl-theme d-lg-none">
                    @isset($allcategory)
                        @foreach($allcategory as $category)
                            <?php //dd($category); ?>
                            <li><a href="{{URL::asset('farm?category='.$category->id)}}"><span><img src="{{URL::asset($category->category_image)}}" alt=""></span> {{$category->title}}</a></li>
                        @endforeach
                    @endisset
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- banner end -->
