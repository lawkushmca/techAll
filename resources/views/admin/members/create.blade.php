@extends('admin.layouts.main')

@section('title', 'Add Member')

@section('content')
    @include('common.page-header', ['pageTitle' => 'Add Member'])

    <div class="container">
        <div class="form-wrapper row">

            <div class="col-md-6">

                {{--<h3 class="page-subtitle row">Add Member</h3>--}}
                <form action="{{ route('members.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        @include('common.form-errors')
                    </div>
                    @include('admin.members._form-member', ['editMode' => false])

                            <!-- Add more fields as needed -->
                    <hr>
                    <div class="form-group row">
                        <div class="offset-md-3 col-md-6">
                            <button type="submit" class="btn btn-primary">Add Member</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
