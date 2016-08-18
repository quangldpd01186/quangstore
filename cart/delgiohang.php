<?php
	session_start();
	include("../admin/conn.php");
	unset($_SESSION['cart']);
	$_SESSION['dem']=0;
	unset($_SESSION['thankkh']);
	header("Location:../")

?>