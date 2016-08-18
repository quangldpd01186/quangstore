<?php 
	session_start();
	include('admin/conn.php');$_SESSION['ThongB']="";
	$_SESSION['LH']="" ;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Quang's Store</title>

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
                <link rel="shortcut icon" type="image/x-icon" href="images/logo1.png">
  </head>
  <body>
		<!-- ---------------------------------------------------------------------HEDER -->
		<?php	include('menu.php'); ?>
                <?php include 'menuleft.php';?>
		<!-- -----------------------------------------------------------------CONTENT -->
		<section>
			<?php
				$GETID=$_GET['id'];
				$sql=mysqli_query($conn,"SELECT * FROM sanpham WHERE MaSP='$GETID'");
				while ($row=mysqli_fetch_array($sql)){
					$MaSP=$row[0];$TenSP=$row[1];$DGia=$row[2];
					$KM=$row[3];$Clieu=$row[4];$HA=$row[4];
					$MaDM=$row[6];$MoTa=$row[8];
				}
				$sql=mysqli_query($conn,"SELECT * FROM danhmuc WHERE MaDM='$MaDM'");
				while ($row=mysqli_fetch_array($sql)){
					$TenDM=$row[1];
				}
			?>
			<div class="content" id="chitietsp">
				
				<div class="main-content">
					<p class="linksp">
						<a href="">Trang chủ</a>  
						<span><i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i> </span>
						<a href=""> </a> 
						<span><i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i> </span>
						<?php echo $TenSP;?> 
					</p>
					
					<div class="ct-chitiet">
						<div class="col-md-5 hinhsp">
							<div class="hinhmota">
								<img class = "jetzoom"  src="images/sanpham/<?php echo $HA;?>"  data-jetzoom = "zoomImage: 'images/sanpham/<?php echo $HA;?>'" />
								
							</div>
						</div>
						<div class="col-md-7 motasanpham">
							<h3><?php echo $TenSP.' - '.$MaSP;?> </h3>
							<?php 
								if($KM=='0'){
									echo '<p class="giasp">Giá bán : <em> '.number_format($DGia).'  đ</em> <span class="gkm1"></span></p>';
									
								}else{
									echo '<p class="giasp">Giá bán : <em> '.number_format($KM).' đ</em> <span class="gkm1"> '.  number_format($DGia) .' đ</span></p>';
								}
							
							?>
							
							<p class="fixcto"><span class="chu1"><img src="images/ct1.jpg" alt="">An Toàn Mua Sắm </span>
								<span class="chu1"><img src="images/ct2.jpg" alt="">Miễn Phí Giao Hàng </span>
								
							
							<form action="cart/addcart.php" method="POST" id="">
						
								<input type="hidden" name="MaSP" value="<?php echo $MaSP?>">
                                                                <button class="muahangne"><img src="images/addtocart.png"  alt=""/></button>
							</form>
						</div>
						
						<div style="clear:both"></div>
					</div>
				</div>
			</div>
			<?php	include('footer.php'); ?>