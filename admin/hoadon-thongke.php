<?php
	session_start();
	include('conn.php');
	if(!isset($_SESSION['NameDN'])){header('location:login.php');}
	$sqldel=mysqli_query($conn,"SELECT * FROM hoadon WHERE TinhTrang='HUYGIAO'");
	$TODAY=date("d/m/Y");
	while ($hoadon=mysqli_fetch_array($sqldel)){
		$NgayHuy=date("d/m/Y",strtotime($hoadon[8]));
		$DelDay = date("d/m/Y", strtotime('+3 days',strtotime($NgayHuy)));
		if($TODAY == $DelDay){
			mysqli_query($conn,"UPDATE hoadon SET ThuocTinh='2' WHERE MaHD='$hoadon[0]'");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">
    <link href="../css/animation.css" rel="stylesheet">
	
  </head>
  <body>
		<!--------------------HEDER -->
		<?php include("menu.php");?>
		<!-- END   HEDER -->
		
		<!-- -----------------------------------------------------------------MENU LEFT -->
		<div id="menu-left" class="">
			<p class="helo">Chào, <a href="user-view.php" id="hama"><?php echo $_SESSION['NameDN'];?></a> ! <a href="user/logout.php">Thoát</a></p>
			<div class="danhmucmenu ">
				
				
			</div>
			
		</div>
		<!-- END   MENU LEFT -->

		<!------CONTENT -->
		<section>
			<div class="content">
				
				<div class="main-content" style="padding-bottom:15px;margin-bottom:20px">
					<div class="linksp">
					
						Thống kê
					</div>
					<div class="adduser">
						<h3 class="nameadd"> thống kê</h3>
						<p id="baoloi" style="position:relative;"><?php if(!isset($_SESSION['del'])){ $_SESSION['del']="";} else{ echo $_SESSION['del'];}?></p>
						<div class="thongkeweb">
							<?php 
								$TongSP="";
								$sql=mysqli_query($conn,"SELECT MaHD,COUNT(MaHD),SUM(TongTIen) FROM hoadon WHERE TinhTrang='DAGIAO'");
								while ($hoadon=mysqli_fetch_array($sql)){
										$TongHD=$hoadon[1];$TongTien=$hoadon[2];
										$query=mysqli_query($conn,"SELECT SUM(SoLuong) FROM chitiethd WHERE MaHD='$hoadon[0]'");
										while ($sumsl=mysqli_fetch_array($query)){
											$sumsp=$sumsl[0];
										}
										$TongSP=$TongSP+$sumsp;
								}
								$sql=mysqli_query($conn,"SELECT COUNT(MaHD) FROM hoadon WHERE TinhTrang='HUYGIAO'");
								while ($hoadon=mysqli_fetch_array($sql)){
								$TongHDH=$hoadon[0];}
							?>
							<p> <span>Tổng sản phẩm đã bán</span> : <strong><?php echo $TongSP;?></strong></p>
							<p> <span>Đơn hàng đã thanh toán</span> : <strong><?php echo $TongHD;?></strong></p>
							<p> <span>Đơn hàng đã bị hủy</span> : <strong><?php echo $TongHDH;?></strong></p>
							<p class="tinhtongtienthuve"> <span>Tổng tiền thu về</span> : <strong><?php echo number_format($TongTien).' đ';?></strong></p>
						</div>
					</div>
				</div>
			</div>
			
		</section>
		<script>
			function xacnhan(){
				 return confirm("Sau khi cập nhật sẽ không thể chỉnh sửa, bạn chắc chắn cập nhật?")
			}
			 
		</script>

  </body>
</html>