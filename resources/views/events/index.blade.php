<?php
$layout = \App\Helpers\EsUtils::isAdmin() ? 'admin.' : 'employee.';
?>

@extends($layout.'layouts.main')

@section('title', 'Meetings')

@section('content')
    @include('common.page-header', ['pageTitle' => 'Meetings'])

    <div class="container">
        <div class="form-wrapper">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="form-group row">
                <div class="col-md-12 text-right">
                    <a href="{{ route('event.create') }}" class="" style="text-transform: uppercase;">Add Meeting</a>
                </div>
            </div>
            <div class="form-group row">

                <div class="col-md-12" style="overflow-x: auto;">
                    {{--<div class="form-group row">--}}
                        @if(count($events))
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th >Title</th>
                                    <th style="width:180px">Date</th>
                                    <th style="width:160px">Participants</th>
                                    @if(\App\Helpers\EsUtils::isAdmin())
                                        <th style="width:160px">Organizer</th>
                                    @endif
                                    <th style="width:100px">Status</th>
                                    <th style="width:150px">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d-M-Y h:i A') }}</td>
                                        <td>
                                            @foreach (json_decode($event->participants) as $participant)
                                                {{ App\Models\members::getMemberNameById($participant) }}<br>
                                            @endforeach
                                        </td>

                                        @if(\App\Helpers\EsUtils::isAdmin())
                                            <td>{{ $event->created_by != 1 ? App\Models\members::getMemberNameByUserId($event->created_by) : 'admin' }}</td>
                                        @endif
                                        <td>{{ ucfirst($event->status) }}</td>

                                        <td>
                                            <div class="row">
                                                @if($event->status !== 'canceled')
                                                    <a href="{{ route('event.edit', ['id' => $event->id]) }}" class="btn btn-primary btn-sm mr-2 mb-2">Edit</a>
                                                @endif
                                                @if($event->status !== 'canceled' && \App\Helpers\EsUtils::isAdmin())
                                                    <form action="{{ route('event.cancel', ['id' => $event->id]) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel this meeting?')">Cancel</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--<div class="col d-flex justify-content-center mt-3">--}}
                                {{--{{ $events->links('pagination::bootstrap-4') }}--}}
                            {{--</div>--}}
                        @else
                            <span>
                        No records.
                            </span>
                        @endif

                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
