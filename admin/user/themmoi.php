<?php

	$UName=$_POST["UName"];
	$PWord=$_POST["PWord"];
	$HTen=$_POST["HTen"];
	$NSinh=$_POST["NSinh"];
	$DChi=$_POST["DChi"];
	
	$DThoai=$_POST["DThoai"];
	$Email=$_POST["Email"];
	
	include('./../conn.php');
	// SQL USER
	if (empty($UName)) {echo '<span style="color:red">Vui lòng nhập Username</span>';}
	else if (empty($PWord)) {echo '<span style="color:red">Vui lòng nhập PassWord</span>';}
	else if (!isset($_POST["GTinh"])) {echo '<span style="color:red">Bạn chưa chọn Giới Tính</span>';}
	else if (!isset($_POST["VTro"])) {echo '<span style="color:red">Hãy chọn Vai Trò cho User </span>';}
	else {
		$GTinh=$_POST["GTinh"];
		$VTro=$_POST["VTro"];
		$sql= "INSERT INTO `thanhvien` (`Username`,`PassWord`,`HoTen`,`GioiTinh`,`NgaySinh`,`DiaChi`,`DienThoai`,`Email`,`VaiTro`) 
									VALUES('$UName','$PWord','$HTen','$GTinh','$NSinh','$DChi','$DThoai','$Email','$VTro')";
		if (mysqli_query($conn,$sql)){
			echo '<span style="color:green">Tạo mới thành công Username : '.$UName.' , PassWord : '.$PWord.' </span>';
		}else {echo '<span style="color:red">Username đã tồn tại. Vui lòng nhập Username khác.</span>';}
	}

?>