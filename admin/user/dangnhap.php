<?php
	session_start();
	
	$NameDN=$_POST["NameDN"];
	$PassDN=$_POST["PassDN"];
	
	
	include('./../conn.php');
	
	// SQL USER
	$sql=mysqli_query($conn,"SELECT * FROM thanhvien WHERE Username='$NameDN' AND Password='$PassDN'");
	$check=mysqli_num_rows($sql);
	while ($row=mysqli_fetch_array($sql)){
		$vtr=$row[9];
	}
	if ($check==0){
		$_SESSION['Tbao']= 'Tên đăng nhập hoặc mật khẩu không đúng.';
		header('Location:../login.php');
	}else if ($vtr==0 or $vtr==1){
		$_SESSION['NameDN']=$NameDN;
		$_SESSION['PassDN']=$PassDN;
		$_SESSION['VTro']=$vtr;
		header('Location:../index.php');
	}else{ 
		$_SESSION['Tbao']= 'Bạn không có quyền truy cập.';
		header('Location:../login.php');
	}
	
	mysqli_close($conn);
?>