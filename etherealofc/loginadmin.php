<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login | Ethereal.co Official</title>
  </head>
  <body>
    <style>
      body{
        background-image: url(bg.jpg);
        background-size: cover;
      }     
    </style>

    <div class="rectangle">
      <div class="gagal">
        <?php
          if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
              echo "Login error! Invalid username and password!";
            }else if($_GET['pesan'] == "logout"){
              echo "You have successfully logged out!";
            }else if($_GET['pesan'] == "belum_login"){
              echo "You must login first!";
            }
          }
        ?>
      </div>
      <form class = "box" action="cekloginadmin.php" method="POST">
        <h1><b>Login Admin</b></h1>
        <input type="text" name="username" placeholder="Username or Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="submit"><b>Login</b></button>
      </form>      
    </div>

    <div class="objeklogin">
      <img src="logo.png">
      <h1>
        <b>Find Your<br>Best Skincare<br>Products!</b>
      </h1>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>