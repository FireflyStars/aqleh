@extends('backend.layout')
@section('title', 'Contact Dealers')
@section('meta')
    <meta content="View Contact Dealers" name="description" />
@endsection
@section('css')
    {{-- <!-- third party css --> --}}
    {{-- <link href="{{ asset('assets/libs/datatables/dataTables.checkboxes.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <!-- third party css end --> --}}
@endsection
@section('page-title', 'Contact Dealers')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">

            <table id="selection-datatable" class="table table-bordered table-hover wrap">
                <thead>
                <tr>
                    <th>No</th>
                    <th class="text-center">Title (EN)</th>
                    <th class="text-center">Title (AR)</th>
                    <th class="text-center">Role (EN)</th>
					<th class="text-center">Role (AR)</th>
					<th class="text-center">Email</th>
					<th class="text-center">Type</th>
					<th class="text-center">Assigned Name</th>
					<th class="text-center">Image</th>
                    <th class="text-center">{{ __('admin.action') }}</th>
                </tr>
                </thead>

                <tbody>
                    @foreach ($managers as $key=> $item)
                        <tr>
                            <td>{{ $key +1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->title_ar }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->role_ar }}</td>
                            <td>{{ $item->email }}</td>
                            <td class="text-capitalize">{{ $item->type }}</td>
                            <td>{{ $item->assigned_name }}</td>
                            <td class="text-center">
                                <img src="{{ $item->img_url }}"  width="100" height="60" alt="" srcset="">
                            </td>
                            <td class="text-center">
                                <a href="{{ route('edit-contact-notification', $item->id) }}" class="btn btn-success btn-xs">Edit</a>
                                <!-- item-->
                                <a href="{{ route('delete-contact-notification', $item->id) }}" class="btn btn-danger btn-xs sa-params" id="">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
@endsection
@section('js')
    {{-- <!-- third party js --> --}}
    {{-- <script src="{{ asset('assets/libs/datatables/dataTables.checkboxes.min.js') }}"></script> --}}
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/custombox/custombox.min.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script> --}}
    {{-- <!-- third party js ends --> --}}

    <script src="{{ asset('assets/js/backend/pages/contact_notification/notification.init.js') }}"></script>
@endsection