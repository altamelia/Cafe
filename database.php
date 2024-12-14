<?php
include "koneksi.php";
include "index.html";


$sql = "SELECT `id`, `subjudul`, `text`, `foto` FROM `tblabout`";
$result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $subjudul = $row['subjudul'];
        $text = $row['text'];  
        $foto = $row['foto']
    }

$sql = "SELECT `id`, `judul`, `subjudul` FROM `tblheader`";
$result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $judul = $row['judul'];
        $subjudul = $row['subjudul'];
    }
    
$sql = "SELECT `id`, `menu`, `foto`, `text` FROM `tblmenu`";
$result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $menu = $row['menu'];
        $foto = $row['foto'];
        $harga = $row['harga']
        $deskripsi = $row['text'];
    }

    
$sql = "SELECT `id`, `nama`, `text`, `foto` FROM `tbltestimoni`";
$result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $nama = $row['nama'];
        $text = $row['text'];  
        $foto = $row['foto']
    }

$sql = "SELECT `id`, `name`, `email`, `nomorhp`, `pesan` FROM `tbluser`";
$result = mysqli_query($con, $sql); 
    while ($row = mysqli_fetch_assoc($result)) {   
        $name = $row['name'];
        $email = $row['email'];
        $nomorhp = $row['nomorhp'];
        $pesan =  $row['pesan'];
}   
?>
`