<?php
include('../../../conf/config.php');
session_start();
$nama_petugas   = $_SESSION['nama'];

$id_kasus       = $_POST['id'];
$no_reg         = $_POST['no_register'];

$status         = 'diterima';

date_default_timezone_set('Asia/Makassar');
$date           = date("Y-m-d H:i:s");

$myuid          = uniqid();

$query          = mysqli_query($koneksi, "INSERT INTO tb_pengaduan_diterima 
(   
    id,
    id_kasus,
    no_register,
    nama_petugas,
    status,
    date_created
)
     VALUE
(
    '$myuid',
    '$id_kasus',
    '$no_reg',
    '$nama_petugas',
    '$status',
    '$date'
)
");
$query = mysqli_query($koneksi, "UPDATE tb_kasus SET status  = '$status', no_reg = '$no_reg' WHERE id= '$id_kasus'");
header('location: ../../index.php?page=data-kasus-masuk-petugas');
?>