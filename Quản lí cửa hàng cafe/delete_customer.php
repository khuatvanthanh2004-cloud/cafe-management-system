<?php
require_once("connect.php");
if(isset($_GET['id'])){
	$id=isset($_GET['id'])?$_GET['id']:"";
	$sql="DELETE FROM customer WHERE makh ='$id'";
	$rel=mysqli_query($conn,$sql);
	echo "Bạn đã xóa thành công";
	header('location:quantri1.php?action=ad_customer');
}
 ?>