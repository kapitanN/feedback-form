<?php
$sort = $_POST['sort'];

$perPage = 25;
$page = 1;
$sort = $_POST['sort'];
$offset = 0;

if (isset($_GET['page'])){
    $page = (int) $_GET['page'];
}

$totalCountStatement  = $connection->query('SELECT * FROM `messages`');
$totalCount = count($totalCountStatement->fetchAll());
$totalPage = ceil($totalCount/$perPage);
if ($page<=1 || $page > $totalPage){
    $page = 1;
}
$offset = ($perPage*$page)-$perPage;

$getMessagesStatement  = $connection->query("SELECT * FROM `messages` ORDER BY `publication_date` DESC LIMIT $offset,$perPage");
if ($sort == "name"){
    $getMessagesStatement  = $connection->query("SELECT * FROM `messages` ORDER BY `name` LIMIT  $offset,$perPage");
}

if ($sort == "email"){
    $getMessagesStatement  = $connection->query("SELECT * FROM `messages` ORDER BY `email` LIMIT $offset,$perPage");
}

if ($sort == "date"){
    $getMessagesStatement  = $connection->query("SELECT * FROM `messages` ORDER BY `publication_date` LIMIT $offset,$perPage");
}

if ($sort == "date-descending"){
    $getMessagesStatement  = $connection->query("SELECT * FROM `messages` ORDER BY `publication_date` DESC LIMIT $offset,$perPage");
}

$getMessagesStatement->setFetchMode(PDO::FETCH_CLASS, 'Message');
?>