<?php
include('../../../conf/config.php');
$nama       = $_GET['nama'];
$username   = $_GET['username'];
$pass       = $_GET['password'];
$level      = $_GET['level'];
$myuid      = uniqid('adm');
$query = mysqli_query($koneksi, "INSERT INTO akun_adminpetugas 
(
    id, 
    nama, 
    username, 
    password,
    level
) 
VALUES 
(
    '$myuid',
    '$nama',
    '$username',
    '$pass',
    '$level'
)
");


header('location: ../../index.php?page=data-admin');
?>