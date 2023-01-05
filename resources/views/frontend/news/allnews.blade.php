@extends('frontend.layout')

@section('title', 'News & Events')
@section('meta')
    <meta content="" name="" />
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
					<li>{{ __('message.news_events') }}</li>
				</ol>
			</div>
		</div>
	</section>
{{-- Banner End --}}
{{-- News Section Start --}}
	<section class="news-with-sidebar pt-5">
		<div class="container">
			<div class="row">
				<div class="news-content col-lg-9 col-md-8">
					<div class="row">
						@foreach ($news as $item)
							<div class="col-md-6 col-sm-6">
								<div class="news-box mb-5">
									<div class="news-media mb-4">
										<img src="{{ $item->featured_img_url }}" alt="{{ ($item->img_alt !='' ? $item->img_alt : $item->name ) }}" srcset="">
									</div>
									<div class="news-title">
										<h3>
											<a href="{{ route('show-single-news', $item->page_url) }}">{{ $item->name }}</a>
										</h3>
									</div>
									<div class="news-meta">
										<a ><i class="far fa-clock"></i> {{ $item->created_at->format('M d, Y') }}</a>
									</div>
									<div class="news-detail">
										<p>
											{{ str_replace('&amp;', '&', strip_tags(substr($item->desc,0, 150))) }} ...
										</p>
										<a href="{{ route('show-single-news', 'test-news') }}" class="read-more">{{ __('message.read_more') }}</a>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<div class="row page-pagination-wrapper mt-4">
						<div class="col-12">
							<div class="page-pagination text-center">
								{{ $news->links() }}
							</div>
						</div>
					</div>
				</div>
				<div class="news-sidebar col-lg-3 col-md-4 col-sm-5">
					<div class="component search-component mb-5">
						<form action="{{ route('search-news') }}" class="form">
							<input type="text" name="search_str" class="form-control" placeholder="{{ __('message.search_here') }}">
						</form>
					</div>
					<div class="component recent-news-component">
						<h3 class="text-capitalize">{{ __('message.recent_news') }}</h3>
						<ul>
							@foreach ($latest_news as $item)
								<li>
									<div class="news-pic">
										<img src="{{ $item->featured_img_url }}" alt="{{ ($item->img_alt !='' ? $item->img_alt : $item->name )  }}">
									</div>
									<div class="details">
										<h4 class="text-capitalize"><a href="{{ route('show-single-news', 'test-news') }}">{{ $item->name }}</a></h4>
										<span class="text-uppercase">{{ $item->created_at->format('M d, Y') }}</span>
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
<script src="{{ asset('assets/js/frontend/pages/news/news.init.js') }}"></script>
@endsection