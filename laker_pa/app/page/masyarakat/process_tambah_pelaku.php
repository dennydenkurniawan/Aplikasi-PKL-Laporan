<?php
include('../../../conf/config.php');
session_start();
$userid        = $_SESSION['id'];

$id_kasus      = $_POST['id_kasus'];

$nama          = $_POST['nama'];
$tgl           = date('Y-m-d', strtotime($_POST['tgl_lahir']));

$alamat        = $_POST['alamat'];
$jns_kel       = $_POST['jns_kelamin'];
$pend          = $_POST['pendidikan'];
$pekerjaan     = $_POST['pekerjaan'];
$status        = $_POST['status_perkawinan'];
$hub           = $_POST['hubungan_dengan_korban'];

date_default_timezone_set('Asia/Makassar');
$date          = date("Y-m-d H:i:s");

$myuid      = uniqid();

$query         = mysqli_query($koneksi, "INSERT INTO tb_pelaku 
(
    id_pelaku, 
    id_kasus, 
    nama, 
    tgl_lahir, 
    alamat, 
    jns_kelamin, 
    pendidikan, 
    pekerjaan, 
    status_perkawinan, 
    hubungan_dengan_korban,
    date_created
) 
VALUES 
(
    '$myuid',
    '$id_kasus', 
    '$nama', 
    '$tgl', 
    '$alamat', 
    '$jns_kel', 
    '$pend', 
    '$pekerjaan', 
    '$status', 
    '$hub',
    '$date'
)");

header('location: ../../index.php?page=pengaduan-masyarakat&& userid='."$userid");
