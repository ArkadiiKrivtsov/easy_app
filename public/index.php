<?php
/* запускаем сессию*/
session_start();
/*включаем вывод ошибок на экран */
error_reporting(E_ALL);
ini_set('display_errors', true);
/*создаем константы-путь до файла */
define('APP_DIR', dirname(__DIR__));
const PAGE_DIR = '\public\templates\pages\\';

/*подключаемся к БД */
require_once APP_DIR . '\src\database.php';

/*проверяем подключение к БД, иначе смысл запускаться */
if (!$isDatabaseConnect) {
    include APP_DIR . PAGE_DIR . 'errors\500.php';
} else {
    /*подключаем роутер */
    require_once APP_DIR . '\src\router.php';
}
