@extends('backend.layout')
@section('title', 'News View')
@section('meta')
    <meta content="View News" name="description" />
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
@section('page-title', 'View News')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">

            <table id="selection-datatable" class="table table-bordered table-hover wrap">
                <thead>
                <tr>
                    <th>No</th>
                    <th>{{ __('admin.description') }}</th>
                    <th>{{ __('admin.description') }}</th>
                    <th>{{ __('admin.name') }}(EN)</th>
                    <th>{{ __('admin.name') }}(AR)</th>
                    <th class="text-center">{{ __('admin.image') }}</th>
                    <th class="text-center">Gallery</th>
                    <th class="text-center">{{ __('admin.detail') }}(EN)</th>
                    <th class="text-center">{{ __('admin.detail') }}(AR)</th>
                    <th class="text-center">{{ __('admin.status') }}</th>
                    <th class="text-center">{{ __('admin.action') }}</th>
                </tr>
                </thead>

                <tbody>
                    @foreach ($news as $key=> $item)
                        <tr>
                            <td>{{ $key +1 }}</td>
                            <td>{{ $item->desc }}</td>
                            <td>{{ $item->desc_ar }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->name_ar }}</td>
                            <td class="text-center">
                                <img src="{{ $item->featured_img_url }}"  width="100" height="60" alt="" srcset="">
                            </td>
                            <td class="text-center">
                                <a href="{{ route('show-news-gallery', $item->id) }}" class="btn btn-success btn-xs">Gallery</a>
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0)" class="detail">Detail</a>
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0)" class="detail-ar">Detail</a>
                            </td>
                            <td class="text-center"><label class="badge badge-{{ ($item->status == 1) ? 'success' : 'danger' }} p-1">{{ $item->status == 1 ? 'active' : 'inactive'  }}</label></td>
                            <td class="text-center">
                                <a href="{{ route('edit-news', $item->id) }}" class="btn btn-success btn-xs">Edit</a>
                                <!-- item-->
                                <a href="{{ route('delete-news', $item->id) }}" class="btn btn-danger btn-xs sa-params" id="">Delete</a>
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

    <script src="{{ asset('assets/js/backend/pages/news/newsview.init.js') }}"></script>
@endsection