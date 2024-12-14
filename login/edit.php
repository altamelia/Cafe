<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Produk</title>
</head>
<body>
    <h2>Edit Data Produk</h2>
    <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama Produk:</td>
                <td><input type="text" name="nama_produk" required></td>
            </tr>
            <tr>
                <td>Gambar:</td>
                <td><input type="file" name="gambar" accept="image/*"></td>
            </tr>
            <tr>
                <td>Harga:</td>
                <td><input type="number" name="harga" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Simpan Perubahan"></td>
            </tr>
        </table>
    </form>
</body>
</html>
