<?php 
require_once("connect.php");
$txt_maloaisp =isset($_POST["txt_maloaisp"])?$_POST["txt_maloaisp"]:"";
$txt_tenloaisp =isset($_POST["txt_tenloaisp"])?$_POST["txt_tenloaisp"]:"";
$txt_motaloaisp =isset($_POST["txt_motaloaisp"])?$_POST["txt_motaloaisp"]:"";
if(isset($_POST["tbn_save"])){
	$sql="SELECT * FROM ad_productype WHERE ma_loaisp='$txt_maloaisp'";
	$rel=mysqli_query($conn,$sql);
	if(mysqli_num_rows($rel)>0){
		echo "đã tồn tại mã loại sản phẩm này";
	}
	else {
		$sql1="INSERT INTO ad_productype VALUE('$txt_maloaisp',";
		$sql1.="'$txt_tenloaisp','$txt_motaloaisp')";
		$rel1=mysqli_query($conn,$sql1);
		echo "bạn đã lưu thành công";
		}
	}

?>
<form action="" method="post">
<table width="200" border="1">
  <tr>
    <td colspan="4" style="text-align:center">Quản lí loại sản phẩm</td>
 
  </tr>
  <tr>
    <td><input name="txt_maloaisp" type="text" placeholder="Nhập mã loại sp">
    </td>
    <td><input name="txt_tenloaisp" type="text" placeholder="Nhập tên loại sp"></td>
    <td><input name="txt_motaloaisp" type="text" placeholder="Nhập mô tả loại sp"></td>
    <td><input name="tbn_save" type="submit" placeholder="Lưu"></td>
  </tr>
</table>
<table width="866" border="1">
  <tr>
    <td width="57">STT</td>
    <td width="202">Mã loại sản phẩm</td>
    <td width="193">Tên loại sản phẩm</td>
    <td width="231">Mô tả loại sản phẩm</td>
    <td width="74">Delete</td>
     <td width="69">Update</td>
  </tr>
  <?php 
  $sql2="SELECT * FROM ad_productype";
  $rel2=mysqli_query($conn, $sql2);
  $i=0;
  if(mysqli_num_rows($rel2)>0){
	  while ($r=mysqli_fetch_assoc($rel2)){
		  $i++;
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $r['ma_loaisp']?></td>
    <td><?php echo $r['ten_loaisp']?></td>
    <td><?php echo $r['mota_loaisp']?></td>
    <td><a href="quantri1.php?action=delete_adproductype&id=<?php echo $r['ma_loaisp'] ?>">Delete</a></td>
    <td><a href="quantri1.php?action=update_adproductype&id=<?php echo $r['ma_loaisp'] ?>">Update</a></td>
  </tr>
 <?php
  }
  }
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>