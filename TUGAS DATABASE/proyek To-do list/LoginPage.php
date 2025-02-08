<?php
    session_start();
    include "connect.php";

    // Handle Register
    if(isset($_POST['register'])) {  
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['pass']);
        $notelephon = $_POST['no_telp'];
        
        $queryregist = mysqli_query($conn, "INSERT INTO user(username, email, password, phone_number) 
                                          VALUES ('$username', '$email', '$password', '$notelephon')");
        
        if ($queryregist) {
            echo '<script>alert("Registrasi berhasil! Silahkan login.");</script>';
        } else {
            echo '<script>alert("Registrasi gagal: '.mysqli_error($conn).'");</script>';
        }
    }

    // Handle Login
    if(isset($_POST['login'])) {  
        $username = $_POST['username'];
        $password = md5($_POST['pass']);
        
        $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
        
        if(mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_array($query);
            $_SESSION['user'] = $data['username'];
            echo '<script>
                alert("Selamat datang, '.$data['username'].'");
                window.location.href = "Dashboard.php";
            </script>';
        } else {
            echo '<script>alert("Username/password salah!");</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="LoginPage.css">
</head>
<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form method="post">
                <label for="chk" aria-hidden="true">Sign Up</label>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="pass" placeholder="Password" required>
                <input type="text" name="no_telp" placeholder="No Telepon" required>
                <button type="submit" name="register">Sign Up</button>
            </form>
        </div>

        <div class="login">
            <form method="post">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="pass" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
</body>
</html>