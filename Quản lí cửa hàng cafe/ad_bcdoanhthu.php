<?php 
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy ngày bắt đầu và kết thúc từ form
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];

    // Query để lấy các đơn hàng trong khoảng thời gian đã chọn
    $sql = "SELECT * FROM `order` WHERE ngaydat BETWEEN '$start_date' AND '$end_date'";
    $rel = mysqli_query($conn, $sql);
}
?>

<form action="" method="post">
    <table width="500" border="1">
        <tr>
            <td colspan="3" style="text-align:center">Báo cáo doanh thu</td>
        </tr>
        <tr>
            <td>Ngày bắt đầu:</td>
            <td colspan="2"><input name="start_date" type="date" /></td>
        </tr>
        <tr>
            <td>Ngày kết thúc:</td>
            <td colspan="2"><input name="end_date" type="date" /></td>
        </tr>
        <tr>
            <td>Mã hóa đơn</td>
            <td>Mã khách hàng</td>
            <td>Tiền thanh toán</td>
        </tr>
        <?php 
        if(isset($rel) && mysqli_num_rows($rel) > 0){
            while ($r = mysqli_fetch_assoc($rel)){
                $mahoadon = $r['mahd'];
                $makhachhang = $r['makh'];
                $tongtien = $r['tongtien'];
        ?>
        <tr>
            <td><?php echo $mahoadon ?></td>
            <td><?php echo $makhachhang ?></td>
            <td><?php echo $tongtien ?></td>
        </tr>
        <?php
            }
        }
        ?>
    </table>
    <button type="submit">Lọc</button>
</form>