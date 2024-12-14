<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'dbcafe';

// Connect to the database
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $id = $_POST['id'];
    $menu = $_POST['menu'];
    $foto = $_POST['foto'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
}
// Prepare the SQL statement
$stmt = $con->prepare("INSERT INTO tblmenu (id, menu, foto, harga, deskripsi) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issis", $id, $menu, $foto, $harga, $deskripsi);

if ($stmt->execute()) {
    echo "Item menu baru berhasil ditambahkan!";
} else {
    echo "Error: " . $stmt->errorInfo()[2]; // Use errorInfo() to get error details
}


// Close the prepared statement and the database connection
$stmt->close();
mysqli_close($con);

// Redirect back to the read page
header("Location: read.php");
exit();
?>