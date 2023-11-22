<?php
	include "koneksi.php";
	$category_id = $_GET['category_id'];

	$query=mysqli_query($konek,"DELETE FROM tb_category WHERE category_id = '$category_id'");
	if($query){
		header("location:homeadmin.php");
	}
	else{
		echo "Proses Input gagal";
	}
?>