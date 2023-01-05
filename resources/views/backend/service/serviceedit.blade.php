@extends('backend.layout')
@section('title', 'Edit Service')
@section('meta')
    <meta content="Edit Service" name="description" />
@endsection
@section('css')
    {{-- <!-- Plugins css --> --}}
    <link href="{{ asset('assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
    @endsection
@section('page-title', 'edit Service')
@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-0">
                <div id="service-panel">
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
                                <span class="d-none d-sm-inline">
                                    {{ __('admin.meta') }}
                                </span>
                            </a>
                        </li>
                    </ul>
                    <form class="form-horizontal" id="edit-service-form" role="form" action="{{ route('update-service', $service->id) }}">
                        <div class="tab-content mb-0 border-0">
                            <div class="tab-pane fade" id="general-info">
                                <div class="row">
                                    <div class="col-12 mr-auto">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">{{ __('admin.name') }} (EN)*</label>
                                            <div class="col-sm-7">
                                                <input id="name" type="text"  name="name" value="{{ $service->name }}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name_ar" class="col-sm-2 col-form-label">{{ __('admin.name') }} (AR)*</label>
                                            <div class="col-sm-7">
                                                <input id="name_ar" type="text"  name="name_ar" value="{{ $service->name_ar }}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="page_url" class="col-sm-2 col-form-label">{{ __('admin.page_URL') }}(EN)*</label>
                                            <div class="col-sm-7">
                                                <input id="page_url" name="page_url" type="text" value="{{ $service->page_url }}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="page_url_ar" class="col-sm-2 col-form-label">{{ __('admin.page_URL') }}(EN)*</label>
                                            <div class="col-sm-7">
                                                <input id="page_url_ar" name="page_url_ar" type="text" value="{{ $service->page_url_ar }}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-2 col-form-label">{{ __('admin.image') }}</label>
                                            <div class="col-sm-4">
                                                <input type="file" name="image" data-default-file="{{ $service->img_url }}" data-allowed-file-extensions="jpg png gif" class="dropify" data-max-file-size="2M" {{-- data-min-width="275" data-min-height="242" --}}/>
                                            </div>
                                        </div>                    
                                        <div class="form-group row">
                                            <label for="image_alt" class="col-sm-2 col-form-label">{{ __('admin.image_alt') }} (EN)</label>
                                            <div class="col-sm-7">
                                                <input id="image_alt" type="text" name="img_alt" value="{{ $service->img_alt }}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="image_alt_ar" class="col-sm-2 col-form-label">{{ __('admin.image_alt') }} (AR)</label>
                                            <div class="col-sm-7">
                                                <input id="image_alt_ar" type="text" name="img_alt_ar" value="{{ $service->img_alt_ar }}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status" class="col-sm-2 col-form-label">{{ __('admin.status') }}</label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" id="status" {{ ($service->status == 1) ? 'checked' : '' }} data-plugin="switchery" data-color="green"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="desc" class="col-sm-12 col-form-label">{{ __('admin.description') }} (EN) *</label>
                                            <input type="hidden" name="desc" value="{{ $service->desc }}" id="desc">
                                            <div class="col-sm-12">
                                                <textarea id="service-desc-en-editor"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="desc_ar" class="col-sm-12 col-form-label">{{ __('admin.description') }} (AR) *</label>
                                            <input type="hidden" name="desc_ar" value="{{ $service->desc_ar }}" id="desc_ar">
                                            <div class="col-sm-12">
                                                <textarea id="service-desc-ar-editor"></textarea>
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
                                                <input id="meta-title" type="text" name="meta_title" value="{{ $service->meta_title }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="meta_keyword" class="col-sm-2 col-form-label">{{ __('admin.keywords') }}</label>
                                            <div class="col-sm-10">
                                                <input id="meta_keyword" name="meta_keys" type="text" value="{{ $service->meta_keys }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="meta_desc" class="col-sm-2 col-form-label">{{ __('admin.description') }}</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="meta_desc" class="form-control" name="meta_desc" value="{{ $service->meta_desc }}"/>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <button type="button" class="btn btn-success waves-effect waves-light" id="submit">
                                        <span class="spinner-grow-sm"></span>
                                        {{ __('admin.update') }}
                                    </button>
                                    <a href="{{ route('show-service') }}" class="btn btn-danger waves-effect waves-light">
                                        {{ __('admin.cancel') }}
                                    </a>
                                </div>
                            </div>                            
                        </div> {{--  tab-content  --}}
                    </form> {{--  end tabwizard  --}}
                </div>
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
    <script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/libs/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/pages/service/serviceedit.init.js') }}"></script>
    <script>
	window.onload = function() {
		CKEDITOR.replace( 'service-desc-en-editor', {
            extraPlugins: 'uploadimage, tableresize',
			filebrowserUploadUrl: '{{ route("upload-service-desc-image", ["_token" => csrf_token() ])}}',
            filebrowserUploadMethod: 'form',
            on: {
                    change: function( evt ) {
                        $('#desc').val(CKEDITOR.instances['service-desc-en-editor'].getData());
                    }
            }
		});
		CKEDITOR.replace( 'service-desc-ar-editor', {
            extraPlugins: 'uploadimage, tableresize',
			filebrowserUploadUrl: '{{ route("upload-service-desc-image", ["_token" => csrf_token() ])}}',
            filebrowserUploadMethod: 'form',
            on: {
                    change: function( evt ) {
                        $('#desc_ar').val(CKEDITOR.instances['service-desc-ar-editor'].getData());
                    }
            }            
		});
	};
</script>     
@endsection