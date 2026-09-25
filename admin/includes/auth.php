<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/html-admin/admin',
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'httponly' => true,
        'samesite' => 'Lax'
    ]);

    session_start();
}

$sessionTimeout = 600;

if (!isset($_SESSION['admin_id'])) {
    header('Location: /html-admin/admin/login.php');
    exit;
}

if (
    isset($_SESSION['last_activity']) &&
    (time() - $_SESSION['last_activity']) > $sessionTimeout
) {
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();

        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'] ?? '',
            $params['secure'],
            $params['httponly']
        );
    }

    session_destroy();

    header('Location: /html-admin/admin/login.php?timeout=1');
    exit;
}

$_SESSION['last_activity'] = time();

require_once __DIR__ . '/db.php';

try {
    $stmt = $conn->prepare("
        SELECT id, username, email, name, status
        FROM admins
        WHERE id = ?
        LIMIT 1
    ");

    $stmt->execute([$_SESSION['admin_id']]);

    $currentAdmin = $stmt->fetch();

    if (!$currentAdmin || (int)$currentAdmin['status'] !== 1) {
        $_SESSION = [];
        session_destroy();

        header('Location: /html-admin/admin/login.php?disabled=1');
        exit;
    }

    $_SESSION['admin_username'] = $currentAdmin['username'];
    $_SESSION['admin_name'] = $currentAdmin['name'];
    $_SESSION['admin_email'] = $currentAdmin['email'];

} catch (PDOException $e) {
    $_SESSION = [];
    session_destroy();

    header('Location: /html-admin/admin/login.php?error=session');
    exit;
}