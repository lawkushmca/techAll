@extends('admin.layouts.main')

@section('title', 'Members')

@section('content')
    @include('common.page-header', ['pageTitle' => 'Members'])

    <div class="container">
        <div class="form-wrapper">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group row">
                        <div class="col-md-4">
                            <!-- Search box -->
                            {{--<form action="" method="GET">--}}
                                {{--<div class="input-group mb-3">--}}
                                    {{--<input type="text" class="form-control" name="search" placeholder="Search Member" value="{{ request('search') }}">--}}
                                    {{--<div class="input-group-append">--}}
                                        {{--<button type="submit" class="btn btn-outline-secondary">Search</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        </div>
                        <div class="col-md-8 text-right">
                            <a href="{{ route('members.create') }}" class="" style="text-transform: uppercase;">Add Member</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12" style="overflow-x: auto;">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Added On</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($members as $member)
                                    <tr>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->user->email }}</td>
                                        <td>{{ \Carbon\Carbon::parse($member->created_at)->format('d-M-Y') }}</td>

                                        <td>
                                            <a href="{{ route('event.history', ['user_id' => $member->user_id]) }}" class="btn btn-info btn-sm mb-2">View Meetings</a>
                                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary btn-sm mb-2">Edit</a>
                                            <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm mb-2" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col d-flex justify-content-center mt-3">
                                {{ $members->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
