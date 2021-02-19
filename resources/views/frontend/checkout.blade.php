@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
@endsection
@section('content')
{{--    checkout--}}

<section id="cart-page-section" class="bg-light-wrapper">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-7 bg-white p-4 mx-auto">
                <h4>Payment</h4>
                <form action="{{URL::to('order')}}" method="post">
                    @csrf
                    <div class="checkout-card">
                        <div class="header">
                            <h4>Total Payable Amount</h4>
                            <h4>Rs {{$amount}}</h4>
                        </div>
                        <div class="payment-card">
                            <div class="form-group">
                                <label for="">Choose payment method</label>
                                <div id="payment-type">
                                    <label>
                                        <input type="radio" name="payment_method" value="cash-on-delivery" checked>
                                        <div>
                                            <img src="{{URL::to('frontend/img/icons/cashon.png')}}">
                                        </div>
                                    </label>
                                    <label>
                                        <input type="radio" name="payment_method" value="esewa">
                                        <div>
                                            <img src="{{URL::to('frontend/img/icons/esewa-logo-03.png')}}" alt="">
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-5">
                            <a href="{{URL::to('my-cart')}}" class="btn-typo"><i class="fas fa-arrow-left"></i> Go Back </a>
                           <button type="submit" class="btn btn-primary">Place this Order</button>
                        </div>
                    </div>
                </form>
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
    <script src="{{URL::asset('frontend/js/aos.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
    <script src="{{URL::asset('frontend/js/axios.min.js')}}"></script>
    <script>
        function increateProductByOne(productId,productPrice) {
            const currentQtyDom = document.querySelector('.qty-'+productId);
            const currentPrice = document.querySelector('.price-'+productId);
            let qty = parseInt(currentQtyDom.innerHTML);
            let productQty = qty+1;
            axios.post('/update-cart', {
                productId: productId,
                productQty: productQty
            }).then(function (response) {
                console.log(response.data.status);
                console.log(response.data.status===false);
                if(response.data.status===false){
                    window.location = '{{route('userlogin')}}'
                }
                if(response.data.status===true){
                    currentQtyDom.innerHTML = productQty;
                    currentPrice.innerHTML = productQty*productPrice;
                }
            }).catch(function (error) {
                console.log(error);
            });
        }
    </script>
@endsection
