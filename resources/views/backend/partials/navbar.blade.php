<nav class="main-header navbar navbar-expand navbar-dark navbar-purple">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">User ID: {{ Auth::user()->name ?? '' }}</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="{{ route('auth.logout') }}" class="nav-link" role="button"><i class="fas fa-sign-out-alt"> Sign
                    Out</i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/backend/img/new_logo_PM.jpg') }}" alt="Logo"
            class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"> <b>A</b>dmin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('candidate_list') }}" class="nav-link {{ request()->routeIs('candidate_list') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Pending Member List
                        </p>
                    </a>
                </li>

                @can('applicant-manage')

                    <li class="nav-item">
                        <a href="{{route('candidate.profile')}}" class="nav-link {{ request()->routeIs('candidate.profile') ? 'active' : '' }}">
                            <i class="nav-icon far fa-user"></i>
                            <p class="text">My Profile</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview {{ request()->routeIs('c.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('plots.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>
                                Transcript <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href=""
                                   class="nav-link {{ request()->routeIs('plots.index') ? 'active' : '' }}">
                                    <i class="fas fa-university nav-icon"></i>
                                    <p>Link 1</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endcan

                @can('user-manage')
                    <li class="nav-item has-treeview {{ request()->routeIs('auth.*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('auth.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-wrench text-danger"></i>
                            <p>
                                Settings <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('auth.roles.index') }}"
                                   class="nav-link {{ request()->routeIs('auth.roles.*') ? 'active' : '' }}">
                                    <i class="fas fa-user-tag nav-icon"></i>
                                    <p>Roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('auth.permissions.index') }}"
                                   class="nav-link {{ request()->routeIs('auth.permissions.*') ? 'active' : '' }}">
                                    <i class="fab fa-accessible-icon nav-icon"></i>
                                    <p>Permissions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('auth.rp.index') }}"
                                   class="nav-link {{ request()->routeIs('auth.rp.*') ? 'active' : '' }}">
                                    <i class="fas fa-user-tag nav-icon"></i>
                                    <p>Role-Permissions</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('auth.users.index') }}"
                                   class="nav-link {{ request()->routeIs('auth.users.*') ? 'active' : '' }}">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Change Password</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('auth.logout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p class="text">Sign out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
