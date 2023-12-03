<?php

namespace App\Services;

use App\Mail\EventCanceledNotification;
use App\Mail\EventUpdateNotification;
use App\Mail\InviteNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\Members;

class EmailService
{
    public static function sendInviteNotification($event, $eventType)
    {
        // Retrieve participants' emails from the event data
        $participants = json_decode($event->participants);
        $additionalParticipantEmail = $event->additional_participant;

        $emailData = [
            'event' => $event,
            'eventType' => $eventType,
        ];

        $subject = 'New Meeting Notification';
        $ccEmail = 'ruchir-01@mailinator.com';

        // Send email to each participant
        foreach ($participants as $participant) {
            $emailId = Members::getEmailByMemberId($participant);
            $event['member_name'] = Members::getMemberNameById($participant);
            $mailClass = new InviteNotification($emailData);
            Mail::to($emailId)->cc($ccEmail)->send($mailClass->subject($subject));
        }

        if ($additionalParticipantEmail) {
            $event['member_name'] = "Participant";
            $mailClass = new InviteNotification($emailData);
            Mail::to($additionalParticipantEmail)->send($mailClass->subject($subject));
        }
    }

    public static function sendMeetingUpdateNotification($event, $eventType)
    {
        // Retrieve participants' emails from the event data
        $participants = json_decode($event->participants);
        $additionalParticipantEmail = $event->additional_participant;

        $emailData = [
            'event' => $event,
            'eventType' => $eventType,
        ];

        $subject = 'Meeting Updated';
        $ccEmail = 'ruchir-01@mailinator.com';

        // Send email to each participant
        foreach ($participants as $participant) {
            $emailId = Members::getEmailByMemberId($participant);
            $event['member_name'] = Members::getMemberNameById($participant);
            $mailClass = new EventUpdateNotification($emailData);
            Mail::to($emailId)->cc($ccEmail)->send($mailClass->subject($subject));
        }

        $additionalParticipantEmail = "ruchir-01@mailinator.com";
        if ($additionalParticipantEmail) {
            $event['member_name'] = "Participant";
            $mailClass = new EventUpdateNotification($emailData);
            Mail::to($additionalParticipantEmail)->send($mailClass->subject($subject));
        }
    }

    public static function sendMeetingCancelNotification($event, $eventType)
    {
        // Retrieve participants' emails from the event data
        $participants = json_decode($event->participants);
        $additionalParticipantEmail = $event->additional_participant;

        $emailData = [
            'event' => $event,
            'eventType' => $eventType,
        ];

        $subject = 'Meeting Canceled';
        $ccEmail = 'ruchir-01@mailinator.com';

        // Send email to each participant
        foreach ($participants as $participant) {
            $emailId = Members::getEmailByMemberId($participant);
            $event['member_name'] = Members::getMemberNameById($participant);
            $mailClass = new EventCanceledNotification($emailData);
            Mail::to($emailId)->cc($ccEmail)->send($mailClass->subject($subject));
        }

        if ($additionalParticipantEmail) {
            //$emailId = Members::getEmailByMemberId($participant);
            $event['member_name'] = "Participant";
            $mailClass = new EventCanceledNotification($emailData);
            Mail::to($additionalParticipantEmail)->send($mailClass->subject($subject));
        }
    }

    private static function sendMail($recipient, $event, $eventType)
    {
        // Customize email content
        $emailData = [
            'event' => $event,
            'eventType' => $eventType,
        ];

        // Send email using Laravel Mail facade
        Mail::to($recipient)->send(new InviteNotification($emailData));
    }
}
