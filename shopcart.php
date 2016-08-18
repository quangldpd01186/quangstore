<?php 
	session_start();
	include('admin/conn.php');
	$_SESSION['LH']="" ;
	$_SESSION['ThongB']="";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Giỏ hàng.</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
	<link href="css/animation.css" rel="stylesheet">
	 <!--Zoom hình-->
		 <!-- Include jQuery. -->
		<script type="text/javascript" src="js/jquery-1.8.1.min.js"></script>
		
        <!-- Include Cloud Zoom CSS. -->
        <link rel="stylesheet" type="text/css" href="css/jetzoom.css" />

        <!-- Include Cloud Zoom script. -->
        <script type="text/javascript" src="js/jetzoom.js"></script>

        <!-- Call quick start function. -->
        <script type="text/javascript">
            JetZoom.quickStart();
        </script>    
		<!-- -->
		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
  </head>
  <body>	
		<div id="sucdathang" style="display:none;">
			<div class="noidungsucdathang">
				<h4><i class="glyphicon glyphicon-ok"></i>ĐẶT HÀNG THÀNH CÔNG</h4>
					<p><i class="glyphicon glyphicon-menu-right"></i> Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi.</p>
					<p><i class="glyphicon glyphicon-menu-right"></i> Thời gian giao hàng từ 5 - 7 ngày.</p>
					<p><i class="glyphicon glyphicon-menu-right"></i> HOTLINE hỗ trợ <strong class="mauxanh"> 0935 890 427</strong>.</p>
					<p class="nuthoatpop1v"><a href="cart/delgiohang.php"><img style="" src="images/btn_thoat.png" alt=""/></a></p>
					<?php echo $_SESSION['thankkh']; ?>
			</div>
		</div>
		<!-- ---------------------------------------------------------------------HEDER -->
		<?php	include('menu.php'); ?>
                <?php include 'menuleft.php';?>
		<!-- -----------------------------------------------------------------CONTENT -->
		<section>
			
			<div class="content" id="chitietsp">
				
				<div class="main-content" style="min-height:400px;">
					<p class="linksp">
						<a href="">Trang chủ</a>  
						<span><i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i> </span>
						Giỏ hàng
					</p>
					
					<div class="ct-chitiet" id="giohang">
						<h3> <i class="glyphicon glyphicon-shopping-cart"></i> GIỎ HÀNG</h3>
						<div class="chitietgh">
							<div class="col-md-1 obj1">STT</div>
							<div class="col-md-4 obj1">SẢN PHẨM</div>
							<div class="col-md-2 obj1">ĐƠN GIÁ</div>
							<div class="col-md-2 obj1">SỐ LƯỢNG</div>
							<div class="col-md-2 obj1">THÀNH TIỀN</div>
							<div class="col-md-1 obj1">XÓA</div>
							
							<div style="clear:both"></div>
						</div>
						 
						
						<?php 
							$i=1;
							$TongTien=0;
							//Duyệt qua mảng Giỏ
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
									foreach($_SESSION['cart'] as $masp=>$soluong){
										$end=strlen($masp);
										$GetSP=substr($masp,  0, 6);
										
										//$item[]=$demo1; $item1[]=$demo2;
										//echo $demo1.'-'; echo $demo2.'<br>';echo $soluong.'<br>';
										//   IN SẢN PHẨM RA
										$query=mysqli_query($conn,"SELECT * FROM sanpham WHERE MaSP='$GetSP'");
										while ($sanpham=mysqli_fetch_array($query)){
												$MaSP=$sanpham[0];$TenSP=$sanpham[1];
												$DGia=$sanpham[2];$KM=$sanpham[3];$HinhAnh=$sanpham[4];
											if ($i % 2 =='1'){
													echo '	
														<div class="chitietgh1">
															<div class="col-md-1 obj2">'.$i.'</div>
															<div class="col-md-4 obj22">
																<div class="col-md-4 dtsp1"><img src="images/sanpham/'.$HinhAnh.'" alt="" style="width:100%" /></div>
																<div class="col-md-8 dtsp1" style="padding-left:15px">
																	<a href="chitiet.php?id='.$MaSP.'"><h4>'.$TenSP.'</h4></a>';
																	
							
													echo '
															</div>
																</div>';
													// ĐƠN GIÁ SẢN PHẢM
													if($KM != 0){			
														echo'	<div class="col-md-2 obj2">'.number_format($KM).' đ</div>';
													}else{
														echo'	<div class="col-md-2 obj2">'.number_format($DGia).' đ</div>';}
													
													echo '
																<div class="col-md-2 obj2">
																<form action="cart/capnhatsl.php" method="GET" id="'.$masp.'" class="CNSLNE">
																	<input type="text" name="SLCN" value="'.$soluong.'">
																	<input type="hidden" name="MAGH" value="'.$masp.'">
																	<button form="'.$masp.'"><i class="glyphicon glyphicon-plus"></i></button>
																</form>
																</div>';
													// TÍNH THÀNH TIỀN
													if($KM != 0){	$TTien=$KM*$soluong;}else{$TTien=$DGia*$soluong;}
													echo '
																<div class="col-md-2 obj2">'.number_format($TTien).' đ</div>
																<div class="col-md-1 obj2 acxoa"><a href="cart/delcart.php?id='.$masp.'"  onclick="return xacnhan()"><i class="glyphicon glyphicon-remove"></i></a></div>
																<div style="clear:both;padding:0"></div>
															</div>';
													
													// LẤY GIÁ TIỀN TỔNG
													$TongTien=$TongTien + $TTien;
											}else {
													echo '	
														<div class="chitietgh1 sochan">
															<div class="col-md-1 obj2">'.$i.'</div>
															<div class="col-md-4 obj22">
																<div class="col-md-4 dtsp1"><img src="images/sanpham/'.$HinhAnh.'" alt="" style="width:100%" /></div>
																<div class="col-md-8 dtsp1" style="padding-left:15px">
																	<a href="chitiet.php?id='.$MaSP.'"><h4>'.$TenSP.'</h4></a>';
																	
													
													echo '
																	</div>
																</div>';
													// ĐƠN GIÁ SẢN PHẢM
													if($KM != 0){			
														echo'	<div class="col-md-2 obj2">'.number_format($KM).' đ</div>';
													}else{
														echo'	<div class="col-md-2 obj2">'.number_format($DGia).' đ</div>';}
													
													echo '
																<div class="col-md-2 obj2">
																<form action="cart/capnhatsl.php" method="GET" id="'.$masp.'" class="CNSLNE">
																	<input type="text" name="SLCN" value="'.$soluong.'">
																	<input type="hidden" name="MAGH" value="'.$masp.'">
																	<button form="'.$masp.'"><i class="glyphicon glyphicon-plus"></i></button>
																</form>
																</div>';
													// TÍNH THÀNH TIỀN
													if($KM != 0){	$TTien=$KM*$soluong;}else{$TTien=$DGia*$soluong;}
													echo '
																<div class="col-md-2 obj2">'.number_format($TTien).' đ</div>
																<div class="col-md-1 obj2 acxoa"><a href="cart/delcart.php?id='.$masp.'"  onclick="return xacnhan()"><i class="glyphicon glyphicon-remove"></i></a></div>
																<div style="clear:both;padding:0"></div>
															</div>';
													
													// LẤY GIÁ TIỀN TỔNG
													$TongTien=$TongTien + $TTien;
											}
											$i++;
										} // END WHILE
										
									} // END FOREACH
									//$str=implode("','",$item); $str1=implode("','",$item1);
									
									
									
							}else{
								 echo '<p class="ghnull">Giỏ hàng rỗng</p>';
									$_SESSION['dem']=0;
								}
						?>
					<div class="tongtien">
						<div class="col-md-4 ttien2">Tổng tiền : <span class="sotientong"><?php if($TongTien!=""){echo number_format($TongTien);}else {echo "0";}?> đ</span></div>
						<div style="clear:both;"></div>
					</div>
					
					<div class="mttt" style=" margin-top:15px;display:<?php if (empty($_SESSION['dem'] )==False){echo 'block';}else{ echo "none";}?>" id="ancainutnaydi">
						<div class="col-md-6 muatiep"></div>
						<div class="col-md-6 thanhtoan">
							<?php 
								if(empty($_SESSION['TKhoan']) == True){
									echo '<a href="#" onclick="clickLogin()"><img style="position:relative" src="images/thanhtoan.png" alt=""/></a>';}
								else {
									echo '<a href="#TTDonHang" onclick="clickThanhtoan()"><img style="position:relative" src="images/thanhtoan.png" alt=""/></a>';
									$namene=$_SESSION['TKhoan'];
									$sql=mysqli_query($conn,"SELECT * FROM thanhvien WHERE Username='$namene'");
									while ($row=mysqli_fetch_array($sql)){
										$HoTen=$row[3];$DiaChi=$row[6];$DienThoai=$row[7];
									}
								}
							?>
							<a href="./"><img src="images/muatiep.png" alt=""/></a>
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>
				<div class="ct-chitiet slideUp" id="TTDonHang" style="display:none;padding-bottom:0;">
					
					<div class="col-md-6 ThanhToanTT">
						<h3> <i class="glyphicon glyphicon-ok"></i> <span style="color:#2389D4">THANH TOÁN </span> TRỰC TIẾP TẠI CỬA HÀNG</h3>
						<p class="lueunni1">Thanh toán trực tiếp tại cửa hàng. Quý khách có thể đến trực tiếp tại cửa hàng để xem hàng và mua sắm.</p>
						<p class="lueunni2">Quang's Store</p>
						<p class="lueunni11"><span> Địa chỉ </span>: <strong>137 Nguyễn Thị Thập, Đà Nẵng</strong></p>
						<p class="lueunni11"><span>Điện Thoại </span>:  <strong style="font-size:18px;color:#2389D4">0934723773</strong></p>
					</div>
					<div class="col-md-6 ThanhToanTT">
						<h3> <i class="glyphicon glyphicon-plane"></i> <span style="color:#2389D4">THANH TOÁN </span> KHI GIAO HÀNG</h3>
						<p class="lueunni1">Thanh toán khi giao hàng. Thời gian giao hàng từ 3 - 5 ngày. Quý khách vui lòng xác nhận thông tin trước khi thanh toán.</p>
						<p class="lueunni2">Thông tin người nhận</p>
						<form action="cart/thanhtoan.php" method="POST" id="thanhtoanForm">
							<p class="lueunni11"><span>Họ Tên </span>: <input type="text" name="HTen" value="<?php echo $HoTen;?>" required><input type="hidden" name="TongTien" value="<?php echo $TongTien;?>" ></p>
							<p class="lueunni11"><span>Địa Chỉ</span>: <input type="text" name="DChi" value="<?php echo $DiaChi;?>" required></p>
							<p class="lueunni11"><span>Điện Thoại</span>: <input type="text" name="DThoai" value="<?php echo $DienThoai;?>" required></p>
							<p class="lueunni112" style="margin-top:20px;">Số lượng : <strong style="color:#2389D4"><?php echo $_SESSION['dem'];?></strong>  x sản phẩm</p>
							<p class="lueunni112" style="border-bottom: 5px ridge #CCCCCC;">Số tiền cần thanh toán : <strong style="color:#2389D4"><?php echo number_format($TongTien);?> </strong> đ</p>
							<p class="lueunni3"><button id="ButTTForm" form="thanhtoanForm"><img src="images/thanhtoan.png" alt=""/></button></p>
						</form>
					</div>
					
					<div style="clear:both;"></div>
				</div>
			</div>
		</div>
		<script>
			function xacnhan(){
				 return confirm("Bạn có chắc chắn muốn xóa Sản Phẩm này ?")
			}
			function clickThanhtoan(){
				document.getElementById("TTDonHang").style.display="block";
				document.getElementById("ancainutnaydi").style.display="none";
			}
		</script>
		<?php	include('footer.php'); ?>