<?php
	session_start();
	include('conn.php');
	if(!isset($_SESSION['NameDN'])){header('location:login.php');}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Administrator</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">
    <link href="../css/animation.css" rel="stylesheet">

  </head>
  <body>
		<!-- ---------------------------------------------------------------------HEDER -->
		<?php include("menu.php");?>
		<!-- END   HEDER -->
		
		<!-- -----------------------------------------------------------------MENU LEFT -->
		<div id="menu-left" class="">
			<p class="helo">Chào, <?php echo $_SESSION['NameDN'];?></a> ! <a href="user/logout.php">Thoát</a></p>
			<div class="danhmucmenu ">
				<h2 class="tendanhmuc">  Hóa đơn</h2>
				<?php 	
							if (	$_SESSION['VTro']==0){
								echo '<h3 class="dmcap1"><a href="hoadon.php"> Quản lý Hóa Đơn</a></h3> ';
							}else {echo '<h3 class="dmcap1"><a href="hoadonnv.php">Hoá đơn - Nhân viên</a></h3> ';}
					?>
				
			</div>
			
		</div>
		<!-- END   MENU LEFT -->

		<!-- -----------------------------------------------------------------CONTENT -->
		<section>
			<div class="content">
				<?php 
					$MaHD=$_GET['mahd'];
				?>
				<div class="main-content" style="padding-bottom:15px;margin-bottom:20px">
					<div class="linksp">
						<a href="">Hóa Đơn</a>  
						<span><i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i> </span>
						
						Chi tiết hóa đơn - <strong><?php echo $MaHD;?></strong>
					</div>
					<div class="adduser">
						<h3 class="nameadd">Chi tiết hóa đơn - <strong style="color:red"><?php echo $MaHD;?></strong></h3>
						
						<div class="listtv" style="margin-top:0;">
							<div class="col-md-1 listtd">STT</div>
							<div class="col-md-1 listtd">Mã HD</div>
							<div class="col-md-4 listtd">Sản phẩm</div>
							
							<div class="col-md-2 listtd">số lượng</div>
							<div class="col-md-2 listtd">thành tiền</div>
							
							<div style="clear:both"></div>
						</div>
						<?php
							$sql=mysqli_query($conn,"SELECT * FROM chitiethd WHERE MaHD='$MaHD'");
							$i=1;
							while ($hoadon=mysqli_fetch_array($sql)){
								$query=mysqli_query($conn,"SELECT * FROM sanpham WHERE MaSP='$hoadon[1]'");
								while ($sanpham=mysqli_fetch_array($query)){
												$MaSP=$sanpham[0];$TenSP=$sanpham[1];
												$DGia=$sanpham[2];$KM=$sanpham[3];$HinhAnh=$sanpham[5];
								}
								if ($i % 2 =='1'){
									echo '
										<div class="listct">
											<div class="col-md-1 listtd">'.$i.'</div>
											<div class="col-md-1 listtd">'.$MaHD.'</div>
											<div class="col-md-4 listtd">
												<div class="col-md-4">
													<img src="../images/sanpham/'.$HinhAnh.'" alt="" style="width:100%;height:80px;"/>
												</div>
												<div class="col-md-8">
													<h4 style="margin:0;font-size:16px">'.$TenSP.'</h4>
												</div>
											</div>
											<div class="col-md-2 listtd">'.$hoadon[2].'</div>
											<div class="col-md-2 listtd">'.$hoadon[3].'</div>
											<div class="col-md-2 listtd">'.number_format($hoadon[4]).' đ </div>
											<div style="clear:both"></div>
										</div>
									';
								}else{
									echo '
										<div class="listct sochan">
											<div class="col-md-1 listtd">'.$i.'</div>
											<div class="col-md-1 listtd">'.$MaHD.'</div>
											<div class="col-md-4 listtd">
												<div class="col-md-4">
													<img src="../images/sanpham/'.$HinhAnh.'" alt="" style="width:100%;height:80px;"/>
												</div>
												<div class="col-md-8">
													<h4 style="margin:0;font-size:16px">'.$TenSP.'</h4>
												</div>
											</div>
											<div class="col-md-2 listtd">'.$hoadon[2].'</div>
											<div class="col-md-2 listtd">'.$hoadon[3].'</div>
											<div class="col-md-2 listtd">'.number_format($hoadon[4]).' đ </div>
											<div style="clear:both"></div>
										</div>
									';
								}
							$i++;
							}
						?>
						
					</div>
					<div class="tongtienchitiet">
						<?php 
							$query=mysqli_query($conn,"SELECT SUM(ThanhTien) FROM chitiethd WHERE MaHD='$MaHD'");
							while ($sanpham=mysqli_fetch_array($query)){
								echo '<p>Tổng tiền : <strong>'.number_format($sanpham[0]).' </strong>đ </p>';
							}
						?>
						
					</div>
					<div class="thongtinkhchitiet">
						<h4>thông tin khách hàng</h4>
						<?php 
							$query1=mysqli_query($conn,"SELECT * FROM hoadon WHERE MaHD='$MaHD'");
							while ($sanpham=mysqli_fetch_array($query1)){
								$NguoiNhan=$sanpham[1];
							}
							$query2=mysqli_query($conn,"SELECT * FROM nguoinhan WHERE Username='$NguoiNhan'");
							while ($sanpham=mysqli_fetch_array($query2)){
								echo '
									<p><span>Khách hàng </span>:<strong>'.$sanpham[1].'</strong></p>
									<p><span>Địa chỉ </span>:<strong>'.$sanpham[2].'</strong></p>
									<p><span>Điện thoại </span>:<strong>'.$sanpham[3].'</strong></p>
									<p><span>Ngày mua </span>:<strong>'.date("d/m/Y",strtotime($sanpham[4])).'</strong></p>
								';
							}
						?>
					</div>
				</div>
			</div>
			
		</section>
		<script>
			function xacnhan(){
				 return confirm("Sau khi cập nhật sẽ không thể chỉnh sửa, bạn chắc chắn cập nhật?")
			}
			 
		</script>
		
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
  </body>
</html>