@extends('frontend.layout')

@section('title', 'Contact us')
@section('meta')
    <meta content="keywords" name="Contact Us" />
    <meta content="description" name="Contact Us" />
@endsection

@section('css')

@endsection
@section('content')
{{-- Banner Start --}}
	<div class="clearfix"></div>
	<section class="page-banner" id="contact-us-banner" style="background:url({{ session()->get('banner_url') }}) center center/cover no-repeat local">
		<div class="container">
			<div class="title-box">
				<h1 class="text-capitalize">{{ __('message.news_events') }}</h1>
				<ol class="breadcrumb m-0 p-0 justify-content-center">
					<li><a href="{{ route('home') }}">{{ __('message.home') }}</a></li>
					<li>{{ __('message.contactus') }}</li>
				</ol>
			</div>
		</div>
	</section>
{{-- Banner End --}}
{{-- Contact Us --}}
<section class="contact-section-wrapper mt-5" id="contact-section" style="position:relative">
        <div class="contact-us-header p-3">
			<div class="container">
				<div class="col-md-12">
					<h2 class="h1 text-white text-uppercase text-center">{{ __('message.contactus') }}</h2>
				</div>
				<div class="col-md-12 mt-3">
					<h3 class="h3 text-white text-uppercase text-center">{{ __('message.aec') }}</h2>
				</div>
				<div class="row mt-3">
					<div class="col-md-4">
						<div class="contact-item d-flex align-items-center flex-wrap justify-content-center contact-address">
							<h3 class="text-white col-md-12 text-center m-0">
								<i class="font-24 pe-7s-map-marker text-white"></i> 
							</h3>
							<div class="col-md-12 text-white text-center" style="white-space: pre-line">
								{{ session()->get('setting')->address }}
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-item d-flex flex-wrap align-items-between justify-content-center contact-phone">
							<h3 class="text-white col-md-12 text-center m-0">
								<i class="pe-7s-call"></i> 
							</h3>
							<div class="col-md-12 text-white text-center">
								{{ session()->get('setting')->office_tel }} ({{ __('message.landline') }})
							</div>	
							<div class="col-md-12 text-white text-center">
								{{ session()->get('setting')->fax }} ({{ __('message.fax') }})
							</div>												
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-item d-flex flex-wrap align-items-between justify-content-center contact-site-url">
						<h3 class="text-white col-md-12 text-center m-0">
								<i class="pe-7s-mail-open-file"></i> 
							</h3>
							<div class="col-md-12 text-white text-center">
								{{ session()->get('setting')->email }}
							</div>											
						</div>
					</div>
				</div>
			</div>
		</div>    
	<div class="contact-section">
		<div class="map-wrapper active" data-style="1">
			<div class="overlay"></div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7221.0447327899665!2d55.2799255!3d25.1856007!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa1fe0cb6b83c6d0e!2sAQLEH+Engineering+Consultant!5e0!3m2!1sen!2s!4v1472108474953" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen=""></iframe>
		</div>
		<div class="container contact-block" data-style="0">
			<div class="row">
				<div class="col-md-12">
					<h2>{{ __('message.have_a_query') }}</h2>
				</div>
				<div class="col-md-6 contact-info">
					<p>{{ __('message.feel_free_call') }}</p>
					<ul>
						<li>
							<span class="icon">
								<i class="fas fa-home"></i>
							</span>
							{{ __('message.location_first') }} </br>
							{{ __('message.location_second') }}</br>
							{{ __('message.location_third') }}</br>
							{{ __('message.location_fourth') }}</br>
						</li>
						<li>
							<span class="icon">
								<i class="mdi mdi-phone-outgoing"></i>
							</span>
							+971 4 368 6364 ({{ __('message.landline') }})
						</li>
						<li>
							<span class="icon">
								<i class="mdi mdi-phone-outgoing"></i>
							</span>
							+971 4 368 6412 ({{ __('message.fax') }})
						</li>
						<li>
							<span class="icon">
								<i class="mdi mdi-email"></i>
							</span>
							AqlehCE@aqleh.com
						</li>
					</ul>
				</div>
				<div class="col-md-6 contact-form">
					<form class="form" id="contact-form" action="{{ route('send-request') }}">
						<div>
							<input type="text" name="name" required class="form-control" placeholder="{{ __('message.full_name') }}*">
							<span class="parsley-error invisible">{{ __('message.required_error') }}</span>
						</div>
						<div>
							<input type="email" name="email" required class="form-control" placeholder="{{ __('message.email') }}">
							<span class="parsley-error invisible">{{ __('message.invalid_error') }}</span>
						</div>
						<div class="custom-file">
							<input type="file" name="cv_file" required id="cv_file" class="form-control customfile" accept=".pdf,.doc, .docx, .rtf, .txt">
							<label class="customfile-label" for="cv_file"><i class="far fa-file-pdf"></i> <span>{{ __('message.upload_your_resume') }}</span></label>
							<span class="parsley-error invisible">{{ __('message.required_error') }}</span>
						</div>
						<div>
							<textarea class="form-control" rows="5" required name="message" placeholder="{{ __('message.write') }}"></textarea>
							<span class="parsley-error invisible">{{ __('message.required_error') }}</span>
						</div>
						<div class="submit-btn">
							<div class="btn-wrapper">
								<button type="button" id="submit" class="btn">
									<span class="spinner-grow-sm"></span>
									{{ __('message.submit') }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div> <!-- end row -->
		</div> <!-- end container -->
	</div>

	<div class="contact-switcher text-center">
		<ul>
			<li><button data-style="1" class="button active"><i class="fas fa-map-marked-alt"></i> Map</button></li>
			<li><button data-style="0" class="button"><i class="far fa-file-alt"></i> Form</button></li>
		</ul>
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
{{-- Contact Us --}}
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
	<script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
	<script src="{{ asset('assets/js/frontend/pages/contactus.init.js') }}"></script>
@endsection