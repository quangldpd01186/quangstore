
		<header>
			<div class="content">
				<ul class="menu1 col-md-3">
					<li class="">
						<a href="" class=""> <img  src="../images/logo.png" alt=""/></a>
					</li>
				</ul>
				<ul class="col-md-9 menuadmin ">
					<li class=""><a href="index.php">Quản lý Nhân viên & Khách hàng</a></li>
					<li class=""><a href="sanpham.php">Quản lý Sản phẩm</a></li>
					
					<?php 	
							if (	$_SESSION['VTro']==0){
								echo '<li class=""><a href="hoadon.php">Quản lý hóa đơn</a></li>';
							}else {echo '<li class=""><a href="hoadonnv.php">Quản lú hóa đơn</a></li>';}
					?>
					<li class=""><a href="hoadon-thongke.php">Thống kê</a></li>
				</ul>
				<div style="clear:both"></div>
			</div>
		</header>

		
	