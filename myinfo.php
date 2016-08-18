<?php 
	session_start();
	include('admin/conn.php');
	$_SESSION['LH']="" ;
	if (empty($_SESSION['TKhoan'] )==True){header("Location:./");}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Thông tin tài khoản</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/animation.css" rel="stylesheet">

	<!-- SLIDER -->
	<link rel="stylesheet" type="text/css" media="all" href="./css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="./css/jgallery.min.css" />
    <script type="text/javascript" src="./js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="./js/tinycolor-0.9.16.min.js"></script>
    <script type="text/javascript" src="./js/jgallery.min.js"></script>
    <script type="text/javascript">
    $( function() {
        $( '#gallery' ).jGallery( {
            'mode': 'slider'
        } );
    } );
    </script>
	<!-- END SLIDER -->

  </head>
  <body>
		<!-- ---------------------------------------------------------------------HEDER -->
		<?php	include('menu.php'); ?>
                <?php include 'menuleft.php';?>
		<!-- -----------------------------------------------------------------CONTENT -->
		<section>
			<div class="content ">
				<div class="main-content">
					<p class="linksp">
						<a href="">Trang chủ</a>  
						<span><i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i> </span>
						Thông tin tài khoản
					</p>
					<h3 class="phanloaisp">  Thông tin tài khoản <span style="color:#2389D4;text-transform: none;"><?php echo $_SESSION['TKhoan']?></span></h3>
					<div class="ct-sanpham " style="margin:0px 15px 0;padding-bottom:10px;height:400px">
						<form action="php/doipass.php" method="POST" id="mySingup">
							<p id="baoloi">
							<?php 
								if (empty($_SESSION['ThongB'] ) ==False){
									echo $_SESSION['ThongB'] ;
								}else {echo ' ';}
							?></p>
							<?php 
								$NameDN = $_SESSION['TKhoan'];
								$sql=mysqli_query($conn,"SELECT * FROM thanhvien WHERE Username='$NameDN'");
								while ($row=mysqli_fetch_array($sql)){
									
								
							?>
							<ul class="col-md-6 dangkytkm1 thanhkute">
								<li>
									<p><span class="">Họ Tên</span> :<input type="text" name="HTen" required value="<?php echo $row[3];?>"></p>
								</li>
								<li>
									<p><span class="">Giới Tính</span> :
										<select name="GTinh" style="margin-left:-5px" required>
											<?php 
												if ($row[4]=="0"){
													echo '<option value="0" >Nam</option>
														  <option value="1">Nữ</option>';
												}else{
													echo '<option value="1" >Nữ</option>
														<option value="0" >Nam</option>';
												}
											?>
										</select>
									</p>
								</li>
								<li>
									<p><span class="">Email</span> :<input type="email" name="Email" required value="<?php echo $row[8];?>"></p>
								</li>
								<li>
									<p><span>Điện Thoại</span> :<input type="tel" name="DThoai" required value="<?php echo $row[7];?>"></p>
								</li>
								<li>
									<p><span>Địa Chỉ</span> :<input type="text" name="DChi" required value="<?php echo $row[6];?>"></p>
								</li>
								<li>
									<p><span>Ngày Sinh</span> :<input type="date" name="NSinh" required value="<?php echo $row[5];?>"></p>
								</li>
							</ul>
							<ul class="col-md-6 dangkytkm1">
								
								<li>
									<p><span class="indam">Tài khoản</span> :<input type="text" name="TKhoan" minlength="6" required value="<?php echo $row[1];?>" readonly></p>
								</li>
								<li id="andine">
									<p class="doipassne" onclick="doipasne()" >Đổi mật khẩu !</p>
									
								</li>
								<li id="andine1">
									<p><span class="indam">Mật khẩu mới</span> :<input id="omk1" type="password" name="MKhau" minlength="6" required="false" value="111111" ></p>
								</li>
								<li id="andine2">
									<p><span class="indam">Nhập lại mật khẩu</span> :<input  id="omk2" type="password" name="MKhau1"  minlength="6"  required="false" value="111111" ></p>
								</li>
								<li class="nutdangkytk" style="" id="">
									<button > <i class="glyphicon glyphicon-ok"></i> Cập nhật</button>
								</li>
							</ul>
							<div style="clear:both"></div>
						</form>
						
						<?php 
																	
								}
							?>
					</div>
					
				</div>
			</div>
			
		<script>
			function doipasne(){
				document.getElementById('andine').style.display="none";
				document.getElementById('andine1').style.display="block";
				document.getElementById('andine2').style.display="block";

				document.getElementById('omk1').required="true";
				document.getElementById('omk2').required="true";
				document.getElementById('omk1').value="";
				document.getElementById('omk2').value="";
				}
		</script>
		<?php	include('footer.php'); ?>