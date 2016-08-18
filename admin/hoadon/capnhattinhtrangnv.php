<?php
	session_start();
	// Thông tin sản phẩm
	$MaDonHang=$_POST["MaDonHang"];
	$TinhTrang=$_POST["TinhTrangDonHang"];
	$NgayHuy=date("d/m/Y");
	
	include('./../conn.php');
	mysqli_query($conn,"UPDATE hoadon SET TinhTrang='$TinhTrang', NgayXong='$NgayHuy' WHERE MaHD='$MaDonHang'");
	header("Location:./../hoadonnv.php#tinhtrang$MaDonHang")

?>