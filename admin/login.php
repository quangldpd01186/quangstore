<?php
	session_start();
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
		
		<div class="login-ct">
			<img src="" alt=""/>
			<div class="loginform">
				
				<div class="lg-logo">
					<a href="../index.php" target="_blank"/> <img class="" src="../images/logo.png" alt='' /></a>
				</div>
				<form id="myForm" action="./user/dangnhap.php" method="POST">
					<input class="inpu" type="text" name="NameDN" required >
					<input class="inpu" type="password" name="PassDN" required >
					<p class="baoloi"><?php if(empty($_SESSION['Tbao'])==False){	echo $_SESSION['Tbao'];$_SESSION['Tbao']= "";}?></p>
					<input class="inpe" type="submit" value="Đăng nhập" >
				</form>
			</div>
		</div>


  </body>
</html>