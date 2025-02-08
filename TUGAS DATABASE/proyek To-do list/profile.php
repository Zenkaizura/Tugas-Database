<?php
session_start();
include "connect.php";

if(!isset($_SESSION['user'])) {
    header('location:LoginPage.php');
    exit;
}

if(isset($_POST['hapus_akun'])) {
  


    $username = $_SESSION['user'];

    $query = mysqli_query($conn, "DELETE FROM user WHERE username= '$username'");

    if($query) {
    
        session_destroy();

        echo '<script>
            alert("akun anda telah terhapus.");
            window.location.href = "LoginPage.php";
             </script>';
        exit;
    } else{
        echo '<script>
            alert("akun anda gagal terhapus '. mysqli_error($conn) .' ");
             </script>';
    }
    
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
        <h1><?php echo "selamat datang " .$_SESSION['user'] ?></h1>
        <a href="logout.php">Logout</a>

  <form method="post">
  <button type="submit" name="hapus_akun">Delete</button>
  </form>
  
  <a href="gantipassword.php">ganti password?</a>
</html>