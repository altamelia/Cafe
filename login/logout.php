<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['nama']);

session_destroy();
echo "<script>alert('Anda telah keluar dari halaman admin');
document.location='homelogin.php'</script>";
?>
