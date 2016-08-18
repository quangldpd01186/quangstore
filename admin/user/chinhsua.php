<?php

	$UName=$_POST["UName"];
	$PWord=$_POST["PWord"];
	$HTen=$_POST["HTen"];
	$NSinh=$_POST["NSinh"];
	$DChi=$_POST["DChi"];
	$GTinh=$_POST["GTinh"];
	$VTro=$_POST["VTro"];
	$DThoai=$_POST["DThoai"];
	$Email=$_POST["Email"];
	
	include('./../conn.php');
	
	if (empty($HTen) or empty($NSinh) or empty($DChi) or empty($DThoai) or empty($Email)) {echo '<span style="color:red">Vui lòng nhập thông tin cần cập nhật .</span>';}
	else {
		$sql=mysqli_query($conn,"UPDATE thanhvien SET PassWord='$PWord', HoTen='$HTen',GioiTinh='$GTinh',
															NgaySinh='$NSinh',DiaChi='$DChi',DienThoai='$DThoai',
															Email='$Email',VaiTro='$VTro' WHERE Username='$UName'");
		echo '<span style="color:green">Cập nhật thành công .</span>';
		
	}
	mysqli_close($conn);
	
?>