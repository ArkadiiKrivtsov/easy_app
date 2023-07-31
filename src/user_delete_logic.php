<?php
if (!empty($_POST)) {
    $idToDelete = $_POST["id"];
    try {
        $sql = "DELETE FROM users WHERE `id` = '$idToDelete'";
        if ($connection->query($sql)) {
            $success_message = 'Пользователь успешно удален';
        } else {
            throw new Exception();
        }
    } catch (Exception $exception) {
        $exception = 'Ошибка удаления пользователя';
    }
}
?>
