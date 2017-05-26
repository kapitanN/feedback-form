<?php
require "../configs/config.php";
include "../entities/Message.php";

$getMessagesStatement  = $connection->query('SELECT * FROM `messages` ORDER BY `publication_date` DESC LIMIT 5');
$getMessagesStatement->setFetchMode(PDO::FETCH_CLASS, 'Message');

?>

