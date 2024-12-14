<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'dbcafe';

// connect ke database.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    // jika ada error connection, stop the script dan tampilkan errornya.
    die('Failed to connect to the database: ' . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die('Produk tidak ada');
}

$SQL = "SELECT id, menu, foto, harga, deskripsi FROM tblmenu WHERE id=$id";
$result = mysqli_query($con, $SQL);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $menu = $row['menu'];
    $foto = $row['foto'];
    $harga = $row['harga'];
    $deskripsi = $row['deskripsi'];
} else {
    die('Data tidak ditemukan');
}

// Close database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .container {
            margin-top: 50px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Edit Produk</h2>
        <form action="prosesedit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo htmlspecialchars($id); ?>" readonly required>
            </div>
            <div class="form-group">
                <label for="menu">Menu</label>
                <input type="text" class="form-control" id="menu" name="menu" value="<?php echo htmlspecialchars($menu); ?>" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
                <input type="hidden" name="current_foto" value="<?php echo htmlspecialchars($foto); ?>">
                <?php if ($foto): ?>
                    <img src="<?php echo htmlspecialchars($foto); ?>" alt="Current Foto" width="100" class="mt-2">
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?php echo htmlspecialchars($harga); ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required><?php echo htmlspecialchars($deskripsi); ?></textarea>
            </div>
            <button type="submit" name="tombol" value="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
