<?php

$token = bin2hex(random_bytes(16));

$city = $_POST['city'] ?? '';
$course = $_POST['course'] ?? '';
$children = $_POST['children'] ?? ''; // поле с name="children" в форме
$birth_date = $_POST['birth_date'] ?? ''; // точно birth_date, как в форме
$salutation = $_POST['salutation'] ?? '';
$parent_name = $_POST['parent_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';

$data = [
    'city' => $city,
    'course' => $course,
    'children' => $children,
    'birth_date' => $birth_date,
    'salutation' => $salutation,
    'parent_name' => $parent_name,
    'email' => $email,
    'phone' => $phone,
    'token' => $token,
    'status' => 'Registered without messenger'
];

$webhookUrl = 'http://46.101.132.9:5678/webhook-test/46815075-978a-4590-9eed-0f3a26f8284d';

$options = [
    'http' => [
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ],
];
$context = stream_context_create($options);
file_get_contents($webhookUrl, false, $context);

header("Location: messenger.html?token=" . $token);
exit();
?>
