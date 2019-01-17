<?php
session_start();
$connection = new PDO('mysql:host=localhost; dbname=academy; charset=utf8', 'root', '');
$fullinfo = $connection->query("SELECT * FROM `admin`");
if ($_POST['login']) {
    foreach ($fullinfo as $info) {
        if ($_POST['login'] == $info['login'] && $_POST['password'] == $info['password']) {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            header('Location: admin.php');
        }
    }
    echo "Неверный логин или пароль";
}
?>

<form method="POST">
    <p>Авторизуйтесь</p>
    <p><input type="text" name="login" placeholder="Логин" required></p>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <p><input type="submit" placeholder="Авторизация"></p>
</form>