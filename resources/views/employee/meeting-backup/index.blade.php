@extends('employee.layouts.main')

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
                    <a href="{{ route('member.event.create') }}" class="" style="text-transform: uppercase;">Add Meeting</a>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group row">
                        @if(count($events))
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th >Title</th>
                                    <th style="width:330px">Duration</th>
                                    {{--<th>Description</th>--}}
                                    <th style="width:200px">Participants</th>
                                    <th style="width:150px">Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->title }}</td>
                                        {{--<td>{{ $event->start_date.' To '.$event->end_date }}</td>--}}
                                        <td>{{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d h:i A').' To '.\Carbon\Carbon::parse($event->end_date)->format('Y-m-d h:i A') }}</td>

                                        {{--<td>{{ Str::limit($event->description, 100) }}</td>--}}

                                        <td>
                                            @foreach (json_decode($event->participants) as $participant)
                                                {{ App\Models\members::getMemberNameById($participant) }}<br>
                                            @endforeach
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.events.edit', ['id' => $event->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                            {{--<form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display: inline-block;">--}}
                                            {{--@csrf--}}
                                            {{--@method('DELETE')--}}
                                            {{--<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>--}}
                                            {{--</form>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <span>
                        No records.
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
