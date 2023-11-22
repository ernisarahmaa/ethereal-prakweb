<?php
  session_start();
  $username = $_SESSION['username'];
  if(empty($_SESSION['username'])){
    header("location:loginadmin.php?pesan=belum_login");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Admin | Ethereal.co Official</title>
  </head>
  
  <body class="menuaddproduct">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand"></a>
        <img class="logo" src="logo.png" alt="ethereal.co" style="width: 16%; margin-top: -16px; margin-left: 42%;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" aria-current="page" href="homeadmin.php" style="margin-top: 40%; margin-left:-92%;">CATEGORY</a>
            <a class="nav-link active" href="dataproducts.php" style="margin-top : 40%">PRODUCTS</a>
            <a class="nav-link" href="logoutadmin.php" style="margin-top: 40%">LOGOUT</a>
          </div>
        </div>
      </div>
    </nav>

    <?php
      include 'koneksi.php';
      $product_id=$_GET['product_id'];
      $data=mysqli_query($konek,"SELECT * FROM tb_product where product_id='$product_id'");
      $hasil = mysqli_fetch_array($data);
    ?>

    <form class="formaddproduct" method="POST" enctype="multipart/form-data" action="proseseditproduct.php">
      <h1>Edit Product</h1>
      <select class="input-control ic2" name="category" required>
        <option value="">Category</option>
        <?php
          include 'koneksi.php';
          $query=mysqli_query($konek,"SELECT * FROM tb_category ORDER BY category_id DESC");
          while($data=mysqli_fetch_array($query)){
        ?>
        <option value="<?php echo $data['category_id']?>" <?php echo ($data['category_id']==$hasil['category_id'])? 'selected':''; ?>><?php echo $data['category_name']?></option>
        <?php }
        ?>
      </select>
      <input type="hidden" name="product_id" value="<?php echo $hasil['product_id'];?>">
      <input type="text" name="name" class="input-control" placeholder="Product Name" value="<?php echo $hasil['product_name'];?>">
      <input type="text" name="price" class="input-control" placeholder="Price" value="<?php echo $hasil['product_price'];?>">
      <textarea class="txt" name="description" placeholder="Description"><?php echo $hasil['product_description'];?></textarea>
      <img src="img/<?php echo $hasil['product_image'];?>" width="200px">
      <input type="hidden" name="foto" value="<?php echo $hasil['product_image'];?>">
      <input type="file" name="foto" class="input-control">
      <select class="input-control ic2" name="status" value="Status">
        <option value="1" <?php echo ($hasil['product_status'] == 1)? 'selected':""; ?>>Active</option>
        <option value="0" <?php echo ($hasil['product_status'] == 0)? 'selected':""; ?>>Inactive</option>
      </select>
      <button type="submit" name="submit">Edit Product</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>