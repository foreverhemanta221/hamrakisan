<!-- navigation start -->
<nav id="top" class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{URL::to('/')}}">
        <div class="logo"><img src="{{URL::asset('frontend/img/logo.png')}}" class="img-fluid" alt=""></div>
        <div class="brand-name">Hamrakisan</div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="lang_selector">
                @if(App::getLocale()=="en")
                    <a class="" href="{{URL::to('_language/np')}}">
                        <img src="{{URL::asset('frontend/img/icons/nep.png')}}" alt="nepali">
                    </a>
                @else
                    <a class="" href="{{URL::to('_language/en')}}">
                        <img src="{{URL::asset('frontend/img/icons/eng.png')}}" alt="">
                    </a>
                @endif
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{URL::to('/')}}">{{__('header.home')}} <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('farm')}}">{{__('header.farms')}}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('loanrequestform')}}">{{__('header.request_loan')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('about-us')}}">{{__('header.about')}}</a>
            </li>
            

            @if(Auth::check()==true)
                @if(Auth::user()->role=="farmer")
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::asset('farmerdashboard')}}">{{__('header.dashboard')}}</a>
                    </li>
                @elseif(Auth::user()->role=="user")
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::asset('userdashboard')}}">{{__('header.dashboard')}}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::asset('dashboard')}}">{{__('header.dashboard')}}
                        </a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('login')}}">{{__('header.login')}}</a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link cta" href="#">{{__('header.list_a_farm')}}</a>
            </li>
        </ul>
    </div>
</nav>
<!-- navigation end -->
