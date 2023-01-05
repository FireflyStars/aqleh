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
	<section class="page-banner" id="meet-our-team-banner" style="background:url({{ session()->get('banner_url') }}) center center/cover no-repeat local">
		<div class="container">
			<div class="title-box">
				<h1 class="text-capitalize">{{ __('message.Meet_Our_Team') }}</h1>
				<ol class="breadcrumb m-0 p-0 justify-content-center">
					<li><a href="{{ route('home') }}">{{ __('message.home') }}</a></li>
					<li><a>{{ __('message.aboutus') }}</a></li>
					<li>{{ __('message.Meet_Our_Team') }}</li>
				</ol>
			</div>
		</div>
	</section>
{{--  home start  --}}
	<section class="section pt-5 pb-5" id="meet-our-team">
		<div class="container">
			<div class="row">
				<div class="col-8">
					<div class="row">
						<div class="meet-our-team-desc {{ app()->getLocale() == 'ar' ? 'lang-ar' : '' }}">
							{{ $page->desc }}
						</div>
					</div>
					<div class="leaders row">
						@foreach ($leaders as $leader)
							<div class="col-lg-4 col-xs-6 mb-4">
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
				<div class="col-4 d-flex justify-content-center">
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
						<li class="nav-item big-divider mt-1">
							<a href="{{ route('company-profile') }}" class="nav-link text-capitalize font-24">
								{{ __('message.company_profile') }}
							</a>
						</li>
						<li class="nav-item big-divider mt-1">
							<a href="{{ route('company-capability') }}" class="nav-link text-capitalize font-24 pb-0">
								{{ __('message.company_capability') }}
							</a>
						</li>						
						<li class="nav-item big-divider mt-1 active">
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
		$('.meet-our-team-desc').html($('.meet-our-team-desc').text());
	</script>
	{{-- <script src="{{ asset('assets/js/frontend/pages/aboutus.init.js') }}"></script> --}}
@endsection