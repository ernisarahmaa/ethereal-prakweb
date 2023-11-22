<?php
	include "koneksi.php";
	$product_id = $_GET['product_id'];

	$query=mysqli_query($konek,"DELETE FROM tb_product WHERE product_id = '$product_id'");
	if($query){
		header("location:dataproducts.php");
	}
	else{
		echo "Proses Input gagal";
	}
?>