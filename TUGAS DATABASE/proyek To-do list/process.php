<?php

include 'connect.php';

if(isset($_POST['signUp'])){
    $nama =$_POST['nama'];
    $password=$_POST['password'];
    $password=md5($password);
}
?>