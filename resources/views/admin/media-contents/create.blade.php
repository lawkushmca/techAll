@extends('admin.layouts.main')

@section('title', 'Upload Media Content')

@section('content')
    @include('common.page-header', ['pageTitle' => 'Upload Media Content'])

    <div class="container">
        <div class="form-wrapper row">
            <div class="col-md-9">
                <form action="{{ route('admin.media-contents.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        @include('common.form-errors')
                    </div>
                    <!-- Hidden input fields for type and page -->
                    <input type="hidden" name="type" value="{{ $type }}">
                    <input type="hidden" name="page" value="{{ $page }}">

                    @if($type != 'default_description'&& $type != 'default_pic')
                        <div class="form-group row">
                            <label for="title" class="col-md-3 col-form-label text-right pr-0">Title</label>
                            <div class="col-md-9">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
                            </div>
                        </div>
                    @endif

                    @if($type != 'default_pic')
                    <div class="form-group row">
                        <label for="description" class="col-md-3 col-form-label text-right pr-0">Description</label>
                        <div class="col-md-9">
                            <textarea name="description" id="description" class="form-control" placeholder="Enter description" required></textarea>
                        </div>
                    </div>
                    @endif

                    @if($type != 'default_description')
                        <div class="form-group row">
                            <label for="file" class="col-md-3 col-form-label text-right pr-0">File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="form-control pt-1" required>
                            </div>
                        </div>
                    @endif

                    <hr>
                    <div class="form-group row">
                        <div class="offset-md-3 col-md-9">
                            <button type="submit" class="col-sm-4 btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
