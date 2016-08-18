<?php 
	session_start();
	include('admin/conn.php');
	$_SESSION['ThongB']="";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Liên hệ</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/animation.css" rel="stylesheet">
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
						Liên hệ
					</p>
					
					<div class="formlienhe" style="padding-bottom: 20px;">
						
                                            <form action="php/lienhe.php" method="POST" id="lienheForm">
                                                <table style="margin-left: 250px; width: 400px; height: 400px">
                                                    <tr>
                                                        <td>Tiêu Đề:</td>
                                                        <td><input type="text" name="TDE" required></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Họ Tên:</td>
                                                        <td><input type="text" name="HOTEN" required></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Điện Thoại:</td>
                                                        <td><input type="text" name="DTHOAI" required></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Địa Chỉ:</td>
                                                        <td><input type="text" name="DCHI" required></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Email:</td>
                                                        <td><input type="email" name="EMAIL" required></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Nội Dung :</td>
                                                        <td><textarea rows="10" cols="40" name="NDung" required></textarea></td>
                                                    </tr>
                                                     <tr>
                                                        <td></td>
                                                        <td><button form="lienheForm" style="width: 80px; height: 30px; background-color: rgba(0,0,0,0.8); color: white">  Gửi </button></td>
                                                    </tr>
									
                                                </table>	
						<div style="clear:both"></div>
                                            </form>
					</div>
					
				</div>
				
			</div>
			<?php	include('footer.php'); ?>