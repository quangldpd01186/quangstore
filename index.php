<?php 
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
  <body style="overflow:auto;" id="myBody">
		<!--  HEADER -->
                <?php include 'menu.php';?>
		<!-- END   HEADER -->
		<?php include 'menuleft.php';?>
		<!-- ===================================== MENU LEFT =========================-->
		
		<!-- END   MENU LEFT -->
		
		<!-- ===================================================== CONTENT -->
		<section>
			<div class="content">
				<div class="slider" >
					<div id="gallery">
						<img src="images/slide/hinh1.jpg" alt="" />
						<img src="images/slide/hinh2.jpg" alt="" />
						<img src="images/slide/hinh3.jpg" alt="" />
						<img src="images/slide/hinh4.jpg" alt="" />
						
					</div>
				</div>
				<div class="main-content" id="sphot">
					<h3 class="title-sp"> SẢN PHẨM NỔI BẬT</h3>
					<div class="ct-sanpham ">
						<?php 
							$homnay=date("d/m/Y");
							$sql=mysqli_query($conn,"SELECT * FROM sanpham ORDER BY NgayDang DESC LIMIT 12");
							while ($row=mysqli_fetch_array($sql)){
								$NgayDang=date("d/m/Y",strtotime($row[8]));
								$NgayDang1 = date("d/m/Y", strtotime('+1 days',strtotime($row[8])));
								$NgayDang2 = date("d/m/Y", strtotime('+2 days',strtotime($row[8])));
								if ($row[3]==0){
									echo '<a href="chitiet.php?id='.$row[0].'">
										<div class="col-md-4 spham newne">
											<img class="anhhieuung" src="images/sanpham/'.$row[4].'" alt="" />
											<p class="price-sp">'.number_format($row[2]).' <span>đ</span></p>
											<h4 class="namesp">'.$row[1].'  </h4>
											<p class="motasp"></p>
											<div class="kmnew">	';
												
									//echo $homnay.'-'.$NgayDang.'-'.$NgayDang1.'-'.$NgayDang2;
									echo '	</div>
										</div></a>
									';
								}
									
							} // End While
						?>	
						
						
						<div style="clear:both"></div>
					</div>
					
				</div>
			</div>
			<?php	include('footer.php'); ?>