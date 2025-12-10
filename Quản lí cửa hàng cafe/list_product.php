<style type="text/css">
.product {
    display: inline-block;
    width: 200px;
    margin: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.product-image {
    width: 100px;
    height: 100px;
}

.product-details {
    margin-top: 10px;
}

.product-name {
    font-weight: bold;
}

.product-price {
    margin-bottom: 5px;
}

.add-to-cart {
    display: block;
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 3px;
}
</style>
<?php
require_once("view/connect.php");

// Hàm để hiển thị một sản phẩm
function displayProduct($product) {
    $masp = $product['masp'];
    ?>
    <div class="product">
        <img src="image/<?php echo $product['hinhanh']?>" class="product-image">
        <div class="product-details">
            <div class="product-name"><?php echo $product['tensp'] ?></div>
            <div class="product-price">
                <?php if($product['khuyenmai'] > 0): ?>
                    <del><?php echo $product['giaxuat'] ?></del> <?php echo $product['giaxuat'] - $product['khuyenmai'] ?>$
                <?php else: ?>
                    <?php echo $product['giaxuat'] ?>$
                <?php endif; ?>
            </div>
            <a href="index2.php?action=addtocart&id=<?php echo $masp ?>" class="add-to-cart">Thêm giỏ hàng</a>
        </div>
    </div>
    <?php
}

// Kiểm tra xem có tham số id trong URL hay không
if(isset($_GET["id"])){
    $id = isset($_GET["id"]) ? $_GET["id"] : "";
    $sql1 = "SELECT * FROM ad_product WHERE ma_loaisp='$id'";
    $rel1 = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($rel1) > 0){
        while($r1 = mysqli_fetch_assoc($rel1)){	
            displayProduct($r1);
        }
    }
} else {
    $sql = "SELECT * FROM ad_product";
    $rel = mysqli_query($conn,$sql);
    if(mysqli_num_rows($rel) > 0){
        while($r = mysqli_fetch_assoc($rel)){	
            displayProduct($r);
        }
    }
}
?>
