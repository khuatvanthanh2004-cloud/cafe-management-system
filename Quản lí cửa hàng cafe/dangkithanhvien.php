<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng kí thành viên</title>
<link href="../public/style.css" type="text/css" rel="stylesheet" />
<style type="text/css">
.dangkithanhvien {color:#000;}
</style>
</head>
<body>
<?php
require_once("view/connect.php");
$txt_fullname="";
$txt_username="";
$txt_password="";
$gioitinh="";
$txt_email="";
$txt_phone="";
$dropdown="";
$address="";
$uploadfile="";
// sở thích
$wed="";
$xemphim="";
$thethao="";
$level="";
if(isset($_POST["btn_dangkithanhvien"])){
	$txt_fullname=$_POST["txt_fullname"];
	$txt_username=$_POST["txt_username"];
	$txt_password=$_POST["txt_password"];
	$gioitinh=$_POST["gioitinh"];
	$txt_email=$_POST["txt_email"];
	$txt_phone=$_POST["txt_phone"];
	$quoctich=$_POST["dropdown"];
	$address=$_POST["address"];
	$uploadfile = isset($_FILES["uploadfile"]) ? $_FILES["uploadfile"]["name"] : "";
    //Sở thích
    $web = isset($_POST["web"]) ? $_POST["web"] : "";
    $xemphim = isset($_POST["xemphim"]) ? $_POST["xemphim"] : "";
    $thethao = isset($_POST["thethao"]) ? $_POST["thethao"] : "";
    $sothich = $web . "," . $xemphim . "," . $thethao;
    $level = isset($_POST["level"]) ? $_POST["level"] : "";
	$sql="SELECT * FROM dangkithanhvien WHERE username = '$txt_username'";
	$rel=mysqli_query($conn,$sql);
	if(mysqli_num_rows($rel)>0){
		echo "đã tồn tại tên đăng nhập này";
		}
	else {
		$sql1="INSERT INTO dangkithanhvien VALUE('$txt_fullname',";
		$sql1.="'$txt_username','$txt_password','$txt_email','$txt_phone',";
		$sql1.="'$gioitinh','$quoctich','$address','$uploadfile',";
		$sql1.="'$sothich','$level')";
		$rel1=mysqli_query($conn,$sql1);
		echo "Bạn đã lưu thành công";
}
}
?>
	<form action="" method="post" enctype="multipart/form-data">
    	<table width="653" class="dangkithanhvien">
          <tr>
            <td colspan="2" style="text-align:center">
            	ĐĂNG KÍ THÀNH VIÊN
            </td>
          </tr>
          <tr>
            <td width="140">Fullname</td>
            <td width="501">
            	<input name="txt_fullname" type="text" 
                placeholder="Nhập đầy đủ họ tên"/>
            </td>
          </tr>
          <tr>
            <td>Username</td>
            <td>
            	<input name="txt_username" type="text"
                placeholder="Nhập tên đăng nhập " />
            </td>
          </tr>
          <tr>
            <td>Password</td>
            <td>
            	<input name="txt_password" type="password" 
                placeholder="Nhập mật khẩu"/>
            </td>
          </tr>
          <tr>
            <td>Giới tính</td>
            <td>
            <input name="gioitinh" type="radio" value="Nam"
             checked="checked" />Nam
            <input name="gioitinh" type="radio" value="Nữ" />Nữ
            </td>
          </tr>
          <tr>
          	<td>Email</td>
            <td><input name="txt_email" type="text" /></td>
          </tr>
          <tr>
          	<td>Điện thoại</td>
            <td> <input name="txt_phone" type="text" /></td>
          </tr>
          <tr>
            <td>Quốc tịch</td>
            <td>
            	<select name="dropdown">
                	<option value="Vietnam">Việt Nam</option>
                    <option value="USA">Mỹ</option>
                    <option value="Hanquoc" 
                    selected="selected">Hàn Quốc</option>
                    <option value="nhatban">Nhật Bản</option>
   				</select>
            </td>
          </tr>
          <tr>
            <td>Địa chỉ</td>
            <td>
            	<textarea name="address" cols="50" rows="5"
                placeholder="Nhập địa chỉ">
                </textarea>
            </td>
          </tr>
          <tr>
            <td>Avatar</td>
           <?php if (isset($_FILES["uploadfile"])){
			$fine_name=$_FILES["uploadfile"]['name'];
			$file_tmp =$_FILES["uploadfile"]['tmp_name'];
			move_uploaded_file($file_tmp, "../baitaplon/image".$fine_name);
			}
		
			?>
        	<td><input name="uploadfile" type="file" /></td>
          </tr>
            <td>Sở thích</td>
            <td>
            	<input name="web" type="checkbox" value="web" />Web
                <input name="xemphim" type="checkbox" value="xemphim" />	
                 Xem phim
                <input name="thethao" type="checkbox" value="thethao" 
                checked="checked"/>Thể thao 
            </td>
          </tr>
          <tr>
            <td>Mức truy cập</td>
            <td>
                <select name="level">
                    <option value="nguoidung">Người dùng</option>
                    <option value="quantri">Quản trị</option>
                </select>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align:center">
            	<input name="Reset" type="reset" value="Reset" />
                <input name="btn_dangkithanhvien" type="submit"
                 value="Đăng kí thành viên" />
            </td>
          </tr>
        </table>
    </form>
</body>
</html>
