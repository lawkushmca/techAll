<?php
$layout = \App\Helpers\EsUtils::isAdmin() ? 'admin.' : 'employee.';
$userId = \App\Helpers\EsUtils::getUserId();
?>

@extends($layout.'layouts.main')

@section('title', 'Create Event')

@section('content')
    @include('common.page-header', ['pageTitle' => 'Create Meeting'])

    <div class="container">
        <div class="form-wrapper row">
            <div class="col-md-9">
                <form action="{{ route('event.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        @include('common.form-errors')
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-3 col-form-label text-right pr-0">Title</label>
                        <div class="col-md-9">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-3 col-form-label text-right pr-0">Description</label>
                        <div class="col-md-9">
                            <textarea name="description" id="description" class="form-control" placeholder="Enter description" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="start_date" class="col-md-3 col-form-label text-right pr-0">Start Date</label>
                        <div class="col-md-9">
                            <input type="datetime-local" name="start_date" id="start_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="end_date" class="col-md-3 col-form-label text-right pr-0">End Date</label>
                        <div class="col-md-9">
                            <input type="datetime-local" name="end_date" id="end_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="meeting_link" class="col-md-3 col-form-label text-right pr-0">Location/Link</label>
                        <div class="col-md-9">
                            <input type="text" name="link" id="id-link" class="form-control" placeholder="Enter meeting location or link">
                        </div>
                    </div>

                    <!-- Existing members for selection -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right pr-0">Select Members</label>
                        <div class="col-md-9 mt-2">
                            @foreach($members as $member)
                                @if ($member->user_id != $userId)
                                    <div class="form-check">
                                        <input type="checkbox" id="id_participants_{{ $member->id }}" class="form-check-input" name="participants[]" value="{{ $member->id }}">
                                        <label for="id_participants_{{ $member->id }}" class="form-check-label">{{ $member->name }}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Additional participants by email -->
                    <div class="form-group row">
                        <label for="additional_participants" class="col-md-3 col-form-label text-right pr-0">Additional Participant</label>
                        <div class="col-md-9">
                            <input type="text" name="additional_participant" id="additional_participant" class="form-control" placeholder="Enter additional participant email">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="offset-md-3 col-md-9">
                            <button type="submit" class="col-sm-4 btn btn-primary mb-1">Create Event</button>
                            <a href="{{ route('events.index') }}" class="col-sm-4 btn btn-secondary mb-1">Cancel</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
