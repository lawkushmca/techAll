<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Meeting Invitation</title>
</head>
<body>
<h2>{{ $emailData['eventType'] }}</h2>

<p>
    Dear {{ $emailData['event']->member_name ?? "Participant"}},
</p>

<p>
    You have received a new meeting Invitation. Here are the details:
</p>

<ul>
    <li><strong>Title:</strong> {{ $emailData['event']->title }}</li>
    <li><strong>Description:</strong> {{ $emailData['event']->description }}</li>
    <li><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($emailData['event']->start_date)->format('d-M-Y H:i:s') }}</li>
    <li><strong>End Date:</strong> {{ \Carbon\Carbon::parse($emailData['event']->end_date)->format('d-M-Y H:i:s') }}</li>
    <li><strong>Link:</strong> <a href="{{ $emailData['event']->link }}" target="_blank">{{ $emailData['event']->link }}</a></li>
    <!-- Add more event details as needed -->
</ul>

<p>
    Thank you,
    <br>
    Tech4All
</p>
</body>
</html>
