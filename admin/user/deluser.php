<?php

	session_start();
	$id = $_GET['id'];
	
	include('./../conn.php');
	
	$sql = 'DELETE FROM thanhvien WHERE ID="'.$id.'"';
	//$sql = 'UPDATE tintuc set ThuocTinh="hidden"  WHERE id="'.$id.'"';
	$query = mysqli_query($conn,$sql);
	header('Location:../index.php');
?>