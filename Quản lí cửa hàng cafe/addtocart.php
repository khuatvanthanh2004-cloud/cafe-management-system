		<style type="text/css">
#hide{display:none;}
</style>
<?php
require_once("view/connect.php");
//echo $_GET["id"];
if(isset($_GET["id"])){
	$id=isset($_GET["id"])?$_GET["id"]:"";
	$sql ="SELECT * FROM ad_product WHERE masp='$id'";
	$res=mysqli_query($conn,$sql);
	$r=mysqli_fetch_assoc($res);
		//nếu tồn tại sản phẩm đã có trong giỏ hàng
		if(isset($_SESSION["cart"][$id])){
			$_SESSION["cart"][$id]['qty'] +=1;
		}
		else{
		// nếu sản phẩm chưa có trong giỏ hàng
		$_SESSION["cart"][$id]['qty']=1;//số lượng sp mua
			}
		$_SESSION["cart"][$id]['masp']=$r['masp'];
		$_SESSION["cart"][$id]['tensp']=$r['tensp'];
		$_SESSION["cart"][$id]['hinhanh']=$r['hinhanh'];
		$_SESSION["cart"][$id]['soluong']=$r['soluong'];
		$_SESSION["cart"][$id]['gianhap']=$r['gianhap'];
		$_SESSION["cart"][$id]['giaxuat']=$r['giaxuat'];
		$_SESSION["cart"][$id]['mota']=$r['mota'];
		$_SESSION["cart"][$id]['khuyenmai']=$r['khuyenmai'];
		}
?>
<form action="" method="post"><table width="400" border="1">
  <tr>
    <td>STT</td>
    <td>Hình ảnh</td>
    <td>Mã sản phẩm</td>
    <td>Tên sản phẩm</td>
    <td>Gía bán</td>
    <td>Khuyến mại</td>
    <td>Số lượng</td>
    <td>Thành tiền</td>
    <td>Xóa</td>
  </tr>
  <?php
  $i=0;$tongtien=0;
  foreach($_SESSION["cart"] as $k=>$v){
  		$i++; 
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><img src="image/<?php echo $v['hinhanh'];?>" width="80px"></td>
    <td><?php echo $v['masp'];?></td>	
    <td><?php echo $v['tensp'];?></td>
    <td><?php echo $v['giaxuat'];?></td>
    <td><?php echo $v['khuyenmai'];?></td>
    <td>
    <input type="text" value="<?php echo $v['qty'];?>" style="width:80px" name=qty[<?php echo $k;?>]>
    </td>
    <td>
 <?php
 $tt=0;  //tính cột thành tiền
 if($v['khuyenmai']>0){
	 $tt=$v['qty']*$v['khuyenmai'];
 }
 else {$tt=$v['qty']*$v['giaxuat'];
 }
 echo $tt;
 $tongtien +=$tt;
 ?>
    </td>
    <td>
    <!-- Xóa giỏ hàng sản phẩm-->
    <a href="index2.php?action=addtocart_delete&id=<?php echo $k; ?>" > Xóa</a>
    </td>
  </tr>
  <?php 
  }
  ?>
  <tr>
  <td colspan="7">Tổng tiền thanh toán</td>
  <td colspan="2"><?php echo $tongtien; ?></td>
  </tr>
  <tr>
  <td colspan="9">
  <input name="btn_submit" type="submit" value="cập nhật" />
  <input type="button" value="đặt hàng" onclick="hien()" />
  <input type="button" value="ẩn thông tin đặt hàng" onclick="an()" />
  </td>
  </tr>
  <?php
  		$txt_mahd="HD".mt_rand(0,1000000);// lấy ngẫu nhiên mhd
		$txt_makh="KH".mt_rand(0,1000000);
		$txt_tenkh="";
		$txt_email="";
		$txt_phone="";
		$diachi_lienhe="";
		$diachi_giaohang="";
		$topay="";
		$ship="";
  if (isset($_POST["btn_submit"])){
	  if($_POST["btn_submit"]=="cập nhật"){
		  foreach ($_POST["qty"] as $key=>$val){
			  $_SESSION["cart"][$key]['qty']=$val;
		  		}
		  header('location:index2.php?action=addtocart');
		  }
	  elseif($_POST["btn_submit"]=="đặt mua"){
		  //khi khách hàng đặt mua
		  $txt_tenkh=isset($_POST["txt_tenkh"])? $_POST["txt_tenkh"]:"";
		   $txt_email=isset($_POST["txt_email"])? $_POST["txt_email"]:"";
		    $txt_phone=isset($_POST["txt_phone"])? $_POST["txt_phone"]:"";
			$diachi_lienhe=isset($_POST["diachi_lienhe"])? $_POST["diachi_lienhe"]:"";
			$diachi_giaohang=isset($_POST["diachi_giaohang"])? $_POST["diachi_giaohang"]:"";
			$topay=isset($_POST["topay"])? $_POST["topay"]:"";
			$ship=isset($_POST["ship"])? $_POST["ship"]:"";
			$create_date=isset($_POST["create_date"])? $_POST["create_date"]:"";
	  // Lưu dữ liệu vào database
	  //lưu thông tin khách hàng vào bảng customer
				$sql1="INSERT INTO customer VALUES ('$txt_makh','$txt_tenkh',";
				$sql1.="'$txt_email','$txt_phone','$diachi_lienhe',";
				$sql1.="'$diachi_giaohang','$topay','$ship')";
				$rel1=mysqli_query($conn,$sql1);
				//lưu dữ liệu vào bảng order (bảng đơn hàng)
				$sql2="INSERT INTO `order` VALUES('$txt_mahd','$txt_makh',";
				$sql2.="'$tongtien','$create_date')";
				$rel2=mysqli_query($conn,$sql2);
				//lưu dữ liệu vào bảng order_detail (chi tiết đơn hàng)
				foreach ($_SESSION["cart"] as $k=>$v){
					$masp= $v['masp'];
					$tensp= $v['tensp'];
					$soluong=$v['qty'];
					if($v["khuyenmai"]>0){
						$giatien=$v["khuyenmai"];
						}
					else {
						$giatien=$v['giaxuat'];
						}
					$tt=$soluong*$giatien;
					$sql3="INSERT INTO order_detail VALUES('$txt_mahd','$masp',";
					$sql3.="'$tensp','$soluong','$giatien','$tt')";
					$rel3=mysqli_query($conn,$sql3);
				}
				echo "bạn đã lưu thành công";
	  }
  }
  ?>
  <script>
  function hien(){
	  document.getElementById("hide").style.display="block";
  }
  function an(){
	  document.getElementById("hide").style.display="none";
  }
  </script>
  <table width="500px" id="hide">
  Điền thông tin khách hàng đặt hàng
  	<tr>
    	<td>Mã hóa đơn</td>
        <td>
        <input name="txt_mahd" type="text" value="<?php echo $txt_mahd ;?>"/>
        </td>
    </tr>
	<tr>
    	<td>Mã khách hàng</td>
        <td>
        <input name="txt_makh" type="text" value="<?php echo $txt_makh ;?>"/>
        </td>
    </tr>
    <tr>
    	<td>Tên khách hàng</td>
        <td>
        <input name="txt_tenkh" type="text" value="<?php echo $txt_tenkh ;?>" />
        </td>
    </tr>
    <tr>
    	<td>Email</td>
        <td>
        <input name="txt_email" type="text" value="<?php echo $txt_email ;?>" />
        </td>
    </tr>
    <tr>
    	<td>Điện thoại</td>
        <td>
        <input name="txt_phone" type="text" value="<?php echo $txt_phone ;?>" />
        </td>
    </tr>
    <tr>
    	<td>Địa chỉ liên hệ</td>
        <td>
        <input name="diachi_lienhe" type="text" value="<?php echo $diachi_lienhe ;?>" />
        </td>
    </tr>
    <tr>
    	<td>Địa chỉ giao hàng</td>
        <td>
        <input name="diachi_giaohang" type="text" value="<?php echo $diachi_giaohang ;?>"  />
        </td>
    </tr>
  	<tr>
    	<td>Ngày đặt mua</td>
        <td>
        <input type="date" name="create_date" value="<?php echo $create_date ;?>" />
        </td>
    </tr>
    <tr>
    	<td>Thanh toán bằng</td>
        <td>
        <select name="topay">
                	<option value="ATM">Chuyển khoản bằng ATM</option>
                    <option value="tienmat">Tiền mặt</option>
        </td>
    </tr>
    <tr>
    	<td>Vận chuyển bằng</td>
        <td>
        <select name="ship">
                	<option value="Nhanhang">Đến cửa hàng</option>
                    <option value="Giaohang">Giao tận nhà</option>
        </td>
    </tr>
    <tr>
    	<td colspan="2">
        <input name="btn_submit" type="submit" value="đặt mua" />
        </td>
    </table>
</table>
</form>
