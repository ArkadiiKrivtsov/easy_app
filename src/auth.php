<?php

try {
    if (!empty($_POST)) {
        $email = $_SESSION["user_email"] = htmlspecialchars($_POST["email"]);
        $password = $_SESSION["password"] = htmlspecialchars($_POST["password"]);
        $sql = "SELECT * FROM users WHERE `email` = '$email'";
        $query_result = $connection->query($sql)->fetch_assoc();

        /*проверяем введенный пароль*/
        if (isset($query_result['password']) && password_verify($password, $query_result['password'])) {
            $_SESSION['isUserVerifyed'] = true;
            $_SESSION['user_email'] = $query_result['email'];
            $_SESSION['user_name'] = $query_result['name'];
            header("Location: /goods");
            exit( );
        } else {
            throw new Exception();
            $_SESSION['isUserVerifyed'] = false;
            $pageDir = APP_DIR . PAGE_DIR . 'login.php';
        }
    }
} catch (Exception $exception) {
    $exception = 'Такой комбинации email и пароль не существует';
    $_SESSION['isUserVerifyed'] = false;
    $pageDir = APP_DIR . PAGE_DIR . 'login.php';
}
?>
