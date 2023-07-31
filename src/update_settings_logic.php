<?php
$sql = "SELECT * FROM settings";
$result = $connection->query($sql)->fetch_assoc();

try {
    if (!empty($_POST)) {
        $isTransferBalances = isset($_POST["is_transfer_balances"]) ? 1 : 0;
        $isTransferPrices = isset($_POST["is_transfer_prices"]) ? 1 : 0;
        $newAccessToken = strlen($_POST["access_token"]) == 0 ? $result['access_token'] : $_POST["access_token"];

        $sql = "UPDATE settings SET 
                    `access_token` = '$newAccessToken', 
                    `is_transfer_balances` = '$isTransferBalances',
                    `is_transfer_prices` = '$isTransferPrices'";
        if ($connection->query($sql)) {
            $success_message = "Настройки успешно обновлены!";
            header("Location: /settings");
        } else {
            throw new Exception();
        }
    }
} catch (Exception $exception) {
    $exception = "Ошибка обновления настроек!";
}

?>