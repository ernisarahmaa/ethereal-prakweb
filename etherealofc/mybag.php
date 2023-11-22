<?php
  include 'koneksi.php';
  session_start();

  if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])){
    echo "<script>alert('Keranjang kosong, kembali ke halaman Produk'); </script>";
    echo "<script>location='daftarproduk.php';</script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Ethereal.co Official | Find Your Best Skincare Products</title>
  </head>
  
  <body class="home">
    <style>
      body{
        background-image: url(bg1.jpg);
        background-size: cover;
      }
    </style>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand"></a>
        <img class="logo" src="logo.png" alt="ethereal.co" style="width: 16%; margin-top: -16px; margin-left: 42%;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" aria-current="page" href="home.php" style="margin-top: 40%; margin-left:-85%;">HOME</a>
            <a class="nav-link" href="daftarproduk.php" style="margin-top : 40%">PRODUCTS</a>
            <a class="nav-link active" href="mybag.php" style="margin-top : 40%">MY BAG</a>
            <a class="nav-link" href="logout.php" style="margin-top: 40%">LOGOUT</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="juduldaftar">
      <h1>My Bag</h1>
    </div>

    <table class="tabel table-bordered tabelmybag">
      <thead>
        <tr style="background-color: #904298; color: #fff;">
          <td><b>No</b></td>
          <td><b>Category</b></td>
          <td><b>Image</b></td>
          <td><b>Name</b></td>
          <td><b>Amount</b></td>
          <td><b>Price</b></td>
          <td><b>Total</b></td>
          <td><b>Option</b></td>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; ?>
        <?php foreach ($_SESSION["keranjang"] as $product_id => $amount): ?>
        <?php
          include 'koneksi.php';
          $query=$konek->query("SELECT * from tb_product LEFT JOIN tb_category USING (category_id) WHERE product_id='$product_id'");
          $data=$query->fetch_assoc();
          $totalharga = $data["product_price"]*$amount;
        ?>
          <tr>
            <td> <?php echo $no;?></td>
            <td> <?php echo $data['category_name'];?></td>
            <td><img src="img/<?php echo $data['product_image'];?>" width="90px"></td>
            <td> <?php echo $data['product_name'];?></td>
            <td> <?php echo $amount;?></td>
            <td> Rp<?php echo number_format($data['product_price']);?></td>
            <td> Rp<?php echo number_format($totalharga);?></td>
            <td> 
            <a href=hapusmybag.php?id=<?php echo $data['product_id'];?>>hapus</a>
            </td>
          </tr>
        <?php $no++;?>
        <?php endforeach?>
      </tbody>
    </table>
    <a href="daftarproduk.php" class="btn btn-default" style="color:white; background-color:green">Add More</a>
    <a href="checkout.php" class="btn btn-primary">Checkout</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>