<?php
	session_start();
	$_SESSION['ThongBao']="";
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
    <title>Administrator</title>
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
			<p class="helo">Chào, <a href="user-view.php" id="hama"><?php echo $_SESSION['NameDN'];?></a> ! <a href="user/logout.php">Thoát</a></p>
			<div class="danhmucmenu ">
				<h2 class="tendanhmuc"> SẢN PHẨM</h2>
				<h3 class="dmcap1"><a href="sanpham-add.php">Thêm mới Sản Phẩm</a></h3>
				<h3 class="dmcap1"><a href="sanpham.php">Quản lý Sản Phẩm</a></h3>
				
				
			</div>
			
		</div>
		<!-- END   MENU LEFT -->

		<!-- -----------------------------------------------------------------CONTENT -->
		<section>
			<div class="content">
				
				<div class="main-content" style="padding-bottom:15px;margin-bottom:20px">
					<div class="linksp">
						<a href="sanpham.php">Sản Phẩm</a>  
						<span><i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i> </span>
						
						Quản lý Sản Phẩm
					</div>
					<div class="adduser">
						<h3 class="nameadd"> Quản lý Sản Phẩm
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="sapxep">
								<select name="TheLoai" required>
									<option value="">Loại Sản Phẩm</option>
									<?php 
										
										$sql= "SELECT * FROM danhmuc";
										$query=mysqli_query($conn,$sql);
										while($sanpham = mysqli_fetch_row($query)) {
											echo '<option value="'.$sanpham[0].'">'.$sanpham[1].'</option>';
										}
									?>
								</select>
								<input type="submit" value="XEM">
							</form>
						</h3>
						<?php   
							if ($_SERVER["REQUEST_METHOD"] == "POST") {
								$name = ($_POST["TheLoai"]);
								$query_data = "SELECT * FROM danhmuc WHERE MaDM= '$name' ";
								$result_data = mysqli_query($conn,$query_data);
								while($row = mysqli_fetch_array($result_data)) {
									$TenDM=$row[1];}
								
								$query_data1 = "SELECT Count(MaSP) FROM sanpham WHERE MaDM= '$name' ";
								$result_data1 = mysqli_query($conn,$query_data1);
								while($row = mysqli_fetch_array($result_data1)) {
									$SL=$row[0];}
								echo '<h4 class="sxx">Loại Sản Phẩm :<span style="color:#2A85D6;margin-right:50px"> '.$TenDM.' </span> Số lượng : <span style="color:#2A85D6"> '.$SL.'</span> Sản Phẩm</h4>';
							}
						?>
						<div class="listtv">
							<div class="col-md-1 listtd">STT</div>
							<div class="col-md-2 listtd">Ảnh Sản Phẩm</div>
							<div class="col-md-3 listtd">Thông Tin Sản Phẩm</div>

							<div class="col-md-2 listtd">Giá Sản Phẩm</div>
							<div class="col-md-2 listtd">Thao Tác</div>
							
							<div style="clear:both"></div>
						</div>
						<?php include('sanpham-sx.php');?>
						
					</div>
					
				</div>
			</div>
			
		</section>
		<script>
			function xacnhan(){
				 return confirm("Bạn có chắc chắn muốn xóa Sản Phẩm này ?")
			}
			 
		</script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
  </body>
</html>