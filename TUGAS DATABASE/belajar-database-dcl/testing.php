<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Perhitungan aggregat karyawan</h2>
    <form action="process.php">
    <label for="action">Pilih Agregat:</label>
        <select name="action" id="action">
            <option value="sum">Total Gaji</option>
            <option value="avg">Rata-rata Gaji</option>
            <option value="max">Gaji Tertinggi</option>
            <option value="min">Gaji Terendah</option>
        </select>
        <br><br>
        <input type="submit" value="tampilkan">
    </form>
</body>
</html>