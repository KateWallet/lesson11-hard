<?php
session_start();
$connection = new PDO('mysql:host=localhost; dbname=academy; charset=utf8', 'root', '');
$formoderator = $connection->query("SELECT * FROM `moderator`");
if ($_POST['login']) {
foreach ($formoderator as $for) {
if ($_POST['login'] == $for['login'] && $_POST['password'] == $for['password']) {
$_SESSION['login'] = $_POST['login'];
$_SESSION['password'] = $_POST['password'];
header('Location: moderator.php');
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