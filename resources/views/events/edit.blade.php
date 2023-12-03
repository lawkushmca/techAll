<?php
$layout = \App\Helpers\EsUtils::isAdmin() ? 'admin.' : 'employee.';
?>

@extends($layout.'layouts.main')

@section('title', 'Edit Event')

@section('content')
    @include('common.page-header', ['pageTitle' => 'Edit Meeting'])

    <div class="container">
        <div class="form-wrapper row">
            <div class="col-md-9">
                <form action="{{ route('event.update', ['id' => $event->id]) }}" method="POST" class="create-event-form">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        @include('common.form-errors')
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-3 col-form-label text-right pr-0">Title</label>
                        <div class="col-md-9">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" value="{{ $event->title }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-3 col-form-label text-right pr-0">Description</label>
                        <div class="col-md-9">
                            <textarea name="description" id="description" class="form-control" placeholder="Enter description" required>{{ $event->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="start_date" class="col-md-3 col-form-label text-right pr-0">Start Date</label>
                        <div class="col-md-9">
                            <input type="datetime-local" name="start_date" id="start_date" class="form-control" value="{{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d\TH:i') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="end_date" class="col-md-3 col-form-label text-right pr-0">End Date</label>
                        <div class="col-md-9">
                            <input type="datetime-local" name="end_date" id="end_date" class="form-control" value="{{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="meeting_link" class="col-md-3 col-form-label text-right pr-0">Location/Link</label>
                        <div class="col-md-9">
                            <input type="text" name="link" id="id-link" class="form-control" placeholder="Enter meeting location or link" value="{{ $event->link }}">
                        </div>
                    </div>

                    <!-- Existing members for selection -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-right pr-0">Select Members</label>
                        <div class="col-md-9 mt-2">
                            @foreach($members as $member)
                                <div class="form-check">
                                    <input type="checkbox" id="id_participants_{{ $member->id }}" class="form-check-input" name="participants[]" value="{{ $member->id }}" {{ in_array($member->id, json_decode($event->participants)) ? 'checked' : '' }}>
                                    <label for="id_participants_{{ $member->id }}" class="form-check-label">{{ $member->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Additional participants by email -->
                    <div class="form-group row">
                        <label for="additional_participants" class="col-md-3 col-form-label text-right pr-0">Additional Participant</label>
                        <div class="col-md-9">
                            <input type="text" name="additional_participant" id="additional_participant" class="form-control" placeholder="Enter additional participant email" value="{{ $event->additional_participant }}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="offset-md-3 col-md-9">
                            <button type="submit" class="col-sm-4 btn btn-primary mb-1">Update</button>
                            <a href="{{ route('events.index') }}" class="col-sm-4 btn btn-secondary mb-1">Cancel</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
