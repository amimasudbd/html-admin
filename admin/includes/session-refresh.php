<?php

require_once __DIR__ . '/auth.php';

header('Content-Type: application/json');

$_SESSION['last_activity'] = time();

echo json_encode([
    'success' => true
]);

exit;