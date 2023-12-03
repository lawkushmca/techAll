@extends('admin.layouts.main')

@section('title', 'Configuration')

@section('content')
    @include('common.page-header', ['pageTitle' => 'Configure Site Content'])

    <div class="container">

        <div class="form-wrapper row">

            <div class="col-md-9">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($mediaContents as $content)
                        <tr>
                            <td>
                                <img src="{{ asset($content->file_path) }}" alt="{{ $content->title }}" style="max-width: 50px; max-height: 50px;">
                            </td>
                            <td>{{ Str::limit($content->title, 20) }}</td>
                            <td>{{ Str::limit($content->description, 20) }}</td>
                            <td>{{ $content->type === 'foundation' ? "Foundation" : 'Success Story' }}</td>

                            <td>
                                <a href="{{ route('admin.media-contents.edit', $content->id, ['page' => $page]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.media-contents.delete', $content->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this media content?')">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-3">
                <h4 class="page-subtitle row mt-0">
                    Add Content
                </h4>
                <div class="content-type-links">
                    <div class="form-group">
                        <a href="{{ route('admin.media-contents.create', ['page' => $page, 'type' => 'foundation']) }}"><i class="fas fa-building pr-1"></i> Foundation</a>
                    </div>
                    <div class="form-group">
                        <a href="{{ route('admin.media-contents.create', ['page' => $page, 'type' => 'success_story']) }}"><i class="fas fa-trophy pr-1"></i> Success Story</a>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<a href="{{ route('admin.media-contents.create', ['page' => $page, 'type' => 'video']) }}"><i class="fas fa-video pr-1"></i> Video Content</a>--}}
                    {{--</div>--}}
                </div>
            </div>

        </div>
    </div>
@endsection
