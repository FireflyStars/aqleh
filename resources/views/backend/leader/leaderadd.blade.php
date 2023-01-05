@extends('backend.layout')
@section('title', 'Adding Leader')
@section('meta')
    <meta content="Adding Leader" name="description" />
@endsection
@section('css')
    {{-- <!-- Plugins css --> --}}
    <link href="{{ asset('assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    @endsection
@section('page-title', 'Adding Leader')
@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-5">
				<form class="form-horizontal" role="form" id="add-leader-form" action="{{ route('add-post-leader') }}">
					<div class="row">
						<div class="col-12 mr-auto">
							<div class="form-group row">
								<label for="name" class="col-sm-2 col-form-label">{{ __('admin.name') }} (EN) *</label>
								<div class="col-sm-7">
									<input id="name" type="text" data-parsley-group="general" name="name" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="name_ar" class="col-sm-2 col-form-label">{{ __('admin.name') }} (AR) *</label>
								<div class="col-sm-7">
									<input id="name_ar" type="text" data-parsley-group="general" name="name_ar" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="leader_role" class="col-sm-2 col-form-label">{{ __('admin.leader_role') }}(EN)*</label>
								<div class="col-sm-7">
									<input id="role" data-parsley-group="general" name="role" type="text" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="leader_role_ar" class="col-sm-2 col-form-label">{{ __('admin.leader_role') }}(AR)*</label>
								<div class="col-sm-7">
									<input id="leader_role_ar" data-parsley-group="general" name="role_ar" type="text" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="image" class="col-sm-2 col-form-label">{{ __('admin.image') }}</label>
								<div class="col-sm-4">
									<input type="file" data-parsley-group="general" name="image" data-default-file="" data-allowed-file-extensions="jpg png gif" class="dropify" data-max-file-size="10M" {{-- data-min-width="370" data-min-height="470" --}}/>
								</div>
							</div>                    
							<div class="form-group row">
								<label for="desc" class="col-sm-2 col-form-label">{{ __('admin.description') }} (EN) *</label>
								<input type="hidden" name="desc" id="desc">
								<div class="col-sm-12">
									<textarea id="leader-en-desc-editor" name="desc_ddd" class="form-control" required rows="5"></textarea> <!-- end Snow-editor-->
								</div>
							</div>
							<div class="form-group row">
								<label for="desc_ar" class="col-sm-2 col-form-label">{{ __('admin.description') }} (AR) *</label>
								<input type="hidden" name="desc_ar" id="desc_ar">
								<div class="col-sm-12">
									<textarea id="leader-ar-desc-editor" name="desc_ar_ddd" class="form-control" required rows="5"></textarea> <!-- end Snow-editor-->
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12 text-right">
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
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>    
    <script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
	<script src="{{ asset('assets/js/backend/pages/leader/leaderadd.init.js') }}"></script>
    <script>
	window.onload = function() {
		CKEDITOR.replace( 'leader-en-desc-editor', {
            extraPlugins: 'uploadimage, tableresize',
			filebrowserUploadUrl: '{{ route("upload-leader-desc-image", ["_token" => csrf_token() ])}}',
            filebrowserUploadMethod: 'form',
            on: {
                    change: function( evt ) {
                        $('#desc').val(CKEDITOR.instances['leader-en-desc-editor'].getData());
                    }
            }
		});
		CKEDITOR.replace( 'leader-ar-desc-editor', {
            extraPlugins: 'uploadimage, tableresize',
			filebrowserUploadUrl: '{{ route("upload-leader-desc-image", ["_token" => csrf_token() ])}}',
            filebrowserUploadMethod: 'form',
            on: {
                    change: function( evt ) {
                        $('#desc_ar').val(CKEDITOR.instances['leader-ar-desc-editor'].getData());
                    }
            }            
		});
	};
</script>  	
@endsection