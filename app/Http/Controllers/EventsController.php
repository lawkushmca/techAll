<?php

namespace App\Http\Controllers;

use App\Helpers\EsUtils;
use App\Models\Members;
use App\Services\EmailService;
use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        if (EsUtils::isAdmin()) {
            $events = Event::orderBy('created_at', 'desc')->paginate(10);
        } else {
            $userId = EsUtils::getUserId();
            $events = Event::where('created_by', $userId)->orderBy('created_at', 'desc')->paginate(10);
        }
        return view('events.index', compact('events'));

    }

    public function create()
    {
        $members = Members::where('status', '!=', 'deleted')->orderBy('name', 'asc')->get();
        return view('events.create', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate(Event::validationRules());

        Event::createEvent($request->all());

        return redirect()->route('events.index')->with('status', 'Meeting created successfully.');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required|integer', // Validate that 'id' is an integer
        ]);

        $eventId = $request->id;
        $event = Event::find($eventId);

        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        $members = Members::where('status', '!=', 'deleted')->orderBy('name', 'asc')->get();

        return view('events.edit', compact('members', 'event'));
    }


    public function update(Request $request)
    {
        $request->validate(Event::validationRules());

        Event::updateEvent($request->all(), $request->id);

        return redirect()->route('events.index')->with('status', 'Meeting updated successfully.');
    }

    public function cancelEvent($id)
    {
        $event = Event::findOrFail($id);

        // Set the status to "canceled"
        $event->status = 'canceled';
        $event->save();

        EmailService::sendMeetingCancelNotification($event, 'Meeting Cancelled');

        //EmailService::previewEmail($event, 'Meeting Cancelled');

        return redirect()->route('events.index')->with('status', 'Meeting canceled successfully.');
    }

    public function getEventHistory(Request $request)
    {
        if ($request->user_id) {
            $request->validate([
                'user_id' => 'required|integer', // Validate that 'id' is an integer
            ]);
            $events = Event::where('created_by', $request->user_id)->orderBy('created_at', 'desc')->get();
            return view('events.history', compact('events'));
        }
    }
}
