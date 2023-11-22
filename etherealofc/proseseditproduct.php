<?php
	include "koneksi.php";

	$product_id=$_POST['product_id'];
	$category =$_POST['category'];
	$name =$_POST['name'];
	$price =$_POST['price'];
	$description =$_POST['description'];
	$status =$_POST['status'];
	$foto =$_POST['foto'];

	$filename = $_FILES['foto']['name'];
	$source = $_FILES['foto']['tmp_name'];
	$folder = './img/';

	if($filename != ''){
		move_uploaded_file($source, $folder.$filename);
		$namagambar = $filename;
	}else{ // jika tidak ganti gambar
		$namagambar = $foto;
	}

	$query=mysqli_query($konek,"UPDATE tb_product SET category_id='$category', product_name='$name', product_price='$price', product_description='$description', product_image='$namagambar', product_status='$status' WHERE product_id='$product_id'");
	if($query){
		header("location:dataproducts.php");
	}
	else{
		echo "Data gagal diubah";
	}
?>