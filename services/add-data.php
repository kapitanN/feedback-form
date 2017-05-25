<?php
require "../configs/config.php";
include_once "../entities/User.php";

$name  = $_POST['name'];
$email  = $_POST['email'];
$homepage  = $_POST['homepage'];
$userIp  = $_SERVER['REMOTE_ADDR'];
$browser  = $_SERVER['HTTP_USER_AGENT'];
$message = $_POST['message'];
$pubdate = date("Y-m-d H:i:s");

$addUserStatement = $connection->prepare("INSERT INTO `users` (`name`, `email`,`homepage`,`user_ip`,`browser`)
VALUES (:name, :email, :homepage, :userIp, :browser)");
$addUserStatement->bindParam(':name', $name);
$addUserStatement->bindParam(':email', $email);
$addUserStatement->bindParam(':homepage', $homepage);
$addUserStatement->bindParam(':userIp', $userIp);
$addUserStatement->bindParam(':browser', $browser);
$addUserStatement->execute();

$addMessageStatement = $connection->prepare("INSERT INTO `messages` (`text`, `pubdate`)
VALUES (:message, :pubdate)");
$addMessageStatement->bindParam(':message', $message);
$addMessageStatement->bindParam(':pubdate', $pubdate);
$addMessageStatement->execute();
?>