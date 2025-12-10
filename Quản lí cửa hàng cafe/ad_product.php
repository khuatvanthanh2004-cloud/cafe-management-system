<?php 
require_once("connect.php");
$ma_loaisp=isset($_POST['ma_loaisp'])?$_POST['ma_loaisp']:"";
$txt_masp=isset($_POST['txt_masp'])?$_POST['txt_masp']:"";
$txt_tensp=isset($_POST['txt_tensp'])?$_POST['txt_tensp']:"";
$upload_hinhanh=isset($_FILES['upload_hinhanh'])?$_FILES['upload_hinhanh']['name']:"";
$txt_soluong=isset($_POST['txt_soluong'])?$_POST['txt_soluong']:"";
$txt_gianhap=isset($_POST['txt_gianhap'])?$_POST['txt_gianhap']:"";
$txt_giaxuat=isset($_POST['txt_giaxuat'])?$_POST['txt_giaxuat']:"";
$txt_khuyenmai=isset($_POST['txt_khuyenmai'])?$_POST['txt_khuyenmai']:"";
$txt_motasp=isset($_POST['txt_motasp'])?$_POST['txt_motasp']:"";
if(isset($_POST["btn_save"])){
	$sql1="SELECT * FROM ad_product WHERE masp='$txt_masp'";
	$rel1=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($rel1)>0){
		echo "đã tồn tại mã sản phẩm này";
	}
	else{
		$sql2="INSERT INTO ad_product VALUES('$ma_loaisp','$txt_masp',";	
		$sql2.="'$txt_tensp','$upload_hinhanh','$txt_soluong',";
		$sql2.="'$txt_gianhap','$txt_giaxuat','$txt_motasp',";
		$sql2.="'$txt_khuyenmai')";
		$rel2=mysqli_query($conn,$sql2);
		echo "Bạn đã lưu thành công";
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
        	<option value="<?php echo $r['ma_loaisp'];?>">
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
    <td><input name="txt_masp" type="text" /></td>
  </tr>
  <tr>
    <td>Tên sản phẩm</td>
    <td><input name="txt_tensp" type="text" /></td>
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
    <input name="upload_hinhanh" type="file" /></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input name="txt_soluong" type="text" /></td>
  </tr>
  <tr>
    <td>Giá nhập</td>
    <td><input name="txt_gianhap" type="text" /></td>
  </tr>
  <tr>
    <td>Giá xuất</td>
    <td><input name="txt_giaxuat" type="text" /></td>
  </tr>
  <tr>
    <td>Khuyến mại</td>
    <td><input name="txt_khuyenmai" type="number" /></td>
  </tr>
  <tr>
    <td>Mô tả</td>
    <td><textarea name="txt_motasp" cols="50" rows="5"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" style="text-align:center"><input name="btn_save" type="submit" value="Lưu" /></td>
  </tr>
</table>
</form>