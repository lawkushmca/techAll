<?php

namespace App\Models;

use App\Services\EmailService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\EsUtils;


class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'title',
        'description',
        'start_date',
        'end_date',
        'link',
        'participants',
        'additional_participant',
        'status'
    ];

    public function member()
    {
        return $this->belongsTo(Members::class);
    }

    public static function validationRules()
    {
        return [
            'title' => 'required|min:3|max:128',
            'description' => 'required|min:3|max:3000',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'link' => 'required|min:3|max:128',
            'participants' => 'required',
            'additional_participant' => 'nullable|email|min:3|max:128'
            // Add more validation rules as needed
        ];

    }

    public static function createEvent($data)
    {
        $userId = EsUtils::getUserId();
        $participants = json_encode($data['participants']);

        $eventData = [
            'title' => $data['title'],
            'created_by' => $userId,
            'description' => $data['description'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'link' => $data['link'],
            'participants' => $participants,
            'additional_participant' => $data['additional_participant'],
            'status' => 'active',
            // Add other event attributes as needed
        ];

        // Create a new event
        $event = self::create($eventData);

        EmailService::sendInviteNotification($event, 'Meeting Invitation');

        //EmailService::previewEmail($event, 'Meeting Invitation');
    }

    public static function updateEvent($data, $eventId)
    {
        $participants = json_encode($data['participants']);

        $eventData = [
            'title' => $data['title'],
            'description' => $data['description'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'link' => $data['link'],
            'participants' => $participants,
            'additional_participant' => $data['additional_participant'],
            'status' => 'active',
            // Add other event attributes as needed
        ];

        // Update existing event
        $eventUpdate = self::where('id', $eventId)->update($eventData);

        if ($eventUpdate) {
            $event = Event::where('id', $eventId)->first();
            EmailService::sendMeetingUpdateNotification($event, 'Meeting Updated');
        }
        //EmailService::previewEmail($event, 'Meeting Updated');

    }

}
