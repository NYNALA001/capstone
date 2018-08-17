<?php
include_once('connection.php');
include_once('article.php');

$article = new Article;


if (isset($_GET['edit'])){
    
    $edit = $_GET['edit'];
    $data = $article->fetch_data($edit);

    $query = $pdo->prepare("DELETE FROM `articles` WHERE `article_id` = '$edit';");
    $query->execute();
header('location: ../dashboard.php');
}
?>