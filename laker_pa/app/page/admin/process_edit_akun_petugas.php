<?php
include('../../../conf/config.php');
$id       = $_POST['id'];
$nama       = $_POST['nama'];
$username   = $_POST['username'];
$password       = $_POST['password'];
$level        = $_POST['level'];

$query = mysqli_query($koneksi, "UPDATE akun_adminpetugas SET
    nama        = '$nama', 
    username    = '$username', 
    password    = '$password',
    level       = '$level'

WHERE id = '$id'");

header('location: ../../index.php?page=data-petugas');
?>