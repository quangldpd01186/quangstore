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
        <link rel="shortcut icon" type="image/x-icon" href="images/logo1.png">
  </head>
  <body>
		<!-- ---------------------------------------------------------------------HEDER -->
		<?php	include('menu.php'); ?>
		<?php include 'menuleft.php';?>
		<!-- -----------------------------------------------------------------CONTENT -->
		<section>
			<div class="content">
				<?php
				$Type=$_GET['type'];
				$sql=mysqli_query($conn,"SELECT * FROM danhmuc WHERE MaDM='$Type'");
				while ($row=mysqli_fetch_array($sql)){
					$MaDM=$row[0];$TenDM=$row[1];
				}
				
			?>
				<div class="main-content">
					<p class="linksp">
						<a href="">Trang chủ</a>  
						<span><i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i> </span>
						<?php echo $TenDM?>
					</p>
                                        <h3 style="margin-left: 20px"> <?php echo $TenDM?></h3>
					<div class="ct-sanpham " style="margin:0px 15px 0;padding-bottom:10px">
						<?php 
							$homnay=date("d/m/Y");
							$sql=mysqli_query($conn,"SELECT * FROM sanpham WHERE MaDM='$MaDM' ORDER BY NgayDang DESC");
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
											
											<div class="kmnew">	';
													
												
									echo '	</div>
										</div></a>
									';
								}else{
									echo '<a href="chitiet.php?id='.$row[0].'">
										<div class="col-md-4 spham kmne newne">
											<img class="anhhieuung" src="images/sanpham/'.$row[5].'" alt="" />
											<p class="price-sp">'.number_format($row[3]).' <span>đ</span> <strong>'.number_format($row[2]).'  đ</strong></p>
											<h4 class="namesp">'.$row[1].' </h4>
											<p class="motasp">Cửa hàng của chúng tôi cung cấp hơn 50.000 sản phẩm khác nhau và chúng tôi chắc chắn rằng bạn sẽ không tìm thấy bất kỳ cửa hàng khác ...</p>
											<div class="kmnew">	
												<img class="anhkm" src="images/sale.jpg" alt="" />';
									if ($NgayDang==$homnay or $NgayDang1==$homnay or $NgayDang2==$homnay){
										echo '<img class="anhnew" src="images/new.jpg" alt="" />';
									}else {echo "";}		
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