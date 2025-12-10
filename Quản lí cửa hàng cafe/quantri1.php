<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../public/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div class="main">
    <div class="head_2">
    	<ul class="menu1">
        <li>
         <a href="quantri1.php?action=ad_productype"> Quản lí loại sản phẩm</a>
         </li>
         <li>
         <a href="quantri1.php?action=ad_product_list"> Quản lí sản phẩm</a>
         </li>
         <li>
         <a href="quantri1.php?action=ad_customer"> Quản lí khách hàng</a>
         </li>
         <li>
         <a href="quantri1.php?action=ad_donhang"> Quản lí đơn hàng</a>
         </li>
         <li>
         <a href="quantri1.php?action=ad_bcdoanhthu"> Báo cáo doanh thu</a>
         </li>
         <li>
         <a href="quantri1.php?action=view_contact"> Thông tin phản hồi</a>
         </li>
        </ul>
        </div>
        <div class="content">
        <?php
		if(isset($_GET["action"])){
			$action=isset($_GET["action"])?$_GET["action"]:"";
			switch($action){
				case'ad_productype':
					require_once("ad_productype.php");
						break;
				case'ad_product':
					require_once("ad_product.php");
						break;
				case'ad_customer':
					require_once("ad_customer.php");
						break;
				case'ad_donhang':
					require_once("ad_donhang.php");
						break;
				case'ad_bcdoanhthu':
					require_once("ad_bcdoanhthu.php");
						break;
				case'delete_adproductype':
					require_once("delete_adproductype.php");
						break;
				case'update_adproductype':
					require_once("update_adproductype.php");
						break;
				case'delete_product':
					require_once("delete_product.php");
						break;		
				case'update_product':
					require_once("update_product.php");
						break;
				case'ad_product_list':
					require_once("ad_product_list.php");
						break;
				case'update_customer':
					require_once("update_customer.php");
						break;
				case'delete_customer':
					require_once("delete_customer.php");
						break;
				case'ad_donhang_list':
					require_once("ad_donhang_list.php");
						break;
			    case'view_contact':
					require_once("view_contact.php");
						break;
				default:
					require_once("quantri1.php");
						break;
			}
		}
		?>
</body>
</html>