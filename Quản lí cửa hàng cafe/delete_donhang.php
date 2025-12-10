<?php
require_once("connect.php");
if(isset($_GET['id'])){
	$id=isset($_GET['id'])?$_GET['id']:"";
	$sql="DELETE FROM order_detail WHERE mahd ='$id'";
	$rel=mysqli_query($conn,$sql);
	echo "Bạn đã xóa thành công";
	header('location:quantri.php?action=ad_donhang');
}
 ?>