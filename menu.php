
<header>
	<div class="content">
		<ul class="menu1">
		
        <?php 
		if (empty($_SESSION['TKhoan'] )==False){
			echo '<li class=" helone1a">
				<a href="myinfo.php" style="text-align: left;"> Xin chào, <span class="helone1aa">'.$_SESSION['TKhoan'].' </span> <span class="themchune"  style="margin-left:21px"></span></a>
                                <a href="php/logout.php" style="">Logout</a>    
				</li>
				' ;
			}else {echo '<li class="" onclick="clickLogin()">
				<a href="dangnhap.php"><i class="glyphicon glyphicon-user"></i> ĐĂNG NHẬP</a>
				</li>';}
	?>
			
			
			<li class="shopcart ">
				<a href="shopcart.php">
		<span >
	<?php 
		if (empty($_SESSION['dem'] )==False){
			echo '<span class="maudoo"> Bạn có '.$_SESSION['dem'].' sản phẩm </span>' ;
		}else {echo 'GIỎ HÀNG <img src="images/cart.png"';}
	?>
		</span>
			
			</a>
			</li>
					
		</ul>
	<div style="clear:both"></div>
</div>
</header>
		<!-- END   HEDER -->
		
		