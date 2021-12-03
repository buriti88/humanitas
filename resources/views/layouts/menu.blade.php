<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}} | @yield('title')</title>
    <link rel="icon" href="{{asset('img/logo.png')}}" type="image/png" sizes="16x16">
    @include('layouts.menu_css')
</head>

<body class="sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-3 sidebar-light-warning">
            <a href="{{ route('home') }}" class="brand-link logo-switch">
                <img src="{{ asset('img/logo.png')}}?{{rand(0, 1000)}}" alt="LogoSmall" class="brand-image-xl logo-xs">
                <img src="{{ asset('img/logo-Large.png')}}?{{rand(0, 1000)}}" alt="LogoLarge"
                    class="brand-image-xs logo-xl">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/user.png')}}?{{rand(0, 1000)}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <p class="mb-0">{{ Auth::user()->name }}</p>
                    </div>
                </div>
                <!-- /.Sidebar user panel -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    @lang('base_lang.home')
                                </p>
                            </a>
                        </li>

                        @if(App\User::isAdmin())
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    @lang('base_lang.admin')
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/roles') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('base_lang.roles')</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/users') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>@lang('base_lang.users')</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if(App\Http\Validations\Validation::validate('master'))
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-share-alt"></i>
                                <p>
                                    @lang('base_lang.masters')
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if(App\Http\Validations\Validation::permissionsUser('lists'))
                                <li class="nav-item">
                                    <a href="{{ route('lists.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            @lang('base_lang.lists')
                                        </p>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif

                        @if(App\Http\Validations\Validation::validate('employees'))
                        @if(App\Http\Validations\Validation::permissionsUser('employees'))
                        <li class="nav-item">
                            <a href="{{ route('employees.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    @lang('base_lang.employees')
                                </p>
                            </a>
                        </li>
                        @endif
                        @endif

                        @if(\Illuminate\Support\Facades\Auth::user()->id === 1)
                        <li class="nav-item">
                            <a href="{{ url('log-viewer/logs') }}" class="nav-link" target="_blank">
                                <i class="nav-icon fa fa-exclamation-triangle"></i>
                                <p>
                                    @lang('base_lang.log')
                                </p>
                            </a>
                        </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ url('logout') }}" class="nav-link">
                                <i class="nav-icon fa fa-sign-out-alt"></i>
                                <p>
                                    @lang('base_lang.logout')
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">

                            <h6 class="m-0 text-dark"><b>@yield('title_page')</b></h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                @yield('content_page')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer text-center">
            {{-- <img src="{{ asset('img/powered.png')}}?{{rand(0, 1000)}}" alt=""> --}}
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    @include('layouts.menu_js')
    @yield('javascript')
</body>

</html>