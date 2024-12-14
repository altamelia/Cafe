<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'dbcafe';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    die('Failed to connect to the database: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $menu = $_POST['menu'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Proses upload file foto
    $target_dir = "uploads/";
    $foto = $target_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);

    $SQL = "INSERT INTO tblmenu (menu, foto, harga, deskripsi) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($SQL);
    $stmt->bind_param("ssss", $menu, $foto, $harga, $deskripsi);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan data.";
    }

    $stmt->close();
}

mysqli_close($con);
?>
