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
  
  <body class="homeadmin">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand"></a>
        <img class="logo" src="logo.png" alt="ethereal.co" style="width: 16%; margin-top: -16px; margin-left: 42%;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="homeadmin.php" style="margin-top: 40%; margin-left:-92%;">CATEGORY</a>
            <a class="nav-link" href="dataproducts.php" style="margin-top : 40%">PRODUCTS</a>
            <a class="nav-link" href="logoutadmin.php" style="margin-top: 40%">LOGOUT</a>
          </div>
        </div>
      </div>
    </nav>

    <table class="tabel table-bordered tabelcategory">
  		<tr style="background-color: #904298; color: #fff;">
  			<td><b>No</b></td>
  			<td><b>Category</b></td>
  			<td><b>Option</b></td>
  		</tr>

  		<?php
  			include 'koneksi.php';
  			$no = 1;
  			$query=mysqli_query($konek,"SELECT * from tb_category");
  			while($data=mysqli_fetch_array($query))
  		{ ?>
  			<tr>
  				<td> <?php echo $no++;?></td>
  				<td> <?php echo $data['category_name'];?></td>
  				<td>
  				<a href=edit.php?category_id=<?php echo $data['category_id'];?>>edit</a> || 
  				<a href=hapus.php?category_id=<?php echo $data['category_id'];?>>hapus</a>
  				</td>
  			</tr>
  		<?php }
  		?>
	  </table>

    <div class="addcategory">
      <h1>Category</h1>
      <a href="addcategory.php"><button type="button" name="addcategory">Add Category</button></a>      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>