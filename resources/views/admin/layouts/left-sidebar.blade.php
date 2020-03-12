<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ $active=='dashboard'?'active':'' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-search"></i>
                    <span>Vehicle</span>
                </a>
            </li>
            <li class="{{ $active=='inquiries'?'active':'' }}">
                <a href="{{ route('admin.quotes') }}"><i class="fa fa-print"></i> <span>Inquiries</span></a>
            </li>
            <li class="{{ $active=='setting'?'active':'' }}">
                <a href="{{ route('admin.setting.index') }}"><i class="fa fa-gears"></i> <span>Setting</span></a>
            </li>
            <li class="{{ $active=='display'?'active':'' }}">
                <a href="{{ route('admin.display.index') }}"><i class="fa fa-laptop"></i> <span>Display</span></a>
            </li>
            <li class="{{ $active=='deals'?'active':'' }}">
                <a href="{{ route('admin.product.deals') }}"><i class="fa fa-laptop"></i> <span>Deals For Home Page</span></a>
            </li>
            <li class="{{ $active=='password'?'active':'' }}">
                <a href="{{ route('admin.password') }}"><i class="fa fa-key"></i> <span>Change Password</span></a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
