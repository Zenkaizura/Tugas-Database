<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


$action = $_GET["action"];
$sql = "";

switch ($action) {
    case 'sum':
        $sql = "SELECT SUM(salary) as total FROM employees";
        break;
    case 'avg':
        $sql = "SELECT AVG(salary) as average FROM employees";
        break;
    case 'max':
        $sql = "SELECT MAX(salary) as max FROM employees";
        break;
    case 'min':
        $sql = "SELECT MIN(salary) as min FROM employees";
        break;
    default:
        echo "Tidak valid";
        exit;
}

// Menjalankan query agregat
$resultagregat = $conn->query($sql);

if ($resultagregat->num_rows > 0) {
    $row = $resultagregat->fetch_assoc();
    echo "<h3>Hasil Agregat</h3>";

    // Menampilkan hasil agregat berdasarkan action
    if ($action == 'sum') {
        echo "Total Gaji: " . number_format($row["total"], 2);
    } elseif ($action == "avg") {
        echo "Rata-rata Gaji: " . number_format($row["average"], 2);
    } elseif ($action == "max") {
        echo "Gaji Tertinggi: " . number_format($row["max"], 2);
    } elseif ($action == "min") {
        echo "Gaji Terendah: " . number_format($row["min"], 2);
    }
} else {
    echo "DATANYA GAK ADA";
}


$sqlsubquery = "SELECT * FROM employees WHERE salary > (SELECT AVG(salary) FROM employees)";
$result = $conn->query($sqlsubquery);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<br>";
        echo "Nama: " . $row["name"] . " - Gaji: " . number_format($row['salary'], 2) . "<br>";
    }
} else {
    echo "<br>";
    echo "Gak ada karyawan dengan gaji di atas rata-rata.";
}


$sqljoin = "SELECT employees.name, employees.salary, departments.name AS department
        FROM employees
        JOIN departments ON employees.department_id = departments.id";

$resultjoin = $conn->query($sqljoin);

if (!$resultjoin) {
    die("Query gagal: " . $conn->error);
}


if ($resultjoin->num_rows > 0) {
    while ($row = $resultjoin->fetch_assoc()) {
        echo "Nama: " . $row["name"] . " | Gaji: " . $row["salary"] . " | Departemen: " . $row["department"] . "<br>";
    }
} else {
    echo "0 hasil";
}


// Menutup koneksi
$conn->close();



//NOTE: UNTUK BAGIAN JOIN DATABASE. MASIH ADA BUG JADI SAYA TIDAK DAPAT MELANJUTKAN UNTUK SEKARANG.