<?php
	session_start();

	//mendapatkan id url
	$product_id = $_GET['id'];

	//jika sudah ada di keranjang maka akan +1
	if(isset($_SESSION['keranjang'][$product_id])){
		$_SESSION['keranjang'][$product_id]+=1;
	}else{ //kalau belum -1
		$_SESSION['keranjang'][$product_id]=1;
	}

	echo"<script>alert('Product added to bag!');</script>";
	echo"<script>location='daftarproduk.php';</script>";

?>