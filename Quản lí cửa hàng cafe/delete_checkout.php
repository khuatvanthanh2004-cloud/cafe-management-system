<?php
require_once("view/connect.php");
if(isset($_GET['id'])){
	$id=isset($_GET['id'])?$_GET['id']:"";
	$sql="DELETE FROM `order` WHERE mahd ='$id'";
	$rel=mysqli_query($conn,$sql);
	echo "Bạn đã xóa thành công";
	header('location:index2.php?action=pay');
}
 ?>