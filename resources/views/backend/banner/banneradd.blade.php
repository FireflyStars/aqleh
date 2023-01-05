@extends('backend.layout')
@section('title', 'Adding banner')
@section('meta')
    <meta content="Adding banner" name="description" />
@endsection
@section('css')
    {{-- <!-- Plugins css --> --}}
    <link href="{{ asset('assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    @endsection
@section('page-title', 'Adding Banner')
@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-5">
				<form class="form-horizontal" role="form" id="add-banner-form" action="{{ route('add-post-banner') }}">
					<div class="row">
						<div class="col-12 mr-auto">
							<div class="form-group row">
								<label for="image" class="col-sm-2 col-form-label">{{ __('admin.image') }}</label>
								<div class="col-sm-12">
									<input type="file" data-parsley-group="general" name="image" data-default-file="" data-allowed-file-extensions="jpg jpeg png gif" class="dropify" data-max-file-size="10M" {{-- data-min-width="1920" data-min-height="450" --}}/>
								</div>
							</div>                    
							<div class="form-group row">
								<div class="col-sm-10 text-left offset-sm-2">
									<button type="button" class="btn btn-success waves-effect waves-light" id="submit">
										<span class="spinner-grow-sm"></span>
										{{ __('admin.create') }}
									</button>
									<a href="{{ route('show-leader') }}" class="btn btn-danger waves-effect waves-light">
										{{ __('admin.cancel') }}
									</a>
								</div>
							</div>     
						</div>
					</div>
				</form> {{--  end tabwizard  --}}
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div> 
@endsection
@section('js')
    {{-- <!-- Plugins js --> --}}
    <script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/pages/banner/banneradd.init.js') }}"></script>
@endsection