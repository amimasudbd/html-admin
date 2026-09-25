<?php

session_start();


$_SESSION = [];


if (ini_get('session.use_cookies')) {

    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );

}


session_destroy();


$timeout =
    isset($_GET['timeout']) &&
    $_GET['timeout'] === '1';


if ($timeout) {

    header('Location: login.php?timeout=1');

} else {

    header('Location: login.php?logout=1');

}

exit;