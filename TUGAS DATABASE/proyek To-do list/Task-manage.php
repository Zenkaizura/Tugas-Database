<?php
session_start();
include "connect.php";


//mengeccek jika user sudah login atau belum
if(!isset($_SESSION['user'])) {
  header("location: loginPage.php");
  exit;
}



if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $judul      = mysqli_real_escape_string($conn, $_POST['judul']);
  $deskripsi  = mysqli_real_escape_string($conn, $_POST['deskripsi']);
  $batas_waktu= mysqli_real_escape_string($conn, $_POST['batas_waktu']);
  $prioritas  = mysqli_real_escape_string($conn, $_POST['prioritas']);
  $kategori   = mysqli_real_escape_string($conn, $_POST['kategori']);
  

  $query = "INSERT INTO task (Judul, Description, completion_status	, priority, Category)
            VALUES ('$judul', '$deskripsi', '$batas_waktu', '$prioritas', '$kategori')
  ";


if (mysqli_query($conn, $query)) {
  $message = "<p style='color: green;'>Data berhasil ditambahkan!</p>";
} else {
  $message = "<p style='color: red;'>Error: " . mysqli_error($conn) . "</p>";
}




}


?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Task - To-Do List</title>
  <link rel="stylesheet" href="Task-manage.css" />
</head>
<body>
  <header>
    <h1>Edit Task Mu Disini</h1>
  </header>
  <main>

    <form class="task-form" method="POST">
      <div class="field-group">
        <label for="judul">Title Tugas</label>
        <input type="text" id="judul" name="judul" placeholder="Masukkan judul tugas..." /> 
      </div>

      <div class="field-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi"  placeholder="Masukkan deskripsi tugas..."></textarea>
      </div>

      <div>
        <label for="batas-waktu">batas-waktu</label>
        <input type="datetime-local" name="batas_waktu"  id="batas_waktu">
      </div>

      <div class="field-group">
        <label for="prioritas">Prioritas</label>
        <select id="prioritas" name="prioritas" >
          <option value="rendah">Rendah</option>
          <option value="sedang">Sedang</option>
          <option value="tinggi">Tinggi</option>
        </select>
      </div>

      <div class="field-group kategori">
        <span>Kategori:</span>
        <label>
          <input type="radio" name="kategori" value="pribadi" checked/> Pribadi
        </label>
        <label>
          <input type="radio" name="kategori" value="kelompok" /> Kelompok
        </label>
      </div>

      <button type="submit" class="btn-submit">Kirim</button>
    </form>
  </main>
</body>
</html>
