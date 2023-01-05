@extends('frontend.layout')

@section('title', 'News & Events')
@section('meta')
    <meta content="" name="" />
@endsection

@section('css')

@endsection
@section('content')
{{-- News Section Start --}}
	<section class="search-result-panel">
		<div class="container">
			<div class="row"><h2 class="text-center">search results</h2></div>
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<h3 class="text-center mb-4">Service</h3>
					@foreach ($services as $item)
						<div class="service-box text-center mb-4">
							<a href="{{ route('show-single-service', $item->page_url) }}">
								<i class="mdi mdi-office-building"></i>
								<img src="{{ $item->img_url }}" alt="{{ $item->img_alt }}" class="img-responsive">
							</a>
							<h3>{{ $item->name }}</h5>
						</div>
					@endforeach					
				</div>				
				<div class="col-lg-4 col-md-4">
					<h3 class="text-center mb-4">News</h3>
					@foreach ($news as $item)
						<div class="news-box mb-4">
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
					@endforeach
				</div>
				<div class="col-lg-4 col-md-4">
					<h3 class="text-center mb-4">Project</h3>
					@foreach ($projects as $key => $item)
						<div class="project-box text-center mb-4">
							<a href="{{ route('show-single-project', $item->page_url) }}">
								<i class="fa fa-link"></i>
								<img src="{{ $item->image->img_url }}" alt="{{ $item->img_alt }}" class="img-responsive">
							</a>
							<h3>{{ $item->name }}</h5>
						</div>
					@endforeach					
				</div>
			</div>
		</div>
	</section>
{{-- News Section End --}}
@endsection
@section('js')
{{-- <script src="{{ asset('assets/js/frontend/pages/news/news.init.js') }}"></script> --}}
@endsection