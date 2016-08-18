<?php
	
	$NhanVIen=$_SESSION['NameDN'];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = ($_POST["TheLoai"]);
		if ($_SESSION['VTro']==0){$sql=mysqli_query($conn,"SELECT * FROM sanpham WHERE MaDM='$name' ORDER BY NgayDang DESC");}
		else {$sql=mysqli_query($conn,"SELECT * FROM sanpham WHERE MaDM='$name'AND NguoiDang='$NhanVIen' ORDER BY NgayDang DESC");}
		$count=mysqli_num_rows($sql);
		$i=1;
		while ($row=mysqli_fetch_array($sql)){
				$NgayDang = date("d/m/Y", strtotime($row[8]));
				$sql1=mysqli_query($conn,"SELECT * FROM danhmuc WHERE MaDM='$row[6]'");
					while ($danhmuc=mysqli_fetch_array($sql1)){ $namedm=$danhmuc[1];}
				if ($i % 2 != 0){
					echo '
						<div class="listct">
							<div class="col-md-1 listtd ragiua">'.$i.'</div>
							<div class="col-md-2 listtd"><img style="width:100%" src="../images/sanpham/'.$row[4].'" alt="" /></div>
							<div class="col-md-3 listtd">
								Mã Sản Phẩm <strong style="color:red;text-transform:uppercase">'.$row[0].'</strong><br>
								<span class="damlen">'.$row[1].'</span> <br>
								Ngày đăng : '.$NgayDang.' <br>
								Người đăng : '.$row[6].' <br> 
								
							</div>
							
							<div class="col-md-2 listtd ">
								Giá : '. number_format($row[2]).' đ<br>
								
							</div>
							<div class="col-md-2 listtd ragiua">
								<a href="sanpham-fix.php?id='.$row[0].'">Edit</a>
								<a onclick="return xacnhan()" href="./sanpham/deluser.php?id='.$row[0].'" >Delete</a>
							</div>
							
							<div style="clear:both"></div>
						</div>';
					
				}else{
					echo '
						<div class="listct">
							<div class="col-md-1 listtd ragiua">'.$i.'</div>
							<div class="col-md-2 listtd"><img style="width:100%" src="../images/sanpham/'.$row[4].'" alt="" /></div>
							<div class="col-md-3 listtd">
								Mã Sản Phẩm <strong style="color:red;text-transform:uppercase">'.$row[0].'</strong><br>
								<span class="damlen">'.$row[1].'</span> <br>
								Ngày đăng : '.$NgayDang.' <br>
								Người đăng : '.$row[6].' <br> 
								
							</div>
							
							<div class="col-md-2 listtd ">
								Giá : '. number_format($row[2]).' đ<br>
								
							</div>
							<div class="col-md-2 listtd ragiua">
								<a href="sanpham-fix.php?id='.$row[0].'">Edit</a>
								<a onclick="return xacnhan()" href="./sanpham/deluser.php?id='.$row[0].'" >Delete</a>
							</div>
							
							<div style="clear:both"></div>
						</div>';
					
				} // End Else 
				$i++; 
		} // End While 
	}else{
		//$sql=mysqli_query($conn,"SELECT * FROM sanpham ORDER BY NgayDang DESC");
		if ($_SESSION['VTro']==0){$sql=mysqli_query($conn,"SELECT * FROM sanpham ORDER BY NgayDang DESC");}
		else {$sql=mysqli_query($conn,"SELECT * FROM sanpham WHERE NguoiDang='$NhanVIen' ORDER BY NgayDang DESC");}
		$count=mysqli_num_rows($sql);
		$i=1;
		while ($row=mysqli_fetch_array($sql)){
				$NgayDang = date("d/m/Y", strtotime($row[8]));
				$sql1=mysqli_query($conn,"SELECT * FROM danhmuc WHERE MaDM='$row[6]'");
					while ($danhmuc=mysqli_fetch_array($sql1)){ $namedm=$danhmuc[1];}
				
				if ($i % 2 != 0){
					echo '
						<div class="listct">
							<div class="col-md-1 listtd ragiua">'.$i.'</div>
							<div class="col-md-2 listtd"><img style="width:100%" src="../images/sanpham/'.$row[4].'" alt="" /></div>
							<div class="col-md-3 listtd">
								Mã Sản Phẩm <strong style="color:red;text-transform:uppercase">'.$row[0].'</strong><br>
								<span class="damlen">'.$row[1].'</span> <br>
								Ngày đăng : '.$NgayDang.' <br>
								Người đăng : '.$row[7].' <br> 
								
							</div>
							
							<div class="col-md-2 listtd ">
								Giá : '. number_format($row[2]).' đ<br>
								KM : <strong style="color:red;font-size: 16px;">'. number_format($row[3]).' đ</strong>
							</div>
							<div class="col-md-2 listtd ragiua">
								<a href="sanpham-fix.php?id='.$row[0].'">Edit</a>
								<a onclick="return xacnhan()" href="./sanpham/deluser.php?id='.$row[0].'" >Delete</a>
							</div>
							
							<div style="clear:both"></div>
						</div>';
					
				}else{
					echo '
						<div class="listct sochan">
							<div class="col-md-1 listtd ragiua">'.$i.'</div>
							<div class="col-md-2 listtd"><img style="width:100%" src="../images/sanpham/'.$row[4].'" alt="" /></div>
							<div class="col-md-3 listtd">
								Mã Sản Phẩm <strong style="color:red;text-transform:uppercase;">'.$row[0].'</strong><br>
								<span class="damlen">'.$row[1].'</span> <br>
								Ngày đăng : '.$NgayDang.' <br>
								Người đăng : '.$row[7].' <br> 
								
							</div>
							
							<div class="col-md-2 listtd ">
								Giá : '. number_format($row[2]).' đ<br>
								KM : <strong style="color:red">'. number_format($row[3]).' đ</strong>
							</div>
							<div class="col-md-2 listtd ragiua">
								<a href="sanpham-fix.php?id='.$row[0].'">Edit</a>
								<a onclick="return xacnhan()" href="./sanpham/deluser.php?id='.$row[0].'" >Delete</a>
							</div>
							
							<div style="clear:both"></div>
						</div>';
					
				} // End Else 
				$i++; 
		} // End While 
	}
?>
						