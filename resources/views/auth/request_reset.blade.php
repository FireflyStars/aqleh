<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>{{ __('message.reset_password') }}</title>
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
                                
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0 mb-3">{{ __('message.reset_password') }}</h4>
                                    <p class="text-muted mb-0 font-13">{{ __('message.reset_password_desc') }}</p>
								</div>
								
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul class="m-0">
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
                                @endif
                                @if(session()->get('success'))
                                    <div class="alert alert-success">
                                        <p class="m-0">{{ __('message.sucessfully_sent') }}</p>
                                    </div>
                                @endif                                
                                @if(session()->get('failed'))
                                    <div class="alert alert-danger">
                                        <p class="m-0">{{ __('message.reset_failed') }}</p>
                                    </div>
                                @endif                                
                                <form action="{{ route('send-request-reset-password') }}" method="post">
									@csrf
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">{{ __('message.email_address') }}</label>
                                        <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="{{ __('message.enter_your_email') }}">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> {{ __('message.send_request') }} </button>
                                    </div>

                                </form>        

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">{{ __('message.back_to') }} <a href="{{ route('show-login') }}" class="text-dark ml-1"><b>{{ __('message.login') }}</b></a></p>
                            </div> <!-- end col -->
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