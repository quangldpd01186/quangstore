<?php 
	session_start();
	include('../admin/conn.php');
	$TDE=$_POST["TDE"];
	$HOTEN=$_POST["HOTEN"];
	$DTHOAI=$_POST["DTHOAI"];
	$DCHI=$_POST["DCHI"];
	$ND=$_POST["NDung"];
	$EMAIL=$_POST["EMAIL"];
	
        $sql= "INSERT INTO `lienhe` (`tieude`,`hovaten`,`dienthoai`,`diachi`,`email`,`noidung`) 
	VALUES('$TDE','$HOTEN','$DTHOAI','$DCHI','$EMAIL','$ND')";
        mysqli_query($conn,$sql);
       
       
?>
