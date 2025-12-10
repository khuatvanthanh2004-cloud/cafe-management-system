<?php 
require_once("view/connect.php")
?>
<div class="head_1">
            	<div class="head_1_left">
            	     <img src="image/OIP (1).jpg" width="135" height="81"  />
            	     <p style="color:#C93">ThànhThảoCF</p>
                </div>
                <div class="head_1_mid">
                  <p >Coffe shop </p>
                  <p >Where every cup is a story</p>
                 </div>
                 <div class="head_1_right">
                   <p class="head_1_left">
                   <form action="index2.php?action=search" method="post">
                	<input name="txt_search" type="text" style="width:250px" />
                    <input name="btn_search" type="submit" value="Tìm kiếm" />
        <?php $txt_search=isset($_POST["txt_search"])?$_POST["txt_search"]:"";
		$_SESSION["search"]=$txt_search;
		?>
        </form>
                   </p>
               
               </div>
</div>
            <!--menu-->
            <div class="head_2">
            	<ul class="menu1">
                    <li style="width:150px">
                        <a href="index2.php?action=home">Trang chủ</a>
                    </li>
                    <li style="width:150px">
                        <a href="index2.php?action=product">Sản phẩm</a>
                        <ul class="menu2">
                       
                          <?php
						$sql="SELECT * FROM ad_productype";
	$rel=mysqli_query($conn,$sql);
	if(mysqli_num_rows($rel)>0){
	while($r=mysqli_fetch_assoc($rel)){
	?>
                            <li>
                          <a href="index2.php?action=product&id=<?php echo $r['ma_loaisp']?>"><?php echo $r['ten_loaisp'];?> 
                          </a>
                            </li>
                        
                  <?php
	}
	}
	?>                 
                        
                        </ul>
                    </li>
                    <li style="width:150px">
                        <a href="index2.php?action=introduce">Giới thiệu</a>
                    </li>
                    <li style="width:150px">
                        <a href="index2.php?action=contact">Liên hệ</a>
                    </li>
                    <li style="width:150px">
                        <a href="index2.php?action=pay">Giỏ hàng</a>
                    </li>
                    <li><a href="index2.php?action=login">
                        <img src="image/th (1).jpg" width="40" height="40" />
                        </a>
                    </li>
                </ul>
         	</div>
           
           
            