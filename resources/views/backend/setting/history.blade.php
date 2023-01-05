@extends('backend.layout')
@section('title', 'Setting Page')
@section('meta')
    <meta content="Aqleh setting page" name="description" />
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
@section('page-title', 'Setting Page')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body p-4">
                    <form class="form-horizontal" role="form" data-parsley-validate action="{{ route('update-history') }}" id="history-form">
                        <div class="form-group row">
                            <label for="project" class="col-sm-2 col-form-label">Project Count*</label>
                            <div class="col-sm-7" style="position:relative">
                                <input id="project" value="{{ $history->project }}" type="text" name="project" placeholder="Enter Project count" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="client" class="col-sm-2 col-form-label">Client Count*</label>
                            <div class="col-sm-7" style="position:relative">
                                <input id="client" value="{{ $history->client }}" type="text" name="client" placeholder="Enter Client count" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hours" class="col-sm-2 col-form-label">Hours*</label>
                            <div class="col-sm-7" style="position:relative">
                                <input id="hours" value="{{ $history->hour }}" type="text" name="hour" placeholder="Enter Hours" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="experience" class="col-sm-2 col-form-label">Experience*</label>
                            <div class="col-sm-7" style="position:relative">
                                <input id="experience" value="{{ $history->experience }}" type="text" name="experience" placeholder="Enter experience" required class="form-control">
                            </div>
                        </div>

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
    <script src="{{ asset('assets/js/backend/pages/history.init.js') }}"></script>
@endsection