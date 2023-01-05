@extends('backend.layout')
@section('title', 'Setting Page')
@section('meta')
    <meta content="Aqleh setting page" name="description" />
@endsection
@section('css')
    <link href="{{ asset('assets/libs/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .parsley-error {
            list-style: none;
            color: #ff5b5b;
            margin-top: 5px;
            padding-left: 20px;
            position: relative;
        }
        .parsley-error:before {
            content: "\F159";
            font-family: "Material Design Icons";
            position: absolute;
            left: 2px;
            top: -3px;
        }
    </style>
@endsection
@section('page-title', 'Setting Page')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body p-0">
                    <div id="setting-panel">
                        <ul class="nav nav-pills bg-light form-wizard-header p-0">
                            <li class="nav-item">
                                <a href="#password-change" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="fas fa-lock"></i>
                                    <span class="d-none d-sm-inline">Password Change</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#logo-change" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="fas fa-image"></i>
                                    <span class="d-none d-sm-inline">Logo Change</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#cursor-effect" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="fas fa-mouse-pointer"></i>
                                    <span class="d-none d-sm-inline">Cursor Effect</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#image-change" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="fas fa-user"></i>
                                    <span class="d-none d-sm-inline">Image Change</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#other-info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-face-profile"></i>
                                    <span class="d-none d-sm-inline">Other Information</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#meta" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-google-plus-box"></i>
                                    <span class="d-none d-sm-inline">
                                        Meta
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content mb-0 border-0">

                            <div class="tab-pane fade" id="password-change">
                                <div class="row">
                                    <div class="col-8 mr-auto">
                                        <form class="form-horizontal" role="form" data-parsley-validate action="{{ route('update-password') }}" id="reset-password-form">
                                            <div class="form-group row">
                                                <label for="old-pass" class="col-sm-4 col-form-label">Old Password*</label>
                                                <div class="col-sm-7" style="position:relative">
                                                    <input id="old-pass" type="password" name="old_password" placeholder="Old Password" required class="form-control">
                        							<span class="parsley-error d-none" id="old-pass-error">Old password is incorrect</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="new-pass" class="col-sm-4 col-form-label">New Password*</label>
                                                <div class="col-sm-7">
                                                    <input id="new-pass" name="password" type="password" placeholder="New Password" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="conf-pass" class="col-sm-4 col-form-label">Confirm Password
                                                    *</label>
                                                <div class="col-sm-7">
                                                    <input data-parsley-equalto="#new-pass" name="password_confirmation" type="password" required
                                                           placeholder="Password" class="form-control" id="conf-pass">
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-8">
                                                    <button type="button" id="pass-submit" class="btn btn-success waves-effect waves-light mr-1">
                                                        <span class="spinner-grow-sm"></span>
                                                        Update password
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane fade" id="logo-change">
                                <div class="row">
                                    <div class="col-md-4 mr-auto">
                                        <form class="form-horizontal" role="form" data-parsley-validate action="{{ route('update-logo') }}" id="update-logo-form">
                                            <div class="form-group row">
                                                <div class="card-box">
                                                    <h4 class="header-title mt-0 mb-3">Update Logo</h4>
                                                    <input type="file" data-parsley-group="image" name="logo"
                                                    data-default-file="{{ session()->get('setting')->logo_url }}" data-allowed-file-extensions="jpg jpeg png gif" class="dropify" data-max-file-size="2M"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="meta-title" class="col-sm-4 col-form-label">Logo Title(EN)</label>
                                                <div class="col-sm-8">
                                                    <input id="meta-title" value="{{ $setting->logo_title }}" type="text" name="logo_title" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="meta-title" class="col-sm-4 col-form-label">Logo Title(AR)</label>
                                                <div class="col-sm-8">
                                                    <input id="meta-title" value="{{ $setting->logo_title_ar }}" type="text" name="logo_title_ar" placeholder="" class="form-control">
                                                </div>
                                            </div>                                            
                                            <div class="form-group row">
                                                <button type="button" id="logo-submit" class="btn btn-success waves-effect waves-light mr-1">
                                                    <span class="spinner-grow-sm"></span>
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane fade" id="image-change">
                                <div class="row">
                                    <div class="col-md-4 mr-auto">
                                        <form class="form-horizontal" role="form" data-parsley-validate action="{{ route('update-avatar') }}" id="update-image-form">
                                            <div class="form-group row">
                                                <div class="card-box">
                                                    <h4 class="header-title mt-0 mb-3">Update Avatar</h4>
                                                    <input type="file" data-parsley-group="image" name="avatar"
                                                    data-default-file="{{ session()->get('user')->img_url }}" data-allowed-file-extensions="jpg png gif" class="dropify" data-max-file-size="2M"/>
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <button type="button" id="avatar-submit" class="btn btn-success waves-effect waves-light mr-1">
                                                    <span class="spinner-grow-sm"></span>
                                                    Update Image
                                                </button>
                                            </div>
                                        </form>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane fade" id="cursor-effect">
                                <div class="row">
                                    <div class="col-md-4 mr-auto">
                                        <form class="form-horizontal" role="form" data-parsley-validate action="{{ route('update-cursor') }}" id="update-cursor-form">
                                            <div class="form-group row">
                                                <label for="cursor_effect" class="col-sm-4 col-form-label">Cursor Effect</label>
                                                <div class="col-sm-8">
                                                    <input type="checkbox" id="cursor_effect" {{ ($setting->cursor_effect == 1) ? 'checked' : '' }} data-plugin="switchery" data-color="green"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <button type="button" id="submit" class="btn btn-success waves-effect waves-light offset-sm-4 mr-1">
                                                    <span class="spinner-grow-sm"></span>
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>

                            <div class="tab-pane fade" id="other-info">
                                <div class="row">
                                    <div class="col-8 mr-auto">
                                        <form class="form-horizontal" data-parsley-validate role="form" action="{{ route('update-other-info') }}" id="update-other-form">
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label">Email*</label>
                                                <div class="col-sm-7">
                                                    <input id="email" type="email" value="{{ $setting->email }}" parsley-type="email" name="email" placeholder="Email" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-4 col-form-label">Address*</label>
                                                <div class="col-sm-7">
                                                    <textarea id="address" rows="4" name="address" required class="form-control">{{ $setting->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="officetel" class="col-sm-4 col-form-label">Office Tel*</label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="{{ $setting->office_tel }}"  name="office_tel" required placeholder="+971 4 368 6364" class="form-control" id="officetel">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fax" class="col-sm-4 col-form-label">Fax*</label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="{{ $setting->fax }}" name="fax" required placeholder="+971 4 368 6412" class="form-control" id="fax">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="facebook" class="col-sm-4 col-form-label">Facebook</label>
                                                <div class="col-sm-7">
                                                    <input type="url" value="{{ $setting->facebook }}" name="facebook" parsley-type="url" class="form-control" id="facebook" placeholder="Facebook URL">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="linkedin" class="col-sm-4 col-form-label">Linkedin</label>
                                                <div class="col-sm-7">
                                                    <input type="url" value="{{ $setting->linkedin }}" name="linkedin" parsley-type="url" class="form-control" id="linkedin" placeholder="Linkedin URL">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="instagram" class="col-sm-4 col-form-label">Instagram</label>
                                                <div class="col-sm-7">
                                                    <input type="url" value="{{ $setting->instagram }}" name="instagram" parsley-type="url" class="form-control" id="instagram" placeholder="Instagram URL">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tweeter" class="col-sm-4 col-form-label">Tweeter</label>
                                                <div class="col-sm-7">
                                                    <input type="url" value="{{ $setting->tweeter }}" name="tweeter" parsley-type="url" class="form-control" id="tweeter" placeholder="Tweeter URL">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="google_ga_code" class="col-sm-4 col-form-label">Google GA Code</label>
                                                <div class="col-sm-7">
                                                    <textarea id="google_ga_code" rows="4" value="" name="google_ga_code" class="form-control">{{ $setting->google_ga_code }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="google_web_master_code" class="col-sm-4 col-form-label">Google Web Master Code</label>
                                                <div class="col-sm-7">
                                                    <input type="text" value="{{ $setting->google_web_master_code }}" name="google_web_master_code" class="form-control" id="google_web_master_code">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-4 col-sm-8">
                                                    <button type="button" id="other-submit" class="btn btn-success waves-effect waves-light mr-1">
                                                        <span class="spinner-grow-sm"></span>
                                                        Update Info
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                            <div class="tab-pane fade" id="meta">
                                <div class="row">
                                    <div class="col-8 mr-auto">
                                        <form class="form-horizontal" data-parsley-validate role="form" action="{{ route('update-meta-info') }}" id="update-meta-form">
                                            <div class="form-group row">
                                                <label for="meta-title" class="col-sm-2 col-form-label">Title</label>
                                                <div class="col-sm-10">
                                                    <input id="meta-title" value="{{ $setting->landing_meta_title }}" type="text" name="meta_title" placeholder="" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="meta_keys" class="col-sm-2 col-form-label">Keywords</label>
                                                <div class="col-sm-10">
                                                    <input id="meta_keys" value="{{ $setting->landing_meta_keys }}" name="meta_keys" type="text" placeholder="" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="meta_desc" class="col-sm-2 col-form-label">Description</label>
                                                <div class="col-sm-10">
                                                    <input type="text" value="{{ $setting->landing_meta_desc }}" required id="meta_desc" class="form-control" name="meta_desc" placeholder=""/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-8">
                                                    <button type="button" id="meta-submit" class="btn btn-success waves-effect waves-light mr-1">
                                                        <span class="spinner-grow-sm"></span>
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>                                            
                                    </div> <!-- end col -->
                                </div>
                            </div>
                            <div class="clearfix"></div>

                        </div> <!-- tab-content -->
                    </div> <!-- end #btnwizard-->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> 
@endsection
@section('js')
    <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('assets/libs/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/pages/setting.init.js') }}"></script>
@endsection