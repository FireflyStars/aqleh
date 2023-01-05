@extends('backend.layout')
@section('title', 'Aqleh Admin Panel')
@section('meta')
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
@endsection
@section('css')
    
@endsection
@section('page-title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <blockquote class="card-bodyquote mb-0">
                            <h5 class="card-title text-white">Total Projects</h5>
                            <p class="h2 text-center text-white">{{ $project_counts }}</p>
                            <footer class="blockquote-footer text-white-50"><a href="{{ route('show-project') }}" class="text-white h5">view</a>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-pink">
                    <div class="card-body">
                        <blockquote class="card-bodyquote mb-0">
                            <h5 class="card-title text-white">Total Clients</h5>
                            <p class="h2 text-center text-white">{{ $client_counts }}</p>
                            <footer class="blockquote-footer text-white-50"><a href="{{ route('show-client') }}" class="text-white h5">view</a>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <blockquote class="card-bodyquote mb-0">
                            <h5 class="card-title text-white">Total News</h5>
                            <p class="h2 text-center text-white">{{ $news_counts }}</p>
                            <footer class="blockquote-footer text-white-50"><a href="{{ route('show-news') }}" class="text-white h5">view</a>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <blockquote class="card-bodyquote mb-0">
                            <h5 class="card-title text-white">Total Contacts</h5>
                            <p class="h2 text-center text-white">{{ $contact_counts }}</p>
                            <footer class="blockquote-footer text-white-50"><a href="{{ route('show-contact') }}" class="text-white h5">view</a>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    
@endsection