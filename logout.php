<?php
 session_start();
 unset($_SESSION["uid"]);
 session_destroy();
     header('Location: demo1.php');
	 exit();
?>