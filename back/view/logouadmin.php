<?php

session_start();

if (isset($_SESSION["auth"])) {
	session_destroy();
	header("location: ../../../Front/inc/acceuil.php");
}else{
	header("location: ../../../Front/inc/acceuil.php");
}


?>