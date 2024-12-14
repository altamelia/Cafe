<!-- create_form.html -->
<form action="create_proses.php" method="post" enctype="multipart/form-data">
    <!-- Formulir untuk mengumpulkan data -->
    <!-- Kolom input untuk setiap field dalam tabel -->
    <label for="id">ID:</label><br>
    <input type="text"
    <label for="subjudul">Subjudul:</label><br>
    <input type="text" id="subjudul" name="subjudul" required><br>
    <label for="foto">Foto:</label><br>
    <input type="file" id="foto" name="foto" required><br>
    <label for="harga">Harga:</label><br>
    <input type="text" id="harga" name="harga" required><br>
    <label for="deskripsi">Deskripsi:</label><br>
    <textarea id="deskripsi" name="deskripsi" required></textarea><br><br>
    <input type="submit" value="Submit">
</form>
<?php
include "koneksi1.php"; // Menggunakan file koneksi untuk menghubungkan ke database

// Ambil data dari form
$subjudul = $_POST['subjudul'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

// Proses upload file foto
$img = $_FILES['foto']['img']; // Mengambil nama file yang diunggah
$tmpImg = $_FILES['foto']['tmp_img']; // Mengambil path sementara file yang diunggah

// Mengganti nama file yang diunggah menjadi 'img'
$assetFolder = 'asset'; // Nama folder penyimpanan
$uploadedFileName = 'img'; // Nama file yang digunakan setelah diunggah
$lokasiUpload = 'path/to/menu/images/' . $assetFolder . '/' . $uploadedFileName; // Direktori penyimpanan gambar yang disesuaikan
move_uploaded_file($tmpImg, $lokasiUpload);

// Masukkan data ke dalam database
$sql = "INSERT INTO tblmenu (subjudul, foto, harga, text) VALUES ('$subjudul', '$img', '$harga', '$deskripsi')";
if(mysqli_query($con, $sql)) {
    // Redirect ke halaman Read (membaca) setelah berhasil membuat data baru
    header("Location: read_data.php");
    exit; 
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>
