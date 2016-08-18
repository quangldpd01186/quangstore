<?php
	session_start();
	include('conn.php');
	if(!isset($_SESSION['NameDN'])){header('location:login.php');}
	if ($_SESSION['VTro']=="1"){
		header('Location:user-view.php');
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
				<h2 class="tendanhmuc"> thành viên</h2>
				<?php if ($_SESSION['VTro']==0){echo '<h3 class="dmcap1"><a href="user-add.php">Thêm mới thành viên</a></h3>';}?>
				<h3 class="dmcap1"><a href="index.php"> Quản lý thành viên</a></h3>
				<h3 class="dmcap1"><a href="user-khach.php">Quản lý khách hàng</a></h3>
			</div>
			
		</div>
		<!-- END   MENU LEFT -->

		<!-- -----------------------------------------------------------------CONTENT -->
		<section>
			<div class="content">
				
				<div class="main-content" style="padding-bottom:15px;margin-bottom:20px">
					<div class="linksp">
						<?php if (	$_SESSION['VTro']==1){echo '<a href="user-view.php">Thành Viên</a>  ';}?>
						<a href="index.php">Thành Viên</a>  
						<span><i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i> </span>
						
						Quản lý Thành Viên
					</div>
					<div class="adduser">
						<h3 class="nameadd">Khách hàng</h3>
						<div class="listtv">
							<div class="col-md-1 listtd">STT</div>
							<div class="col-md-2 listtd">USERNAME</div>
							<div class="col-md-4 listtd">Thông Tin</div>
							<div class="col-md-2 listtd">Vai Trò</div>
							<div class="col-md-3 listtd">Thao Tác</div>
							
							<div style="clear:both"></div>
						</div>
						<?php
							$sql=mysqli_query($conn,"SELECT * FROM thanhvien WHERE VaiTro=3 ORDER BY VaiTro");
							$count=mysqli_num_rows($sql);
							$i=1;
							while ($row=mysqli_fetch_array($sql)){
									if($row[4]==1){ $sex="Nữ";} else {$sex="Nam";}
									if($row[9]==1){ $autho="Nhân Viên";} else if($row[9]==3){$autho="Khách";} else {$autho="ADMIN";}
									if ($i % 2 != 0){
										echo '
											<div class="listct">
												<div class="col-md-1 listtd ragiua">'.$i.'</div>
												<div class="col-md-2 listtd">'.$row[1].'</div>
												<div class="col-md-4 listtd"><span class="damlen">'.$row[3].'</span> <br>Giới Tính : '.$sex.' <br>Email : '.$row[8].' <br> Điện thoai: '.$row[7].'</div>
												<div class="col-md-2 listtd ragiua">'.$autho.'</div>
												<div class="col-md-3 listtd ragiua">
													<a href="user-fix.php?id='.$row[0].'">Edit</a>
													<a onclick="return xacnhan()" href="./user/deluser.php?id='.$row[0].'" >Delete</a>
												</div>
												
												<div style="clear:both"></div>
											</div>
										';
									}else{
										echo '
											<div class="listct sochan">
												<div class="col-md-1 listtd ragiua">'.$i.'</div>
												<div class="col-md-2 listtd">'.$row[1].'</div>
												<div class="col-md-4 listtd"><span class="damlen">'.$row[3].'</span> <br>Giới Tính : '.$sex.' <br>Email : '.$row[8].' <br> Điện thoai: '.$row[7].'</div>
												<div class="col-md-2 listtd ragiua">'.$autho.'</div>
												<div class="col-md-3 listtd ragiua">
													<a href="user-fix.php?id='.$row[0].'">Edit</a>
													<a onclick="return xacnhan()" href="./user/deluser.php?id='.$row[0].'">Delete</a>
												</div>
												
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
				 return confirm("Bạn có chắc chắn muốn xóa User này ?")
			}
			 
		</script>
   
  </body>
</html>