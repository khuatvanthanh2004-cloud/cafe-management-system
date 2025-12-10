<?php 
require_once("connect.php");
?>
<table width="685" border="1">
  <tr>
    <td colspan="7" style="text-align:center">Quản lí đơn hàng</td>
  </tr>
  <tr>
    <td width="41">STT</td>
    <td width="78">Mã hóa đơn</td>
    <td width="86">Mã Khách hàng</td>
    <td width="86">Tổng tiền</td>
    <td width="96">Ngày đặt</td>
    <td width="115">Chi tiết</td>
    
  </tr>
  <?php 
  $sql1="SELECT * FROM `order` ";
  $rel1=mysqli_query($conn, $sql1);
  $i=0;
  if(mysqli_num_rows($rel1)>0){
	  while ($r=mysqli_fetch_assoc($rel1)){
		  $i++;
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $r['mahd']?></td>
    <td><?php echo $r['makh']?></td>
    <td><?php echo $r['tongtien']?></td>
    <td><?php echo $r['ngaydat']?></td>
    <td><a href="quantri1.php?action=ad_donhang_list&id=<?php echo $r['mahd'] ?>">Chi tiết</a></td>
    
  <?php
	  }
  }
  ?>
</table>
