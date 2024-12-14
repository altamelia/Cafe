<?php
session_start();
// Periksa apakah admin sudah login atau belum
if(!isset($_SESSION["admin_id"])) {
    // Jika admin belum login, redirect ke halaman login
    header("location: login.php");
    exit();
}

// Jika admin sudah login, tampilkan konten dashboard
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <h2>Welcome Admin!</h2>
    <p>This is the dashboard page.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
