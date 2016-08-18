<?php
	session_start();
	
	$NameDN=$_POST["NameDN"];
	$PassDN=$_POST["PassDN"];
	
	
	include('../admin/conn.php');
	
	// SQL USER
	if (empty($NameDN) or empty($PassDN)){
		echo " Bạn chưa điền tài khoản";
	}else{
		$sql=mysqli_query($conn,"SELECT * FROM thanhvien WHERE Username='$NameDN' AND Password='$PassDN'");
		$check=mysqli_num_rows($sql);
		while ($row=mysqli_fetch_array($sql)){
			$vtr=$row[9];
		}
		if ($check==0){
			echo 'Tên đăng nhập hoặc mật khẩu không đúng.';
		}else{
			$_SESSION['TKhoan']=$NameDN;
			header("Location:../index.php");
		}
	
	}
?>