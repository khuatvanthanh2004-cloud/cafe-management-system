<?php
$id=isset($_GET["id"])?$_GET["id"]:"";
//var_dump($_SESSION["cart"][$id]);
if (isset($_SESSION["cart"])){
	if($_SESSION["cart"][$id]){
		if(array_key_exists($id,$_SESSION["cart"])){
			unset($_SESSION["cart"][$id]);
			}
		header('location: index2.php?action=addtocart');
		}
	
}
else {
	header('location: index2.php?action=home');
	}
?>