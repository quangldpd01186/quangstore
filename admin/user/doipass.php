<?php

	$UName=$_POST["UName"];
	$PWord=$_POST["PWord"];
	$PWord1=$_POST["PWord1"];
	
	include('./../conn.php');
	
	if (empty($PWord)) {echo '<span style="color:red">Bạn chưa nhập mật khẩu.</span>';}
	else if  (empty($PWord1) or $PWord != $PWord1){echo '<span style="color:red">Mật khẩu không khớp .</span>';}
	else {
		$sql=mysqli_query($conn,"UPDATE thanhvien SET PassWord='$PWord' WHERE Username='$UName'");
		echo '<span style="color:green">Đổi mật khẩu thành công .</span>';
		
	}
	mysqli_close($conn);
	
?>