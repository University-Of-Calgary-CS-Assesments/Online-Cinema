<!DOCTYPE html>
<html>
<head>
    <title>New Ticket Created</title>
</head>
<body>
<h1>New Ticket Created</h1>
<p>Dear {{ \Illuminate\Support\Facades\Auth::user()->name }},</p>
<p>A new ticket has been created for the following movie:</p>
<ul>
    <li><strong>Title:</strong> {{ $data['title'] }}</li>
    <li><strong>Show Time:</strong> {{ \Carbon\Carbon::createFromTimestamp($data['showTime'])->format('Y - m - D') }}</li>
    <li><strong>Cinema:</strong> {{ $data['theater'] }}</li>
    <li><strong>Address:</strong> {{ $data['address'] }}</li>
    <li><strong>Seat Number:</strong> {{ $data['seat'] }}</li>
    <li><strong>Ticket Price:</strong>${{ $data['price'] }}</li>
</ul>
<p>Thank you for your purchase!</p>
</body>
</html>

