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
			<p class="helo">Chào, <?php echo $_SESSION['NameDN'];?></a> ! <a href="user/logout.php">Thoát</a></p>
			<div class="danhmucmenu ">
				<h2 class="tendanhmuc">  thành viên</h2>
				<?php if (	$_SESSION['VTro']==0){echo '<h3 class="dmcap1"><a href="user-add.php"> Thêm mới thành viên</a></h3>';}?>
				<?php if (	$_SESSION['VTro']==0){echo '<h3 class="dmcap1"><a href="index.php"> Quản lý thành viên</a></h3> ';}?>
			</div>
			
		</div>
		<!-- END   MENU LEFT -->

		<!-- -----------------------------------------------------------------CONTENT -->
		<?php
			$id=$_GET['id'];
			$sql=mysqli_query($conn,"SELECT * FROM thanhvien WHERE ID=$id");
			while ($row=mysqli_fetch_array($sql)){
				$UName=$row[1];$PWord=$row[2];$HTen=$row[3];$GTinh=$row[4];
				$DChi=$row[6];$NSinh=$row[5];$DThoai=$row[7];$Email=$row[8];
				$VTro=$row[9];
			}
		?>
		<section>
			<div class="content">
				
				<div class="main-content" style="height:585px">
					<div class="linksp">
						<a href="index.php">Thành Viên</a>  
						<span><i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i> </span>
						
						Cập nhật thông tin Username 
					</div>
					<div class="adduser">
						<h3 class="nameadd">  Cập nhật thông tin User - <span class="maucx"><?php echo $UName;?></span>
							 <button id="sub" name="" value="" form="myForm"> <i class="glyphicon glyphicon-ok" ></i> Cập Nhật </button> <a id="cancle" href="index.php"><i class="glyphicon glyphicon-remove"></i>Hủy</a>
						</h3>
						<div class="formadd">
							<p id="baoloi"></p>
							<form action="./user/chinhsua.php" method="POST" id="myForm">
								<ul class="formthemmoi">
									<li class="col-md-6 nhap1a">
										<span>Họ Tên</span>:<input type="text" name="HTen"  value="<?php echo $HTen;?>">
									</li>
									<li class="col-md-6 nhap1a bpn">
										<span class="damlen">Username</span>:<input type="text" name="UName" required value="<?php echo $UName;?>" readonly="readonly"> 
									</li>
									<li class="col-md-6 nhap1a">
										<span>Ngày Sinh</span>:<input type="date" name="NSinh" value="<?php echo $NSinh;?>">
									</li>
									<li class="col-md-6 nhap1a bpn">
										 <span  class="damlen">Password</span>:<input type="text" name="PWord" required value="<?php echo $PWord;?>">
									</li>
									<li class="col-md-6 nhap1a">
										<span>Địa Chỉ</span>:<input type="text" name="DChi" value="<?php echo $DChi;?>">
									</li>
									<li class="col-md-6 nhap1a ">
										<span>Giới Tính</span>:
										<?php
											if ($GTinh == 0){
												echo '
													<em id="ham1" style="border:1px solid #1B7AD4;color:#1B7AD4"><input type="radio" name="GTinh" value="0" required onclick="ham1()" checked >Nam</em>
													<em id="ham2"><input type="radio" name="GTinh" value="1" required onclick="ham2()">Nữ</em>
												';
											}else{
												echo '
													<em id="ham1"><input type="radio" name="GTinh" value="0" required onclick="ham1()">Nam</em>
													<em id="ham2" style="border:1px solid #1B7AD4;color:#1B7AD4"><input type="radio" name="GTinh" value="1" required onclick="ham2()" checked>Nữ</em>
												';
											}
										?>
										
									</li>
									<li class="col-md-6 nhap1a">
										<span>Email</span>:<input type="Email" name="Email"  value="<?php echo $Email;?>">
									</li>
									<li class="col-md-6 nhap1a ">
										<span>Vai Trò</span>:
										<?php
											if ($VTro == 0){
												echo '
													<em id="ham3"  style="border:1px solid #1B7AD4;color:#1B7AD4"><input type="radio" name="VTro" value="0" required onclick="ham3()" checked>Admin</em>
													<em id="ham4"><input type="radio" name="VTro" value="1" required onclick="ham4()">Nhân Viên</em>
												';
											}else{
												echo '
													<em id="ham3"><input type="radio" name="VTro" value="0" required onclick="ham3()">Admin</em>
													<em id="ham4"  style="border:1px solid #1B7AD4;color:#1B7AD4"><input type="radio" name="VTro" value="1" required onclick="ham4()" checked>Nhân Viên</em>
												';
											}
										?>
										
									</li>
									<li class="col-md-6 nhap1a">
										<span>Điện Thoại</span>:<input type="tel" name="DThoai" value="<?php echo $DThoai;?>">
									</li>
									
									<div style="clear:both"></div>
								</ul>
								
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
		<script src="../js/jquery-1.11.1.min.js"></script>
		<script>
			$("#sub").click( function(){
				var data= $("#myForm :input").serializeArray();
				$.post( $("#myForm").attr("action"), data, function(themmoi){ $("#baoloi").html(themmoi); });
				
			});
			
			$("#myForm").submit( function(){
				return false;
			});
			
			function clearInput(){
				$("#myForm :input").each( function(){
					$(this).val('');
				});
			};
		</script>
  
  </body>
</html>