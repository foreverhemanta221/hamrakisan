@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
@endsection
@section('content')
    <section id="cart-page-section" class="bg-light-wrapper">
        <div class="container-xl bg-white p-4">
            <h4>Your cart</h4>
            <div class="row">
                <div class="col">
                    @if($cartDetail->count())
                            @foreach($cartDetail as $farmId=>$farmProducts)
                            <div class="cart">
                                <div class="cart-header">
                                    <h4>{{\App\Models\Listing::find($farmId)->name}}</h4>
                                </div>
                                <div class="cart-body">
                                    @foreach($farmProducts  as $product)
                                        @php
                                            $price = $product->quantity * $product->price;
                                        @endphp
                                        <div class="cart-item">
                                            <div class="cart-item-name">
                                                <img src="{{$product->attributes->product_image}}" alt="">
                                                <div>
                                                    {{$product->name}}
                                                    <p>Rs {{$product->price}} per Unit</p>
                                                </div>
                                            </div>
                                            <div class="qty-selector">
                                                <button class="btn qty-btn qty-dec" onclick="decreaseProductByOne({{$product->id}} , {{$product->price}})">-</button>
                                                <span class="qty-{{$product->id}}">{{$product->quantity}}</span>
                                                <button class="btn qty-btn qty-inc" onclick="increaseProductByOne({{$product->id}} , {{$product->price}})">+</button>
                                            </div>
                                            <div class="cart-item-price">
                                                Rs. <span class="price-{{$product->id}}">{{$price}}</span>
                                                <a  class="remove-cart-item" onclick="removeFromCart( {{$product->id}} )">
                                                    <i class="far fa-times-circle"></i>
                                                </a>
                                                {{--  <button class="far fa-times-circle" onclick="removeFromCart({{$product->id}} , {{$product->price}})"></button>  --}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                             @endforeach
                        
                        <div class="cart-footer">
                            <div class="cart-total-price cart-total">
                                <span>Total:</span> Rs. <p id="totalPrice">{{\Cart::session(Auth::user()->id)->getTotal()}}<p>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <a href="{{URL::to('farm')}}" class="btn-typo">Continue Shopping <i class="fas fa-arrow-right"></i></a>
                               
                                    <a href="{{URL::to('checkout')}}" class="btn btn-primary">Order Now</a>
                               
                            </div>
                        </div>
                        @else
                        <div class="cart-footer">
                            <div class="cart-item">
                                <span>Your cart is Empty. Add Some Product On cart first !!!</span>
                            </div>
                            <div class="abc">
                                <a href="{{URL::to('/')}}" >Continue Shopping</a>
                            </div>
                            
                        </div>
                        @endif
                        
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{URL::asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
    <script src="{{URL::asset('frontend/js/axios.min.js')}}"></script>
    <script>
    
        function increaseProductByOne(productId,productPrice) {
            const currentQtyDom = document.querySelector('.qty-'+productId);
            const currentPrice = document.querySelector('.price-'+productId);
            let qty = parseInt(currentQtyDom.innerHTML);
            let productQty = qty+1;
            axios.post('/update-cart', {
                productId: productId,
                productQty: productQty
            }).then(function (response) {

                if(response.data.status===false){
                    window.location = '{{route('userlogin')}}'
                }
                if(response.data.status===true){
                    currentQtyDom.innerHTML = productQty;
                    console.log(currentQtyDom.innerHTML);
                    currentPrice.innerHTML = productQty*productPrice;
                    $('.cart-total').text('Rs. ' + productQty*productPrice)
                }
            }).catch(function (error) {
                console.log(error);
            });
        }
        function decreaseProductByOne(productId,productPrice) {
            const currentQtyDom = document.querySelector('.qty-'+productId);
            const currentPrice = document.querySelector('.price-'+productId);
            let qty = parseInt(currentQtyDom.innerHTML);
            if(qty <= 1){
                swal({
                        buttons: true,
                        icon: "warning",
                        {{--  timer: 2500,  --}}
                        text: 'Minimum Quantity Cant Not Be Less Than One !!!'
                    });
            }else{
                let productQty = qty-1;
                axios.post('/update-cart', {
                    productId: productId,
                    productQty: productQty
                }).then(function (response) {
                    
                    if(response.data.status===false){
                        window.location = '{{route('userlogin')}}'
                    }
                    if(response.data.status===true){
                        currentQtyDom.innerHTML = productQty;
                        currentPrice.innerHTML = productQty*productPrice;
                        $('.cart-total').text('Rs. ' + productQty*productPrice)
                    
                    }
                }).catch(function (error) {
                    console.log(error);
                });
            }
        }
        function removeFromCart(productId) {
            axios.post('/remove-cart', {
                productId: productId
            }).then(function (response) {
                if(response.data.status===false){
                    window.location = '{{route('userlogin')}}'
                }
                if(response.data.status===true){
                    swal({
                                buttons: false,
                                icon: "success",
                                timer: 2500,
                                text: 'product Removed From Cart Successfully !!!'
                            });
                     window.location = '{{route('my-cart')}}'
                }
            }).catch(function (error) {
                console.log(error);
            });
        }
    </script>
@endsection
