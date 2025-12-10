<?php 
require_once("connect.php");
if(isset($_GET["id"])){
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$sql="SELECT * FROM customer WHERE makh ='$id'";
	$rel=mysqli_query($conn,$sql);
	$r=mysqli_fetch_assoc($rel);
	$txt_makh=isset($_POST['txt_makh'])?$_POST['txt_makh']:$r['makh'];
	$txt_tenkh=isset($_POST['txt_tenkh'])?$_POST['txt_tenkh']:$r['tenkh'];
	$txt_email=isset($_POST['txt_email'])?$_POST['txt_email']:$r['email'];
	$txt_phone=isset($_POST['txt_phone'])?$_POST['txt_phone']:$r['phone'];
	$diachi_lienhe=isset($_POST['diachi_lienhe'])?$_POST['diachi_lienhe']:$r['diachi_lienhe'];
	$diachi_giaohang=isset($_POST['diachi_giaohang'])?$_POST['diachi_giaohang']:$r['diachi_giaohang'];

	if(isset($_POST["btn_save"])){
		$sql2="UPDATE customer SET
		makh='$txt_makh',
		tenkh='$txt_tenkh',
		email='$txt_email',
		phone='$txt_phone',
		diachi_lienhe='$diachi_lienhe',
		diachi_giaohang='$diachi_giaohang'
			WHERE makh='$id'";
		$rel2=mysqli_query($conn,$sql2);
		echo "Bạn đã cập nhập thành công";
		header('location:quantri1.php?action=ad_customer');
	}
}
?>
<form action="" method="post">
<table width="200" border="1">
  <tr>
    <td colspan="2">Quản lí khách hàng</td>
    
  </tr>
  <tr>
    <td>Mã khách hàng</td>
    <td><select name="makh">
	<?php 
	$sql="SELECT * FROM customer";
	$rel=mysqli_query($conn,$sql);
	while($r=mysqli_fetch_assoc($rel)){
		?>
        	<option value="<?php echo $r['makh'];?>">
            	<?php echo $r['makh'];?>
                </option>
                <?php
	}
	?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Tên khách hàng</td>
    <td><input name="txt_tenkh" type="text" value="<?php echo $txt_tenkh ?>"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input name="txt_email" type="text" value="<?php echo $txt_email ?>"></td>
  </tr>
  <tr>
    <td>Phone</td>
    <td><input name="txt_phone" type="text" value="<?php echo $txt_phone ?>"></td>
  </tr>
  <tr>
    <td>Địa chỉ liên hệ</td>
    <td><input name="diachi_lienhe" value="<?php echo $diachi_lienhe ?>"></td>
  </tr>
  <tr>
    <td>Địa chỉ giao hàng</td>
    <td><input name="diachi_giaohang"  value="<?php echo $diachi_giaohang ?>"></td>
  </tr>
  <tr>
  <td colspan="2" style="text-align:center">
  <input name="btn_save" type="submit" value="cập nhật">
  </td>
  </tr>
</table>
</form>
