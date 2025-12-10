<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coffe in my life</title>
<link href="public/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="main">
    	<!--logo, menu, search-->
    	<div class="head">
        <?php 
				session_start();
            	require_once('header.php')
                 ?>
        	<!-- logo, search -->
            <div class="content">
	<?php
			if(isset($_GET["action"])){
			$action=isset($_GET["action"])?$_GET["action"]:"";
			switch($action){
				case'home':
					require_once("home.php");
					break;
				case'product':
					require_once("list_product.php");
					break;
				case'introduce':
					require_once("introduce.php");
					break;
				case'contact':
					require_once("contact.php");
					break;
				case'pay':
					require_once("pay.php");
					break;
				case'login':
					require_once("login.php");
					break;
				case'dangkithanhvien':
					require_once("dangkithanhvien.php");
					break;
				case'addtocart':
					require_once("addtocart.php");
					break;
				case'addtocart_delete':
					require_once("addtocart_delete.php");
					break;
				case'checkout':
					require_once("checkout.php");
					break;
				case'search':
					require_once("search.php");
					break;
				case'delete_checkout':
					require_once("delete_checkout.php");
					break;
			}
			}
			?>
            </div>
        <!--Chân trang-->
        <div class="footer"> 
        <p>Copyright by@Nguyễn Thanh Thảo & @Khuất Văn Thành</p>
        <p>Lập trình PHP căn bản @Nguyễn Thị Vàn</p>
    </div>
      
</body>
</html>