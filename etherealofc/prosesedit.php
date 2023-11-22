<?php
	include "koneksi.php";

	$category_id = $_POST['category_id'];
	$category_name = $_POST['category_nama'];

	$query=mysqli_query($konek,"UPDATE tb_category SET category_name='$category_name' WHERE category_id='$category_id'");
	if($query){
		header("location:homeadmin.php");
	}
	else{
		echo "Data gagal diubah";
	}
?>