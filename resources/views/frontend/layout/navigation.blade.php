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
            <li class="nav-item active">
                <a class="nav-link" href="{{URL::to('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('farm')}}">Farms</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('loanrequestform')}}">Request Loan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('about-us')}}">About us</a>
            </li>

            @if(Auth::check()==true)
                @if(Auth::user()->role=="farmer")
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::asset('farmerdashboard')}}">Dashboard</a>
                    </li>
                @elseif(Auth::user()->role=="user")
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::asset('userdashboard')}}">Dashboard</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::asset('dashboard')}}">Dashboard</a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{URL::to('login')}}">Login</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link cta" href="#">List a Farm</a>
            </li>
        </ul>
    </div>
</nav>
<!-- navigation end -->
