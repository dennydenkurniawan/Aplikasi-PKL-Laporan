<?php
include('../../../conf/config.php');
session_start();
$userid        = $_SESSION['id'];

$nama_user     = $_SESSION['nama'];
$ambil_id_user = mysqli_query($koneksi, "SELECT id FROM akun_masyarakat WHERE nama = '$nama_user'");
$id_user       = mysqli_fetch_array($ambil_id_user);

$id_kasus      = $_POST['id_kasus'];

$nama          = $_POST['nama'];
$tgl           = date('Y-m-d', strtotime($_POST['tgl_lahir']));

$alamat        = $_POST['alamat'];
$jns_kel       = $_POST['jns_kelamin'];
$pend          = $_POST['pendidikan'];
$pekerjaan     = $_POST['pekerjaan'];
$status        = $_POST['status_perkawinan'];
$tindak        = $_POST['tindak_kekerasan'];

date_default_timezone_set('Asia/Makassar');
$date          = date("Y-m-d H:i:s");

$myuid      = uniqid();

$query = mysqli_query($koneksi, "INSERT INTO tb_korban 
(
    id_korban, 
    id_kasus, 
    nama, 
    tgl_lahir, 
    alamat, 
    jns_kelamin, 
    pendidikan, 
    pekerjaan, 
    status_perkawinan, 
    tindak_kekerasan,
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
    '$tindak',
    '$date'
)");

header('location: ../../index.php?page=data-kasus-admin');