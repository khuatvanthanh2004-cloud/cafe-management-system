
  <div style="text-align: center; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; background-color: #f9f9f9;">
    <h2>Thông tin liên hệ</h2>
    <p>Trụ sở: Tòa nhà Symphony - Hà Nội</p>
    <img src="image/Screenshot 2024-05-02 102917.png" width="600" height="400" style="border-radius: 10px; margin-bottom: 20px;" alt="Hình ảnh tòa nhà Symphony" />
    <p><em>Khách hàng hãy liên hệ cho chúng tôi</em></p>
    <p>
        Hãy liên hệ với Thanh ThaoCF để chúng tôi có thể tư vấn trực tiếp cho bạn về sản phẩm và dịch vụ bạn quan tâm. Chúng tôi luôn sẵn lòng lắng nghe và hỗ trợ bạn!
    </p>
    <div style="margin-top: 20px;">
        <a href="tel:19009248" style="text-decoration: none; color: #333; padding-right: 10px;"> 19009248 (Doanh nghiệp)</a> <br />
        <a href="tel:19009247" style="text-decoration: none; color: #333; padding-right: 10px;"> 19009247 (Cá nhân)</a><br />
        <a href="tel:+842422200588" style="text-decoration: none; color: #333; padding-right: 10px;"> (+84) 24 22200588</a><br />
        <a href="mailto:thanhthaocf@gmail.com.vn" style="text-decoration: none; color: #333;"> thanhthaocf@gmail.com.vn</a>
    </div>
</div>
<br >
<br />
 
 <div style="text-align:center;">
    <h2>Email cho chúng tôi</h2>
    <?php 
    require_once("view/connect.php");
    $txt_hoten="";
    $txt_email="";
    $txt_content="";
    $txt_hoten=isset($_POST['txt_hoten'])?$_POST['txt_hoten']:"";
    $txt_email=isset($_POST['txt_email'])?$_POST['txt_email']:"";
    $txt_content=isset($_POST['txt_content'])?$_POST['txt_content']:"";

    if(isset($_POST["btn_submit"])){
        $sql1="SELECT * FROM contact WHERE txt_hoten='$txt_hoten'";
        $rel1=mysqli_query($conn,$sql1);
        if(mysqli_num_rows($rel1)>0){
            echo "đã tồn tại thông tin này";
        }
        else{
            $sql2="INSERT INTO contact VALUES('$txt_hoten','$txt_email',";
            $sql2.="'$txt_content')";
            $rel2=mysqli_query($conn,$sql2);
            echo "Bạn đã lưu thành công";
        }
    }
    ?>
    <form action="" method="post">
        <table width="400" border="0" cellspacing="0" cellpadding="5" style="margin: auto; border-collapse: collapse; border: 1px solid #ddd;">
            <tr>
                <td style="text-align:right; font-weight: bold;">Họ tên:</td>
                <td><input name="txt_hoten" type="text" style="width: 100%;"></td>
            </tr>
            <tr>
                <td style="text-align:right; font-weight: bold;">Tiêu đề email:</td>
                <td><input name="txt_email" type="text" style="width: 100%;"></td>
            </tr>
            <tr>
                <td style="text-align:right; vertical-align: top; font-weight: bold;">Nội dung:</td>
                <td><textarea name="txt_content" cols="50" rows="10" style="width: 100%;"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;"><input name="btn_submit" type="submit" value="Gửi" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;"></td>
            </tr>
        </table>
    </form>
</div>


