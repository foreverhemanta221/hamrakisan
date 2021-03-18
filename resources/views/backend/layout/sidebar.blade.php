<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{URL::asset('backend/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">FARMER</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i> All category</a></li>
                    <li><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i> Add Category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap"></i>
                    <span>Listing</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                     </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('listing.index')}}"><i class="fa fa-circle-o"></i> All Listing</a></li>
                    <li><a href="{{route('listing.create')}}"><i class="fa fa-circle-o"></i> Add Listing</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Report</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('report/farm')}}"><i class="fa fa-circle-o"></i> Farm Report </a></li>

                </ul>
            </li>
            <li class="header">Orders</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap"></i>
                    <span>Orders</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('orders.index')}}"><i class="fa fa-circle-o"></i> All Orders</a></li>


                </ul>
            </li>
            <li class="header">PRODUCTS</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap"></i>
                    <span>Vendors</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('vendor.index')}}"><i class="fa fa-circle-o"></i> All Vendor</a></li>
                    <li><a href="{{route('vendor.create')}}"><i class="fa fa-circle-o"></i> Add new Vendor</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap"></i>
                    <span>Product category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('productcategory.index')}}"><i class="fa fa-circle-o"></i> All Category</a></li>
                    <li><a href="{{route('productcategory.create')}}"><i class="fa fa-circle-o"></i> Add Category</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-sitemap"></i>
                    <span>Product</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('products.index')}}"><i class="fa fa-circle-o"></i> All Products</a></li>
                    <li><a href="{{route('products.create')}}"><i class="fa fa-circle-o"></i> Add Products</a></li>

                </ul>
            </li>
            <li class="header">CMS</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Banner</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('banner.index')}}"><i class="fa fa-circle-o"></i> All Banner</a></li>
                    <li><a href="{{route('banner.create')}}"><i class="fa fa-circle-o"></i> Add Banner</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Success Story</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('farmstory.index')}}"><i class="fa fa-circle-o"></i> View Success Story</a></li>
                    <li><a href="{{route('farmstory.create')}}"><i class="fa fa-circle-o"></i> Add Success Story</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Forms</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('farmlistrequest.index')}}"><i class="fa fa-circle-o"></i> FarmListingRequest</a></li>
                    <li><a href="{{route('loanrequest.index')}}"><i class="fa fa-circle-o"></i> Loan Request</a></li>
                </ul>
            </li>
            <li class="header">TRAINING</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Instructor</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('trainings-instructor.index')}}"><i class="fa fa-circle-o"></i> All Instructor</a></li>
                    <li><a href="{{route('trainings-instructor.create')}}"><i class="fa fa-circle-o"></i> Add Instructor</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Trainings</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('trainings.index')}}"><i class="fa fa-circle-o"></i> All Trainings</a></li>
                    <li><a href="{{route('trainings.create')}}"><i class="fa fa-circle-o"></i> Add Trainings</a></li>
                </ul>
            </li>

            <li class="header">SETING</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>User</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('users')}}"><i class="fa fa-circle-o"></i> All User</a></li>
                    <li><a href="{{URL::to('users/create')}}"><i class="fa fa-circle-o"></i> Add New User</a></li>
                </ul>
            </li>
            <li class=" treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> <span>Settings</span>
                    <span class="pull-right-container">

            </span>
                </a>
            </li>





        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
