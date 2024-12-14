<?php
$con = mysqli_connect("localhost", "root", "", "dbcafe");

if (!$con) {
    die("Database tidak tersambung: " . mysqli_connect_error());
}

if (isset($_POST['tombol'])) {
    // Directory where the file will be uploaded
    $upload_dir = "cafe/";

    // Check if the directory exists, if not, create it
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Handle file upload
    if (!empty($_FILES['foto']['name'])) {
        $namafile = $_FILES['foto']['name']; // Mendapatkan nama file yang diunggah
        $file_tmp = $_FILES['foto']['tmp_name']; // Mendapatkan path file sementara
        $lokasi = $upload_dir . $namafile; // Tentukan lokasi penyimpanan file

        // Pindahkan file yang diunggah ke lokasi yang diinginkan
        if (move_uploaded_file($file_tmp, $lokasi)) {
            $foto = $lokasi; // Define $foto with the file path
        } else {
            $foto = ''; // Define $foto as empty if the file upload fails
        }
    } else {
        $foto = ''; // Define $foto as empty if no file is uploaded
    }

    // Ambil data lainnya dari form
    $id = $_POST['id'];
    $menu = $_POST['menu'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Check if a new photo was uploaded
    if (!empty($foto)) {
        // Lakukan update ke database dengan foto baru
        $sql = "UPDATE tblmenu SET menu='$menu', foto='$foto', harga='$harga', deskripsi='$deskripsi' WHERE id=$id";
    } else {
        // Lakukan update ke database tanpa mengubah kolom foto
        $sql = "UPDATE tblmenu SET menu='$menu', harga='$harga', deskripsi='$deskripsi' WHERE id=$id";
    }

    $result = mysqli_query($con, $sql);

    if ($result) {
        // Redirect to the read page after successful update
        header("Location: read.php");
        exit(); // Make sure to exit after redirection
    } else {
        echo "Data gagal diupdate: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
