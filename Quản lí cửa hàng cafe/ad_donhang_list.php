<style type="text/css">
a.comeback{
	text-decoration:none;
    background:#00F;
	padding:10px;
	color:#fff;
	border:2px solid blue;
	border-radius: 8px;
}
</style>
<?php
require_once("connect.php");
  ?>
<form action="" method="post">
<table width="630" border="1">
  <tr>
    <td colspan="7" style="text-align:center">Chi tiết đơn hàng</td>
  </tr>
  <tr>
  <td colspan="7">
    <a href="quantri1.php?action=ad_donhang" class="comeback">
    quay lại</a></td>
  </tr>
   <tr>
   	<td>STT</td>
    <td width="84">Mã hóa đơn</td>
    <td width="72">Mã sản phẩm</td>
    <td width="75">Tên sản phẩm</td>
    <td width="79">Số lượng</td>
    <td width="107">Gía tiền</td>
    <td width="173">Thành tiền</td>
  </tr>
  <?php 
  if(isset($_GET["id"])){
	$id=isset($_GET["id"])?$_GET["id"]:"";
  $sql1="SELECT * FROM order_detail Where mahd='$id'";
  $rel1=mysqli_query($conn, $sql1);
  $i=0;
  if(mysqli_num_rows($rel1)>0){
	  while ($r=mysqli_fetch_assoc($rel1)){
		  $i++;
  ?>
  <tr>
  	<td><?php echo $i?></td>
    <td><?php echo $r['mahd']?></td>
    <td><?php echo $r['masp']?></td>
    <td><?php echo $r['tensp']?></td>
    <td><?php echo $r['soluong']?></td>
    <td><?php echo $r['giatien']?></td>
    <td><?php echo $r['thanhtien']?></td>
  </tr>
   <?php
	  }
  }
  }
  ?>
</table>
</form>