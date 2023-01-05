@extends('backend.layout')
@section('title', 'Edit Leader')
@section('meta')
    <meta content="Edit Leader" name="description" />
@endsection
@section('css')
    {{-- <!-- Plugins css --> --}}
    <link href="{{ asset('assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    @endsection
@section('page-title', 'edit Leader')
@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-5">
				<form class="form-horizontal" id="edit-leader-form" role="form" action="{{ route('update-leader', $leader->id) }}">
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">{{ __('admin.name') }} (EN)*</label>
						<div class="col-sm-7">
							<input id="name" type="text"  name="name" value="{{ $leader->name }}" required class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label for="name_ar" class="col-sm-2 col-form-label">{{ __('admin.name') }} (AR)*</label>
						<div class="col-sm-7">
							<input id="name_ar" type="text"  name="name_ar" value="{{ $leader->name_ar }}" required class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label for="leader_role" class="col-sm-2 col-form-label">{{ __('admin.leader_role') }}(EN)*</label>
						<div class="col-sm-7">
							<input id="leader_role" name="role" type="text" value="{{ $leader->role }}" required class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label for="leader_role_ar" class="col-sm-2 col-form-label">{{ __('admin.leader_role') }}(EN)*</label>
						<div class="col-sm-7">
							<input id="leader_role_ar" name="role_ar" type="text" value="{{ $leader->role_ar }}" required class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label for="image" class="col-sm-2 col-form-label">{{ __('admin.image') }}</label>
						<div class="col-sm-4">
							<input type="file" name="image" data-default-file="{{ $leader->img_url }}" data-allowed-file-extensions="jpg png gif" class="dropify" data-max-file-size="10M" {{-- data-min-width="370" data-min-height="470" --}}/>
						</div>
					</div>                    
					<div class="form-group row">
						<label for="desc" class="col-sm-2 col-form-label">{{ __('admin.description') }} (EN) *</label>
						<input type="hidden" name="desc" id="desc">
						<div class="col-sm-12">
							<textarea class="form-control" id="leader-en-desc-editor" rows="5" name="desc_dd">{{ $leader->desc }}</textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="desc_ar" class="col-sm-2 col-form-label">{{ __('admin.description') }} (AR) *</label>
						<input type="hidden" name="desc_ar" id="desc_ar">
						<div class="col-sm-12">
							<textarea class="form-control" id="leader-ar-desc-editor" rows="5" name="desc_ar_dd">{{ $leader->desc_ar }}</textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12 text-right">
							<button type="button" class="btn btn-success waves-effect waves-light" id="submit">
								<span class="spinner-grow-sm"></span>
								{{ __('admin.update') }}
							</button>
							<a href="{{ route('show-leader') }}" class="btn btn-danger waves-effect waves-light">
								{{ __('admin.cancel') }}
							</a>
						</div>
					</div>                            
				</form>
			</div>
		</div> <!-- end card-body -->
    </div> <!-- end col -->
</div> 
@endsection
@section('js')
    {{-- <!-- Plugins js --> --}}
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>    
    <script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>
	<script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/libs/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('assets/js/backend/pages/leader/leaderedit.init.js') }}"></script>
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