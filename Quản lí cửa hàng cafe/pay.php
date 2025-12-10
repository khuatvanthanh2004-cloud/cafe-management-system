<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quản lí đơn hàng</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }
    td:nth-child(1) {
        width: 5%;
    }
    td:nth-child(2) {
        width: 15%;
    }
    td:nth-child(3), td:nth-child(4), td:nth-child(5) {
        width: 20%;
    }
    td:nth-child(6) {
        width: 15%;
    }
    .center {
        text-align: center;
    }
    .checkout-link {
        color: #007bff;
        text-decoration: none;
    }
</style>
</head>
<body>
<?php 
require_once("view/connect.php");
?>
<table>
  <tr>
    <th colspan="6" class="center">Quản lí đơn hàng</th>
  </tr>
  <tr>
    <th>STT</th>
    <th>Mã hóa đơn</th>
    <th>Mã Khách hàng</th>
    <th>Tổng tiền</th>
    <th>Ngày đặt</th>
    <th>Thanh toán</th>
  </tr>
  <?php 
  $sql1 = "SELECT * FROM `order` ";
  $rel1 = mysqli_query($conn, $sql1);
  $i = 0;
  if(mysqli_num_rows($rel1) > 0) {
      while ($r = mysqli_fetch_assoc($rel1)){
          $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $r['mahd'] ?></td>
    <td><?php echo $r['makh'] ?></td>
    <td><?php echo $r['tongtien'] ?></td>
    <td><?php echo $r['ngaydat'] ?></td>
    <td><a href="index2.php?action=checkout&id=<?php echo $r['mahd'] ?>" class="checkout-link">Thông tin đặt hàng</a></td>
    <td><a href="index2.php?action=delete_checkout&id=<?php echo $r['mahd'] ?>" class="checkout-link">Xóa</a></td>
  </tr>
  <?php
      }
  }
  ?>
</table>
</body>
</html>