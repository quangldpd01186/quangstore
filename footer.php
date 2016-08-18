
			<footer>
				<div class="footer-title">
                                    <a href="index.php" >Trang chủ</a> |                                   
                                    <a href="gioithieu.php">Giới thiệu</a> | 
                                    <a href="">Dịch vụ</a> | 
                                    <a href="">Đối tác</a> | 
                                    <a href="">Tin tức</a> | 
                                    <a href="lienhe.php">Liên hệ</a>
                                </div>
                                <div class="footer-content" style="text-align:center;">
                                    <span style="font-weight: bold;">Bản quyền thuộc về <span style="font-weight: bold;">Quang's Store</span></span><br />
                                    Địa chỉ: 137 Nguyễn Thị Thập, Hòa Minh, Liên Chiểu, TP.Đà Nẵng.<br />
                                    Điện thoại: 0934 723 773<br />
                                    Email: quangldpd01186@fpt.edu.vn<br />
                                </div>			
				<div style="clear:both"></div>
			</footer>
		</section>
                <script type="text/javascript">!function(t,e,n){
                    function a(t){var  a=e.createElement("script");a.type="text/javascript" ,a.async=!0,a.src=("https:"===e.location.protocol?"https":"http")+":"+n,(t||e.body||e.head).appendChild(a)}function o(){var  t=e.getElementsByTagName("script"),n=t[t.length-1];return n.parentNode} var  p=o();t.spotId="sp_rvacpFNh",t.parentElement=p,a(p)}(window.SPOTIM={},document,"//www.spot.im/launcher/bundle.js");
                </script>
	<!-- LOGIN POPUP-->
	<div id="login" style="display:none">
		<div class="ct-poplog slideUp" id="login1Form" style="margin-bottom:0;">
			<h3>đăng nhập </h3>
			<form action="php/login.php" method="POST" id="loginForm">
				<p><span>Tài Khoản</span> :<input type="text" name="NameDN" ></p>
				<p><span>Mật Khẩu</span> :<input type="password" name="PassDN" ></p>
				<p id="baoloi" style="background:none;margin:5px 35px;padding:5px;text-align:right;color:red;"></p>
				<button class="pop-huylogin" id="sub"><i class="glyphicon glyphicon-ok" ></i> Đăng Nhập</button>
				<span class="buttonnemi" onclick="clickLogin()" form="loginForm"><i class="glyphicon glyphicon-remove"></i> Thoát</span>
				
			</form>
			<p><a href="dangky.php" style="color:#fff; padding-left: 30px;"> Đăng ký tài khoản</a></p>
			
		</div>
		
	</div>
        
	<script>
		function clickLogin() {
			var x = document.getElementById("pop-login");
			if (x.style.display=="none") {
				x.style.display="block";
				document.getElementById("myBody").style.overflow ="hidden";
				document.getElementById("login1Form").style.display="block";
				document.getElementById("login1Form").style.height="auto";
				document.getElementById("login2Form").style.display="none";
			}else {
				x.style.display="none";
				document.getElementById("myBody").style.overflow ="auto";
				location.reload();
			}
		}
		
	</script>
	
	<script>
		$("#sub").click( function(){
			var data= $("#loginForm :input").serializeArray();
			$.post( $("#loginForm").attr("action"), data, function(login){ $("#baoloi").html(login); });
			clearInput();
		});
		
		$("#loginForm").submit( function(){
			return false;
		});
		
		function clearInput(){
			$("#loginForm :input").each( function(){
				$(this).val('');
			});
		};
	</script>
	<script>
		$("#sub1").click( function(){
			var data= $("#loginFormn :input").serializeArray();
			$.post( $("#loginFormn").attr("action"), data, function(getpass){ $("#baoloi1").html(getpass); });
			clearInput();
		});
		
		$("#loginFormn").submit( function(){
			return false;
		});
		
		function clearInput(){
			$("#loginFormn :input").each( function(){
				$(this).val('');
			});
		};
	</script>
        
    
  </body>
</html>