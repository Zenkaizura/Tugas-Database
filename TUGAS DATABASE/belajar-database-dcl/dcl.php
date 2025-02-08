<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Hak Akses</title>
</head>
<body>
    <h2>Kelola Hak Akses Pengguna</h2>
    <form action="manage_access.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>
        
        <label>Aksi:</label>
        <select name="action">
            <option value="grant">Grant Access</option>
            <option value="revoke">Revoke Access</option>
        </select>

        <label>Hak Akses:</label>
        <select name="privilege">
            <option value="SELECT">SELECT</option>
            <option value="INSERT">INSERT</option>
            <option value="UPDATE">UPDATE</option>
            <option value="DELETE">DELETE</option>
            <option value="ALL">ALL PRIVILEGES</option>
        </select>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>