<?php
	session_start();
	$SLCN=$_GET["SLCN"];
	$id=$_GET["MAGH"];

	//echo $nc;
	//$end=strlen($nc);
	//$MaSP= substr( $nc,  0, 6);
	//$Size= substr( $nc,  6, $end);
	//echo 'Biên ban đầu - '.$nc;
	//echo '<br> Số ký tự - '.$end;
	//echo '<br> Mã SP - '.$MaSP;
	//echo '<br> SIZE SP - '.$Size;
	
	if (!empty($SLCN)){
		$_SESSION['soluong'] =  $SLCN;
		$_SESSION['cart'][$id] = $_SESSION['soluong'];

		// Đếm sản phẩm
		$kiemtra=1;
		$dem=0;
		if(isset($_SESSION['cart']))
		{
			foreach($_SESSION['cart'] as $masp=>$soluong)
			{
				$dem+=$soluong;
				if(isset($masp))
				{
					   $kiemtra=2;
				}
			}
		}
		if ($kiemtra != 2)
		{
			 echo '0';
		}
		else
		{
				$_SESSION['dem'] =$dem;

		} 
		header('Location:../shopcart.php');
	}else{header('Location:../shopcart.php');}
?>