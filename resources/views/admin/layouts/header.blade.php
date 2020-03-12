<header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">0</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 0 messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            {{-- <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" --}}
                                            {{-- class="img-circle" alt="User Image"> --}}
                                        </div>
                                        <h4>
                                            {{-- Support Team --}}
                                            Nothing to show 
                                            {{-- <small><i class="fa fa-clock-o"></i> 5 mins</small> --}}
                                        </h4>
                                        {{-- <p>Why not buy a new awesome theme?</p> --}}
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}"
                        class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle"
                            alt="User Image">

                            <p>
                                {{ auth()->user()->name }}
                                <small>Member since {{ auth()->user()->created_at?
                                    auth()->user()->created_at->format('M. Y'):
                                ''}}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="{{ route('admin.display.index') }}">Display</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="{{ route('admin.password') }}">Password Reset</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('admin.setting.index') }}" class="btn btn-default btn-flat">Setting</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout_form').submit()"
                                class="btn btn-default btn-flat">Sign out</a>
                                <form action="{{ route('logout') }}" id="logout_form" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>
