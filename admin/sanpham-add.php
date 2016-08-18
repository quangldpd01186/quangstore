<?php 
	session_start();
	if(!isset($_SESSION['NameDN'])){header('location:login.php');}
	include('conn.php');
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
			<p class="helo">Chào, <?php echo $_SESSION['NameDN'];?> ! <a href="user/logout.php">Thoát</a></p>
			<div class="danhmucmenu ">
				<h2 class="tendanhmuc">  Sản Phẩm</h2>
				<h3 class="dmcap1"><a href="sanpham-add.php">Thêm mới Sản Phẩm</a></h3>
				<h3 class="dmcap1"><a href="sanpham.php"> Quản lý Sản Phẩm</a></h3>
			</div>
			
		</div>
		<!-- END   MENU LEFT -->

		<!-- -----------------------------------------------------------------CONTENT -->
		<section>
			<div class="content sanphamadd">
				
				<div class="main-content" style="">
					<div class="linksp">
						<a href="danhmuc.php">Sản Phẩm</a>  
						<span><i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i> </span>
						
						Thêm mới Sản Phẩm
					</div>
					<div class="adduser">
						<h3 class="nameadd"> Thêm mới Sản Phẩm  </h3>
						<div class="formadd">
							<p id="baoloi"><?php if(!isset($_SESSION['ThongBao'])){ $_SESSION['ThongBao']="";} else{ echo $_SESSION['ThongBao'];}?></p>
							<form id="myForm" action="./sanpham/themmoi.php" method="POST" name="addForm" enctype="multipart/form-data">
                                                            <table style="width: 400px; height: 300px; margin-left: 250px">
                                                                <tr>
                                                                    <td>Mã Sản Phẩm</td>
                                                                    <td><input type="text" name="MaSP"  maxlength="6" style="text-transform:uppercase" required></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Danh mục</td>
                                                                    <td>
                                                                        <select name="LoaiSP" required>
										<option value="">Danh mục Sản Phẩm .</option>
										<?php 
											$sql=mysqli_query($conn,"SELECT * FROM danhmuc");
											while ($danhmuc=mysqli_fetch_array($sql)){
												echo '<option value="'.$danhmuc[0].'">'.$danhmuc[1].'</option>';
											}
										?>
												
									</select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tên Sản Phẩm</td>
                                                                    <td><input type="text" name="TenSP" required></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Đơn Giá</td>
                                                                    <td><input type="number" name="DGia" required></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Hình Ảnh</td>
                                                                    <td><input type="text" name="HA" class=""  required></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Mô tả</td>
                                                                    <td><textarea rows="5" cols="30" name="NoiDung" ></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button style="width: 80px; height: 30px; background-color: rgba(0,0,0,0.8); color: white" form="myForm">Thêm Mới</button></td>
                                                                    <td><a id="" href="sanpham.php">Hủy</a></td>
                                                                </tr>
                                                                
                                                            </table>                        
								
								<div style="clear:both"></div>
							</form>
							
						</div>
					</div>
					
				</div>
			</div>
			
		</section>
		<script type="text/javascript">
			function ham1(){
				document.getElementById("ham1").style.border="1px solid #1B7AD4";
				document.getElementById("ham1").style.color="#1B7AD4";
				document.getElementById("ham2").style.border="none";
				document.getElementById("ham2").style.color="#424242";
			}
			function ham2(){
				document.getElementById("ham2").style.border="1px solid #1B7AD4";
				document.getElementById("ham2").style.color="#1B7AD4";
				document.getElementById("ham1").style.border="none";
				document.getElementById("ham1").style.color="#424242";
			}
			function ham3(){
				document.getElementById("ham3").style.border="1px solid #1B7AD4";
				document.getElementById("ham3").style.color="#1B7AD4";
				document.getElementById("ham4").style.border="none";
				document.getElementById("ham4").style.color="#424242";
			}
			function ham4(){
				document.getElementById("ham4").style.border="1px solid #1B7AD4";
				document.getElementById("ham4").style.color="#1B7AD4";
				document.getElementById("ham3").style.border="none";
				document.getElementById("ham3").style.color="#424242";
			}
		</script>
	