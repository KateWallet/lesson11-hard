<?php
session_start();
if (!$_SESSION['login'] || !$_SESSION['password']) {
    header('Location: login.php');
    die();
}

if ($_POST['unlogin']) {
    session_destroy();
    header('Location: login.php');
}

if (count($_POST) > 0) {
    header('Location: admin.php');
}

$connection = new PDO('mysql:host=localhost; dbname=academy; charset=utf8', 'root', '');
$data = $connection->query("SELECT * FROM `comments` WHERE moderation='new' ORDER by date DESC");
?>
<h2>Страница администратора</h2>

<form method="post">
    <? foreach ($data as $comment) { ?>
    <select name="<?= $comment['id'] ?>" id="<?= $comment['id'] ?>">
        <option value="ok">Добавить</option>
        <option value="reject">Отклонить</option>
    </select>
    <label for="<?= $comment['id'] ?>">
        <?= $comment['name'] . ' оставил комментарий: "' . $comment['comment'] . "\"<br>"?>
    </label>
        <button>Модерировать</button>
    <? } ?>
</form>

<form method="post">
    <input type="submit" name="unlogin" value="Вернуться на страницу авторизации">
</form>

<?
foreach ($_POST as $num=>$checked) {
    if ($checked == 'ok') {
        $connection->query("UPDATE `comments` SET moderation='ok' WHERE id=$num");
    } else {
        $connection->query("UPDATE `comments` SET moderation='rejected' WHERE id=$num");
    }
}

?>