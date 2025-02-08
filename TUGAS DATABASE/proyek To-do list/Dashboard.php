<?php

session_start();
include "connect.php";



if(!isset($_SESSION['user'])) {
    header("location: loginPage.php");
    exit;
}

$username = $_SESSION['user'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");

if(mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
}

$queryCount = "SELECT COUNT(*) AS TOTAL FROM task";
$hitungjumlahtask = mysqli_query($conn, $queryCount);

if (!$hitungjumlahtask) {
    die("Query error: " . mysqli_error($conn));
}

$dataCount = mysqli_fetch_assoc($hitungjumlahtask);

$totalTasks = isset($dataCount['TOTAL']) ? $dataCount['TOTAL'] : 0;

$query = "SELECT * FROM task";
$result = mysqli_query($conn, $query);

$task = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css">
</head>
<body>
    <div class="top-bar">
    <img src="asset/menu.png" alt="">
    <p>To-do-List</p>

    <!-- BUAT PROFILE PENGATURAN AKUN -->
    <a href="profile.php"><img src="asset/profile-user.png" alt=""></a>
    </div>
    <div class="screen-backdrop">
    <div class="welcome">
    <h1>Hello  <?php echo htmlspecialchars($data['username']); ?></h1>
    <p>You have <?php echo $totalTasks; ?> task<?php echo ($totalTasks != 1 ? 's' : ''); ?> to do</p>
    </div>
    </div>
    
    <div class="container">

    <?php foreach ($task as $item) : ?>
            <div class="task-card">
                <div class="card-header">
                    <h3><?php echo htmlspecialchars($item['Judul']); ?></h3>
                    <div class="info-icon">!</div>
                </div>
                <div class="card-content">

                    <p><span><?php echo htmlentities($item['Description']) ?></span></p>
                    <p><span class="icon-clock"></span>  Batas Waktu: <?php echo htmlspecialchars($item['completion_status']); ?></p>
                    <p><span><?php echo htmlspecialchars($item['Category'])?></span></p>
                </div>  
                <div class="card-footer">
                    <span class="icon bell"></span>
                    <span class="icon attach"></span>
                    <span class="icon edit"></span>
                    <span class="icon delete"></span>
                </div>
            </div>
        <?php endforeach; ?>




   <div class="add-btn">
   <a href="Task-manage.php">+</a>
   </div>


    </div>
</div>
</body>

</html>