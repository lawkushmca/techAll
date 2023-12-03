<?php

namespace App\Http\Controllers\Employee;

use App\Helpers\EsUtils;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        $userId = EsUtils::getUserId();
        $events = Event::where('created_by', $userId)->paginate(10);

        return view('events.index', compact('events'));
    }
}
