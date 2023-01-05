@extends('backend.layout')
@section('title', 'Service View')
@section('meta')
    <meta content="View Service" name="description" />
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
@section('page-title', 'View Service')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">

            <table id="selection-datatable" class="table table-bordered table-hover nowrap">
                <thead>
                <tr>
                    <th>No</th>
                    <th>{{ __('admin.name') }}</th>
                    <th>{{ __('admin.name') }}</th>
                    <th>{{ __('admin.name') }}(EN)</th>
                    <th>{{ __('admin.name') }}(AR)</th>
                    <th class="text-center">{{ __('admin.image') }}</th>
                    <th class="text-center">{{ __('admin.detail') }}(EN)</th>
                    <th class="text-center">{{ __('admin.detail') }}(AR)</th>
                    <th class="text-center">{{ __('admin.status') }}</th>
                    <th class="text-center">{{ __('admin.action') }}</th>
                </tr>
                </thead>

                <tbody>
                    @foreach ($services as $key => $service)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $service->desc }}</td>
                            <td>{{ $service->desc_ar }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->name_ar }}</td>
                            <td class="text-center">
                                <img src="{{ $service->img_url }}" height="60" width="100" alt="" srcset="">
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0)" class="detail">{{ __('admin.detail') }}</a>
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0)" class="detail-ar">{{ __('admin.detail') }}</a>
                            </td>
                            <td class="text-center">
                                <label class="badge badge-{{ ($service->status == 1) ? "success" : 'danger' }} p-1">
                                    {{ ($service->status == 1 ? __('admin.active') : __('admin.inactive')) }}
                                </label>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('edit-service', $service->id) }}" class="btn btn-success btn-xs">{{ __('admin.edit') }}</a>
                                <!-- item-->
                                <a href="{{ route('delete-service', $service->id) }}" class="btn btn-danger btn-xs sa-params delete">{{ __('admin.delete') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
<div id="description-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Description</h4>
    <div class="custom-modal-text">
    </div>
</div>
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

    <script src="{{ asset('assets/js/backend/pages/service/serviceview.init.js') }}"></script>
@endsection