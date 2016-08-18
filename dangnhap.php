<<?php 
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
    <title>Quang's Store</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- web -->
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
       <div style="background-image: url('images/loginbox_bg.png');width: 500px;height: 270px; margin-left: 400px;text-align: center">
		<div style="padding-top:40px;">
                    <h3 style="color:white">ĐĂNG NHẬP </h3>
			<form action="php/login.php" method="POST" id="loginForm">
				<p><span>Tài Khoản</span> :<input type="text" name="NameDN" ></p>
				<p><span>Mật Khẩu</span> :<input type="password" name="PassDN" ></p>
				<p id="baoloi" style="background:none;margin:5px 35px;padding:5px;text-align:right;color:red;"></p>
				<button class="pop-huylogin" id="sub">Đăng Nhập</button>
                                <button><a href="index.php">Thoát</a></button>
				
			</form>
			<p><a href="dangky.php" style="color:#fff; padding-left: 30px;"> Đăng ký tài khoản</a></p>
			
		</div>
	</div>
    </body>
</html>
