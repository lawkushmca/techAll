@extends('admin.layouts.main')

@section('title', 'Log In')

@section('content')

    <div class="container">
        <div class="form-wrapper row">

            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                You are logged in, Dashboard
            </div>

        </div>
    </div>
@endsection
