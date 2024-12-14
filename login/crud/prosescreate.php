<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'dbcafe';

// Connect to the database
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    die('Failed to connect to the database: ' . mysqli_connect_error());
}

if (isset($_POST['tombol'])) {
    // Handle file upload
    if (!empty($_FILES['foto']['name'])) {
        $namafile = $_FILES['foto']['name']; // Mendapatkan nama file yang diunggah
        $file_tmp = $_FILES['foto']['tmp_name']; // Mendapatkan path file sementara
        $lokasi = "cafe/" . $namafile; // Tentukan lokasi penyimpanan file

        // Pindahkan file yang diunggah ke lokasi yang diinginkan
        if (move_uploaded_file($file_tmp, $lokasi)) {
            $id = $_POST['id'];
            $menu = $_POST['menu'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];

            // Insert data into the database
            $sql = "INSERT INTO tblmenu (id, menu, foto, harga, deskripsi) VALUES ('$id', '$menu', '$lokasi', '$harga', '$deskripsi')";
            if (mysqli_query($con, $sql)) {
                // Redirect to the read page after successful insert
                header("Location: read.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Gagal mengunggah.";
        }
    }
}

// Close database connection
mysqli_close($con);
?>
