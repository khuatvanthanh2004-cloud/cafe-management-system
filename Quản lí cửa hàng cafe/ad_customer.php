<?php 
require_once("connect.php");

?>
<table width="950" border="1">
  <tr>
        <td colspan="9" style="text-align:center">Quản lí khách hàng</td>
  </tr>
  <tr>
  	<td width="41">STT</td>
    <td width="108">Mã khách hàng</td>
    <td width="109">Tên khách hàng</td>
    <td width="67">Email</td>
    <td width="107">Phone</td>
    <td width="188">Địa chỉ liên hệ</td>
    <td width="209">Địa chỉ giao hàng</td>
    <td width="209">Thanh toán bằng</td>
     <td width="209">Phương thức bằng</td>
    <td width="69">Update</td>
    <td width="69">Delete</td>
  </tr>
  <?php 
  $sql1="SELECT * FROM customer";
  $rel1=mysqli_query($conn, $sql1);
  $i=0;
  if(mysqli_num_rows($rel1)>0){
	  while ($r=mysqli_fetch_assoc($rel1)){
		  $i++;
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $r['makh']?></td>
    <td><?php echo $r['tenkh']?></td>
    <td><?php echo $r['email']?></td>
    <td><?php echo $r['phone']?></td>
    <td><?php echo $r['diachi_lienhe']?></td>
    <td><?php echo $r['diachi_giaohang']?></td>
    <td><?php echo $r['payment']?></td>
    <td><?php echo $r['shipcod']?></td>
    <td><a href="quantri1.php?action=update_customer&id=<?php echo $r['makh'] ?>">Update</a></td>
    <td><a href="quantri1.php?action=delete_customer&id=<?php echo $r['makh'] ?>">Delete</a></td>
  </tr>
  <?php
	  }
  }
  ?>
</table>
