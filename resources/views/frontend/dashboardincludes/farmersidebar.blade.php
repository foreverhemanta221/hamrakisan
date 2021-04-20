<nav id="db-sidebar">

    <div  class="sidebar-user d-flex align-items-center justify-content-center" href="dashboard.html">
        <div class="avatar">
            <div class="avatar-border">
                <img src="{{ Auth::user()->user_image !=null ? Auth::user()->user_image : URL::asset('frontend/img/farmer.png')}}" class="img-fluid" alt="">
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
        <ul class="side-menu">
            <li class="{{\Request::route()->getName()=='farmerdashboard' ?'active' : ''}}"><a href="{{URL::to('farmerdashboard')}}"><i class="fas fa-tachometer-alt"></i> {{__('dashboard.dashboard')}}</a></li>

             <li class="{{\Request::route()->getName()=='farmorder' ?'active' : ''}}"><a href="{{URL::to('farmorder')}}"><i class="fas fa-clipboard-list"></i> {{__('dashboard.orders')}}</a></li>
             <li class="{{\Request::route()->getName()=='my-order' ?'active' : ''}}"><a href="{{URL::to('my-order')}}"><i class="fas fa-clipboard-list"></i>{{__('dashboard.my_orders')}}</a></li>
            <li class="{{\Request::route()->getName()=='myproduct' ?'active' : ''}}"><a href="{{URL::to('myproduct')}}"><i class="fas fa-carrot"></i> {{__('dashboard.products')}}</a></li>
            <li class="{{\Request::route()->getName()=='myfarm' ?'active' : ''}}"><a href="{{URL::to('myfarm')}}"> <i class="fas fa-tractor"></i> {{__('dashboard.farm')}}</a></li>
            {{--  <li><a href="{{URL::to('farmreview')}}"><i class="fas fa-star-half-alt"></i> Reviews </a></li>  --}}
            {{--  <li><a href=""><i class="fas fa-certificate"></i> Trainings</a></li>  --}}
            <li class="{{\Request::route()->getName()=='myaccount' ?'active' : ''}}" ><a href="{{URL::asset('myaccount')}}"><i class="fas fa-user-circle"></i> {{__('dashboard.account')}}</a></li>
            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit"><i class="fas fa-sign-out-alt"></i> {{__('dashboard.logout')}}</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
