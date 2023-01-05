<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		@yield('meta')
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <link rel="image/ico" rel="icon" href="{{ asset('assets/img/favicon.ico') }}">
        
        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/backend/app.min.css') }}" rel="stylesheet" type="text/css" />
		@yield('css')
    </head>

    <body class="topbar-dark">
        <div id="preloader"> <div id="status"> <div class="spinner">Loading...</div> </div> </div>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    {{-- <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="pro-user-name ml-1">
                                {{ app()->getLocale() == 'en' ? __('admin.eng') : __('admin.arb') }} <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <a href="{{ route('setLocale', 'en') }}" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>{{ __('admin.eng') }}</span>
                            </a>
                            <!-- item-->
                            <a href="{{ route('setLocale', 'ar') }}" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>{{ __('admin.arb') }}</span>
                            </a>
                        </div>
                    </li> --}}
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ session()->get('user')->img_url }}" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                {{ __('admin.admin') }} <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">{{ __('admin.welcome') }} !</h6>
                            </div>

                            <!-- item-->
                            <a href="{{ route('show-setting-page') }}" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>{{ __('admin.settings') }}</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>{{ __('admin.logout') }}</span>
                            </a>

                        </div>
                    </li>
                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="{{ route('dashboard') }}" class="logo text-center">
                        <span class="logo-lg">
                            <span class="logo-lg-text-dark">Aqleh</span>
                        </span>
                        <span class="logo-sm">
                            <span class="logo-sm-text-dark">Aqleh</span>
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile disable-btn waves-effect">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <h4 class="page-title-main">@yield('page-title')</h4>
                    </li>
        
                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="{{ session()->get('user')->img_url }}" alt="admin img" title="Mina M" class="rounded-circle img-thumbnail avatar-lg">
                        <a class="text-dark h5 mt-2 mb-1 d-block">{{ __('admin.admin') }}</a>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('show-setting-page') }}" class="text-muted">
                                    <i class="mdi mdi-settings"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="{{ route('logout') }}" class="text-custom">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">{{ __('admin.navigation') }}</li>

                            <li>
                                <a href="{{ route('dashboard') }}">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> {{ __('admin.dashboard') }} </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-image"></i>
                                    <span> Page Banners </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('add-banner') }}"><i class="mdi mdi-shape-circle-plus"></i>  Add Banner</a></li>
                                    <li><a href="{{ route('show-banner') }}"><i class="mdi mdi-view-list"></i>  View Banners</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-suitcase"></i>
                                    <span> {{ __('admin.projects') }} </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('add-project') }}"><i class="mdi mdi-shape-circle-plus"></i>  {{ __('admin.add_project') }}</a></li>
                                    <li><a href="{{ route('show-project') }}"><i class="mdi mdi-view-list"></i>  {{ __('admin.view_projects') }}</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-user"></i>
                                    <span> Contact Notification </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('add-contact-notification') }}"><i class="mdi mdi-shape-circle-plus"></i>  Add New</a></li>
                                    <li><a href="{{ route('show-contact-notification') }}"><i class="mdi mdi-view-list"></i>  View all</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-suitcase"></i>
                                    <span> {{ __('admin.services') }} </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('add-service') }}"><i class="mdi mdi-shape-circle-plus"></i> {{ __('admin.add_service') }}</a></li>
                                    <li><a href="{{ route('show-service') }}"><i class="mdi mdi-view-list"></i> {{ __('admin.view_services') }}</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-newspaper"></i>
                                    <span> {{ __('admin.news') }} </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('add-news') }}"><i class="mdi mdi-shape-circle-plus"></i> {{ __('admin.add_news') }}</a></li>
                                    <li><a href="{{ route('show-news') }}"><i class="mdi mdi-view-list"></i> {{ __('admin.view_news') }}</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-account-group"></i>
                                    <span> {{ __('admin.leader') }} </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('add-leader') }}"><i class="mdi mdi-shape-circle-plus"></i> {{ __('admin.add_leader') }}</a></li>
                                    <li><a href="{{ route('show-leader') }}"><i class="mdi mdi-view-list"></i> {{ __('admin.view_leader') }}</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-user-tie"></i>
                                    <span> {{ __('admin.client') }} </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('add-client') }}"><i class="mdi mdi-shape-circle-plus"></i> {{ __('admin.add_client') }}</a></li>
                                    <li><a href="{{ route('show-client') }}"><i class="mdi mdi-view-list"></i> {{ __('admin.view_client') }}</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-user-tie"></i>
                                    <span>Slide</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('add-slide') }}"><i class="mdi mdi-shape-circle-plus"></i>Add Slide</a></li>
                                    <li><a href="{{ route('show-slide') }}"><i class="mdi mdi-view-list"></i>View Slide</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fa fa-book"></i>
                                    <span> {{ __('admin.static_pages') }} </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{ route('edit-about-aec') }}">about AEC</a></li>
                                    <li><a href="{{ route('edit-word-from-director') }}">Word from Director</a></li>
                                    <li><a href="{{ route('edit-our-values') }}">Our Values</a></li>
                                    <li><a href="{{ route('edit-corporate-approach') }}">Corporate Approach</a></li>
                                    <li><a href="{{ route('edit-meet-our-team') }}">Meet Our Team</a></li>
                                    <li class=""><a href="{{ route('edit-company-profile') }}">Company Profile</a></li>
                                    <li class=""><a href="{{ route('edit-company-capability') }}">Company Capability</a></li>
                                    <hr>
                                    <li class=""><a href="{{ route('edit-privacy-policy') }}">Privacy Policy</a></li>
                                    <li class=""><a href="{{ route('edit-accessbility-statement') }}">Accessbility Statement</a></li>
                                    <li class=""><a href="{{ route('edit-terms-condition') }}">Terms Condition</a></li>
                                    <li class=""><a href="{{ route('edit-cookie-policy') }}">Cookie Policy</a></li>
                                    <li class=""><a href="{{ route('edit-sitemap') }}">Sitemap</a></li>
                                </ul>
                            </li>
                
                            <li>
                                <a href="{{ route('show-contact') }}">
                                    <i class="far fa-address-card"></i>
                                    <span>Manage Contact</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('show-history')}}">
                                    <i class="ti-cup"></i>
                                    <span> History </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('show-setting-page') }}">
                                    <i class="mdi mdi-cogs"></i>
                                    <span>Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('show-translation') }}">
                                    <i class="mdi mdi-google-translate"></i>
                                    <span>translation</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">    
                        @yield('content')
                    </div> <!-- container -->

                </div> <!-- content -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/backend/vendor.min.js') }}"></script>

        <!-- knob plugin -->
        <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>

        <!-- Dashboard init js-->
        <script src="{{ asset('assets/js/backend/pages/dashboard.init.js') }}"></script>

        @yield('js')
        <!-- App js -->
        <script src="{{ asset('assets/js/backend/app.min.js') }}"></script>
    </body>
</html>