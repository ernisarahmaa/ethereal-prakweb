<?php
	include "koneksi.php";

	$category_name =$_POST['category_name'];

	$query=mysqli_query($konek,"INSERT INTO tb_category VALUES('','$category_name')") or die(mysqli_error($konek));
	if($query){
		header("location:homeadmin.php");
	}
	else{
		echo "Proses Input gagal";
	}
?>