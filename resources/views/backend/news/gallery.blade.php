@extends('backend.layout')
@section('title', 'add news gallery')
@section('meta')
    <meta content="news gallery" name="description" />
@endsection
@section('css')
    {{-- <!-- third party css --> --}}
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
	{{-- <!-- third party css end --> --}}
	<style>
		.page-pagination ul {
			display: inline-block;
			overflow: hidden;
		}
		.page-pagination ul li {
			float: left;
			width: 33px;
			height: 33px;
			line-height: 32px;
			text-align: center;
			border: 1px solid #00abc9;
			margin-right: 8px;
		}
		.page-pagination ul li a {
			display: block;
			font-size: 1.125rem;
			font-weight: bold;
			color: #667380;
		}
		.page-pagination ul li a:hover, .page-pagination ul .current a {
			background: -webkit-linear-gradient(left, #193775, #00abc9);
			background: -moz-linear-gradient(left, #193775, #00abc9);
			background: -o-linear-gradient(left, #193775, #00abc9);
			background: -ms-linear-gradient(left, #193775, #00abc9);
			background: linear-gradient(left, #193775, #00abc9);
			color: #f39c12;
		}		
	</style>
@endsection
@section('page-title', 'Adding News Gallery')
@section('content')
<div class="container-fluid">
	<div class="row mb-3">
		<a href="{{ route('show-news-gallery-add-form', $news_id) }}" class="btn btn-success ml-2">Add Gallery</a>
	</div>
	<div class="row">
		@foreach ($galleries as $gallery)
			<div class="col-xl-3 col-md-6">
				<div class="card-box">
					<div class="dropdown float-right">
						<a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
							<i class="mdi mdi-dots-vertical"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<!-- item-->
							<a href="{{ route('show-news-gallery-edit-form', $gallery->id) }}" class="dropdown-item">Edit</a>
							<!-- item-->
							<a href="{{ route('delete-news-gallery', $gallery->id) }}" class="dropdown-item sa-params">Delete</a>
						</div>
					</div>

					<div class="widget-chart-1">
						<img src="{{ $gallery->img_url }}" alt="" width="100%" height="215" srcset="">
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<div class="row page-pagination justify-content-center">
		{{ $galleries->links() }}
	</div>
</div>
@endsection
@section('js')
    {{-- <!-- third party js --> --}}
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    {{-- <!-- third party js ends --> --}}

    <script src="{{ asset('assets/js/backend/pages/news/gallery.init.js') }}"></script>
@endsection