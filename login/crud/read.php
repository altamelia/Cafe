<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'dbcafe';
// connect ke database.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS,$DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    // jika ada error connection, stop the script dan tampilkan errornya.
    exit('Failed to connect to the database: ' . mysqli_connect_error());
}
?>

<?php
$sql = "SELECT id, menu, foto, harga, deskripsi FROM tblmenu";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link href="styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .btn-bottom-right {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000; /* Ensure it stays above other elements */
        }
    </style>
</head>
<body class="sb-nav-fixed">
<div class="card-body">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Menu
        </div>
    </div>
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Menu</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['menu']; ?></td>
                    <td><img src="<?php echo $row['foto']; ?>" alt="Foto" width="100"></td>
                    <td><?php echo 'Rp ' . number_format($row['harga'], 3, '.', ','); ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
                    <td class="text-center">
                        <div class="btn-group btn-group-justified">
                            <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Update</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus ini?');">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<a href="create.php" class="btn btn-warning btn-bottom-right">Tambah Menu</a>
</body>
</html>
