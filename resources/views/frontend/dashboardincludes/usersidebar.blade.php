<nav id="db-sidebar">
    <div  class="sidebar-user d-flex align-items-center justify-content-center" href="dashboard.html">
        <div class="avatar">
            <div class="avatar-border">
            <img src="{{ Auth::user()->user_image !=null ? Auth::user()->user_image : URL::asset('frontend/img/user-db.png')}}" class="img-fluid" alt="" style="border-radius: 50%">
            </div>
            <div class="user-name">{{Auth::user()->name}}</div>
        </div>
    </div>
    <div class="side-nav">
        <div class="acc-in-mobile d-block d-sm-none">
            <ul class="collapse accordion" id="collapseAccount">
                <li><a href="">My account</a></li>
                <li><a href="">My shopping</a></li>
            </ul>
        </div>
        {{--  \Request::route()->getName()=='videogallery.index'  --}}
        <ul class="side-menu">
            <li class="{{\Request::route()->getName()=='userdashboard' ?'active' : ''}}"><a href="{{URL::to('userdashboard')}}"><i class="fas fa-tachometer-alt"></i>  {{__('dashboard.dashboard')}}</a></li>
            <li class="{{\Request::route()->getName()=='my-order' ?'active' : ''}}"><a href="{{URL::to('my-order')}}"><i class="fas fa-clipboard-list"></i> Orders</a></li>
{{--            <li><a href="{{URL::to('myreview')}}"><i class="fas fa-star-half-alt"></i> Reviews </a></li>--}}
{{--            <li><a href=""><i class="fas fa-certificate"></i> Trainings</a></li>--}}
            <li class="{{\Request::route()->getName()=='myaccount' ?'active' : ''}}"><a href="{{URL::to('myaccount')}}"><i class="fas fa-user-circle"></i> Account</a></li>
            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
