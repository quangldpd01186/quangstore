<?php 
	session_start();
	if(!isset($_SESSION['NameDN'])){header('location:login.php');}
	if ($_SESSION['VTro']==1){
		header('Location:user-view.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Administrator</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">
    <link href="../css/animation.css" rel="stylesheet">

  </head>
  <body>
		<!-- ---------------------------------------------------------------------HEDER -->
		<?php include("menu.php");?>
		<!-- END   HEDER -->
		
		<!-- -----------------------------------------------------------------MENU LEFT -->
		<div id="menu-left" class="">
			<p class="helo">Chào, <?php echo $_SESSION['NameDN'];?></a> ! <a href="user/logout.php">Thoát</a></p>
			<div class="danhmucmenu ">
				<h2 class="tendanhmuc"> thành viên</h2>
				<h3 class="dmcap1"><a href="user-add.php"> Thêm mới thành viên</a></h3>
				<h3 class="dmcap1"><a href="index.php">Back</a></h3>
			</div>
			
		</div>
		<!-- END   MENU LEFT -->

		<!-- -----------------------------------------------------------------CONTENT -->
		<section>
			<div class="content">
				
				<div class="main-content" style="height:585px">
					<div class="linksp">
						<a href="index.php">Thành Viên</a>  
						<span><i class="glyphicon glyphicon-menu-right"></i><i class="glyphicon glyphicon-menu-right"></i> </span>
						
						Thêm mới Thành Viên
					</div>
					<div class="adduser">
						<h3 class="nameadd"> Thêm mới thành viên  </h3>
						<div class="formadd">
							<p id="baoloi"></p>
							<form id="myForm" action="./user/themmoi.php" method="POST">
                                                            <table style="margin-left: 250px; width: 400px; height: 400px;">
                                                                <tr>
                                                                    <td>Họ Tên:</td>
                                                                    <td><input type="text" name="HTen" ></td>
                                                                </tr>	
                                                                <tr>
                                                                    <td>Username:</td>
                                                                    <td><input type="text" name="UName" required> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Password</td>
                                                                    <td><input type="text" name="PWord" required></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Ngày Sinh</td>
                                                                    <td><input type="date" name="NSinh" ></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>Địa Chỉ</td>
                                                                    <td><input type="text" name="DChi" ></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Giới Tính</td>
                                                                    <td><em id="ham1"><input type="radio" name="GTinh" value="0" required onclick="ham1()" >Nam</em>
									<em id="ham2"><input type="radio" name="GTinh" value="1" required onclick="ham2()">Nữ</em>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email</td>
                                                                    <td><input type="Email" name="Email" ></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Vai Trò</td>
                                                                    <td>
                                                                        <em id="ham3"><input type="radio" name="VTro" value="0" required onclick="ham3()">Admin</em>
									<em id="ham4"><input type="radio" name="VTro" value="1" required onclick="ham4()">Nhân Viên</em>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Điện Thoại</td>
                                                                    <td><input type="tel" name="DThoai" ></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><button style="width: 80px; height: 30px; background-color: rgba(0,0,0,0.8);color: white" form="myForm">Thêm Mới</button></td>
                                                                    <td><a id="" href="index.php">Hủy</a></td>
                                                                </tr>
										
									<div style="clear:both"></div>
								
                                                            </table>
							</form>
							
						</div>
					</div>
					
				</div>
			</div>
			
		</section>
		<script type="text/javascript">
			function ham1(){
				document.getElementById("ham1").style.border="1px solid #1B7AD4";
				document.getElementById("ham1").style.color="#1B7AD4";
				document.getElementById("ham2").style.border="none";
				document.getElementById("ham2").style.color="#424242";
			}
			function ham2(){
				document.getElementById("ham2").style.border="1px solid #1B7AD4";
				document.getElementById("ham2").style.color="#1B7AD4";
				document.getElementById("ham1").style.border="none";
				document.getElementById("ham1").style.color="#424242";
			}
			function ham3(){
				document.getElementById("ham3").style.border="1px solid #1B7AD4";
				document.getElementById("ham3").style.color="#1B7AD4";
				document.getElementById("ham4").style.border="none";
				document.getElementById("ham4").style.color="#424242";
			}
			function ham4(){
				document.getElementById("ham4").style.border="1px solid #1B7AD4";
				document.getElementById("ham4").style.color="#1B7AD4";
				document.getElementById("ham3").style.border="none";
				document.getElementById("ham3").style.color="#424242";
			}
		</script>
		<script src="../js/jquery-1.11.1.min.js"></script>
		<script>
			$("#sub").click( function(){
				var data= $("#myForm :input").serializeArray();
				$.post( $("#myForm").attr("action"), data, function(themmoi){ $("#baoloi").html(themmoi); });
				
			});
			
			$("#myForm").submit( function(){
				return false;
			});
			
			function clearInput(){
				$("#myForm :input").each( function(){
					$(this).val('');
				});
			};
		</script>
  </body>
</html>