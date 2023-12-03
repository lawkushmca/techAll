@extends('admin.layouts.main')

@section('title', 'Edit Member')

@section('content')
    @include('common.page-header', ['pageTitle' => 'Edit Member'])

    <div class="container">
        <div class="form-wrapper row">
            <div class="form-group">
                @include('common.form-errors')
            </div>
            <div class="col-md-6">
                {{--<h2 class="page-subtitle">Edit Member</h2>--}}
                <form action="{{ route('members.update', $member->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Use the PUT method for updates -->

                    @include('admin.members._form-member', ['editMode' => true])

                            <!-- Add more fields as needed -->
                    <hr>
                    <div class="form-group row">
                        <div class="offset-md-3 col-md-6">
                            <button type="submit" class="btn btn-primary">Update Member</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
