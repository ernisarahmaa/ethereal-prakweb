<?php
  session_start();
  $username = $_SESSION['username'];
  if(empty($_SESSION['username'])){
    header("location:login.php?pesan=belum_login");
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
            <a class="nav-link active" href="daftarproduk.php" style="margin-top : 40%">PRODUCTS</a>
            <a class="nav-link" href="mybag.php" style="margin-top : 40%">MY BAG</a>
            <a class="nav-link" href="logout.php" style="margin-top: 40%">LOGOUT</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="juduldaftar">
      <h1>All Products</h1>
    </div>

    <div class="section">
      <div class="container">
        <div class="boxproduk">
          <div class="row">
        <?php
            include 'koneksi.php';
            $query = mysqli_query($konek, "SELECT * FROM tb_product ORDER BY product_id DESC");
            while($data=mysqli_fetch_array($query)){
          ?>
          <div class="col-md-3">
            <div class="col-md-8">
              <img src="img/<?php echo $data['product_image'];?>" width="220px">
            <p class="namaproduk"><b><?php echo $data['product_name'];?></b></p>
            <p class="deskripsiproduk"><?php echo $data['product_description'];?></p>
            <p class="hargaproduk"><b>Rp<?php echo number_format($data['product_price'])?></b></p>
            <div class="addtobag">
              <a href="addtocart.php?id=<?php echo $data['product_id']; ?>"><img src="buy.png"></a>
            </div>
            </div>
            
          </div>
          <?php }
          ?>    
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>