<?php

require_once __DIR__ . '/includes/db.php';

$username = 'admin';
$email = 'masumamohona2500@gmail.com';
$password = '88968896';
$name = 'Administrator';

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("
    INSERT INTO admins (
        username,
        email,
        password,
        name,
        status
    ) VALUES (?, ?, ?, ?, 1)
");

$stmt->execute([
    $username,
    $email,
    $hashedPassword,
    $name
]);

echo 'Admin created successfully.';