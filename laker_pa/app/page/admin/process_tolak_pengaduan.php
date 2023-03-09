<?php
include('../../../conf/config.php');
session_start();
$nama_petugas   = $_SESSION['nama'];

$id_kasus       = $_POST['id_kasus'];

$status         = 'ditolak';

$alasan         = $_POST['alasan'];

date_default_timezone_set('Asia/Makassar');
$date           = date("Y-m-d H:i:s");

$myuid          = uniqid();

$query          = mysqli_query($koneksi, "INSERT INTO tb_pengaduan_ditolak 
(   
    id,
    id_kasus,
    nama_petugas,
    status,
    alasan_ditolak,
    date_created    
)
     VALUE 
(
    '$myuid',
    '$id_kasus',
    '$nama_petugas',
    '$status',
    '$alasan',
    '$date'
)
");
$query = mysqli_query($koneksi, "UPDATE tb_kasus SET status  = '$status' WHERE id= '$id_kasus'");

header('location: ../../index.php?page=data-pengaduan-admin');
?>