@extends('frontend.layout')

@section('title', $project->meta_title)
@section('meta')
	<meta name="description" content="{{ $project->meta_desc }}">
	<meta name="keywords" content="{{ $project->meta_keys }}">
@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('assets/libs/owl-carousel/owl.carousel.min.css')}}" media="screen" />
	<link rel="stylesheet" href="{{ asset('assets/libs/owl-carousel/owl.theme.default.min.css')}}" media="screen" />
	<link rel="stylesheet" href="{{ asset('assets/libs/owl-carousel/owl.transitions.css')}}" media="screen" />
    <link href="{{ asset('assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
	
@endsection
@section('content')
{{-- Banner Start --}}
	<div class="clearfix"></div>
	<section class="page-banner" id="single-project-banner" style="background: url({{ session()->get('banner_url') }}) center center/cover no-repeat local">
		<div class="container">
			<div class="title-box">
				<h1 class="text-capitalize">{{ __('message.projects') }}</h1>
				<ol class="breadcrumb m-0 p-0 justify-content-center">
					<li><a href="{{ route('home') }}">{{ __('message.home') }}</a></li>
					<li><a href="{{ route('show-all-project') }}">{{ __('message.projects') }}</a></li>
					<li>{{ $project->name }}</li>
				</ol>
			</div>
		</div>
	</section>
{{-- Banner End --}}
{{-- Project Section Start --}}
	<section class="single-project-wrapper pt-5">
		<div class="container">
			<div class="single-project">
				<h2 class="text-center">{{ $project->name }}</h2>
				<div class="single-project-desc pt-3 pb-4 {{ app()->getLocale()=='ar' ? 'lang-ar': ''}}">
					{{ $project->desc }}
				</div>
				<div class="single-project-slider owl-carousel owl-theme owl-loaded owl-text-select-on pb-4">
					<div class="owl-stage-outer">
						<div class="owl-stage">
							@foreach ($project->images as $item)
								<div class="owl-item">
									<div class="project-pic">
										<img src="{{ $item->img_url }}" alt="{{ $project->img_alt }}">
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- contact module Start --}}
			@if(isset($manager))
				<div class="contact-module-card p-3">
					<div class="container-fulid">
						<div class="col-md-12 text-right">
							<a href="javasript:void(0)" class="close-btn"><i class="dripicons-cross text-white font-20"></i></a>
						</div>
						<div class="col-md-12 text-center mt-2 mb-2">
							<span class="text-uppercase font-18 text-white">{{ __('message.talk_to_aec') }}</span>
						</div>
						<div class="col-md-12 text-center">
							<img src="{{ $manager->img_url }}" alt="user" width="80" height="80" class="rounded-circle" srcset="">
						</div>
						<div class="col-md-12 text-center mt-2 mb-2">
							<h5 class="role m-0 text-white font-16">{{ $manager->title }}</h5>
						</div>
						<div class="col-md-12 text-center">
							<span class="text-white font-16">{{ $manager->role }}</span>
						</div>
						<div class="col-md-12 text-center mt-2 mb-2">
							<a href="javascript:void(0)" class="btn btn-success text-white font-weight-medium show-overlay-contact">
								{{ __('message.connect') }}
							</a>
						</div>
					</div>
				</div>
			@endif
		{{-- contact module End--}}
	</section>
{{-- Project Section End --}}
{{-- overlay-contact-form Start --}}
	@if(isset($manager))
		<section class="overlay-contact-panel">
			<div class="container">
				<div class="col-md-12 text-center">
					<div class="direct-contact col-md-5 ml-auto mr-auto mt-5 p-3">
						<div class="container-fluid">
							<div class="col-md-12 text-right">
								<a href="javascript:void(0)" class="close-btn"><i class="dripicons-cross text-white font-20"></i></a>
							</div>
							<div class="col-md-12">
								<h3 class="font-weight-medium text-white">{{ __('message.direct_contact_title') }}</h3>
							</div>	
							<div class="col-md-12 text-center">
								<img src="{{ $manager->img_url }}" alt="user" width="80" height="80" class="rounded-circle" srcset="">
							</div>
							<div class="col-md-12 text-center mt-2 mb-2">
								<h5 class="role m-0 text-white font-14">{{ $manager->title }}</h5>
							</div>
							<div class="col-md-12 text-center">
								<span class="text-white font-14">{{ $manager->role }}</span>
							</div>		
							<form class="form-horizontal mt-3" role="form" id="direct-contact-form" action="{{ route('send-direct-request') }}">
								<input type="hidden" name="email_to" value="{{ $manager->email }}">
								<div class="form-group row mb-3">
									<div class="col-md-12">
										<input type="text" name="fullname" parsley-trigger="change" required placeholder="{{ __('message.full_name') }} *" class="form-control" id="fullname">
									</div>
								</div>
								<div class="form-group row mb-3">
									<div class="col-md-12">
										<input type="email" name="email" parsley-trigger="change" required placeholder="{{ __('message.email') }} *" class="form-control" id="email">
									</div>
								</div>
								<div class="form-group row mb-3">
									<div class="col-md-6">
										<input type="text" name="company" parsley-trigger="change" placeholder="{{ __('message.company') }}" class="form-control" id="company">
									</div>
									<div class="col-md-6">
										<input type="text" name="phone" parsley-trigger="change" placeholder="{{ __('message.phone') }}" class="form-control" id="phone">
									</div>
								</div>
								<div class="form-group row mb-3">
									<div class="col-md-12">
										<textarea required class="form-control" rows="5" placeholder="{{ __('message.message') }} *"></textarea>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12 text-center">
										<button type="submit" id="submit" class="btn btn-success">
											<span class="spinner-grow-sm"></span>
											{{ __('message.send_message') }}
										</button>
									</div>
								</div>
							</form>			
						</div>
					</div>
				</div>
			</div>
		</section>
	@endif
{{-- overlay-contact-form End--}}
@endsection
@section('js')
	<script src="{{ asset('assets/libs/owl-carousel/owl.carousel.min.js') }}"></script>	
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>    
	<script src="{{ asset('assets/js/frontend/pages/project/singleproject.init.js') }}"></script>
@endsection