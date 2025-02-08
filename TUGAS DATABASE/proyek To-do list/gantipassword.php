<?php
session_start();
include 'connect.php';
if(isset($_POST['ganti_password'])) {


$username = $_SESSION['user'];
$passlama = md5($_POST['pass_lama']);
$passbaru = md5($_POST['passbaru']);
$konfirmasi = md5($_POST ['konfirmasi']);

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$passlama'");
    if(mysqli_num_rows($query) > 0){
        if($passbaru === $konfirmasi) {
            $upd_query = mysqli_query($conn, "UPDATE user SET password='$passbaru'  WHERE username='$username'");
            if($upd_query) {
                echo '<script>alert("password berhasil dirubah.")</script>';
            } else {
                '<script>alert("password gagal dirubah '.mysqli_error($conn).' ")</script>';
            }
        }
    }

}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label for="pass_lama">password_lama</label>
        <input type="text" name="pass_lama" id="pass_lama">

        <label for="passbaru">password baru</label>
        <input type="text" name="passbaru">

        <label for="konfirmasi">konfirmasi password</label>
        <input type="text" name="konfirmasi">

        <button type="submit" name="ganti_password"> ganti password</button>
    </form>
</body>
</html>