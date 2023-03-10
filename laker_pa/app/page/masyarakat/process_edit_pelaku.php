<?php
include('../../../conf/config.php');
session_start();
$userid                 = $_SESSION['id'];

$id_pelaku              = $_POST['id_pelaku'];

$nama                   = $_POST['nama'];
$tgl                    = date('Y-m-d', strtotime($_POST['tgl_lahir']));

$alamat                 = $_POST['alamat'];
$jns_kel                = $_POST['jns_kelamin'];
$pend                   = $_POST['pendidikan'];
$pekerjaan              = $_POST['pekerjaan'];
$status_perkawinan      = $_POST['status_perkawinan'];
$hub                    = $_POST['hubungan_dengan_korban'];

date_default_timezone_set('Asia/Makassar');
$date                   = date("Y-m-d H:i:s");

// echo $id_pelaku;
$query = mysqli_query($koneksi, "UPDATE tb_pelaku SET 
nama                    ='$nama',
tgl_lahir               ='$tgl',
alamat                  ='$alamat',
jns_kelamin             ='$jns_kel',
pendidikan              ='$pend', 
pekerjaan               ='$pekerjaan', 
status_perkawinan       ='$status_perkawinan', 
hubungan_dengan_korban  ='$hub',
last_edited             ='$date' 
WHERE 
id_pelaku='$id_pelaku'");

header('location: ../../index.php?page=pengaduan-masyarakat&& userid='."$userid");
?>