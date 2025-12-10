<?php 
require_once("connect.php");

if(isset($_GET["id"])){
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$sql="SELECT * FROM ad_productype WHERE ma_loaisp ='$id'";
	$rel=mysqli_query($conn,$sql);
	$r=mysqli_fetch_assoc($rel);
	#var_dump($r);

	$txt_maloaisp=isset($_POST['txt_maloaisp'])?$_POST['txt_maloaisp']:$r['ma_loaisp'];
	$txt_tenloaisp= isset($_POST['txt_tenloaisp'])?$_POST['txt_tenloaisp']:$r['ten_loaisp'];
	$txt_motaloaisp =isset($_POST['txt_motaloaisp'])?$_POST['txt_motaloaisp']:$r['mota_loaisp'];
	
	if(isset($_POST["btn_update"])){
		$sql2="UPDATE ad_productype SET
		ma_loaisp='$txt_maloaisp',
		ten_loaisp='$txt_tenloaisp',
		mota_loaisp='$txt_motaloaisp'
			WHERE ma_loaisp='$id'";
		$rel2=mysqli_query($conn,$sql2);
		echo "Bạn đã cập nhập thành công";
		header('location:quantri1.php?action=ad_productype');
	}
}
?>
<form action="" method="post">
<table width="683" border="1">
  <tr>
    <td colspan="2">Cập nhập danh mục loại sản phẩm</td>
   
  </tr>
  <tr>
    <td width="197">Mã loại sản phẩm</td>
    <td width="470"><input name="txt_maloaisp" type="text" value="<?php echo $txt_maloaisp;?> "></td>
  </tr>
  <tr>
    <td>Tên loại sản phẩm</td>
    <td><input name="txt_tenloaisp" type="text" value="<?php echo $txt_tenloaisp;?>"></td>
  </tr>
  <tr>
    <td>Mô tả loại sản phẩm</td>
    <td><textarea name="txt_motaloaisp" cols="50" rows="5" value="<?php echo $txt_motaloaisp;?>"></textarea></td>
  </tr>
   <tr>
    <td colspan="2" style="text-align:center">
    <input name="btn_update" type="submit" value="Cập nhật">
    </td>
  </tr>
</table>
</form>