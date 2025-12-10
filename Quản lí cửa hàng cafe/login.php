<?php
require_once("view/connect.php");
if(isset($_POST["btn_login"])){
	$txt_username =$_POST["txt_username"];
	$txt_password =$_POST["txt_password"];
	$level =$_POST["level"];
	if ($level =="nguoidung"){
		$sql1="SELECT * FROM dangkithanhvien WHERE username='$txt_username'";
		$sql1.=" and password='$txt_password' and level='$level'";
		$rel1=mysqli_query($conn,$sql1);
		if(mysqli_num_rows($rel1)>0){
			header("location:index2.php");
			echo "Bạn đã đăng nhập thành công";
			}
	}
			if ($level =="quantri"){
		$sql1="SELECT * FROM dangkithanhvien WHERE username='$txt_username'";
		$sql1.=" and password='$txt_password' and level='$level'";
		$rel1=mysqli_query($conn,$sql1);
		if(mysqli_num_rows($rel1)>0){
			header("location:view/quantri1.php");}
		}
		}
	 ?>
<form action="" method="post">
<table width="300" border="1">
  <tr>
    <td colspan="2" style="text-align:center">Đăng nhập</td>

  </tr>
  <tr>
    <td>username</td>
    <td><input name="txt_username" type="text" /></td>
  </tr>
  <tr>
    <td>password</td>
    <td><input name="txt_password" type="text" /></td>
  </tr>
  <tr>
    <td>Mức truy cập</td>
    <td><select name="level">
    <option value="nguoidung"> người dùng</option>
    <option value="quantri"> quản trị</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2" style="text-align:center">
    <input name="btn_login" type="submit" value="đăng nhập"/>
   <a href="index2.php?action=dangkithanhvien&id=<?php echo $username ?>">Đăng kí thành viên</a>
                
  
  </tr>
</table>
</form>