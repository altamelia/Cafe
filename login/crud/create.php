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
    $foto = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);
    
    // Move the uploaded file to the target directory
    if (move_uploaded_file($file_tmp, $target_file)) {
        // Get other form data
        $id = $_POST['id'];
        $menu = $_POST['menu'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];

        // Insert data into the database
        $sql = "INSERT INTO tblmenu (id, menu, foto, harga, deskripsi) VALUES ('$id', '$menu', '$target_file', '$harga', '$deskripsi')";
        if (mysqli_query($con, $sql)) {
            echo "Data berhasil ditambahkan!";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}

// Close database connection
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
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
        <h2 class="text-center mb-4">Tambah Menu Baru</h2>
        <form action="prosesinput.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="menu">Menu</label>
                <input type="text" class="form-control" id="menu" name="menu" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>
            <button type="submit" name="tombol" value="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</body>
</html>
