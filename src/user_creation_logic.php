<?php

try {
    if (!empty($_POST)) {
        /*экранируем*/
        $password = htmlspecialchars($_POST["password"]);
        $confirm_password = htmlspecialchars($_POST["confirm_password"]);
        $email = htmlspecialchars($_POST["user_email"]);
        $name = htmlspecialchars($_POST["user_name"]);
        /*проверяем, что пароли совпадают */
        if ($password === $confirm_password) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            /*делаем запрос на добавление в базу*/
            try {
                $sql = "INSERT INTO users(email, password, name) VALUES ('$email', '$password', '$name')";

                if ($connection->query($sql) === true) {
                    $success_message = "Успешно добавлено!";
                };

            /* ловим ошибку sql */
            } catch (Exception $exception) {
                $exception = "Ошибка добавления в базу данных! Попробуйте снова";
            }
            /* ловим ошибку с паролями */
        } else {
            throw new Exception("Ошибка! Пароли не совпадают!");
        }
    }
} catch (Exception $exception) {
    $exception = $exception->getMessage();
}
