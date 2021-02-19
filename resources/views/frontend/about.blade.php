@extends('frontend.layout.layout')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/css/venobox.min.css')}}">
@endsection
@section('content')
    <!-- breif intro Section----------------------------------------------- -->

    <div id="aboutus" class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-2">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <!-- changed here -->
                    <div class="col-md-10">
                        <h1>किनकि किसानले प्रगति गरे देशले प्रगति गर्नेछ</h1>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <p>
                            नेपाल एक कृषि प्रधान देश भनेर चिनिन्छ । यहाँका ६६ प्रतिशत जनता आफ्नो जिविका धान्न कृषिमा निर्भर छन् र नेपालको कुल ग्राहृस्थ उत्पादनमा कृषिको ३३ प्रतिशत योगदान रहेको छ । तर नेपाल र नेपाली कृषिमुखि भएतापनि आजको दिनमा हरेक वर्ष नेपालले कृषिमा वार्षिक १ खर्ब ६० अर्ब २८ करोडको व्यापार घाटा बेहोरीरहेको अवस्था छ ।  आजको आवश्यकता नेपालको कृषि क्षत्रलाई व्यापारमुखि र नाफामुखि बनाउनु हो र यही लक्ष्य लिएर हाम्रा किशान स्थापना गरिएको हो ।
                            <br>
                            <br>
                            हाम्रा किशान कृषि क्षत्रमा क्रियाशिल एक निजी कम्पनी हो । हाम्रो उद्देष्य नेपालको कृषि क्षत्रमा अनुशन्धानमा आधारित नाफामुखि व्यवसायलाई प्रोत्शाहन दिइ नयाँ तथा पुराना कृषकहरुलाई व्यवसायिक तथा प्राविधिक सेवा प्रदान गर्नु हो ।
                            <br>
                            <br>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 img-bottom">
                <img src="{{URL::asset('frontend/img/about.png')}}" class="img-fluid" alt="">
            </div>

        </div>
    </div>

    <section class="vision">
        <div class="container">
            <div class="section-title">
                <h2>Vision</h2>
            </div>

            <div class="row">
                <div class="col">
                    आजको दिनमा पनि कृषकहरुले अभैm कृषिलाई नाफामुखि व्यवसाय भन्दा पनि जिविकोपार्जन गर्ने साधनको रुपमा लिएको पाइन्छ । कृषि क्षत्रमा देखिएका प्रमुख चुनौतिहरु अनुशन्धानको कमी, बजार व्यवस्थापनको कमी, र योजनागत कृषि व्यापार व्यवसायको कमी रहेका छन् ।
                    <br>
                    <br>
                    यही चुनौतिहरुलाई पार गर्दै हाम्रा किशान कृषकहरुलाई सफल कृषि व्यवसाय संचालन गर्न चाहिने सेवाहरु उपलब्ध गर्दछ ।  हामी कृषकहरुलाई व्यवसायिक तालिम, कृषिको प्राविधिक तालिम, प्राविधिक तथा व्यवसायिक परामर्श, लगानी जुटाउन सेवा र परामर्श, र बजार प्रति पहँुच पु¥याई सेवा प्रदान गर्दछौं । हामी हाम्रो सेवा द्वारा कृषि व्यवसायलाई नाफामुखि बनाइ नेपालका किशानहरुलाई सफलता र समृद्धि तफ अग्रसर गराउने प्रयासमा छौँ ।
                    <br>
                    <br>
                    देशको ६६ प्रतिशत जनसंख्या ओगट्ने कृषकहरुको प्रगतिमा नै देशका प्रगति छ । जब देशका कृषकहरुले जिविका धान्न नभई व्यवसाय संचालन गरी नाफा कमाउने मनुसायले कृषिमा लाग्छन् र नेपालको कृषिमा आयात भन्दा निर्यात बढि हुन्छ, तब मात्र देश समृद्धि तर्फ लाग्छ ।
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{URL::asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/popper.js')}}"></script>
    <script src="{{URL::asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/venobox.min.js')}}"></script>
    <script src="{{URL::asset('frontend/js/all.js')}}"></script>
    <script src="{{URL::asset('frontend/js/aos.js')}}"></script>
    <script src="{{URL::asset('frontend/js/main.js')}}"></script>
@endsection
