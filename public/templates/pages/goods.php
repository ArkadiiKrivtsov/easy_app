<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="shortcut icon" href= "assets/images/icon/favicon.png">

    <!--    подключил библиотеку через js, чтобы вставить иконку user-->
    <script src="https://kit.fontawesome.com/4dc3842015.js" crossorigin="anonymous"></script>

    <title>Товары</title>
</head>
<body>
<!--Подключаем флеш сообщения-->
<?php
require_once APP_DIR . PAGE_DIR . 'layout/flash_messages.php';
//Подключаем хэдер
require_once __DIR__ . "/layout/header.php";
?>

<main>

    <div style="width: 702px; overflow: auto; height: 400px;">
        <table class="table_goods_page">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название товара</th>
                <th>Остаток</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM goods";
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['quantity']?></td>
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
