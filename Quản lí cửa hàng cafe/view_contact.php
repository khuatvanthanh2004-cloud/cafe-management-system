<?php require_once("connect.php"); ?>
<table width="866" border="1">
  <tr>
    <td width="57">STT</td>
    <td width="202">Họ và tên</td>
    <td width="193"> Email</td>
    <td width="193"> Thông tin</td>
  </tr>
  <?php 
  $sql2="SELECT * FROM contact";
  $rel2=mysqli_query($conn, $sql2);
  $i=0;
  if(mysqli_num_rows($rel2)>0){
	  while ($r=mysqli_fetch_assoc($rel2)){
		  $i++;
		  ?>
		  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $r['txt_hoten']?></td>
    <td><?php echo $r['txt_email']?></td>
    <td><?php echo $r['txt_content']?></td>
    <?php 
	  }
  }?>