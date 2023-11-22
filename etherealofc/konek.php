<?php
	$hostname = "localhost";
	$user = "root";
	$password = "";
	$database = "session";
	$konek=new mysqli($hostname,$user,$password, $database);
	if ($konek->connect_error){
		die('Maaf koneksi gagal'. $connect->connect_error);
	}
?>