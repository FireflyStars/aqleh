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
	<section class="page-banner" id="sitemap-banner" style="background:url({{ session()->get('banner_url') }}) center center/cover no-repeat local">
		<div class="container">
			<div class="title-box">
				<h1 class="text-capitalize">{{ __('message.sitemap') }}</h1>
				<ol class="breadcrumb m-0 p-0 justify-content-center">
					<li><a href="{{ route('home') }}">{{ __('message.home') }}</a></li>
					<li>{{ __('message.sitemap') }}</li>
				</ol>
			</div>
		</div>
	</section>
{{--  page banner  --}}
{{--  start  --}}
	<section class="section pt-5 pb-5" id="sitemap">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 sitemap-desc">
					{{ $page->desc }}
				</div>
			</div>
		</div>
	</section>
{{--  home end  --}}	
@endsection
@section('js')
	<script>
		$('.sitemap-desc').html($('.sitemap-desc').text());
	</script>
	 {{-- <script src="{{ asset('assets/js/frontend/pages/aboutus.init.js') }}"></script>  --}}
@endsection