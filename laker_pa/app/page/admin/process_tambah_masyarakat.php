<?php
include('../../../conf/config.php');
$nama       = $_GET['nama'];
$alamat     = $_GET['alamat'];
$ttl        = $_GET['ttl'];
$no_telp    = $_GET['no_telp'];
$username   = $_GET['username'];
$pass       = $_GET['password'];
$level      = $_GET['level'];
$myuid      = uniqid();

$query = mysqli_query($koneksi, "INSERT INTO akun_masyarakat 
(
    id, 
    nama, 
    alamat, 
    ttl, 
    no_telp, 
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


header('location: ../../index.php?page=data-masyarakat');
?>