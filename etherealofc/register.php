<?php
	include 'konek.php';
	error_reporting(0);

	session_start();

	if (isset($_SESSION['username'])) {
		header("location: login.php");
	}

	if (isset($_POST['submit'])) {
	    $username = $_POST['username'];
	    $email = $_POST['email'];
	    $password = $_POST['password'];
	    $confirm = $_POST['confirm'];
	 
	    if ($password == $confirm) {
	        $sql = "SELECT * FROM login WHERE email='$email'";
	        $result = mysqli_query($konek, $sql);
	        if (!$result->num_rows > 0) {
	            $sql = "INSERT INTO login (username, email, password)
	                    VALUES ('$username', '$email', '$password')";
	            $result = mysqli_query($konek, $sql);
	            if ($result) {
	                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
	                $username = "";
	                $email = "";
	                $_POST['password'] = "";
	                $_POST['confirm'] = "";
	                } else {
	                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
	            }
	        } else {
	            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
	        }
	         
	    } else {
	        echo "<script>alert('Password Tidak Sesuai')</script>";
	    }
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

	<title>Register</title>
</head>
<body>
	<style>
      body{
        background-image: url(bg.jpg);
        background-size: cover;
      }     
    </style>
	<div class="container-fluid register">
		<div class="title">
	      <h2 class="text-center">FORM REGISTER</h2><hr>
	    </div>
		<form action="" method="POST" class="login-email">
			<div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="confirm" value="<?php echo $_POST['confirm']; ?>" required>
            </div>
               
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="login.php">Login</a></p>
		</form>	
	</div>
	<div class="objeklogin">
      <img src="logo.png">
      <h1>
        <b>Find Your<br>Best Skincare<br>Products!</b>
      </h1>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>