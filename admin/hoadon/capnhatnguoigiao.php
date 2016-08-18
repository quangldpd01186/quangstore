<?php
	session_start();
	// Thông tin sản phẩm
	$MaDonHang=$_POST["MaDonHang"];
	$NguoiGiaoHang=$_POST["NguoiGiaoHang"];
	$NgayGiao=date("d/m/Y");
	include('./../conn.php');
	mysqli_query($conn,"UPDATE hoadon SET NguoiGH='$NguoiGiaoHang', NgayXong='$NgayGiao'  WHERE MaHD='$MaDonHang'");
	header("Location:./../hoadon.php#tinhtrang$MaDonHang")

?>