<?php
require_once("view/connect.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Chi tiết đơn hàng</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 8px;
        text-align: center;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .confirmation-message {
        display: none;
        margin-top: 20px;
        color: green;
        text-align: center;
        font-size: 16px;
    }
    .payment-table {
        width: 100%;
        margin-top: 20px;
    }
    .payment-table td {
        padding: 10px;
    }
    .payment-table img {
        width: 100%;
        max-width: 300px;
        height: auto;
    }
    .payment-table input[type="button"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }
    .payment-table input[type="button"]:hover {
        background-color: #45a049;
    }
</style>
<script>
function showConfirmation() {
    var confirmationMessage = document.getElementById("confirmationMessage");

    
    var now = new Date();
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');
    var seconds = now.getSeconds().toString().padStart(2, '0');
    var timeString = hours + ':' + minutes + ':' + seconds;

   
    confirmationMessage.innerHTML = "Đơn hàng của bạn đang xác nhận, quay về trang chủ. Thời gian: " + timeString;
    confirmationMessage.style.display = "block";

    
    setTimeout(function() {
        window.location.href = 'index2.php'; // Thay 'index2.php' bằng trang chủ của bạn
    }, 3000);
}
</script>
</head>
<body>
<form action="" method="post">
<table>
  <tr>
    <th colspan="7">Chi tiết đơn hàng</th>
  </tr>
  <tr>
    <th>STT</th>
    <th>Mã hóa đơn</th>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Gía tiền</th>
    <th>Thành tiền</th>
  </tr>
  <?php 
  if(isset($_GET["id"])){
    $id=isset($_GET["id"])?$_GET["id"]:"";
    $sql1="SELECT * FROM order_detail WHERE mahd='$id'";
    $rel1=mysqli_query($conn, $sql1);
    $i=0;
    if(mysqli_num_rows($rel1)>0){
      while ($r=mysqli_fetch_assoc($rel1)){
        $i++;
  ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $r['mahd']?></td>
    <td><?php echo $r['masp']?></td>
    <td><?php echo $r['tensp']?></td>
    <td><?php echo $r['soluong']?></td>
    <td><?php echo $r['giatien']?></td>
    <td><?php echo $r['thanhtien']?></td>
  <?php
      }
    }
  }
  ?>
</table>

<div id="confirmationMessage" class="confirmation-message"></div>

<table class="payment-table" border="1">
  <tr>
    <td colspan="2" style="text-align:center; background-color:#4CAF50; color:white;">Hình thức thanh toán bằng ATM</td>
  </tr>
  <tr>
    <td>Mã QRPAY</td>
    <td><img src="image/87bd155c-3d20-4700-bc2c-266195d6f6a6.jpg" alt="QR Pay" /></td>
  </tr>
  <tr>
    <td>Lưu ý</td>
    <td>Khi chuyển khoản quý khách điền nội dung mã khách hàng và mã hóa đơn.Xin cảm ơn!</td>
  </tr>
  <tr>
    <td colspan="2"><input name="btn_button" type="button" value="xác nhận" onclick="showConfirmation()" /></td>
  </tr>
</table>
</form>
</body>
</html>