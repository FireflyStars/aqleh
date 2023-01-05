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
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul class="m-0">
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
                                @endif
                                <form action="{{ route('do-reset-password') }}" method="post">
									@csrf
                                    <div class="form-group mb-3">
                                        <label for="password">{{ __('message.new_password') }}</label>
                                        <input class="form-control" type="password" name="password" id="password" required="" placeholder="{{ __('message.enter_your_password') }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="confirm_password">{{ __('message.confirm_password') }}</label>
                                        <input class="form-control" type="password" name="password_confirmation" required="" id="confirm_password" placeholder="{{ __('message.enter_your_password') }}">
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> {{ __('message.reset_password') }} </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
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