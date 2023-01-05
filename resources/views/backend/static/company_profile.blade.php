@extends('backend.layout')
@section('title', 'Company Profile Page')
@section('meta')
    <meta content="keywords" name="Company Profile Page" />
    <meta content="description" name="Company Profile Page" />
@endsection
@section('css')
    {{-- <!-- Plugins css --> --}}
    <link href="{{ asset('assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title', 'Company Profile Page')
@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-0">
                <div id="static-panel">
                    <ul class="nav nav-pills bg-light form-wizard-header p-0">
                        <li class="nav-item">
                            <a href="#general-info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                <i class="fa fa-suitcase"></i>
                                <span class="d-none d-sm-inline">{{ __('admin.general') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#meta" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                <i class="mdi mdi-google-plus-box"></i>
                                <span class="d-none d-sm-inline">{{ __('admin.meta') }}</span>
                            </a>
                        </li>                        
                    </ul>
                    <form class="form-horizontal" role="form" action="{{ route('update-company-profile') }}" id="edit-static-form">
                        <div class="tab-content mb-0 border-0">
                            <div class="tab-pane fade" id="general-info">
                                <div class="row">
                                    <div class="col-12 mr-auto">
                                        <div class="form-group row">
                                            <label for="desc" class="col-sm-12 col-form-label">{{ __('admin.description') }}(EN)*</label>
                                            <input type="hidden" value="{{ $page->desc }}" name="desc" id="desc">
                                            <div class="col-sm-12">
                                                <textarea id="static-desc-en-editor">
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="desc_ar" class="col-sm-12 col-form-label">{{ __('admin.description') }}(AR)*</label>
                                            <input type="hidden" value="{{ $page->desc_ar }}" name="desc_ar" id="desc_ar">
                                            <div class="col-sm-12">
                                                <textarea id="static-desc-ar-editor">
                                                </textarea>
                                            </div>
                                        </div>                                            
                                        <div class="form-group row">
                                            <label for="file" class="col-sm-2 col-form-label">{{ __('message.company_profile') }}</label>
                                            <div class="col-sm-4">
                                                <input type="file" name="file" data-default-file="{{ $page->file_path }}" data-allowed-file-extensions="pdf" class="dropify" data-max-file-size="10M"/>
                                            </div>
                                        </div>                                             
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="meta">
                                <div class="row">
                                    <div class="col-12 mr-auto">
                                        <div class="form-group row">
                                            <label for="meta-title" class="col-sm-2 col-form-label">{{ __('admin.title') }}</label>
                                            <div class="col-sm-10">
                                                <input id="meta-title" type="text" name="meta_title" placeholder="" class="form-control" value="{{ $page->meta_title }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="meta_keys" class="col-sm-2 col-form-label">{{ __('admin.keywords') }}</label>
                                            <div class="col-sm-10">
                                                <input id="meta_keys" name="meta_keys" type="text" placeholder="" class="form-control" value="{{ $page->meta_keys }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="meta_desc" class="col-sm-2 col-form-label">{{ __('admin.description') }}</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="meta_desc" class="form-control" name="meta_desc" placeholder="" value="{{ $page->meta_desc }}"/>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <button type="button" id="submit" class="btn btn-success waves-effect waves-light">
                                        <span class="spinner-grow-sm"></span>
                                        {{ __('admin.update') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                <div class="clearfix"></div>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div> 
@endsection
@section('js')
    {{-- <!-- Plugins js --> --}}
    <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>    
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/js/backend/pages/static/company_profile.init.js') }}"></script>
    <script>
	window.onload = function() {
		CKEDITOR.replace( 'static-desc-en-editor', {
            extraPlugins: 'uploadimage, tableresize',
			filebrowserUploadUrl: '{{ route("upload-static-desc-image", ["_token" => csrf_token() ])}}',
            filebrowserUploadMethod: 'form',
            on: {
                    change: function( evt ) {
                        $('#desc').val(CKEDITOR.instances['static-desc-en-editor'].getData());
                    }
            }
		});
		CKEDITOR.replace( 'static-desc-ar-editor', {
            extraPlugins: 'uploadimage, tableresize',
			filebrowserUploadUrl: '{{ route("upload-static-desc-image", ["_token" => csrf_token() ])}}',
            filebrowserUploadMethod: 'form',
            on: {
                    change: function( evt ) {
                        $('#desc_ar').val(CKEDITOR.instances['static-desc-ar-editor'].getData());
                    }
            }            
		});
	};
</script> 
@endsection
