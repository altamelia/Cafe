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

// Get the ID from the URL parameter
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Delete the record from the tblmenu table
if (!empty($id)) {
  $query = "DELETE FROM tblmenu WHERE id = $id";
  $result = mysqli_query($con, $query);

  if ($result) {
    echo '<p class="alert alert-success">Berhasil Dihapus.</p>';
  } else {
    echo '<p class="alert alert-danger">Eror' . mysqli_error($con) . '</p>';
  }
}

?>