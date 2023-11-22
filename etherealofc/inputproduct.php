<?php
	include "koneksi.php";

	$category =$_POST['category'];
	$name =$_POST['name'];
	$price =$_POST['price'];
	$description =$_POST['description'];
	$status =$_POST['status'];
	$filename = $_FILES['image']['name'];
	$source = $_FILES['image']['tmp_name'];
	$folder = './img/';

	move_uploaded_file($source, $folder.$filename);
	$query=mysqli_query($konek,"INSERT INTO tb_product VALUES('', '$category', '$name', '$price', '$description', '$filename', '$status', '')") or die(mysqli_error($konek));
	if($query){
		header("location:dataproducts.php");
	}
	else{
		echo "Proses Input gagal";
	}
?>