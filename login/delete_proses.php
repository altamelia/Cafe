<!-- delete_form.html -->
<form action="delete_process.php" method="post">
    <!-- Formulir untuk menghapus data -->
    <!-- Kolom input untuk mengidentifikasi data yang akan dihapus -->
    <label for="subjudul">Subjudul:</label><br>
    <input type="text" id="subjudul" name="subjudul" required><br>
    <label for="foto">Foto:</label><br>
    <input type="file" id="foto" name="foto" required><br>
    <label for="harga">Harga:</label><br>
    <input type="text" id="harga" name="harga" required><br>
    <label for="deskripsi">Deskripsi:</label><br>
    <textarea id="deskripsi" name="deskripsi" required></textarea><br><br>
    <input type="submit" value="Delete">
</form>
<?php
// delete_process.php
// Koneksi ke database

// Ambil ID data yang akan dihapus dari form

// Hapus data dari database berdasarkan ID

header("Location: read_data.php");
    exit;
?>
