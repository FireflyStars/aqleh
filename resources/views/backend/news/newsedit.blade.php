@extends('backend.layout')
@section('title', 'Edit News')
@section('meta')
    <meta content="Edit News" name="description" />
@endsection
@section('css')
    {{-- <!-- Plugins css --> --}}
    <link href="{{ asset('assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
    @endsection
@section('page-title', 'Edit News')
@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-0">
                <div id="news-panel">
                    <ul class="nav nav-pills bg-light form-wizard-header p-0">
                        <li class="nav-item">
                            <a href="#general-info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                <i class="fa fa-suitcase"></i>
                                <span class="d-none d-sm-inline">{{ __('admin.general') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#images" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                <i class="mdi mdi-image-plus mr-1"></i>
                                <span class="d-none d-sm-inline">{{ __('admin.images') }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#meta" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                <i class="mdi mdi-google-plus-box"></i>
                                <span class="d-none d-sm-inline">{{ __('admin.meta') }}</span>
                            </a>
                        </li>                         
                    </ul>
                    
                    <form class="form-horizontal" role="form" action="{{ route('update-news', $news->id) }}" id="edit-news-form">
                        <div class="tab-content mb-0 border-0">
                            <div class="tab-pane fade" id="general-info">
                                <div class="row">
                                    <div class="col-12 mr-auto">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">{{ __('admin.name') }} (EN)*</label>
                                            <div class="col-sm-10">
                                                <input id="name" type="text" value="{{ $news->name }}" data-parsley-group="general" name="name" placeholder="" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name_ar" class="col-sm-2 col-form-label">{{ __('admin.name') }} (AR)*</label>
                                            <div class="col-sm-10">
                                                <input id="name_ar" value="{{ $news->name_ar }}" data-parsley-group="general" type="text" name="name_ar" placeholder="" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="page_url" class="col-sm-2 col-form-label">{{ __('admin.page_URL') }} (EN) *</label>
                                            <div class="col-sm-10">
                                                <input id="page_url" value="{{ $news->page_url }}" data-parsley-group="general" name="page_url" type="text" placeholder="" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="page_url_ar" class="col-sm-2 col-form-label">{{ __('admin.page_URL') }} (AR) *</label>
                                            <div class="col-sm-10">
                                                <input id="page_url_ar" value="{{ $news->page_url_ar }}" data-parsley-group="general" name="page_url_ar" type="text" placeholder="" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status" class="col-sm-2 col-form-label">{{ __('admin.status') }}</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" id="status" {{ ($news->status == 1) ? 'checked' : '' }} data-plugin="switchery" data-color="green"/>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label for="desc" class="col-sm-12 col-form-label">{{ __('admin.description') }} (EN)*</label>
                                            <input type="hidden" name="desc" id="desc" value="{{ $news->desc }}">
                                            <div class="col-sm-12">
                                                <textarea id="news-desc-en-editor">
                                                </textarea> <!-- end Snow-editor-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <label for="desc_ar" class="col-sm-12 col-form-label">{{ __('admin.description') }} (AR)*</label>
                                            <input type="hidden" name="desc_ar" id="desc_ar" value="{{ $news->desc_ar }}">
                                            <div class="col-sm-12">
                                                <textarea id="news-desc-ar-editor">
                                                </textarea> <!-- end Snow-editor-->
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane fade" id="images">
                                <div class="row">
                                    <div class="col-12 mr-auto">
                                        <div class="form-group row">
                                            <label for="img_alt" data-parsley-group="image" class="col-sm-2 col-form-label">{{ __('admin.image_alt') }} (EN)</label>
                                            <div class="col-sm-10">
                                                <input id="img_alt" value="{{ $news->img_alt }}" type="text" name="img_alt" placeholder=""  class="form-control">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <div class="row">
                                    <div class="col-12 mr-auto">
                                        <div class="form-group row">
                                            <label for="img_alt_ar" class="col-sm-2 col-form-label">{{ __('admin.image_alt') }} (AR)</label>
                                            <div class="col-sm-10">
                                                <input id="img_alt_ar" value="{{ $news->img_alt_ar }}" data-parsley-group="image" type="text" name="img_alt_ar" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card-box">
                                            <h4 class="header-title mt-0 mb-3">{{ __('admin.featured_img') }}</h4>
                                            <input type="file" data-parsley-group="image" name="featured_img" data-default-file="{{ $news->featured_img_url }}" data-allowed-file-extensions="jpg png gif" class="dropify" data-max-file-size="2M" data-min-width="800" data-min-height="608"/>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="meta">
                                <div class="row">
                                    <div class="col-12 mr-auto">
                                        <div class="form-group row">
                                            <label for="meta-title" class="col-sm-2 col-form-label">{{ __('admin.title') }}</label>
                                            <div class="col-sm-10">
                                                <input id="meta-title" value="{{ $news->meta_title }}" data-parsley-group="meta" type="text" name="meta_title" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="meta_keys" class="col-sm-2 col-form-label">{{ __('admin.keywords') }}</label>
                                            <div class="col-sm-10">
                                                <input id="meta_keys" value="{{ $news->meta_keys }}" data-parsley-group="meta" name="meta_keys" type="text" placeholder="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="meta_desc" class="col-sm-2 col-form-label">{{ __('admin.description') }}</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="{{ $news->meta_desc }}" id="meta_desc" data-parsley-group="meta" class="form-control" name="meta_desc" placeholder=""/>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            
                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <button type="button" id="submit" class="btn btn-success waves-effect waves-light">
                                        <span class="spinner-grow-sm"></span>
                                        {{ __('admin.update') }}
                                    </button>
                                    <a href="{{ route('show-news') }}" class="btn btn-danger waves-effect waves-light">
                                        {{ __('admin.cancel') }}
                                    </a>
                                </div>
                            </div>
                        </div> <!-- tab-content -->
                    </form>
                </div> <!-- end #btnwizard-->

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div> 
@endsection
@section('js')
    {{-- <!-- Plugins js --> --}}
    <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>    
    <script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/libs/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/pages/news/newsedit.init.js') }}"></script>
    <script>
	window.onload = function() {
		CKEDITOR.replace( 'news-desc-en-editor', {
            extraPlugins: 'uploadimage, tableresize',
			filebrowserUploadUrl: '{{ route("upload-news-desc-image", ["_token" => csrf_token() ])}}',
            filebrowserUploadMethod: 'form',
            on: {
                    change: function( evt ) {
                        $('#desc').val(CKEDITOR.instances['news-desc-en-editor'].getData());
                    }
            }
		});
		CKEDITOR.replace( 'news-desc-ar-editor', {
            extraPlugins: 'uploadimage, tableresize',
			filebrowserUploadUrl: '{{ route("upload-news-desc-image", ["_token" => csrf_token() ])}}',
            filebrowserUploadMethod: 'form',
            on: {
                    change: function( evt ) {
                        $('#desc_ar').val(CKEDITOR.instances['news-desc-ar-editor'].getData());
                    }
            }            
		});
	};
</script>      
@endsection