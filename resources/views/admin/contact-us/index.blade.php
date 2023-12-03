@extends('admin.layouts.main')

@section('title', 'Contact us')

@section('content')
    @include('common.page-header', ['pageTitle' => 'Contact Us Forms'])

    <div class="container">
        <div class="form-wrapper">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12" style="overflow-x: auto;">

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ $model->name }}</td>
                                        <td>{{ $model->email }}</td>
                                        <td>{{ \Carbon\Carbon::parse($model->created_at)->format('d-M-Y H:i:s') }}</td>
                                        <td>
                                            <p>{{ $model->message }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col d-flex justify-content-center mt-3">
                                {{ $models->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
