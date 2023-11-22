<?php
session_start();

$product_id=$_GET["id"];

unset($_SESSION["keranjang"][$product_id]);

echo "<script>alert('Product removed from my bag!');</script>";
echo "<script>location='mybag.php';</script>";
?>