@extends('backend.layout')
@section('title', 'Translation Page')
@section('meta')
    <meta content="Translation page" name="description" />
@endsection
@section('css')
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
@section('page-title', 'Translation Page')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="form-horizontal" role="form" data-parsley-validate action="{{ route('update-translation') }}" id="trans-form">
                        {{-- <div class="form-group row">
                            <label for="home-title" class="col-sm-2 col-form-label">Home Slide Title</label>
                            <div class="col-sm-10" style="position:relative">
                                <textarea  required class="form-control" name="home_bottom_title" id="home-title" rows="1">{{ $trans->home_bottom_title }}</textarea>
                                <textarea  required class="form-control mt-3" name="home_bottom_title" id="" rows="1">{{ $trans->home_bottom_title_ar }}</textarea>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="service" class="col-sm-2 col-form-label">Service Section Summary</label>
                            <div class="col-sm-10" style="position:relative">
                                <textarea  required class="form-control" name="services_summary" id="service" rows="5">{{ $trans->services_summary }}</textarea>
                                <textarea  required class="form-control mt-3" name="services_summary_ar" id="" rows="5">{{ $trans->services_summary_ar }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client" class="col-sm-2 col-form-label">Client Section Summary</label>
                            <div class="col-sm-10" style="position:relative">
                                <textarea  required class="form-control" name="clients_summary" id="client" rows="5">{{ $trans->clients_summary }}</textarea>
                                <textarea  required class="form-control mt-3" name="clients_summary_ar" id="" rows="5">{{ $trans->clients_summary_ar }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="project" class="col-sm-2 col-form-label">Project Section Summary</label>
                            <div class="col-sm-10" style="position:relative">
                                <textarea  required class="form-control" name="projects_summary" id="project" rows="5">{{ $trans->projects_summary }}</textarea>
                                <textarea  required class="form-control mt-3" name="projects_summary_ar" id="" rows="5">{{ $trans->projects_summary_ar }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="news" class="col-sm-2 col-form-label">News Section Summary</label>
                            <div class="col-sm-10" style="position:relative">
                                <textarea  required class="form-control" name="news_summary" id="news" rows="5">{{ $trans->news_summary }}</textarea>
                                <textarea  required class="form-control mt-3" name="news_summary_ar" id="" rows="5">{{ $trans->news_summary_ar }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="leader" class="col-sm-2 col-form-label">Leader Section Summary</label>
                            <div class="col-sm-10" style="position:relative">
                                <textarea  required class="form-control" name="leaders_summary" id="leader" rows="5">{{ $trans->leaders_summary }}</textarea>
                                <textarea  required class="form-control mt-3" name="leaders_summary_ar" id="" rows="5">{{ $trans->leaders_summary_ar }}</textarea>
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="leader" class="col-sm-2 col-form-label">Leader Section Summary</label>
                            <div class="col-sm-10" style="position:relative">
                                <textarea  required class="form-control" name="leader_summary" id="leader" rows="5">{{ $trans->leader_summary }}</textarea>
                                <textarea  required class="form-control mt-3" name="leader_summary_ar" id="" rows="5">{{ $trans->leader_summary_ar }}</textarea>
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-8">
                                <button type="button" id="submit" class="btn btn-success waves-effect waves-light mr-1">
                                    <span class="spinner-grow-sm"></span>
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> 
@endsection
@section('js')
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/pages/trans/trans.init.js') }}"></script>
@endsection