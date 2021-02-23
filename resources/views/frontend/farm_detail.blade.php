@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">

@endsection
@section('content')
    <div class="bg-light-wrapper">
        <!----------------------------------- FARM BANNER SECTION--------------------------------------- -->
        <section class="farm-banner">
            <div class="container-xl">
                <div class="row">
                    <!-- caoursel here -->
                    <div class="col-md-8">
                        <div class="bg-white pb-3">
                            <div id="farm-slider" class="owl-carousel owl-theme">
                                @foreach($listing->images as $image)
                                <img class="owl-lazy"  data-src="{{URL::asset($image->image)}}" alt="">
                                @endforeach
                            </div>
                            <div class="farm-slider-nav ml-3">
                                @foreach($listing->images as $image)
                                    <img class="" src="{{URL::asset($image->small_thumb)}}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- farm about section -->
                    <div class="col-md-4">
                        <div class="farm-sidebar">
                            <div class="card-header">
                                <h3>{{$listing->name}}</h3>
                                <span class="address">{{$listing->short_address}}</span>
                                <div class="farm-rating">
                                    @if($listing->rel_review!=null)
                                    @for($i=0; $i<round($listing->rel_review->where('status',1)->avg('star'));$i++ )
                                            <span class="fa fa-star checked"></span>
                                    @endfor
                                    @for($i=round($listing->rel_review->where('status',1)->avg('star'));$i<5;$i++)
                                            <span class="fa fa-star"></span>
                                    @endfor
                                    @endif
                                </div>
                            </div>
                            <p id="about-farm" class="card-text">
                                <?php echo strip_tags($listing->about) ?>
                            </p>
                            <a href="">Read All</a>
                            <h6 class="mt-3">Contact Farm</h6>
                            <ul class="farm-contacts">
                                <li><a href="tel:{{$listing->phone}}"><i class="fas fa-phone-alt"></i><span> Call</span></a></li>
                                <li><a href="mailto:{{$listing->email}}"><i class="fab fa-telegram-plane"></i><span>Email</span></a></li>
                                <li><a id="uptoFarmMap" href=""><i class="fas fa-map-marker-alt"></i><span>Map</span></a></li>
                                <li><a href="{{$listing->website}}" target="_blank"><i class="fas fa-globe-americas"></i><span>Website</span></a></li>
                            </ul>
                            <ul class="farm-social">
                                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                                <li><a href=""><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!----------------------------------- END FARM BANNER SECTION----------------------------------- -->

        <!-- ---------------------------------FARM PRODUCTS SECTION-------------------------------------- -->
        <section class="fp-left-section">
            <div class="container-xl">
                <div class="row">
                    <!-- products and map and reviews -->
                    <div class="col-md-8">
                        <!-- products -->
                        <div class="farm-product-section">
                            <h2>Our Products</h2>
                            @if($listing->products->count()==0)
                                <img src="{{URL::asset('frontend/img/noproducts.png')}}" class="img-fluid no-product-img" alt="">
                            @else
                            <div class="row mt-3">

                                    @foreach($listing->products as $product)
                                        <div class="col-lg-6 mb-4">
                                            <img src="{{URL::asset($product->getFeatureImage('small'))}}" alt="">
                                            <div class="farm-product">
                                                <h4>{{$product->name}}</h4>
                                                <span class="price">Rs {{round($product->price/ $product->minimum_quantity,2)}} /  {{$product->measure_unit}}</span>

                                            </div>
                                            <div class="qty-selector">
                                                <button class="btn qty-btn qty-dec" data-value="{{$product->id}}">-</button>
                                                <span class="qty">0</span>
                                                <button class="btn qty-btn qty-inc" data-value="{{$product->id}}">+</button>
                                            </div>
                                        </div>
                                    @endforeach


                            </div>
                            @endif
                        </div>

                        <!-- products map -->
                        <div class="farm-map-section mt-5">
                            <h2>Find the farm</h2>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16463.154945539427!2d84.31807658622488!3d27.570674675022104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994f71d0107128d%3A0x86b7d511d3e1e13b!2sJagatpur%20Agro%20Pvt%20Ltd.!5e0!3m2!1sen!2snp!4v1590690320194!5m2!1sen!2snp"
                                frameborder="0"
                                style="border:0;"
                                allowfullscreen=""
                                aria-hidden="false"
                                tabindex="0"
                                class="mt-3"></iframe>
                        </div>


                        <div class="farm-reviews-section mt-5">
                            <h2>Reviews</h2>

                            <div class="reviews mt-3">
                                @if($listing->rel_review->count() == 0)

                                @else
                                    @foreach($listing->rel_review as $review)
                                        <?php // dd($review); ?>
                                    <div class="review">
                                        <div class="review-text">{{$review->description}}</div>
                                        <div class="review-name">{{$review->rel_user->name}}</div>
                                        <div class="review-stars farm-rating">
                                            @for($i=0;$i<$review->star;$i++)
                                            <span class="fa fa-star checked"></span>
                                            @endfor

                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="review-btns d-flex justify-content-center">
                                <button id="readallreviews" class="btn btn-outline-primary mr-2">Read All</button>
                                <button data-toggle="modal" data-target="#addReviewModal" id="review-form" class="btn btn-primary">Leave a review</button>
                            </div>
                        </div>

                    </div>

                    <!-- cart and ratings -->
                    <div class="col-md-4">

                        <!-- local cart -->
                        <div class="farm-sidebar cart-section mb-5">
                            <div class="card-header">
                                <h3>Price Calculator</h3>
                            </div>
                            <form action="" method="post" id="orderFrom">
                                    @csrf
                                    <div class="minicart" id="minicart">

                                    </div>
                                <div class="bill-control mt-4">
                                    <div class="cart-bill">Rs. 0</div>
                                    <button class="btn btn-primary">Add Cart</button>
                                </div>
                            </form>
                        </div>
                        <!-- farm ratings -->
                        <div class="ratings-section farm-sidebar mt-5">
                            <div class="card-header">
                                <h3>Ratings</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                                    <div class="star-rated">4</div>
                                    <div class="farm-rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <div class="people-rated">300 People</div>

                                </div>
                                <div class="col-md-6">
                                    <ul class="rating-progress">

                                        <li>
                                            <span>5</span>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 88%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <span>4</span>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 71%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <span>3</span>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>


                                        <li>
                                            <span>2</span>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <span>1</span>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- give stars -->
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <div class="farm-rating give-stars mt-3 mb-2">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </div>
                                <button class="btn btn-outline-primary">Rate this farm</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ---------------------------------END FARM PRODUCTS SECTION-------------------------------------- -->

        @isset($related_listings)
        
        <!-- ---------------------------------RECOMMENDATIONS SECTION-------------------------------------- -->
        <section class="recommendation-section">
            <div class="container-xl">

                <h2>People also bought from</h2>
                <div id="recommendation-slider" class="owl-carousel owl-theme mt-4">
                    @foreach ($related_listings as $related)
                        <div class="farm-card">
                            <div class="img-box">
                                <a href="{{URL::to('listings/'.$related->slug)}}">
                                    <img src="{{$related->getFeatureImage('medium')}}" class="img-fluid" alt="{{$related->slug}}">
                                </a>
                            </div>
                            <div class="farm-info p-2 mt-2 mb-0">
                                <h5><a href="{{URL::to('listings/'.$related->slug)}}">{{$related->name}}</a></h5>
                                <h6>Chitwan</h6>
                                <div class="prod-rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                @if($related->products->count()>0)
                                Sells:
                                    <ul class="sells">
                                        @foreach($related->products as $product)
                                            <li>{{$product->name}}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                        </div>     
                    @endforeach
                </div>        
            </div>
        </section>
        @endisset
        <!-- ---------------------------------END RECOMMENDATIONS SECTION-------------------------------------- -->
    </div>
    <!-- Reviews Modal -->
    <div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add a review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group text-center">
                            <label for="">Give stars to this Farm</label>
                            <div class="farm-rating give-stars">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                        <div class="ratingGiven">
                            select stars
                        </div>
                        <div class="form-group">
                            <label for="review">Your review</label>
                            <textarea class="form-control" id="userReview" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{URL::asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.js')}}"></script>
    <script src="{{URL::asset('frontend/js/farm.js')}}"></script>
    <script src="{{URL::asset('frontend/js/axios.min.js')}}"></script>

    <script>
        AOS.init();

        $('#uptoFarmMap').click(function(e){
            e.preventDefault()

            $('html,body').animate({
                    scrollTop: $(".farm-map-section").offset().top},
                1000);
        });

        // price calculator
        $('.qty-selector').on('click','.qty-inc',function(){
            let productId = $(this).attr('data-value');
            let nowQty =$(this).parents('.qty-selector').find('.qty').text()
            let minVal = $(this).parents('.col-lg-6')
                .find('.farm-product .min-qty span')
                .text()

            if(nowQty == 1 || nowQty == minVal){
                // name of product
                var itemName = $(this).parents('.col-lg-6').find('.farm-product h4').text()
                // qty
                var itemQty = nowQty
                // rate
                var itemRateText = $(this).parents('.col-lg-6').find('.price').text()
                var itemRate =itemRateText.match(/\d+/)
                // price
                let itemPrice = 'Rs. ' + (itemQty * itemRate)
                var minicartItem = `
               <div class="minicart-item">
                                <div class="minicart-item-info">
                                    <h6>`+ itemName + `</h6>
                                    <input type="hidden" class="productId" name="productId[]" value="`+productId+`">
                                    <input type="hidden" class="productQty" name="productQty[]" value="`+itemQty+`">
                                    <input type="hidden" class="productPrice" me="productPrice[]" value="`+itemPrice+`">
                                    <p><span class="qty">`+ itemQty +`</span>
                                        <span class="separator"></span>
                                        <span class="rate">`+ itemRateText +`</span>
                                    </p>
                                </div>
                                <div class="minicart-item-price">
                                    `+ itemPrice + `
                                </div>
                            </div>
               `
                //    add this product in minicart
                $('.minicart').append(minicartItem)
                // added this line because while adding item fist time the price was logged to be NAN
                $('.minicart .minicart-item:last-of-type').find('.minicart-item-price').text(itemPrice)
            } else{
                //    change price of this product in minicart

                var itemName = $(this).parents('.col-lg-6').find('.farm-product h4').text()
                // get qty
                var itemQty = $(this).parents('.qty-selector').find('.qty').text()
                // get rate
                var itemRate =($(this).parents('.col-lg-6').find('.price').text()).match(/\d+/)
                // get price
                let itemPrice = 'Rs. ' + (itemQty * itemRate)
                // find this item in minicart
                $('.minicart').children('.minicart-item').each(function(){
                    let basketItem = $(this).find('h6').text()
                    if(basketItem == itemName){
                        $(this).find('.minicart-item-price').text(itemPrice)
                        $(this).find('.qty').text(itemQty)
                    }
                })
            }
        })
        $('.qty-selector').on('click','.qty-dec',function(){
            // minicart ko item qty ghatne
            // get name
            var itemName = $(this).parents('.col-lg-6').find('.farm-product h4').text()
            // get qty
            var itemQty = $(this).parents('.qty-selector').find('.qty').text()
            // get rate
            var itemRate =($(this).parents('.col-lg-6').find('.price').text()).match(/\d+/)
            // get price
            let itemPrice = 'Rs. ' + (itemQty * itemRate)
            // find this item in minicart
            $('.minicart').children('.minicart-item').each(function(){
                let basketItem = $(this).find('h6').text()
                if(basketItem == itemName){
                    $(this).find('.minicart-item-price').text(itemPrice)
                    $(this).find('.qty').text(itemQty)
                }
            })
            // qty 0 huda item nai hatne
            if(itemQty == 0){
                $('.minicart').children('.minicart-item').each(function(){
                    let basketItem = $(this).find('h6').text()
                    if(basketItem == itemName){
                        $(this).remove()
                    }
                })
            }
        });
        // price checker
        $("body").on(
            "DOMSubtreeModified",
            ".minicart",
            function(e) {
                let sum = 0;
                $('.minicart').children('.minicart-item').each(function(){
                    //console.log($(this).find('.minicart-item-price').text())
                    let eachPrice = parseFloat($(this).find('.minicart-item-price').text().slice(4))
                    //console.log(eachPrice);
                    sum = sum +eachPrice
                });
                $('.cart-bill').text('Rs. ' + sum)
            })
    </script>

    <script>
        //when form submit
        let order_from = document.querySelector('#orderFrom');
        order_from.addEventListener('submit',(e)=>{
            e.preventDefault();
           if(confirm('are you sure want to order ?')){
               let base_url = 'localhost:8000';
                let farmId = '{{$listing->id}}';
                let productsIdDom = document.querySelectorAll('.productId');
                let productsQtyDom = document.querySelectorAll('.productQty');
                let productIds = [];
                let productQtys = [];
                productsIdDom.forEach(function (item,index) {
                    productIds.push(item.value)
                });
                productsQtyDom.forEach(function (item,index) {
                    productQtys.push(item.value)
                });

               axios.post('/add-to-cart', {
                   farmId : farmId,
                   productId: productIds,
                   productQty: productQtys
               }).then(function (response) {
                        console.log(response.data.status);
                        console.log(response.data.status===false);
                     if(response.data.status===false){
                         window.location = '{{route('userlogin')}}'
                     }
                     if(response.data.status===true){
                         console.log('added in cart');
                         document.getElementById('minicart').innerHTML = '';
                     }
               }).catch(function (error) {
                       console.log(error);
               });
           }

        })

    </script>
    <!-- scripts end -->
@endsection
