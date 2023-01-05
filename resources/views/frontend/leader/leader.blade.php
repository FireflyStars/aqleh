@extends('frontend.layout')

@section('title', $leader->name)
@section('meta')
	<meta name="description" content="{{ $leader->role }}">
	<meta name="keywords" content="{{ $leader->role }}">
@endsection

@section('css')
	
@endsection
@section('content')
{{-- Banner Start --}}
	<div class="clearfix"></div>
	<section class="page-banner" id="leader-banner" style="background:url({{ session()->get('banner_url') }}) center center/cover no-repeat local">
		<div class="container">
			<div class="title-box">
				<h1 class="text-capitalize">{{ $leader->role }}</h1>
				<ol class="breadcrumb m-0 p-0 justify-content-center">
					<li><a href="{{ route('home') }}">{{ __('message.home') }}</a></li>
					<li><a href="{{ route('meet-our-team') }}">{{ __('message.Meet_Our_Team') }}</a></li>
					<li>{{ $leader->name }}</li>
				</ol>
			</div>
		</div>
	</section>
{{-- Banner End --}}
{{-- leader Section Start --}}
	<section class="single-leader-wrapper pt-5">
		<div class="container">
			<div class="single-leader">
				<div class="single-leader-desc pt-3 pb-4">
					{{ $leader->desc }}
				</div>
			</div>
		</div>
	</section>
{{-- leader Section End --}}
@endsection
@section('js')
	<script src="{{ asset('assets/js/frontend/pages/leader/leader.init.js') }}"></script>
@endsection