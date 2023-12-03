@extends('admin.layouts.main')

@section('title', 'Upload Media Content')

@section('content')
    @include('common.page-header', ['pageTitle' => 'Configuration'])

    <div class="container">
        <div class="form-wrapper row">
            <div class="col-md-4">
                <h4 class="page-subtitle row">
                    Select Page
                </h4>
                {{--<h4>Select Content Type:</h4>--}}
                <div class="content-type-links">
                    <div class="form-group">
                        <a href="{{ route('admin.media-contents.pages', ['page' => 'achievements']) }}"><i class="fas fa-file-image pr-1"></i> Achievements</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
