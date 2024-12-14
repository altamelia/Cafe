<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'dbcafe';
// connect ke database.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS,$DATABASE_NAME);
if ( mysqli_connect_errno() ) {
// jika ada error connection, stop the script dan tampilkan errornya.
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menangkap data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $nomorhp = $_POST['nomorhp'];
    $pesan = $_POST['pesan'];

    // Melakukan sanitasi data
    $name = $con->real_escape_string($name);
    $email = $con->real_escape_string($email);
    $nomorhp = $con->real_escape_string($nomorhp);
    $pesan = $con->real_escape_string($pesan);

    // SQL untuk menyimpan data
    $sql = "INSERT INTO pesan (name, email, nomorhp, pesan) VALUES ('$name', '$email', '$nomorhp', '$pesan')";

    if ($con->query($sql) === TRUE) {
        echo "Pesan berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
} else {
    echo "Invalid request method.";
}
?>
