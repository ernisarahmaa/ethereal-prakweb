<?php
	session_start();
	include "config.php";

	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = mysqli_query($konek, "SELECT * FROM login WHERE username = '$username' && password = '$password'") or die (mysql_error($konek));
	$cek = mysqli_num_rows($query);

	if($cek>0){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		header("location:home.php");
	} else{ 
		header("location:login.php?pesan=gagal");
	}
?>