<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact Message</title>
</head>
<body>
<h2>New contact message</h2>
<p><strong>Name:</strong> {{ $contact->name }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>
<p><strong>Subject:</strong> {{ $contact->subject }}</p>
<p><strong>Message:</strong></p>
<p>{{ nl2br(e($contact->message)) }}</p>
<p><small>IP: {{ $contact->ip }}</small></p>
<p><small>Submitted at {{ $contact->created_at }}</small></p>
</body>
</html>
