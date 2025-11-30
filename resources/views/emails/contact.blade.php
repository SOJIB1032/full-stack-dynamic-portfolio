<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact</title>
</head>
<body>
    <p>You have a new message from your portfolio site:</p>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Subject:</strong> {{ $contact->subject }}</p>
    <p><strong>Message:</strong></p>
    <p>{!! nl2br(e($contact->message)) !!}</p>
</body>
</html>
