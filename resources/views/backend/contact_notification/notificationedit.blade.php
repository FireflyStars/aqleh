@extends('backend.layout')
@section('title', 'Edit Contact Dealer')
@section('meta')
    <meta content="Edit Contact Dealer" name="description" />
@endsection
@section('css')
    {{-- <!-- Plugins css --> --}}
    <link href="{{ asset('assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    @endsection
@section('page-title', 'Edit Contact Dealer')
@section('content')

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-5">
				<form class="form-horizontal" role="form" id="edit-notification-form" action="{{ route('update-contact-notification', $manager->id) }}">
					<div class="row">
						<div class="col-12 mr-auto">
							<div class="form-group row">
								<label for="title" class="col-sm-2 col-form-label">Title (EN)*</label>
								<div class="col-sm-7">
									<input id="title" data-parsley-group="general" name="title" value="{{ $manager->title }}" type="text" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="title_ar" class="col-sm-2 col-form-label">Title (AR)*</label>
								<div class="col-sm-7">
									<input id="title_ar" data-parsley-group="general" value="{{ $manager->title_ar }}" name="title_ar" type="text" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="role" class="col-sm-2 col-form-label">Role (EN)*</label>
								<div class="col-sm-7">
									<input id="role" data-parsley-group="general" name="role" value="{{ $manager->role }}" type="text" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="role_ar" class="col-sm-2 col-form-label">Role (AR)*</label>
								<div class="col-sm-7">
									<input id="role_ar" data-parsley-group="general" value="{{ $manager->role_ar }}" name="role_ar" type="text" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-sm-2 col-form-label">Email *</label>
								<div class="col-sm-7">
									<input id="email" data-parsley-group="general" name="email" value="{{ $manager->email }}" type="email" placeholder="" required class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="leader_role_ar" class="col-sm-2 col-form-label">Type *</label>
								<div class="col-sm-7">
									<select class="custom-select" id="type-selector" name="type" required>
										<option disabled>Select Type</option>
										<option value="project" {{ ($manager->type == 'project') ? 'selected' : '' }}>Project</option>	
										<option value="service" {{ ($manager->type == 'service')? 'selected' : '' }}>Service</option>	
										<option value="client" {{ ($manager->type == 'client')? 'selected' : '' }}>Client</option>	
										<option value="contactus" {{ ($manager->type == 'contactus')? 'selected' : '' }}>Contact Us</option>	
									</select>
								</div>
							</div>
							<div class="form-group row {{ ($manager->type == 'service') ? '' : 'd-none' }}"  data-type="service"  id="service-selector">
								<label for="leader_role_ar" class="col-sm-2 col-form-label">Service Name *</label>
								<div class="col-sm-7">
									<select class="custom-select" name="service_id">
										@if($manager->type=='service')
											<option disabled>Select Service to be assigned</option>
											@foreach ($services as $service)
												<option {{ ($manager->assigned_id == $service->id) ? 'selected' : '' }} value="{{ $service->id }}">{{ $service->name }}</option>	
											@endforeach
										@else
											<option selected disabled>Select Service to be assigned</option>
											@foreach ($services as $service)
												<option value="{{ $service->id }}">{{ $service->name }}</option>	
											@endforeach
										@endif
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="image" class="col-sm-2 col-form-label">Image</label>
								<div class="col-sm-4">
									<input type="file" data-parsley-group="general" name="image" data-default-file="{{ $manager->img_url }}" data-allowed-file-extensions="jpg png gif" class="dropify" data-max-file-size="2M" {{-- data-min-width="370" data-min-height="470" --}}/>
								</div>
							</div>                    
							<div class="form-group row">
								<div class="col-sm-9 text-right">
									<button type="button" class="btn btn-success waves-effect waves-light" id="submit">
										<span class="spinner-grow-sm"></span>
										Update
									</button>
									<a href="{{ route('show-contact-notification') }}" class="btn btn-danger waves-effect waves-light">
										Cancel
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
    <script src="{{ asset('assets/js/backend/pages/contact_notification/notificationedit.init.js') }}"></script>
@endsection