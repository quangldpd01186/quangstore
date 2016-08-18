<?php
	session_start();
	$TKhoan=trim($_POST["TKhoan"]);
	$MKhau=trim($_POST["MKhau"]);
	$MKhau1=trim($_POST["MKhau1"]);
	$HTen=$_POST["HTen"];
	$NSinh=$_POST["NSinh"];
	$DChi=$_POST["DChi"];
	$GTinh=$_POST["GTinh"];
	$DThoai=$_POST["DThoai"];
	$Email=$_POST["Email"];
	$VTro="3";
	include('../admin/conn.php');
	// SQL USER
	if(preg_match("/ /",$TKhoan)){
		$_SESSION['ThongB'] = '<span style="color:red">Tài khoản không được có ký tự khoảng cách. </span>';
		header("Location:../dangky.php");
	}else if(preg_match("/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/i",$TKhoan)){
		$_SESSION['ThongB'] = '<span style="color:red">Tài khoản không được gõ dấu tiếng việt. </span>';
		header("Location:../dangky.php");
	}else if(preg_match("/[!~@#$%^&*`,.?<>:;-=+]/i",$TKhoan)){
		$_SESSION['ThongB'] = '<span style="color:red">Không thành công, có chứa ký tự đặc biệt. </span>';
		header("Location:../dangky.php");
	}else if(preg_match("/ /",$MKhau)){
		$_SESSION['ThongB'] = '<span style="color:red">Tài khoản không được có ký tự khoảng cách. </span>';
		header("Location:../dangky.php");
	}else if(preg_match("/[àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđ]/i",$MKhau)){
		$_SESSION['ThongB'] = '<span style="color:red">Tài khoản không được gõ dấu tiếng việt. </span>';
		header("Location:../dangky.php");
	}else if(preg_match("/[!~@#$%^&*`,.?<>:;-=+]/i",$MKhau)){
		$_SESSION['ThongB'] = '<span style="color:red">Không thành công, có chứa ký tự đặc biệt. </span>';
		header("Location:../dangky.php");
	}else{
		if ($MKhau != $MKhau1) {
			$_SESSION['ThongB'] = '<span style="color:red">Mật khẩu không khớp ! </span>';
			header("Location:../dangky.php");
		}else {
			$sql= "INSERT INTO `thanhvien` (`Username`,`PassWord`,`HoTen`,`GioiTinh`,`NgaySinh`,`DiaChi`,`DienThoai`,`Email`,`VaiTro`) 
										VALUES('$TKhoan','$MKhau','$HTen','$GTinh','$NSinh','$DChi','$DThoai','$Email','$VTro')";
			if (mysqli_query($conn,$sql)){
				$_SESSION['ThongB'] =  '';
				header("Location:../index.php");
					$_SESSION['TKhoan'] = $TKhoan;
			}else {
				$_SESSION['ThongB'] =   '<span style="color:red">Tài khoản '.$TKhoan.' hoặc Emial '.$Email.' đã tồn tại. Vui lòng nhập Tài khoản  khác.</span>';
				header("Location:../dangky.php");
			}
		}
	}

?>