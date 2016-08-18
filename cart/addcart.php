<?php
	session_start();
	$MaSP=$_POST["MaSP"];
	$id=$MaSP;
	
	
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['soluong'] = $_SESSION['cart'][$id] + 1;
	}else{
		$_SESSION['soluong'] = 1;}
		
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
?>