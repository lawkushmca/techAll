@extends('admin.layouts.main')

@section('title', 'Media Contents')

@section('content')
    @include('common.page-header', ['pageTitle' => 'Media Contents'])

    <div class="container">
        <div class="form-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Visibility</th>
                            <th>Is Default</th>
                            <th>Page</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($mediaContents as $content)
                            <tr>
                                <td>{{ $content->title }}</td>
                                <td>{{ $content->description }}</td>
                                <td>{{ $content->type }}</td>
                                <td>{{ $content->status ? 'Yes' : 'No' }}</td>
                                <td>{{ $content->is_default ? 'Yes' : 'No' }}</td>
                                <td>{{ $content->page }}</td>
                                <td>
                                    <!-- Add actions as needed, e.g., view, edit, delete -->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
