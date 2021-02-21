<header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Hamra</b>Kisan</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
               
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{URL::asset('backend/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" style="overflow:scroll">
                            <img src="{{URL::asset('backend/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                            @php
                                $user = Auth::user();
                            @endphp
                            <p >
                                Name : {{$user->name}}
                                <small>Role : {{$user->role}}</small>
                                <small>Email: {{$user->email}}</small>
                                <small>Phone: {{$user->phone}}</small>
                                <small>Member since {{Auth::user()->created_at->format('M,Y') }}</small>
                            </p>
                        </li>

                        <!-- Menu Body -->
                       
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <form action="{{URL::to('/logout')}}" method="POST" id="logout">
                                    {{csrf_field()}}
                                    <a href="#" class="btn btn-default btn-flat" onclick="document.getElementById('logout').submit()">Logout</a>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                {{--<li>--}}
                    {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->