@extends('backend.layout')
@section('title', 'Our Values Page')
@section('meta')
    <meta content="keywords" name="Our Values" />
    <meta content="description" name="Our Values" />
@endsection
@section('css')
    {{-- <!-- Plugins css --> --}}
    <link href="{{ asset('assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    @endsection
@section('page-title', 'Our Values')
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
                    <form class="form-horizontal" role="form" action="{{ route('update-our-values') }}" id="edit-static-form">
                        <div class="tab-content mb-0 border-0">
                            <div class="tab-pane fade" id="general-info">
                                <div class="row">
                                    <div class="col-12 mr-auto">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">{{ __('admin.name') }} (EN)*</label>
                                            <div class="col-sm-7">
                                                <input id="name" type="text" value="{{ $page->name }}" name="name" required placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name_ar" class="col-sm-2 col-form-label">{{ __('admin.name') }} (AR)*</label>
                                            <div class="col-sm-7">
                                                <input id="name_ar" type="text" value="{{ $page->name_ar }}" required name="name_ar" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label for="page_url" class="col-sm-2 col-form-label">{{ __('admin.page_URL') }} (EN)*</label>
                                            <div class="col-sm-7">
                                                <input id="page_url" type="text" value="{{ $page->page_url }}" name="page_url" required placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="page_url_ar" class="col-sm-2 col-form-label">{{ __('admin.page_URL') }} (AR)*</label>
                                            <div class="col-sm-7">
                                                <input id="page_url_ar" value="{{ $page->page_url_ar }}" type="text" required name="page_url_ar" placeholder="" class="form-control">
                                            </div>
                                        </div> --}}
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
    <script src="{{ asset('assets/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/pages/static/our_values.init.js') }}"></script>
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