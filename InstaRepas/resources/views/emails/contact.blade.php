<!DOCTYPE html>
<html>
<head>
    <title>Nouveau message de contact</title>
</head>
<body>
    <h2>Nouveau message de {{ $details['name'] }} ({{ $details['email'] }})</h2>
    <p><strong>Sujet :</strong> {{ $details['subject'] }}</p>
    <p><strong>Message :</strong> {{ $details['message'] }}</p>
</body>
</html>
