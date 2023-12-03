<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New OTP Received</title>
</head>
<body>
<div style="max-width: 600px; margin: auto; padding: 20px; font-family: 'Arial', sans-serif;">

    <h2 style="text-align: center; color: #3498db;">Confirm OTP to Log In</h2>

    <p style="font-size: 16px; color: #444;">
        Dear {{ $emailData['name'] }},
    </p>

    <p style="font-size: 16px; color: #444;">
        You have received a one-time passcode (OTP) to log into your Tech4All account. Please use the following OTP for authentication:
    </p>

    <div style="background-color: #3498db; color: #fff; padding: 10px; text-align: center; font-size: 24px; margin: 20px 0;">
        <strong>{{ $emailData['otp'] }}</strong>
    </div>

    <p style="font-size: 16px; color: #444;">
        This OTP is valid for a single use and should not be shared with anyone. If you didn't request this OTP, please ignore this email.
    </p>

    <p style="font-size: 16px; color: #444;">
        Thank you,
        <br>
        Tech4All
    </p>

</div>
</body>
</html>
