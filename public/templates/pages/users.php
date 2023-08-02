<?php
require_once APP_DIR . '/src/user_delete_logic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="shortcut icon" href= "assets/images/icon/favicon.png">

    <!--    подключил библиотеку через js, чтобы вставить иконку user-->
    <script src="https://kit.fontawesome.com/4dc3842015.js" crossorigin="anonymous"></script>

    <title>Пользователи</title>
</head>
<body>
<!--Подключаем флеш сообщения-->
<?php
require_once APP_DIR . PAGE_DIR . 'layout/flash_messages.php';
//Подключаем хэдер
require_once __DIR__ . "/layout/header.php";
?>

<main>
    <form action="/create_user">
        <button class="add_new_user_button">Добавить</button>
    </form>

    <div style="width: 702px; overflow: auto; height: 312px;">
        <table class="table_users_page">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя пользователя</th>
                <th>Email</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM users";
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=$row['name']?></td>
                        <td><?=$row['email']?></td>
                        <td class="delete_user_column">
                            <form action="#" method="post">
                                <button class="delete_button" type="submit" title="Удалить">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    <input type="hidden" name="id" value="<?=$row['id']?>">
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php    }
            }
            ?>

            </tbody>
        </table>
    </div>
</main>
</body>
</html>