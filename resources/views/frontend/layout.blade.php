<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        {{-- Other setting --}}
		@yield('meta')
        <meta name="geo.region" content="AE">
        <meta name="geo.placename" content="Dubai">
        <meta name="geo.position" content="25.185763;55.281818">
        <meta name="ICBM" content="25.185763;55.281818">
        <link rel="image/ico" rel="icon" href="{{ asset('assets/img/favicon.ico') }}">
        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/frontend/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/frontend/style.css') }}" rel="stylesheet" type="text/css" />
        @yield('css')
    </head>
    <body class="{{ session()->get('setting')->cursor_effect == 1 ? 'cursor-effect' : '' }}">
        <div class="cursor"></div>
        <div class="preloader" id="preloader">
            <div>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="wrapper">
            <!--Navbar Start-->
            <nav class="navbar navbar-expand-lg fixed-top top-nav bg-white p-0 header-shadow" id="main-top-menu">
                <div class="container-fluid">
                    <!-- LOGO -->
                    <a class="logo text-capitalize font-weight-bold text-custom-blue text" href="{{ route('home') }}">
                        <img src="{{ session('setting')->logo_url }}" height="60" alt="aqleh logo" class="logo-light" height="18"/>
                        <span class="logo-title font-17">{{ session()->get('setting')->logo_title }}</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                        <ul class="navbar-nav navbar-center" id="main-menu-nav">
                            <li class="nav-item sticky-item mr-3">
                                <a href="{{ route('home') }}" class="nav-link text-capitalize pl-0 pr-0 text-custom-blue">
                                    {{ __('message.home') }}
                                </a>
                            </li>
                            <li class="nav-item sticky-item mr-3 has-sub-menu" data-menu-name="aboutus">
                                <a href="javascript:void(0)" class="nav-link text-capitalize pl-0 pr-0 text-custom-blue">
                                    {{ __('message.aboutus') }}
                                </a>
                            </li>
                            <li class="nav-item sticky-item mr-3 has-sub-menu" data-menu-name="services">
                                <a href="javascript:void(0)" class="nav-link text-capitalize pl-0 pr-0 text-custom-blue">
                                    {{ __('message.services') }}
                                </a>
                            </li>
                            <li class="nav-item sticky-item mr-3">
                                <a href="{{ route('show-all-client') }}" class="nav-link text-capitalize pl-0 pr-0 text-custom-blue">
                                    {{ __('message.clients') }}
                                </a>
                            </li>
                            <li class="nav-item sticky-item mr-3">
                                <a href="{{ route('show-all-project') }}" class="nav-link text-capitalize pl-0 pr-0 text-custom-blue">
                                    {{ __('message.projects') }}
                                </a>
                            </li>
                            <li class="nav-item sticky-item mr-3">
                                <a href="{{ route('show-all-news') }}" class="nav-link text-capitalize pl-0 pr-0 text-custom-blue">
                                    {{ __('message.news') }}
                                </a>
                            </li>
                            <li class="nav-item sticky-item mr-3">
                                <a href="{{ route('show-contact-us') }}" class="nav-link text-capitalize pl-0 pr-0 text-custom-blue">
                                    {{ __('message.contactus') }}
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-center" id="social-nav">
                            <li class="nav-item d-flex align-items-center mr-2">
                                <a href="{{ session()->get('setting')->twitter }}" class="nav-link"> <i class="mdi mdi-twitter font-18 font-weight-medium text-custom-blue"></i> </a>
                            </li>
                            <li class="nav-item d-flex align-items-center mr-2">
                                <a href="{{ session()->get('setting')->facebook }}" class="nav-link"> <i class="mdi mdi-facebook font-18 font-weight-medium text-custom-blue"></i> </a>
                            </li>
                            <li class="nav-item d-flex align-items-center mr-2">
                                <a href="google.com" class="nav-link"> <i class="mdi mdi-google-plus font-18 font-weight-medium text-custom-blue"></i> </a>
                            </li>
                            <li class="nav-item d-flex align-items-center mr-2">
                                <a href="{{ session()->get('setting')->linkedin }}" class="nav-link"> <i class="mdi mdi-linkedin font-18 font-weight-medium text-custom-blue"></i> </a>
                            </li>   
                            <li class="nav-item d-flex align-items-center mr-2">
                                <a href="{{ session()->get('setting')->instagram }}" class="nav-link"> <i class="mdi mdi-instagram font-18 font-weight-medium text-custom-blue"></i> </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-center" id="extra-nav">
                            <li class="nav-item d-flex align-items-center mr-2">
                                @if(app()->getLocale() == 'en')
                                    <a rel="no-follow" href="{{ route('setLocale', 'ar') }}" class="nav-link font-18 font-weight-medium text-custom-blue pr-0 pl-0"> 
                                        {{ __('message.arb') }}
                                    </a>
                                @else
                                    <a rel="no-follow" href="{{ route('setLocale', 'en') }}" class="nav-link font-18 font-weight-medium text-custom-blue pr-0 pl-0"> 
                                        {{ __('message.en') }}
                                    </a>                                
                                @endif
                            </li>
                            <li class="nav-item d-flex align-items-center mr-2">
                                <a href="{{ route('show-login') }}"  class="nav-link font-16 text-dark" id="login-button"><i class="fas fa-user"></i></a>
                            </li>
                            <li class="nav-item d-flex align-items-center mr-2">
                                <a href="javascript:void(0)"  class="nav-link font-16 text-dark" id="search-icon"> <i class="fas fa-search"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            {{--  Navbar End  --}}

            {{--  Overlay menu  start--}}
            <section class="overlay-home-menu-panel justify-content-center d-none align-items-center" id="overlay-home-menu-panel">
                <div class="back-button">
                    <i class="fa fa-arrow-left"></i>
                </div>
                <div class="aboutus-detail-panel sub-menu d-none">
                    {{-- <h2 class="selected-menu h1 text-center m-0 text-capitalize text-light h1">{{ __('message.aboutus') }}</h2> --}}
                    <ul class="home-center-menu justify-content-center p-0 m-auto">
                        <li class="nav-item">
                            <a href="{{ route('about-aec') }}" class="nav-link pl-0 pr-0 text-capitalize">{{ __('message.about_AEC') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('word-from-director') }}" class="nav-link pl-0 pr-0 text-capitalize">{{ __('message.Word_from_Director') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('our-values') }}" class="nav-link pl-0 pr-0 text-capitalize">{{ __('message.Our_Values') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('corporate-approach') }}" class="nav-link pl-0 pr-0 text-capitalize">{{ __('message.Corporate_Approach') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('meet-our-team') }}" class="nav-link pl-0 pr-0 text-capitalize">{{ __('message.Meet_Our_Team') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('company-profile') }}" class="nav-link pl-0 pr-0 text-capitalize">{{ __('message.company_profile') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('company-capability') }}" class="nav-link pl-0 pr-0 text-capitalize">{{ __('message.company_capability') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="services-detail-panel sub-menu d-none">
                    {{-- <h2 class="selected-menu h1 text-center m-0 text-capitalize text-light h1">{{ __('message.services') }}</h2> --}}
                    <ul class="home-center-menu justify-content-center p-0 m-auto">
                        @if(app()->getLocale()== 'en')
                            @foreach ( session()->get('services') as $item)
                                <li class="nav-item">
                                    <a href="{{ route('show-single-service', $item->page_url) }}" class="nav-link pl-0 pr-0 text-capitalize">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        @else
                            @foreach ( session()->get('services_ar') as $item)
                                <li class="nav-item">
                                    <a href="{{ route('show-single-service', $item->page_url) }}" class="nav-link pl-0 pr-0 text-capitalize">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </section>
            {{--  Overlay menu  End--}}            
            
            {{--  Content Part  --}}
            {{--  it depends on page  --}}
                @yield('content')
            {{--  Content End  --}}

            {{--  Footer start  --}}
            <footer class="footer">
                <div class="container-fluid border-bottom">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="footer-logo d-flex">
                                <a class="align-self-start" href="">
                                    <img src="{{ asset('/assets/img/light-logo.png') }}" width="200px" height="60" alt="" srcset="">
                                </a>
                                <p class="align-self-center">{{ __('message.footer_desc') }}</p>
                                <ul class="footer-social-links align-self-end">
                                    <li class="">
                                        <a href="{{ session()->get('setting')->twitter }}" class="d-flex align-items-center bg-light circled rounded-circle"> <i class="mdi mdi-twitter font-18 font-weight-medium"></i> </a>
                                    </li>
                                    <li class="">
                                        <a href="{{ session()->get('setting')->facebook }}" class="d-flex align-items-center bg-light circled rounded-circle"> <i class="mdi mdi-facebook font-18 font-weight-medium"></i> </a>
                                    </li>
                                    <li class="">
                                        <a href="google.com" class="d-flex align-items-center bg-light circled rounded-circle"> <i class="mdi mdi-google-plus font-18 font-weight-medium"></i> </a>
                                    </li>
                                    <li class="">
                                        <a href="{{ session()->get('setting')->linkedin }}" class="d-flex align-items-center bg-light circled rounded-circle"> <i class="mdi mdi-linkedin font-18 font-weight-medium"></i> </a>
                                    </li>   
                                    <li class="">
                                        <a href="{{ session()->get('setting')->instagram }}" class="d-flex align-items-center bg-light circled rounded-circle"> <i class="mdi mdi-instagram font-18 font-weight-medium"></i> </a>
                                    </li>                        
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4 col-lg-2 offset-lg-1 offset-sm-0">
                            <div class="footer-item">
                                <h4 class="footer-item-title text-white mt-0 mb-4">{{ __('message.useful_links') }}</h4>
                                <ul class="footer-item-link p-0 m-0">
                                    <li>
                                        <a class="text-white text-capitalize" href="{{ route('home') }}">
                                            <i class="fa fa-angle-double-right text-orange">
                                            </i>
                                            {{ __('message.home') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white text-capitalize has-sub-menu" data-menu-name="aboutus" href="javascript:void(0)">
                                            <i class="fa fa-angle-double-right text-orange">
                                            </i>
                                            {{ __('message.aboutus') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white text-capitalize has-sub-menu" data-menu-name="services" href="javascript:void(0)">
                                            <i class="fa fa-angle-double-right text-orange">
                                            </i>
                                            {{ __('message.services') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white text-capitalize" href="{{ route('show-all-project') }}">
                                            <i class="fa fa-angle-double-right text-orange">
                                            </i>
                                            {{ __('message.projects') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white text-capitalize" href="{{ route('show-all-client') }}">
                                            <i class="fa fa-angle-double-right text-orange">
                                            </i>
                                            {{ __('message.clients') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white text-capitalize" href="{{ route('show-contact-us') }}">
                                            <i class="fa fa-angle-double-right text-orange">
                                            </i>
                                            {{ __('message.contactus') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white text-capitalize" href="{{ route('show-all-news') }}">
                                            <i class="fa fa-angle-double-right text-orange">
                                            </i>
                                            {{ __('message.news') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="footer-item d-flex flex-wrap latest-projects">
                                <h4 class="footer-item-title text-white mt-0 mb-4 align-self-start">{{ __('message.latest_news') }}</h4>
                                @if(app()->getLocale()== 'en')
                                    @foreach (session()->get('latest_news') as $key => $item)
                                        <div class="d-flex align-self-{{ ($key == 0) ? 'start' : 'end'}} small-project {{ ($key == 0) ? 'border-bottom' : ''}}">
                                            <figure class="p-0 project-pic">
                                                <img src="{{ $item->featured_img_url }}" width="70" height="70" alt="{{ ($item->img_alt != '' ? $item->img_alt : $item->name) }}" srcset="">
                                                <a  href="{{ route('show-single-news', $item->page_url) }}"><i class="fa fa-link"></i></a>
                                            </figure>
                                            <div class="col-sm-9 ml-auto pr-0 project-info">
                                                <h5 class="m-0"><a href="{{ route('show-single-news', $item->page_url) }}" class="">{{ $item->name }}</a></h5>
                                                <p class="m-0"><i class="far fa-clock mr-1"></i>{{ $item->created_at->format('M d, Y') }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach (session()->get('latest_news_ar') as $key=> $item)
                                        <div class="d-flex align-self-{{ ($key == 0) ? 'start' : 'end'}} small-project  {{ ($key == 0) ? 'border-bottom' : ''}}">
                                            <figure class="p-0 project-pic">
                                                <img src="{{ $item->featured_img_url }}" width="70" height="70" alt="{{ ($item->img_alt != '' ? $item->img_alt : $item->name) }}" srcset="">
                                                <a href="{{ route('show-single-news', $item->page_url) }}"><i class="fa fa-link"></i></a>
                                            </figure>
                                            <div class="col-sm-9 ml-auto pr-0 project-info">
                                                <h5 class="m-0"><a href="{{ route('show-single-news', $item->page_url) }}" class="">{{ $item->name }}</a></h5>
                                                <p class="m-0"><i class="far fa-clock mr-1"></i>{{ $item->created_at->format('M d, Y') }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="footer-item d-flex flex-wrap">
                                <h4 class="footer-item-title text-white m-0">{{ __('message.opening_hours') }}</h4>
                                <div class="d-flex align-items-center mt-4 align-self-center text-white open-time">
                                    <i class="fa pe-7s-alarm mr-2 text-orange"></i> {{ __('message.from_to') }}
                                </div>

                                <ul class="contact-us-area align-self-end mb-0">
                                    <li class="d-flex align-items-start mt-2">
                                        <i class="pe-7s-map-marker"></i> 
                                        <span class="text-white">
                                            {{ session()->get('setting')->address }}
                                        </span>
                                    </li>
                                    <li class="d-flex align-items-start mt-2">
                                        <i class="pe-7s-call"></i> 
                                        <span class="text-white">
                                            {{ session()->get('setting')->office_tel }} ({{ __('message.landline') }})
                                        </span>
                                    </li>
                                    <li class="d-flex align-items-start mt-2">
                                        <i class="pe-7s-call"></i> 
                                        <span class="text-white">
                                        {{ session()->get('setting')->fax }} ({{ __('message.fax') }})
                                        </span>
                                    </li>
                                    <li class="d-flex align-items-start mt-2">
                                        <i class="pe-7s-mail-open-file"></i> 
                                        <a class="text-white">
                                            {{ session()->get('setting')->email }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="container-fluid pt-2 pb-2 copyright">
                    <div class="row">
                        <div class="col-lg-4 d-flex align-items-center">
                            <p class="text-white m-0 font-14 col-md-12 p-0">&copy;{{ __('message.copyright') }} </p>
                        </div>                        
                        <div class="col-lg-8 d-flex align-items-center p-0">
                            <ul class="d-flex flex-wrap justify-content-between m-0 col-md-12 ">
                                <li class="">
                                    <a href="{{ route('privacy-policy') }}" class="text-decoration p-0 text-light text-capitalize font-14">{{ __('message.privacy_policy') }}</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('temrs-condition') }}" class=" p-0 text-light text-capitalize font-14">{{ __('message.terms_condition') }}</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('cookie-policy') }}" class=" p-0 text-light text-capitalize font-14">{{ __('message.cookie_policy') }}</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('accessbility-statement') }}" class=" p-0 text-light text-capitalize font-14">{{ __('message.accessbility_statement') }}</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('sitemap') }}" class=" p-0 text-light text-capitalize font-14">{{ __('message.sitemap') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            {{--  Footer end  --}}
            {{--  Back to top --}}
            <a href="#" class="back-to-top" id="back-to-top"> <i class="mdi mdi-chevron-up"> </i></a>
        </div>
        <section class="search-panel d-none" id="search-panel">
            <form action="{{ route('show-search') }}">
                <input type="text" name="search_str" autofocus autocomplete="off" placeholder="{{ __('message.search_placeholder') }}" id="query">
            </form>
        </section>    
        <!-- javascript -->
        <script src="{{ asset('assets/js/frontend/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/scrollspy.min.js') }}"></script>
        <!-- Magnific Popup -->
        <script src="{{ asset('assets/js/frontend/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/frontend/app.js') }}"></script>
        @yield('js')
    </body>
</html>
