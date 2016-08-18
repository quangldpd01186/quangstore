<?php
	session_start();
	session_unset($_SESSION['TKhoan']);
	session_destroy();
	header('Location:../')

?>