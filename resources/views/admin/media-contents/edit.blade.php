<?php
$type = $content->type;
$page = $content->page;
?>

@extends('admin.layouts.main')

@section('title', 'Edit Media Content')

@section('content')
    @include('common.page-header', ['pageTitle' => 'Edit Media Content'])

    <div class="container">
        <div class="form-wrapper row">
            <div class="col-md-9">
                <form action="{{ route('admin.media-contents.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Use the PUT method for updates -->

                    <div class="form-group">
                        @include('common.form-errors')
                    </div>
                    <!-- Hidden input fields for type and page -->
                    <input type="hidden" name="type" value="{{ $type }}">
                    <input type="hidden" name="page" value="{{ $page }}">

                    <div class="form-group row">
                        <label for="title" class="col-md-3 col-form-label text-right pr-0">Title</label>
                        <div class="col-md-9">
                            <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    class="form-control"
                                    placeholder="Enter title"
                                    required
                                    value="{{ old('title', $content->title) }}"
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-3 col-form-label text-right pr-0">Description</label>
                        <div class="col-md-9">
                            <textarea
                                    name="description"
                                    id="description"
                                    class="form-control"
                                    placeholder="Enter description"
                                    required
                            >{{ old('description', $content->description) }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right pr-0">Current Image</label>
                        <div class="col-md-9">
                            @if ($content->file_path)
                                <img src="{{ asset($content->file_path) }}" alt="{{ $content->title }}" style="max-width: 200px; max-height: 200px;">
                                <p>View full Image: <a href="{{ asset($content->file_path) }}" target="_blank">{{ basename($content->file_path) }}</a></p>
                            @else
                                <p>No image uploaded.</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file" class="col-md-3 col-form-label text-right pr-0">New Image (Optional)</label>
                        <div class="col-md-4">
                            <input type="file" name="file" id="file" class="form-control pt-1">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="offset-md-3 col-md-9">
                            <button type="submit" class="col-sm-4 btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
