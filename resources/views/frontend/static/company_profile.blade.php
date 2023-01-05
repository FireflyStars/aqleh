@extends('frontend.layout')

@section('title', $page->meta_title)
@section('meta')
    <meta content="keywords" name="{{ $page->meta_keys }}" />
    <meta content="description" name="{{ $page->meta_desc }}" />
@endsection
@section('css')

@endsection
@section('content')
{{--  page banner  --}}
	<section class="page-banner" id="company-profile-banner" style="background:url({{ session()->get('banner_url') }}) center center/cover no-repeat local">
		<div class="container">
			<div class="title-box">
				<h1 class="text-capitalize">{{ __('message.company_profile') }}</h1>
				<ol class="breadcrumb m-0 p-0 justify-content-center">
					<li><a href="{{ route('home') }}">{{ __('message.home') }}</a></li>
					<li><a>{{ __('message.aboutus') }}</a></li>
					<li>{{ __('message.company_profile') }}</li>
				</ol>
			</div>
		</div>
	</section>
{{--  home start  --}}
	<section class="section pt-5 pb-5" id="company-profile">
		<div class="container">
			<div class="row">
				<div class="col-8">
					<div class="company-profile-desc">
						{{ $page->desc }}						
					</div>
					<div class="m-auto pt-5 text-center">
						<a href="{{ $page->file_url }}" target="__blank" class="btn bg-custom-color text-light">
							{{ __('message.company_profile_pdf') }}
						</a>
					</div>
				</div>
				<div class="col-4 d-flex align-items-center justify-content-center">
					<ul class="navbar-nav d-block custom-nav">
						<li class="nav-item big-divider">
							<a href="{{ route('about-aec') }}" class="nav-link text-capitalize font-24 pb-0">
								{{ __('message.about_AEC') }}
							</a>
						</li>
						<li class="nav-item big-divider mt-1">
							<a href="{{ route('word-from-director') }}" class="nav-link text-capitalize font-24 pb-0">
								{{ __('message.Word_from_Director') }}
							</a>
						</li>
						<li class="nav-item big-divider mt-1">
							<a href="{{ route('our-values') }}" class="nav-link text-capitalize font-24 pb-0">
								{{ __('message.Our_Values') }}
							</a>
						</li>
						<li class="nav-item big-divider mt-1">
							<a href="{{ route('corporate-approach') }}" class="nav-link text-capitalize font-24 pb-0">
								{{ __('message.Corporate_Approach') }}
							</a>
						</li>
						<li class="nav-item big-divider mt-1 active">
							<a href="{{ route('company-profile') }}" class="nav-link text-capitalize font-24">
								{{ __('message.company_profile') }}
							</a>
						</li>
						<li class="nav-item big-divider mt-1">
							<a href="{{ route('company-capability') }}" class="nav-link text-capitalize font-24 pb-0">
								{{ __('message.company_capability') }}
							</a>
						</li>						
						<li class="nav-item big-divider mt-1">
							<a href="{{ route('meet-our-team') }}" class="nav-link text-capitalize font-24 pb-0">
								{{ __('message.Meet_Our_Team') }}
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
{{--  home end  --}}	
@endsection
@section('js')
	<script>
		$('.company-profile-desc').html($('.company-profile-desc').text());
	</script>
	{{-- <script src="{{ asset('assets/js/frontend/pages/aboutus.init.js') }}"></script> --}}
@endsection