<?php
require "../configs/config.php";

$name  = $_POST['name'];
$email  = $_POST['email'];
$homepage  = $_POST['homepage'];
$userIp  = $_SERVER['REMOTE_ADDR'];
$browser  = $_SERVER['HTTP_USER_AGENT'];
$message = $_POST['message'];
$publicationDate = date("Y-m-d H:i:s");

$addMessageStatement = $connection->prepare("INSERT INTO `messages` (`name`, `email`,`homepage`,`message`, `publication_date`,`user_ip`,`browser`)
VALUES (:name, :email, :homepage, :message, :publicationDate, :userIp, :browser)");
$addMessageStatement->bindParam(':name', $name);
$addMessageStatement->bindParam(':email', $email);
$addMessageStatement->bindParam(':homepage', $homepage);
$addMessageStatement->bindParam(':message', $message);
$addMessageStatement->bindParam(':publicationDate', $publicationDate);
$addMessageStatement->bindParam(':userIp', $userIp);
$addMessageStatement->bindParam(':browser', $browser);
$addMessageStatement->execute();

?>