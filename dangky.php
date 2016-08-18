<?php 
	session_start();
	include('admin/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Đăng ký tài khoản</title>

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
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
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
						Đăng ký tài khoản mới
					</p>
                                        <h3 style="text-align: center">ĐĂNG KÝ TÀI KHOẢN</h3>
					<div class="ct-sanpham " style="margin:0px 15px 0;padding-bottom:10px;height:400px">
						<form action="php/dangky.php" method="POST" id="mySingup">
							<p id="baoloi">
							<?php 
								if (empty($_SESSION['ThongB'] ) ==False){
									echo $_SESSION['ThongB'] ;
								}else {echo ' ';}
							?></p>
                                                        <table style="margin-top:50px; height: 390px; margin-left: 320px;">
                                                            <tr>
                                                                <td><span class="">Họ Tên:</span></td>
                                                                <td><input type="text" name="HTen" required autofocus></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="">Giới Tính</span> :</td>
                                                                <td>		
                                                                    <select name="GTinh" style="margin-left:" required>
									<option value=""></option>
									<option value="0">Nam</option>
									<option value="1">Nữ</option>
                                                                    </select>
								</td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="">Email</span> :</td>
                                                                <td><input type="email" name="Email" required></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span>Điện Thoại</span> :</td>
                                                                <td><input type="tel" name="DThoai" required></td>
                                                            </tr>            
                                                            <tr>
                                                                <td><span>Địa Chỉ</span> :</td>
                                                                <td><input type="text" name="DChi" required></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span>Ngày Sinh</span> :</td>
                                                                <td><input type="date" name="NSinh" required></td>
                                                            </tr>
                                                        
								
                                                            <tr>
                                                                <td><span class="indam">Tài khoản</span> :</td>
                                                                <td><input type="text" name="TKhoan" minlength="6" required ></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="indam">Mật khẩu</span> :</td>
                                                                <td><input type="password" name="MKhau" minlength="6" required ></td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="indam">Nhập lại mật khẩu</span> :</td>
                                                                <td><input type="password" name="MKhau1"  minlength="6" required ></td>
                                                            </tr>
                                                            <tr class="nutdangkytk">
                                                                <td></td>
                                                                <td><button form="mySingup"> <i class="glyphicon glyphicon-ok"></i> Đăng ký ngay</button></td>
                                                            </tr>
                                                        </table>
							<div style="clear:both"></div>
						</form>
						
						
					</div>
					
				</div>
			</div>
			<?php	include('footer.php'); $_SESSION['ThongB']="";?>