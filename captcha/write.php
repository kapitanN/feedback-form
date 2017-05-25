<?php
	session_start();
	if (md5($_POST['captcha']) == $_SESSION['randomnr2'])	{
			$_SESSION['status'] = "";
	}	else {
        $_SESSION['status'] = "Maybe you are a robot. Try again.";
	}
header('Location: ../index.php');
?>