<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact Message</title>
</head>
<body>
<h2>New contact message</h2>
<p><strong>Name:</strong> <?php echo e($contact->name); ?></p>
<p><strong>Email:</strong> <?php echo e($contact->email); ?></p>
<p><strong>Subject:</strong> <?php echo e($contact->subject); ?></p>
<p><strong>Message:</strong></p>
<p><?php echo e(nl2br(e($contact->message))); ?></p>
<p><small>IP: <?php echo e($contact->ip); ?></small></p>
<p><small>Submitted at <?php echo e($contact->created_at); ?></small></p>
</body>
</html>
<?php /**PATH /var/www/html/contact-app/resources/views/emails/contact_message.blade.php ENDPATH**/ ?>