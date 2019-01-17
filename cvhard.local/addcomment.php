<?php
if ((trim($_POST['comment']) != '' && strpos(trim($_POST['comment']), 'редиска') === false)) {
        $connection = new PDO('mysql:host=localhost; dbname=academy; charset=utf8', 'root', '');
        $comment = htmlspecialchars($_POST['comment']);
        $name = htmlspecialchars($_POST['author']);
        $time = date("Y-m-d H:i:s");
        $safe = $connection->prepare("INSERT INTO `comments` SET name=:name, date='$time', comment=:comment");
        $arr = ['name'=>$name, 'comment'=>$comment];
        $safe->execute($arr);
        header ('Location: index.php');
    }