<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>{{ __('message.page_not_found') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- App favicon -->
        <link rel="image/ico" rel="icon" href="{{ asset('assets/img/favicon.ico') }}">
        
        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/backend/app.min.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body class="topbar-dark">
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center mb-5">
                            <a href="{{ route('home') }}">
                                <span><img src="{{ asset('assets/img/aqleh-logo.png') }}" alt="aqleh" width="200" height="60"></span>
                            </a>
                        </div>
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center">
                                    <h1 class="text-error">404</h1>
                                    <h3 class="mt-3 mb-2">{{ __('message.page_not_found') }}</h3>
                                    <p class="text-muted mb-3">{{ __('message.page_not_found_desc') }}</p>

                                    <a href="{{ route('home') }}" class="btn btn-success waves-effect waves-light"><i class="fas fa-home mr-1"></i> {{ __('message.back_to_home') }}</a>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- Vendor js -->
        <script src="{{ asset('assets/js/backend/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/backend/app.min.js') }}"></script>
    </body>
</html>