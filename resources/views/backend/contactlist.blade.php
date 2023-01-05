@extends('backend.layout')
@section('title', 'Contacts View')
@section('meta')
    <meta content="View Contacts" name="description" />
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
@section('page-title', 'View Contacts')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">

            <table id="selection-datatable" class="table table-bordered table-hover wrap">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th class="text-center">Message</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">CV</th>
                    <th class="text-center">Reply</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>

                <tbody>
                    @foreach ($contacts as $key=> $contact)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $contact->fullname }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>
                                {{ $contact->message }}
                            </td>
                            <td class="text-center">
                                {{ $contact->created_at->format('M d, Y') }}
                            </td>
                            <td class="text-center">
                                <a href="{{ $contact->cv_url }}" target="__blank" class="cv">view</a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('send-reply', $contact->id) }}" data-contact-id="{{ $contact->id }}" class="btn btn-success reply btn-xs">reply</a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('delete-contact', $contact->id) }}" class="btn btn-danger btn-xs delete" id="">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- end row -->
<div id="reply-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">Please reply to customer</h4>
    <div class="custom-modal-text">
        <div class="col-12">
            <form class="form-horizontal" role="form" id="reply-form">
                <div class="form-group row">
                    <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-10">
                        <input id="subject" type="text" name="subject" placeholder="" required class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="message" class="col-sm-2 col-form-label">Message</label>
                    <div class="col-sm-10">
                        <textarea id="content" name="message" rows="5" required class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light send">
                            <span class="spinner-grow-sm"></span>
                            Send
                        </button>
                        <button type="button" onclick="Custombox.modal.close();" class="btn btn-danger waves-effect waves-light">
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
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
    <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>    
    <script src="{{ asset('assets/libs/custombox/custombox.min.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script> --}}
    {{-- <!-- third party js ends --> --}}

    <script src="{{ asset('assets/js/backend/pages/contactlist.init.js') }}"></script>
@endsection