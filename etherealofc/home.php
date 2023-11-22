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
            <a class="nav-link active" aria-current="page" href="home.php" style="margin-top: 40%; margin-left:-85%;">HOME</a>
            <a class="nav-link" href="daftarproduk.php" style="margin-top : 40%">PRODUCTS</a>
            <a class="nav-link" href="mybag.php" style="margin-top : 40%">MY BAG</a>
            <a class="nav-link" href="logout.php" style="margin-top: 40%">LOGOUT</a>
          </div>
        </div>
      </div>
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="cr1.jpg" class="d-block w-100" alt="carousel">
        </div>
        <div class="carousel-item">
          <img src="cr2.jpg" class="d-block w-100" alt="carousel1">
        </div>
        <div class="carousel-item">
          <img src="cr3.jpg" class="d-block w-100" alt="carousel2">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="produkbs">
      <h1>Best Seller Products</h1>
      <h2>Best-selling products on Ethereal.co right now</h2>
    </div>

    <div class="section">
      <div class="container">
        <div class="boxproduk">
          <div class="row">
        <?php
            include 'koneksi.php';
            $query = mysqli_query($konek, "SELECT * FROM tb_product ORDER BY product_id DESC LIMIT 8");
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

    <div class="seemore">
      <a href="daftarproduk.php"><button type="button" name="seemore"><b>See More</b></button></a>
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>