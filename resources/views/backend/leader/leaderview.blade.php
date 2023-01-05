@extends('backend.layout')
@section('title', 'Leader View')
@section('meta')
    <meta content="View Leader" name="description" />
@endsection
@section('css')
    {{-- <!-- third party css --> --}}
    <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- <!-- third party css end --> --}}
@endsection
@section('page-title', 'View Leader')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">

            <table id="selection-datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>No</th>
                    <th>{{ __('admin.name') }}(EN)</th>
                    <th>{{ __('admin.name') }}(AR)</th>
                    <th>{{ __('admin.leader_role') }}(EN)</th>
                    <th>{{ __('admin.leader_role') }}(AR)</th>
                    <th class="text-center">{{ __('admin.image') }}</th>
                    <th class="text-center">{{ __('admin.action') }}</th>
                </tr>
                </thead>

                <tbody>
                    @foreach ($leaders as $key => $leader)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $leader->name }}</td>
                            <td>{{ $leader->name_ar }}</td>
                            <td>{{ $leader->role }}</td>
                            <td>{{ $leader->role_ar }}</td>
                            <td class="text-center">
                                <img src="{{ $leader->img_url }}" height="60" width="100" alt="" srcset="">
                            </td>
                            <td class="text-center">
                                <a href="{{ route('edit-leader', $leader->id) }}" class="btn btn-success btn-xs">{{ __('admin.edit') }}</a>
                                <!-- item-->
                                <a href="{{ route('delete-leader', $leader->id) }}" class="btn btn-danger btn-xs sa-params delete">{{ __('admin.delete') }}</a>
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
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/custombox/custombox.min.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    {{-- <!-- third party js ends --> --}}

    <script src="{{ asset('assets/js/backend/pages/leader/leaderview.init.js') }}"></script>
@endsection