<?php 
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "user_management"; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM employees WHERE salary > (SELECT AVG(salary) FROM employees)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "nama:" . $row["name"] . " - Gaji: " . number_format($row['salary'], 2) . "<br>";
   
    
}  } 

else {
    echo "gak ada karyawan dengan gaji di atas rata-rata.";
}

$conn->close();
?>