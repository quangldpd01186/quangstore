<div id="menu-left">
    <div class="logo  ">
        <a href="index.php" class=""> <img  src="images/logo.png" alt=""/></a>
    </div>
			<div class="timkiem stretchRight">
				<form action="timkiem.php" method="GET">
					<input class="ip1" type="text" name="TimKiem" placeholder="Tìm Kiếm" required>
					<input class="ip2" type="submit" value="">
				</form>
			</div>
			<div class="danhmucmenu ">			
				
				<?php 
					$sql=mysqli_query($conn,"SELECT * FROM danhmuc");
					while ($row=mysqli_fetch_array($sql)){
						$query=mysqli_query($conn,"SELECT * FROM sanpham WHERE MaDM='$row[0]'");
						$check=mysqli_num_rows($query);
						if($check!=0){
							echo '<p class="dmcap2"><a href="sanpham.php?type='.$row[0].'"> '.$row[1].'</a></p>';
						}
					}
				?>	
				
			</div>
			
		</div>