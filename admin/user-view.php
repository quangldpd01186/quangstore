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
		<header>
			<div class="content">
				<img class="anicld floating3" src="../images/cloud.png" alt="" />
				<img class="anicld1" src="../images/cloud3.png" alt="" />
				<ul class="menu1 col-md-3">
					<li class="logo bounce ">
						<a href="" class="xoay"> <img  src="../images/logo.png" alt=""/></a>
					</li>
				</ul>
				<ul class="col-md-9 menuadmin stretchLeft">
					<?php 
						if (	$_SESSION['VTro']==1){
							echo '<li class=""><a href="user-view.php"><i class="glyphicon glyphicon-user"></i> Thành Viên</a></li>';
						}else {echo '<li class=""><a href="index.php"><i class="glyphicon glyphicon-user"></i> Thành Viên</a></li>';}
					?>
					
					<li class=""><a href="sanpham.php"><i class="glyphicon glyphicon-qrcode"></i> Sản Phẩm</a></li>
					<li class=""><a href="danhmuc.php"><i class="glyphicon glyphicon-menu-hamburger"></i> Danh Mục</a></li>
					<?php 	
							if (	$_SESSION['VTro']==0){
								echo '<li class=""><a href="hoadon.php"><i class="glyphicon glyphicon-list-alt"></i> Hóa Đơn</a></li>';
							}else {echo '<li class=""><a href="hoadonnv.php"><i class="glyphicon glyphicon-list-alt"></i> Hóa Đơn</a></li>';}
					?>
				</ul>
				<div style="clear:both"></div>
			</div>
		</header>
		<!-- END   HEDER -->
		<?php
			$id=$_SESSION['NameDN'];
			$sql=mysqli_query($conn,"SELECT * FROM thanhvien WHERE Username='$id'");
			while ($row=mysqli_fetch_array($sql)){
				$UName=$row[1];$PWord=$row[2];$HTen=$row[3];$GTinh=$row[4];
				$DChi=$row[6];$NSinh=$row[5];$DThoai=$row[7];$Email=$row[8];
				$VTro=$row[9];$ID=$row[0];
			}
			if ($GTinh == 0){ $GTinh = "Nam";}else{$GTinh = "Nữ";}
			if ($VTro == 0){ $VTro = "Admin";}else{$VTro = "Nhân Viên";}
		?>
		<!-- -----------------------------------------------------------------MENU LEFT -->
		<div id="menu-left" class="stretchLeft">
			<p class="helo">Chào, <a href="user-view.php" id="hama"><?php echo $_SESSION['NameDN'];?></a> ! <a href="user/logout.php">Thoát</a></p>
			<div class="danhmucmenu ">
				<h2 class="tendanhmuc"> <img src="../images/administrator-icon.gif" alt=""/> thành viên</h2>
				<?php if (	$_SESSION['VTro']==0){echo '<h3 class="dmcap1"><a href="user-add.php"><i class="glyphicon glyphicon-plus"></i> Thêm mới thành viên</a></h3>';}?>
				<?php if (	$_SESSION['VTro']==0){echo '<h3 class="dmcap1"><a href="index.php"><i class="glyphicon glyphicon-list-alt"></i> Quản lý thành viên</a></h3> ';}?>
				
				<h3 class="dmcap1"><a href="user-fix.php?id=<?php echo $ID ; ?>"><i class="glyphicon glyphicon-pencil"></i> Cập nhật thông tin</a></h3>
			</div>
			
		</div>
		<!-- END   MENU LEFT -->

		<!-- -----------------------------------------------------------------CONTENT -->
		
		<section>
			<div class="content">
				
				<div class="main-content" style="height:585px">
					<div class="linksp">
						<?php if (	$_SESSION['VTro']==1){echo '<a href="user-view.php">Thành Viên</a>  ';}else{echo '<a href="index.php">Thành Viên</a>  ';}?>
						  
						<span><i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i> </span>
						
						Thông tin Thành Viên : <span class="maucx"><?php echo $UName;?></span>
					</div>
					<div class="adduser">
						<h3 class="nameadd"><i class="glyphicon glyphicon-user"></i>  Thông tin Thành Viên - <span class="maucx"><?php echo $UName;?></span>
							 <button id="sub" form="myForm" style="display:none"> <i class="glyphicon glyphicon-ok" ></i> Cập Nhật </button> <a id="cancle" href="user-view.php" style="display:none"><i class="glyphicon glyphicon-remove"></i>Hủy</a>
						</h3>
						<div class="formadd">
							<p id="baoloi"></p>
							<form action="./user/doipass.php" method="POST" id="myForm">
								<ul class="formthemmoi col-md-6 row" id="viewinfou">
									<style>.nhap1a > input {font-weight:600;}
										.bpn11 {background:#f1f1f1;}
										.bpn11 > input{background:#f1f1f1 ;}
									</style>
									<li class="col-md-12 nhap1a quabentrai">
										<span>Họ Tên</span>:<input type="text" name="HTen"  value="<?php echo $HTen;?>" readonly="readonly">
									</li>
									<li class="col-md-12 nhap1a quabentrai">
										<span>Giới Tính</span>: <input type="text" name="PWord"  value="<?php echo $GTinh;?>" readonly="readonly">
										
									</li>
									<li class="col-md-12 nhap1a quabentrai">
										<span>Ngày Sinh</span>:<input type="date" name="NSinh" value="<?php echo $NSinh;?>" readonly="readonly">
									</li>
									
									<li class="col-md-12 nhap1a quabentrai">
										<span>Địa Chỉ</span>:<input type="text" name="DChi" value="<?php echo $DChi;?>" readonly="readonly">
									</li>
									
									<li class="col-md-12 nhap1a quabentrai">
										<span>Email</span>:<input type="Email" name="Email"  value="<?php echo $Email;?>" readonly="readonly">
									</li>
									
									<li class="col-md-12 nhap1a quabentrai">
										<span>Điện Thoại</span>:<input type="tel" name="DThoai" value="<?php echo $DThoai;?>" readonly="readonly">
									</li>
									
									
								</ul>
								<ul class="formthemmoi col-md-6 row" id="viewinfou1">
									<li class="col-md-12 nhap1a bpn11 quabenphai">
										<span class="damlen">Username</span>:<input type="text" name="UName"  value="<?php echo $UName;?>" readonly="readonly"> 
									</li>
									<li class="col-md-12 nhap1a bpn11 quabenphai" style="height:auto;">
										 <span  class="damlen">Mật Khẩu</span>:<input type="password" name="PWord" id="matk" value="<?php echo $PWord;?>" readonly="true">
										 <span  id="cofim" style="margin-top:15px;display:none">Xác nhận </span>:<input type="password" name="PWord1" id="matk1"  style="display:none" readonly="true">
										 <em id="showpass" onclick="showPass()">Hiện mật khẩu</em> <em id="changepass" onclick="changePass()">Đổi mật khẩu</em>
									</li>
									<li class="col-md-12 nhap1a quabentrai">
										<span>Vai Trò</span>: <input type="text" name=""  value="<?php echo $VTro;?>" readonly="true">
										
									</li>
									<script>
										function showPass() {
											var x= document.getElementById("matk").type
											if (x=="password"){
												document.getElementById("matk").type="text";
												document.getElementById("matk1").type="text";
												document.getElementById("showpass").innerHTML="Ẩn mật khẩu";
											}else if (x=="text"){
												document.getElementById("matk").type="password";
												document.getElementById("matk1").type="password";
												document.getElementById("showpass").innerHTML="Hiện mật khẩu";
											}
										}
										function changePass() {
											var x= document.getElementById("sub").style.display;
											if (x=="none"){
												document.getElementById("matk1").style.display="inline-block";
												document.getElementById("matk").readOnly =false;
												document.getElementById("matk1").readOnly =false;
												document.getElementById("sub").style.display="block";
												document.getElementById("cofim").style.display="inline-block";
												document.getElementById("changepass").innerHTML="Đóng";

											}else if (x=="block"){
												document.getElementById("matk1").style.display="none";
												document.getElementById("matk").readOnly =true;
												document.getElementById("matk1").readOnly =true;
												document.getElementById("sub").style.display="none";
												document.getElementById("cofim").style.display="none";
												document.getElementById("changepass").innerHTML="Đổi mật khẩu";
											}
										}
									</script>

								</ul>
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
  </body>
</html>