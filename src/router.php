<?php

try {
    if (!empty($_SERVER['REQUEST_URI'])) {
        $url = $_SERVER['REQUEST_URI'];
    }
    switch ($url) {
        case '/exit':
            $_SESSION = [];
            $success_message = "До скорых встреч!";
            $pageDir = APP_DIR . PAGE_DIR . 'login.php';
            break;
        case '/':
        case '/login':
            if (isset($_SESSION['isUserVerifyed']) && $_SESSION['isUserVerifyed']) {
                $pageDir = APP_DIR . PAGE_DIR . 'goods.php';
            } else {
                $pageDir = APP_DIR . PAGE_DIR . 'login.php';
            }
            break;
        default:
            if (isset($_SESSION['isUserVerifyed']) && $_SESSION['isUserVerifyed']) {
                $pageDir = APP_DIR . PAGE_DIR . trim($url, '/?#') . '.php';
            } else {
                $pageDir = APP_DIR . PAGE_DIR . 'login.php';
            }
            break;
    }

    if (file_exists($pageDir)) {
        include $pageDir;
    } else {
        throw new Exception();
    }

} catch (Exception $exception) {
    include APP_DIR . PAGE_DIR . 'errors\404.php';
}
