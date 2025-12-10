<?php 
require_once("connect.php");
if(isset($_GET["id"])){
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$sql="SELECT * FROM ad_product WHERE masp ='$id'";
	$rel=mysqli_query($conn,$sql);
	$r=mysqli_fetch_assoc($rel);
	
	$txt_maloaisp=isset($_POST['txt_maloaisp'])?$_POST['txt_maloaisp']:$r['ma_loaisp'];
	$txt_masp=isset($_POST['txt_masp'])?$_POST['txt_masp']:$r['masp'];
	$txt_tensp=isset($_POST['txt_tensp'])?$_POST['txt_tensp']:$r['tensp'];
	$upload_hinhanh=isset($_FILES['upload_hinhanh'])?$_FILES['upload_hinhanh']['name']:$r['hinhanh'];
	$txt_soluong=isset($_POST['txt_soluong'])?$_POST['txt_soluong']:$r['soluong'];
	$txt_gianhap=isset($_POST['txt_gianhap'])?$_POST['txt_gianhap']:$r['gianhap'];
	$txt_giaxuat=isset($_POST['txt_giaxuat'])?$_POST['txt_giaxuat']:$r['giaxuat'];
	$txt_khuyenmai=isset($_POST['txt_khuyenmai'])?$_POST['txt_khuyenmai']:$r['khuyenmai'];
	$txt_motasp=isset($_POST['txt_motasp'])?$_POST['txt_motasp']:$r['mota'];
	//Cập nhật dữ liệu
	if(isset($_POST["btn_save"])){
		$sql2="UPDATE ad_product SET
		ma_loaisp='$txt_maloaisp',
		masp='$txt_masp',
		tensp='$txt_tensp',
		hinhanh='$upload_hinhanh',
		soluong='$txt_soluong',
		gianhap='$txt_gianhap',
		giaxuat='$txt_giaxuat',
		khuyenmai='$txt_khuyenmai',
		mota='$txt_motasp'
			WHERE masp='$id'";
		$rel2=mysqli_query($conn,$sql2);
		echo "Bạn đã cập nhập thành công";
		header('location:quantri1.php?action=ad_product_list');
	}
}
?>
<form action="" method="post" enctype="multipart/form-data">
<table width="200" border="1">
  <tr>
    <td colspan="2" style="text-align:center">Quản lí danh mục sản phẩm</td>
  </tr>
  <tr>
    <td>Mã loại sản phẩm</td>
    <td>
	 <select name="ma_loaisp">
	<?php 
	$sql="SELECT * FROM ad_productype";
	$rel=mysqli_query($conn,$sql);
	while($r=mysqli_fetch_assoc($rel)){
		?>
        	<option value="<?php echo $txt_maloaisp;?>">
            	<?php echo $r['ma_loaisp'];?>
                </option>
                <?php
	}
	?>
    </select>
  </td>
  </tr>
  <tr>
    <td>Mã sản phẩm</td>
    <td><input name="txt_masp" type="text" value="<?php echo $txt_masp;?>" /></td>
  </tr>
  <tr>
    <td>Tên sản phẩm</td>
    <td><input name="txt_tensp" type="text" value="<?php echo $txt_tensp;?>" /></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td>
     <?php if (isset($_FILES["upload_hinhanh"])){
			$fine_name=$_FILES["upload_hinhanh"]['name'];
			$file_tmp =$_FILES["upload_hinhanh"]['tmp_name'];
			move_uploaded_file($file_tmp,"../image/".$fine_name);
			}
		
			?>
    <input name="upload_hinhanh" type="file"  value="<?php echo $upload_hinhanh;?>"/></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input name="txt_soluong" type="text" value="<?php echo $txt_soluong;?>" /></td>
  </tr>
  <tr>
    <td>Giá nhập</td>
    <td><input name="txt_gianhap" type="text" value="<?php echo $txt_gianhap;?>" /></td>
  </tr>
  <tr>
    <td>Giá xuất</td>
    <td><input name="txt_giaxuat" type="text" value="<?php echo $txt_giaxuat;?>" /></td>
  </tr>
  <tr>
    <td>Khuyến mại</td>
    <td><input name="txt_khuyenmai" type="number" value="<?php echo $txt_khuyenmai;?>"/></td>
  </tr>
  <tr>
    <td>Mô tả</td>
    <td><textarea name="txt_motasp" cols="50" rows="5" value="<?php echo $txt_motasp;?>"><?php echo $txt_motasp;?>
    </textarea></td>
  </tr>
  <tr>
    <td colspan="2" style="text-align:center"><input name="btn_save" type="submit" value="Cập nhật" /></td>
  </tr>
</table>
</form>
