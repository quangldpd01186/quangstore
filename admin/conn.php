<?php
	$conn = mysqli_connect("localhost","root","","quangstore");
	
	if (!$conn){
		die("Connection Failed: ". mysqli_connect_error());
		echo "Không kết nối được Database";
	}
     
?>
