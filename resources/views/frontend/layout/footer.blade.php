<!-- copyright section------------------------------------------------------------- -->
<footer>
    <div class="row">
        <!-- short intro -->
        <div class="col-md-6">
            <div class="row">
                <div class="col">
                    <div class="short-intro">
                        <h3>Hamrakisan.com</h3>
                        <img src="{{URL::asset('frontend/img/footer-logo.png')}}" alt="">
                    </div>
                    <div class="short-intro-p">
                        <p style="text-align: justify">
                            हाम्रा किशान कृषि क्षत्रमा क्रिाशिल एक निज कम्पनी हो । हाम्रो उद्देष्य नेपालक कृषि क्षत्मा अनुशन्धनमा आधारित
                            नाफामुखि व्यवायलाई प्रो्शाहन दिइ नाँ तथा पुराा कृषकहरुलाई व्यवसायिक तथा प्राविधक सेवा प्रदन गर्नु हो । आजको दिनमा नि कृषकहरुले अभैm कृषिलई
                            नाफामुखि व्यवसाय भन्दा पनि जिविकोपर्जन गर्ने ाधनको रुपम लिएको पाइनछ । कृषि क्ष्रमा देखिएा प्रमुख चुौतिहरु अनुशन्धानको कमी, बजार व्यवस्थापनको कमी,  योजनागत कृि
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4>{{__('footer.download_app')}}</h4>
                    <div class="app-tray">
{{--                        <img src="{{URL::asset('frontend/img/ios.png')}}" alt="">--}}
{{--                        <img src="{{URL::asset('frontend/img/ios.png')}}" alt="">--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- useful links section -->
        <div class="col-md-3">
            <div class="row">
                <div class="col">
                    <h3>{{__('footer.useful_links')}}</h3>
                    <ul class="useful-links">
                        <li><a class="actifooter" href="">{{__('footer.home')}}</a></li>
                        <li><a href="{{URL::asset('about-us')}}">{{__('footer.about')}}</a></li>
                        <li><a href="{{URL::asset('/farm')}}">{{__('footer.farms')}}</a></li>
                        <li><a href="{{URL::to('loanrequestform')}}">{{__('footer.request_loan')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- contacts -->
        <div class="col-md-3">
            <h3>{{__('footer.contacts')}}</h3>
            <ul class="contacts">
                <li><i class="fas fa-map-marker-alt"></i> {{__('footer.location')}}</li>
                <li><i class="fas fa-phone-alt"></i> +977-1-5547257</li>
                <li><i class="fas fa-mobile-alt"></i>+977-9840466686</li>
                <li><i class="fas fa-envelope"></i> hamrakisan@gmail.com</li>
            </ul>
            <h3>{{__('footer.follow_us_on')}}</h3>
            <ul class="social-tray">
                <li class="fb"><a href=""><i class="fab fa-facebook-f"></i></a></li>
                <li class="youtube"><a href=""><i class="fab fa-youtube"></i></a></li>
                <li class="insta"><a href=""><i class="fab fa-instagram"></i></a></li>
                <li class="twitter"><a href=""><i class="fab fa-twitter"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <!-- CHANGED HERE ADDED CLASS NEWSLETTER-FORM -->
            <div class="newsletter-form">
                <input type="text" class="form-control"
                       placeholder="{{__('footer.newsletter_placeholder')}}"
                       onfocus="this.placeholder=''"
                       onblur="this.placeholder='{{__('footer.newsletter_placeholder')}}'"
                >
                <button class="btn btn-success" type="submit">{{__('footer.subscribe')}}</button>
            </div>
        </div>
    </div>
</footer>
<!-- copyright section -->
<section id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                Hamrakisan.com 2020 <span>All Rights Reserved</span>
            </div>
            <div class="col-md-6">
                <span>Developed and Designed By </span> Webroot Multipurpose
            </div>
        </div>
    </div>
</section>
<!-- side fixed buttons -->
