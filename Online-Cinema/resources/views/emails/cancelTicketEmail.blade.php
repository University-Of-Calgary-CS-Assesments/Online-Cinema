<!DOCTYPE html>
<html>
<head>
    <title>Ticket Cancellation</title>
</head>
<body>
<h1>New Coupon Created</h1>
<p>Dear {{ \Illuminate\Support\Facades\Auth::user()->name }},</p>
<p>Your ticket was cancelled successfully. Your refund is a coupon witht the following Id: {{$data}}</p>
<p>Thank you!</p>
</body>
</html>

