<?php
	session_start();
	include("../admin/conn.php");

	$HTen=$_POST["HTen"];
	$DChi=$_POST["DChi"];
	$DThoai=$_POST["DThoai"];
	
	//Thông tin thêm vào Hóa Đơn
	$MaHD="";
	$TangHD=0;
	$UName=$_SESSION['TKhoan'];
	$NgayMua=date("Y/m/d");
	$NGiao="N/A";
	$TongTien=$_POST['TongTien'];
	$ThuocTinh=1;
	$NXong="N/A";
	//echo $nc;
	//$end=strlen($nc);
	//$MaSP= substr( $nc,  0, 6);
	//$Size= substr( $nc,  6, $end);
	//echo 'Biên ban đầu - '.$nc;
	//echo '<br> Số ký tự - '.$end;
	//echo '<br> Mã SP - '.$MaSP;
	//echo '<br> SIZE SP - '.$Size;
	$kiemtra=1;
		if(isset($_SESSION['cart']))
		{
			foreach($_SESSION['cart'] as $masp=>$soluong)
			{
				if(isset($masp))
				{
					   $kiemtra=2;
				}
			}
		}
		if ($kiemtra == 2)
		{	
		
			$query=mysqli_query($conn,"SELECT * FROM hoadon");
			if (mysqli_num_rows($query)==0){
				$MaHD="HD001";
			}else {
				$TangHD=mysqli_num_rows($query) +1;
				$MaHD='HD00'.$TangHD;
			}
			$MaNN=$UName.$MaHD;
			//Thêm vào HÓA ĐƠN
			$sql=mysqli_query($conn,"INSERT INTO hoadon VALUES ('$MaHD','$MaNN','$HTen','$NgayMua', '$NGiao', '$TongTien', 'CHOGIAO','$ThuocTinh','$NXong')");
			
			// THÊM VÀO VÓA ĐƠN CHI TIẾT
			foreach($_SESSION['cart'] as $masp=>$soluong){
				$end=strlen($masp);
				$GetSP=substr($masp,  0, 6);
				$GetSize=substr($masp,  6, $end);
				//$item[]=$demo1; $item1[]=$demo2;
				//echo $demo1.'-'; echo $demo2.'<br>';echo $soluong.'<br>';
				//   IN SẢN PHẨM RA
				$query=mysqli_query($conn,"SELECT * FROM sanpham WHERE MaSP='$GetSP'");
				while ($sanpham=mysqli_fetch_array($query)){
						$MaSP=$sanpham[0];$TenSP=$sanpham[1];
						$DGia=$sanpham[2];$KM=$sanpham[3];$HinhAnh=$sanpham[5];
				}
				if($KM != 0){	$TTien=$KM*$soluong;}else{$TTien=$DGia*$soluong;}
				$sql=mysqli_query($conn,"INSERT INTO chitiethd VALUES ('$MaHD','$MaSP','$GetSize','$soluong','$TTien')");
			}
			// THÔNG TIN NGUOI NHAN
			$MaNN=$UName.$MaHD;
			$sql=mysqli_query($conn,"INSERT INTO nguoinhan VALUES ('$MaNN','$HTen','$DChi','$DThoai','$NgayMua')");
			$_SESSION['thankkh']="<style>#sucdathang {display:block !important;}body{overflow:auto;}</style>";
			header("location:../shopcart.php");
		}
	if ($sql==1){echo "OK";}

?>