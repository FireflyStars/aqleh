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
	<section class="page-banner" id="cookie-policy-banner" style="background:url({{ session()->get('banner_url') }}) center center/cover no-repeat local">
		<div class="container">
			<div class="title-box">
				<h1 class="text-capitalize">{{ __('message.cookie_policy') }}</h1>
				<ol class="breadcrumb m-0 p-0 justify-content-center">
					<li><a href="{{ route('home') }}">{{ __('message.home') }}</a></li>
					<li>{{ __('message.cookie_policy') }}</li>
				</ol>
			</div>
		</div>
	</section>
{{--  page banner  --}}
{{--  start  --}}
	<section class="section pt-5 pb-5" id="cookie-policy">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 cookie-policy-desc {{ app()->getLocale() == 'ar' ? 'lang-ar' : '' }}">
					{{ $page->desc }}
				</div>
			</div>
		</div>
	</section>
{{--  home end  --}}	
@endsection
@section('js')
	<script>
		$('.cookie-policy-desc').html($('.cookie-policy-desc').text());
	</script>
	 {{-- <script src="{{ asset('assets/js/frontend/pages/aboutus.init.js') }}"></script>  --}}
@endsection