@extends('frontend.layout')
@section('title', 'AQLEH Engineering Consultants in Dubai 2020')
@section('meta')
	<meta name="description" content="AEC is a local firm of consulting engineers based in Dubai, and is offering a variety of Consulting Engineering Services, specializing in the design and construction management of Transportation and Infrastructure projects.">
	<meta name="keywords" content="Engineering Consultants -AQLEH">
	<link rel="canonical" href="{{ url()->current() }}">
	<meta name="robots" content="index,follow">
	{{-- Facebook --}}
	<meta property="og:type" content="website" /> 
	<meta property="og:title" content="AQLEH Engineering Consultants in Dubai">
	<meta property="og:description" content="AEC is a local firm of consulting engineers based in Dubai, and is offering a variety of Consulting Engineering Services, specializing in the design and construction management of Transportation and Infrastructure projects." />
	<meta property="og:url" content="{{ url()->current() }}" />
	<meta property="og:site_name" content="AQLEH Engineering Consultants in Dubai" />
	{{-- tweeter --}}
	<meta name="twitter:title" content="AQLEH Engineering Consultants in Dubai">
	<meta name="twitter:description" content="AEC is a local firm of consulting engineers based in Dubai, and is offering a variety of Consulting Engineering Services, specializing in the design and construction management of Transportation and Infrastructure projects.">

@endsection

@section('css')
	<link rel="stylesheet" href="{{ asset('assets/libs/rs-plugin/css/settings.css')}}" media="screen" />
	<link rel="stylesheet" href="{{ asset('assets/libs/owl-carousel/owl.carousel.min.css')}}" media="screen" />
	<link rel="stylesheet" href="{{ asset('assets/libs/owl-carousel/owl.theme.default.min.css')}}" media="screen" />
	<link rel="stylesheet" href="{{ asset('assets/libs/owl-carousel/owl.transitions.css')}}" media="screen" />
    <link href="{{ asset('assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
{{--  home start  --}}
	<section  class="bg-home bg-gradient" id="home">
	    <div class="fullwidthbanner-container">
			<div class="fullwidthbanner">
				<ul>
					@foreach ($slides as $slide)
						<li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300" data-title="">
							<img src="{{ $slide->img_url }}" data-fullwidthcentering="on" alt="slide">
							<div class="tp-caption first-line customin customout start" 
								data-x="0"
								data-y="60"
								data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="1000" 
								data-start="200" 
								data-end="9000"
								data-endspeed="500"									
								data-easing="Power4.easeInOut"
								data-splitin="chars"
								data-splitout="chars"
								data-elementdelay="0.08"
								data-endelementdelay="0.08"
							>
								{{ __('message.engineering_technology_excellence') }}
							</div>
						</li>
						
					@endforeach
				</ul>
			</div>
			<ul class="nav pls-nav p-0 mb-2 justify-content-center fixed-pos" id="ps4-nav">
				<li class="pls-nav-item ml-2 mr-2">
					<a href="{{ route('home') }}" class="nav-link p-0">
						<div class="d-flex text-center box-item">
							<div class="menu-icon h1 m-0 col-md-12 d-flex align-items-end justify-content-center">
								<i class="pe-7s-home text-light"></i>
							</div>
							<div class="m-0 col-md-12">
								<h5 class="text-capitalize h3 text-light"><span>{{ __('message.home') }}</span></h5>
							</div>
						</div>
					</a>
				</li>
				<li class="pls-nav-item has-sub-menu ml-2 mr-2" data-menu-name="aboutus">
					<a href="javascript:void(0)" class="nav-link p-0">
						<div class="d-flex text-center box-item">
							<div class="menu-icon h1 m-0 col-md-12 d-flex align-items-end justify-content-center">
								<i class="pe-7s-users text-light"></i>
							</div>
							<div class="m-0 col-md-12">
								<h5 class="text-capitalize h3 text-light"><span>{{ __('message.aboutus') }}</span></h5>
							</div>
						</div>
					</a>
				</li>
				<li class="pls-nav-item has-sub-menu ml-2 mr-2" data-menu-name="services">
					<a href="javascript:void(0)" class="nav-link p-0">
						<div class="d-flex text-center box-item">
							<div class="menu-icon h1 m-0 col-md-12 d-flex align-items-end justify-content-center">
								<i class="pe-7s-headphones text-light"></i>
							</div>
							<div class="m-0 col-md-12">
								<h5 class="text-capitalize h3 text-light"><span>{{ __('message.services') }}</span></h5>
							</div>
						</div>
					</a>
				</li>
				<li class="pls-nav-item ml-2 mr-2">
					<a href="{{ route('show-all-client') }}" class="nav-link p-0">
						<div class="d-flex text-center box-item">
							<div class="menu-icon h1 m-0 col-md-12 d-flex align-items-end justify-content-center">
								<i class="pe-7s-smile text-light"></i>
							</div>
							<div class="m-0 col-md-12">
								<h5 class="text-capitalize h3 text-light"><span>{{ __('message.clients') }}</span></h5>
							</div>
						</div>
					</a>
				</li>
				<li class="pls-nav-item ml-2 mr-2">
					<a href="{{ route('show-all-project') }}" class="nav-link p-0">
						<div class="d-flex text-center box-item">
							<div class="menu-icon h1 m-0 col-md-12 d-flex align-items-end justify-content-center">
								<i class="pe-7s-display2 text-light"></i>
							</div>
							<div class="m-0 col-md-12">
								<h5 class="text-capitalize h3 text-light"><span>{{ __('message.projects') }}</span></h5>
							</div>
						</div>
					</a>
				</li>
				<li class="pls-nav-item ml-2 mr-2">
					<a href="{{ route('show-all-news') }}" class="nav-link p-0">
						<div class="d-flex text-center box-item">
							<div class="menu-icon h1 m-0 col-md-12 d-flex align-items-end justify-content-center">
								<i class="pe-7s-medal text-light"></i>
							</div>
							<div class="m-0 col-md-12">
								<h5 class="text-capitalize h3 text-light"><span>{{ __('message.news') }}</span></h5>
							</div>
						</div>
					</a>
				</li>
				<li class="pls-nav-item ml-2 mr-2">
					<a href="{{ route('show-contact-us') }}" class="nav-link p-0">
						<div class="d-flex text-center box-item">
							<div class="menu-icon h1 m-0 col-md-12 d-flex align-items-end justify-content-center">
								<i class="pe-7s-mail-open text-light"></i>
							</div>
							<div class="m-0 col-md-12">
								<h5 class="text-capitalize h3 text-light"><span>{{ __('message.contactus') }}</span></h5>
							</div>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</section>
{{--  home end  --}}	

{{-- aboutus section start --}}
	<section class="aboutus pt-5 section" id="aboutus">
		<div class="container">
			<h2 class="section-title text-capitalize text-center">
				{{ __('message.aboutus') }}
			</h2>
			<div class="row p-3">
				<div class="col-md-8">
					<div class="tabcontent" id="about-aec">
						<p class="pt-3 description lead text-justify">
							{{ $about_aec }}
						</p>	
						<a href="{{ route('about-aec') }}" class="text-orange text-capitalize float-right">{{ __('message.read_more') }}</a>
					</div>
					<div class="tabcontent d-none" id="word-from-director">
						<p class="pt-3 description lead text-justify">
							{{ $word_from_director }}
						</p>	
						<a href="{{ route('word-from-director') }}" class="text-orange text-capitalize float-right">{{ __('message.read_more') }}</a>						
					</div>
					<div class="tabcontent d-none" id="our-values">
						<p class="pt-3 description lead text-justify">
							{{ $our_value }}
						</p>	
						<a href="{{ route('our-values') }}" class="text-orange text-capitalize float-right">{{ __('message.read_more') }}</a>						
					</div>
					<div class="tabcontent d-none" id="corporate-apporach">
						<p class="pt-3 description lead text-justify">
							{{ $corporate_approach }}
						</p>	
						<a href="{{ route('corporate-approach') }}" class="text-orange text-capitalize float-right">{{ __('message.read_more') }}</a>
					</div>
					<div class="tabcontent d-none" id="meet-our-team">
						<p class="pt-3 description lead text-justify">
							{{ $meet_our_team }}
						</p>						
					</div>
					<div class="tabcontent d-none" id="company-profile">
						<p class="pt-3 description lead text-justify">
							{{ $company_profile }}
						</p>
						<div class="col-10 m-auto pt-5 text-center">
							<button class="btn bg-custom-color text-light">
								{{ __('message.company_profile_pdf') }}
							</button>
						</div>
					</div>
					<div class="tabcontent d-none" id="company-capability">
						<p class="pt-3 description lead text-justify">
							{{ $company_capability }}
						</p>
					</div>
				</div>
				<div class="col-md-4 d-flex align-items-center">
					<ul class="navbar-nav d-block custom-nav pt-0 pb-4 m-auto">
						<li class="nav-item active big-divider tablink" data-tabcontent="about-aec">
							<a href="javascript:void(0)" class="nav-link text-capitalize font-24 pb-0">
								{{ __('message.about_AEC') }}
							</a>
						</li>
						<li class="nav-item big-divider mt-1 tablink" data-tabcontent="word-from-director">
							<a href="javascript:void(0)" class="nav-link text-capitalize font-24 pb-0"
							id="pills-word-from-director" data-toggle="pill" href="#pills-word-from-director" role="tab" aria-controls="pills-word-from-director" aria-selected="false">
								{{ __('message.Word_from_Director') }}
							</a>
						</li>
						<li class="nav-item big-divider mt-1 tablink" data-tabcontent="our-values">
							<a href="javascript:void(0)" class="nav-link text-capitalize font-24 pb-0">
								{{ __('message.Our_Values') }}
							</a>
						</li>
						<li class="nav-item big-divider mt-1 tablink" data-tabcontent="corporate-apporach">
							<a href="javascript:void(0)" class="nav-link text-capitalize font-24 pb-0">
								{{ __('message.Corporate_Approach') }}
							</a>
						</li>
						<li class="nav-item big-divider mt-1 tablink" data-tabcontent="meet-our-team">
							<a href="javascript:void(0)" class="nav-link text-capitalize font-24 pb-0">
								{{ __('message.Meet_Our_Team') }}
							</a>
						</li>
						<li class="nav-item big-divider mt-1 tablink" data-tabcontent="company-profile">
							<a href="javascript:void(0)" class="nav-link text-capitalize font-24">
								{{ __('message.company_profile') }}
							</a>
						</li>
						<li class="nav-item big-divider mt-1 tablink" data-tabcontent="company-capability">
							<a href="javascript:void(0)" class="nav-link text-capitalize font-24">
								{{ __('message.company_capability') }}
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</section>
{{-- aboutus section end --}}
	<div class="container big-divider mb-3">
	</div>
{{-- services section start --}}
	<section class="pt-3">
		<div class="container">
			<h2 class="section-title text-capitalize text-center mb-3">
				{{ __('message.services') }}
			</h2>
			<p class="col-12 m-auto text-center">{{ app()->getLocale() == 'en' ? $trans->services_summary : $trans->services_summary_ar }}</p>
			<div class="row mt-4">
				@foreach (session()->get('services') as $item)
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="service-box text-center mb-4">
							<a href="{{ route('show-single-service', $item->page_url) }}">
								<i class="mdi mdi-office-building"></i>
								<img src="{{ $item->img_url }}" alt="{{ $item->img_alt }}" class="img-responsive">
							</a>
							<h3>{{ $item->name }}</h5>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
{{-- services section end --}}
{{--  clients section start  --}}
	<section id="clients">
		<div class="container">
			<h2 class="section-title text-capitalize text-center mb-3">
				{{ __('message.clients') }}
			</h2>
			<p class="col-12 m-auto text-center">
				{{ app()->getLocale() == 'en' ? $trans->clients_summary : $trans->clients_summary_ar }}
			</p>
			<div class="col-12 mt-4">
				<div class="clients-slider owl-carousel owl-theme owl-loaded owl-text-select-on">
					<div class="owl-stage-outer">
						<div class="owl-stage">
							@foreach ($clients as $item)
								<div class="owl-item">
									<img src="{{ $item->img_path }}" alt="clients">
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
{{--  clients section end  --}}
{{-- counter start --}}
	<section class="section bg-gradient mt-5" id="counter">
		<div class="container-fluid">
			<div class="row" id="counter">
				<div class="col-lg-3 col-sm-6">
					<div class="text-center p-3">
						<div class="counter-icon text-white-50 mb-4">
							<i class="pe-7s-target display-4"></i>
						</div>
						<div class="counter-content">
							<h2 class="mb-3"><span class="counter-value text-white"  data-count="{{$history->project}}">0</span></h2>
							<h5 class="counter-name text-white">{{ __('message.projects') }}</h5>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-sm-6">
					<div class="text-center p-3">
						<div class="counter-icon text-white-50 mb-4">
							<i class="pe-7s-user display-4"></i>
						</div>
						<div class="counter-content">
							<h2 class="mb-3"><span class="counter-value text-white" data-count="{{$history->client}}">0</span></h2>
							<h5 class="counter-name text-white">{{ __('message.clients') }}</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="text-center p-3">
						<div class="counter-icon text-white-50 mb-4">
							<i class="pe-7s-alarm display-4"></i>
						</div>
						<div class="counter-content">
							<h2 class="mb-3"><span class="counter-value text-white" data-count="{{$history->hour}}">0</span></h2>
							<h5 class="counter-name text-white">{{ __('message.hours') }}</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="text-center p-3">
						<div class="counter-icon text-white-50 mb-4">
							<i class="pe-7s-date display-4"></i>
						</div>
						<div class="counter-content">                       
							<h2 class="mb-3 text-white"><span class="counter-value text-white" data-count="{{$history->experience}}"></span>+</h2>
							<h5 class="counter-name text-white">{{ __('message.experiences') }}</h5>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
{{-- <!-- counter end --> --}}

{{-- Latest Projects --}}
	<section class="latest-project mt-5" id="latest-project">
		<div class="container">
			<h2 class="section-title text-capitalize text-center mb-3">
				{{ __('message.latest_projects') }}
			</h2>
			<p class="col-12 m-auto text-center">
				{{ app()->getLocale() == 'en' ? $trans->projects_summary : $trans->projects_summary_ar }}
			</p>
			<div class="row">
				@foreach ($latest_projects as $item)
					<div class="col-lg-4 col-sm-6">
						<div class="project-box text-center mt-4">
							<a href="{{ route('show-single-project', $item->page_url) }}">
								<i class="fa fa-link"></i>
								<img src="{{ $item->image->img_url }}" alt="{{ $item->img_alt }}" class="img-responsive">
							</a>
							<h3>{{ $item->name }}</h5>
						</div>
					</div>
				@endforeach
			</div>
			<!-- end row -->
			<div class="row ">
				<div class="col-12">
					<div class="text-center more-projects mt-5 mb-5">
						<a href="{{ route('show-all-project') }}" class="text-capitalize">{{ __('message.more_projects') }} <i class="text-orange fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>		
	</section>
{{-- Latest Projects --}}

{{-- latest News Start--}}
	<section class="latest-news mb-5" id="latest-news">
		<div class="container">
			<h2 class="section-title text-center text-capitalize mt-3">
				{{ __('message.latest_news') }}
			</h2>
			<p class="col-12 text-center mt-3">
				{{ app()->getLocale() == 'en' ? $trans->news_summary : $trans->news_summary_ar }}
			</p>
			<div class="row">
				@foreach ($latest_news as $item)
					<div class="col-lg-4 col-sm-6 mb-4">
						<div class="news-box">
							<div class="news-media mb-4">
								<img src="{{ $item->featured_img_url }}" alt="{{ $item->img_alt }}" srcset="">
							</div>
							<div class="news-title">
								<h3>
									<a href="{{ route('show-single-news', $item->page_url) }}">{{ $item->name }}</a>
								</h3>
							</div>
							<div class="news-meta">
								<a><i class="far fa-clock"></i> {{ $item->created_at->format('M d, Y') }}</a>
							</div>
							<div class="news-detail">
								<p>
									{{ str_replace('&amp;', '&', strip_tags(substr($item->desc, 0, 150))) }}
								</p>
								<a href="{{ route('show-single-news', $item->page_url) }}" class="read-more">{{ __('message.read_more') }}</a>
							</div>
						</div>
					</div>
				@endforeach
			</div>		
		</div>
	</section>
{{-- Latest News end --}}
{{-- testimonials start --}}
	<section class="testimonials pt-5 pb-5" id="testimonials">
		<div class="container pt-4 pb-4">
			<div class="row">
				<div class="col-md-4 mt-4">
					<h2 class="section-title text-capitalize text-white">
						{{ __('message.our_leaders') }}
					</h2>
					<p class="text-white">
						{{ app()->getLocale() == 'en' ? $trans->leaders_summary : $trans->leaders_summary_ar }}
					</p>
				</div>
				<div class="col-md-8">
					<div class="testimonials-slider owl-carousel owl-theme owl-loaded owl-text-select-on">
						<div class="owl-stage-outer">
							<div class="owl-stage">
								@foreach ($leaders as $leader)
									<div class="owl-item">
										<a href="{{ route('show-single-leader', $leader->name) }}" class="leader d-block">
											<div class="img-holder">
												<img src="{{ $leader->img_url }}"  alt="{{ $leader->name }}">
											</div>
											<div class="details">
												<div class="leader-info">
													<h3>{{ $leader->name }}</h3>
												</div>
												<div class="leader-role">
													<span class="text-white">{{ $leader->role }}</span>
												</div>
											</div>
										</a>										
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
{{-- Testimonials End --}}
{{-- Contact Us --}}
	<section class="contact-section-wrapper mt-5" id="contact-section">
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
	</section>
{{-- Contact Us --}}
@endsection
@section('js')
<script src="{{ asset('assets/libs/owl-carousel/owl.carousel.min.js') }}"></script>	
<script src="{{ asset('assets/libs/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('assets/libs/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>	
<script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/frontend/pages/home.init.js') }}"></script>
<script>$('#company-profile p').html($('#company-profile p').text())</script>
<script>$('#company-capability p').html($('#company-capability p').text())</script>
<script>$('#about-aec p').html($('#about-aec p').text())</script>
<script>$('#word-from-director p').html($('#word-from-director p').text())</script>
<script>$('#our-values p').html($('#our-values p').text())</script>
<script>$('#corporate-apporach p').html($('#corporate-apporach p').text())</script>
<script>$('#meet-our-team p').html($('#meet-our-team p').text())</script>
@endsection