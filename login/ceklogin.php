<?php
include "koneksi1.php";
session_start();

$pass = mysqli_escape_string($con, $_POST['password']);
$username = mysqli_escape_string($con, $_POST['username']);
$password = mysqli_escape_string($con, $pass);
$nama = mysqli_escape_string($con, $_POST['nama']);

//cek username
$cek_user = mysqli_query($con, "SELECT * FROM login WHERE username= '$username'");
if (!$cek_user) {
    die("Query error: " . mysqli_error($con)); //pesan error jika query gagal dieksekusi
}

$user_valid = mysqli_fetch_assoc($cek_user);

//uji username
if($user_valid) {
    if ($password == $user_valid['password']){
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['nama'] = $user_valid['nama'];

        {
            header('location:homeadmin.php');
            exit();
        }
    } else {
        echo "<script> alert ('Login gagal, Password anda salah');
        document.location='index.php'</script>";
    }
} else {
    echo "<script> alert ('Login gagal, Username anda tidak ditemukan');
    document.location='index.php'</script>";
}
?>
