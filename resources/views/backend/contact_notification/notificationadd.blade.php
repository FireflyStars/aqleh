@extends('backend.layout')
@section('title', 'Adding Contact Dealer')
@section('meta')
    <meta content="Adding Contact Dealer" name="description" />
@endsection
@section('css')
    {{-- <!-- Plugins css --> --}}
    <link href="{{ asset('assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    @endsection
@section('page-title', 'Adding Contact Dealer')
@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-5">
				<form class="form-horizontal" role="form" id="add-notification-form" action="{{ route('add-post-contact-notification') }}">
					<div class="row">
						<div class="col-12 mr-auto">
							<div class="form-group row">
								<label for="title" class="col-sm-2 col-form-label">Title (EN)*</label>
								<div class="col-sm-7">
									<input id="title" data-parsley-group="general" name="title" type="text" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="title_ar" class="col-sm-2 col-form-label">Title (AR)*</label>
								<div class="col-sm-7">
									<input id="title_ar" data-parsley-group="general" name="title_ar" type="text" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="role" class="col-sm-2 col-form-label">Role (EN)*</label>
								<div class="col-sm-7">
									<input id="role" data-parsley-group="general" name="role" type="text" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="role_ar" class="col-sm-2 col-form-label">Role (AR)*</label>
								<div class="col-sm-7">
									<input id="role_ar" data-parsley-group="general" name="role_ar" type="text" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-sm-2 col-form-label">Email *</label>
								<div class="col-sm-7">
									<input id="email" data-parsley-group="general" name="email" type="text" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="leader_role_ar" class="col-sm-2 col-form-label">Type *</label>
								<div class="col-sm-7">
									<select class="custom-select" id="type-selector" name="type" required>
										<option selected="" disabled>Select Type</option>
										<option value="project">Project</option>	
										<option value="service">Service</option>	
										<option value="client">Client</option>	
										<option value="contactus">Contact Us</option>	
									</select>
								</div>
							</div>
							<div class="form-group row d-none"  data-type="service"  id="service-selector">
								<label for="leader_role_ar" class="col-sm-2 col-form-label">Service Name *</label>
								<div class="col-sm-7">
									<select class="custom-select" name="service_id">
										<option selected="" disabled>Select Service to be assigned</option>
										@foreach ($services as $service)
											<option value="{{ $service->id }}">{{ $service->name }}</option>	
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="image" class="col-sm-2 col-form-label">Image</label>
								<div class="col-sm-4">
									<input type="file" data-parsley-group="general" name="image" data-default-file="" data-allowed-file-extensions="jpg png gif" class="dropify" data-max-file-size="2M" {{-- data-min-width="370" data-min-height="470" --}}/>
								</div>
							</div>                    
							<div class="form-group row">
								<div class="col-sm-9 text-right">
									<button type="button" class="btn btn-success waves-effect waves-light" id="submit">
										<span class="spinner-grow-sm"></span>
										{{ __('admin.create') }}
									</button>
									<a href="{{ route('show-contact-notification') }}" class="btn btn-danger waves-effect waves-light">
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
    <script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/backend/pages/contact_notification/notificationadd.init.js') }}"></script>
@endsection