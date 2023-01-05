@extends('frontend.layout')

@section('title', 'News & Events')
@section('meta')
    <meta content="description" name="{{ $news->meta_desc}}"/>
    <meta content="keys" name="{{ $news->meta_keys}}"/>
@endsection

@section('css')

@endsection
@section('content')
{{-- Banner Start --}}
	<div class="clearfix"></div>
	<section class="page-banner" id="news-banner" style="background:url({{ session()->get('banner_url') }}) center center/cover no-repeat local">
		<div class="container">
			<div class="title-box">
				<h1 class="text-capitalize">{{ __('message.news_events') }}</h1>
				<ol class="breadcrumb m-0 p-0 justify-content-center">
					<li><a href="{{ route('home') }}">{{ __('message.home') }}</a></li>
					<li><a href="{{ route('show-all-news') }}">{{ __('message.news') }}</a></li>
					<li>{{ $news->name }}</li>
				</ol>
			</div>
		</div>
	</section>
{{-- Banner End --}}
{{-- News Section Start --}}
	<section class="news-with-sidebar pt-5">
		<div class="container">
			<div class="row pb-5">
				<div class="news-content col-lg-9 col-md-8">
					<div class="row">
						<div class="featured-img">
							<img src="{{ $news->featured_img_url }}" width="100%" alt="">
						</div>					    
						<div class="single-news mt-3">
							<div class="single-news-title pb-4 border-bottom">
								<h2>{{$news->name}}</h2>
								<p><i class="far fa-clock"></i> {{$news->created_at->format("M d, Y")}}</p>
							</div>
							<div class="single-news-body pt-4">
								<div class="single-news-desc {{ app()->getLocale() == 'ar' ? 'lang-ar' : '' }}">
									{{ $news->desc }}
								</div>
								<div class="single-news-gallery pt-4">
									<div class="row">
										@foreach($gallery as $item)
											<div class="col-lg-4 col-sm-6 mt-3">
												<img src="{{ $item->img_url }}" alt="gallery" srcset="">
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="news-sidebar col-lg-3 col-md-4 col-sm-5">
					<div class="component search-component mb-5">
						<form action="" class="form">
							<input type="text" class="form-control" placeholder="{{ __('message.search_here') }}">
						</form>
					</div>
					<div class="component recent-news-component">
						<h3 class="text-capitalize">{{ __('message.recent_news') }}</h3>
						<ul>
							@foreach($latest_news as $item)
							<li>
								<div class="news-pic">
									<img src="{{ $item->featured_img_url }}" alt="">
								</div>
								<div class="details">
									<h4 class="text-capitalize"><a href="{{ route('show-single-news', $item->page_url) }}">{{$item->name}}</a></h4>
									<span class="text-uppercase">{{$item->created_at->format('M d, Y')}}</span>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
{{-- News Section End --}}
@endsection
@section('js')
<script src="{{ asset('assets/js/frontend/pages/news/singlenews.init.js') }}"></script>
@endsection