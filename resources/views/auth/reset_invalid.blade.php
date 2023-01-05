<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>Invalid Token</title>
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

    <body class="authentication-bg">
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center mb-4">
                            <a href="{{ route('home') }}">
                                <span><img src="{{ asset('assets/img/aqleh-logo.png') }}" alt="aqleh" width="200" height="60"></span>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-body p-4">
                                @if($token_status == 1)
                                    <div class="alert alert-danger">
                                        <p class="m-0">Invalid token</p>
                                    </div>
                                @else
                                    <div class="alert alert-danger">
                                        <p class="m-0">Token Expired</p>
                                    </div>                                
                                @endif
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <!-- end row -->
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="{{ route('show-request-password-reset') }}" class="text-muted ml-1"><i class="fa fa-lock mr-1"></i>{{ __('message.forgot_your_password') }}</a></p>
                            </div> <!-- end col -->
                        </div>                        
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