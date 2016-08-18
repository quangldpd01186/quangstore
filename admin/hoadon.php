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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Administrator</title>

    <!-- Bootstrap -->
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
			<p class="helo">Chào,<?php echo $_SESSION['NameDN'];?></a> ! <a href="user/logout.php">Thoát</a></p>
			<div class="danhmucmenu ">
				<h2 class="tendanhmuc"> Hóa đơn</h2>
				<h3 class="dmcap1"><a href="hoadon.php">Quản Lý Hóa Đơn</a></h3> 
				<h3 class="dmcap1"><a href="hoadonnv.php">Hóa Đơn - Nhân Viên</a></h3>
                                
				
			</div>
			
		</div>
		<!-- END   MENU LEFT -->

		<!-- -----------------------------------------------------------------CONTENT -->
		<section>
			<div class="content">
				
				<div class="main-content" style="padding-bottom:15px;margin-bottom:20px">
					<div class="linksp">
						<a href="hoadon.php">Hóa Đơn</a>  
						<span><i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i> </span>
						
						Quản lý hóa đơn
					</div>
					<div class="adduser">
						<h3 class="nameadd"> quán lý hóa đơn</h3>
						<p id="baoloi" style="position:relative;"><?php if(!isset($_SESSION['del'])){ $_SESSION['del']="";} else{ echo $_SESSION['del'];}?></p>
						<div class="listtv">
							<div class="col-md-1 listtd">STT</div>
							<div class="col-md-3 listtd">Thông tin HD</div>
							<div class="col-md-4 listtd">Thông tin KH</div>
							<div class="col-md-2 listtd">tình trang</div>
							<div class="col-md-2 listtd">Người giao</div>
							<div style="clear:both"></div>
						</div>
						<?php
							$sql=mysqli_query($conn,"SELECT * FROM hoadon WHERE ThuocTinh='1' ORDER BY MaHD DESC");
							$i=1;
							while ($hoadon=mysqli_fetch_array($sql)){
									if($hoadon[8]=="NA"){$NXong="";}else{$NXong=$hoadon[8];}
									$query=mysqli_query($conn,"SELECT * FROM nguoinhan WHERE Username='$hoadon[1]'");
									while($nguoinhan=mysqli_fetch_array($query)){
										$TeNN=$nguoinhan[1];$DChi=$nguoinhan[2];$DThoai=$nguoinhan[3];$NgayMua=$nguoinhan[4];$MaNN=$nguoinhan[0];
									}
									
									if ($i % 2 != 0){
										echo '
											<div class="listct">
												<div class="col-md-1 listtd ragiua">'.$i.'</div>
												<div class="col-md-3 listtd">
													Mã hóa đơn : <a class="cthdne1" href="hoadon-chitiet.php?mahd='.$hoadon[0].'">'.$hoadon[0].'</a><br>
													Tổng tiền : <strong>'.number_format($hoadon[5]).' đ</strong><br>Ngày mua : '.date("d/m/Y",strtotime($hoadon[3])).'
												</div>
												<div class="col-md-4 listtd">
													<span class="damlen">'.$TeNN.'</span> <br>Địa chỉ :  '.$DChi.'<br>Điện thoại : '.$DThoai.'
												</div>
												
												<div class="col-md-2 listtd ">';
													
														if ($hoadon[6]=="CHOGIAO"){
															echo '
															<form action="hoadon/capnhattinhtrang.php" method="POST" id="tinhtrang'.$hoadon[0].'" class="formhoadonneba">
																<input type="hidden" value="'.$hoadon[0].'" name="MaDonHang">
																<select name="TinhTrangDonHang">
																	<option value="CHOGIAO">Chờ giao hàng</option>
																	<option value="DAGIAO">Đã giao hàng</option>
																	<option value="HUYGIAO">Hủy</option>	
																</select>
																<button href="capnhattinhtrang.php" >Change</button>
															</form>';
														}else if($hoadon[6]=="DAGIAO"){echo'<strong style="color:green">Đã giao hàng</strong><em class="giaohuy">Ngày giao : '.$NXong.'</em>';}
														else {echo'<strong style="color:red">Đã hủy  ( <a class="phdonhang" href="hoadon/phuchoi.php?mahd='.$hoadon[0].'">Phục hồi</a> )</strong><br><em class="giaohuy">Ngày hủy : '.$NXong.'</em><em class="tudong001">Tự động xóa sau 3 ngày.</em>';}
										echo'	
												</div>
												<div class="col-md-2 listtd">';
													if ($hoadon[6]=="CHOGIAO"){
														echo'	<form action="hoadon/capnhatnguoigiao.php" method="POST" id="form'.$hoadon[0].'" class="formhoadonneba">
														<input type="hidden" value="'.$hoadon[0].'" name="MaDonHang">
														<select name="NguoiGiaoHang">';
															if ($hoadon[4]=="N/A"){echo '<option value="">Chọn nhân viên</option>';}
															else {
																$query1=mysqli_query($conn,"SELECT * FROM thanhvien WHERE VaiTro=1 AND Username='$hoadon[4]'");
																while($tv=mysqli_fetch_array($query1)){
																echo '<option class="tuychinh1xi" value="'.$tv[1].'">'.$tv[3].'</option>';
																
																}
															}
															$query1=mysqli_query($conn,"SELECT * FROM thanhvien WHERE VaiTro=1 AND Username <> '$hoadon[4]'");
															while($tv=mysqli_fetch_array($query1)){
																echo '<option class="tuychinh1xi" value="'.$tv[1].'">'.$tv[3].'</option>';
																
															}
										echo '			</select>
														<button href="capnhatnguoigiao.php" >Change</button>
													</form>';
													}else{
														$queryz=mysqli_query($conn,"SELECT * FROM thanhvien WHERE Username='$hoadon[4]'");
																while($tvv=mysqli_fetch_array($queryz)){
																	echo '<p style="padding-left:10px">'.$tvv[3].'</p>';
																}
													}
										echo'	</div>
												<div style="clear:both"></div>
											</div>
												';
									}else{// phần 2
										echo '
											<div class="listct sochan">
												<div class="col-md-1 listtd ragiua">'.$i.'</div>
												<div class="col-md-3 listtd">
													Mã hóa đơn : <a class="cthdne1" href="hoadon-chitiet.php?mahd='.$hoadon[0].'">'.$hoadon[0].'</a><br>
													Tổng tiền : <strong>'.number_format($hoadon[5]).' đ</strong><br>Ngày mua : '.date("d/m/Y",strtotime($hoadon[3])).'
												</div>
												<div class="col-md-4 listtd">
													<span class="damlen">'.$TeNN.'</span> <br>Địa chỉ :  '.$DChi.'<br>Điện thoại : '.$DThoai.'
												</div>
												
												<div class="col-md-2 listtd ">';
													
														if ($hoadon[6]=="CHOGIAO"){
															echo '
															<form action="hoadon/capnhattinhtrang.php" method="POST" id="tinhtrang'.$hoadon[0].'" class="formhoadonneba">
																<input type="hidden" value="'.$hoadon[0].'" name="MaDonHang">
																<select name="TinhTrangDonHang">
																	<option value="CHOGIAO">Chờ giao hàng</option>
																	<option value="DAGIAO">Đã giao hàng</option>
																	<option value="HUYGIAO">Hủy</option>	
																</select>
																<button href="capnhattinhtrang.php" >Change</button>
															</form>';
														}else if($hoadon[6]=="DAGIAO"){echo'<strong style="color:green">Đã giao hàng</strong><em class="giaohuy">Ngày giao : '.$NXong.'</em>';}
														else {echo'<strong style="color:red">Đã hủy ( <a class="phdonhang" href="hoadon/phuchoi.php?mahd='.$hoadon[0].'">Phục hồi</a> )</strong>
																	<br><em class="giaohuy">Ngày hủy : '.$NXong.'</em><em class="tudong001">Tự động xóa sau 3 ngày.</em>';}
										echo'	
												</div>
												<div class="col-md-2 listtd">';
													if ($hoadon[6]=="CHOGIAO"){
														echo'	<form action="hoadon/capnhatnguoigiao.php" method="POST" id="form'.$hoadon[0].'" class="formhoadonneba">
														<input type="hidden" value="'.$hoadon[0].'" name="MaDonHang">
														<select name="NguoiGiaoHang">';
															if ($hoadon[4]=="N/A"){echo '<option value="">Chọn nhân viên</option>';}
															else {
																$query1=mysqli_query($conn,"SELECT * FROM thanhvien WHERE VaiTro=1 AND Username='$hoadon[4]'");
																while($tv=mysqli_fetch_array($query1)){
																echo '<option class="tuychinh1xi" value="'.$tv[1].'">'.$tv[3].'</option>';
																
																}
															}
															$query1=mysqli_query($conn,"SELECT * FROM thanhvien WHERE VaiTro=1 AND Username <> '$hoadon[4]'");
															while($tv=mysqli_fetch_array($query1)){
																echo '<option class="tuychinh1xi" value="'.$tv[1].'">'.$tv[3].'</option>';
																
															}
										echo '			</select>
														<button href="capnhatnguoigiao.php" >Change</button>
													</form>';
													}else{
														$queryz=mysqli_query($conn,"SELECT * FROM thanhvien WHERE Username='$hoadon[4]'");
																while($tvv=mysqli_fetch_array($queryz)){
																	echo '<p style="padding-left:10px">'.$tvv[3].'</p>';
																}
													}
										echo'	</div>
												<div style="clear:both"></div>
											</div>
										';
									} // End Else 
									$i++; 
							} // End While 
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