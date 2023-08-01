<?php
require_once APP_DIR . '\src\update_settings_logic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="shortcut icon" href= "assets/images/icon/favicon.png">

    <!--    подключил библиотеку через js, чтобы вставить иконку user-->
    <script src="https://kit.fontawesome.com/4dc3842015.js" crossorigin="anonymous"></script>

    <title>Настройки</title>
</head>
<body>
<!--Подключаем флеш сообщения-->
<?php
require_once APP_DIR . PAGE_DIR . 'layout\flash_messages.php';
require_once __DIR__ . '\layout\header.php';
?>

<main>
    <form class="main_form" action="#" method="post">
        <div>
            <label>Access token</label>
            <input class="input_access_token" type="text" name="access_token"
                   value="<?=isset($result) ? $result['access_token'] : ''?>"><br>
        </div>

        <div>
            <label>Передавать остатки</label>
            <input type="checkbox"
                <?=isset($result) && $result['is_transfer_balances'] == 1 ? 'checked' : ''?>
                   name="is_transfer_balances"><br>
        </div>

        <div>
            <label>Передавать цены</label>
            <input class="input_is_transfer_prices" type="checkbox"
                   <?=isset($result) && $result['is_transfer_prices'] == 1 ? 'checked' : ''?>
                   name="is_transfer_prices"><br>
        </div>
        <button type="submit">Сохранить</button>
    </form>
</main>
</body>
</html>