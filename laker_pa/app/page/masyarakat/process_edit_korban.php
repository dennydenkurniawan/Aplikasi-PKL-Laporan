<?php
include('../../../conf/config.php');
session_start();
$userid             = $_SESSION['id'];

$id_korban          = $_POST['id_korban'];

$nama               = $_POST['nama'];
$tgl                = date('Y-m-d', strtotime($_POST['tgl_lahir']));

$alamat             = $_POST['alamat'];
$jns_kel            = $_POST['jns_kelamin'];
$pend               = $_POST['pendidikan'];
$pekerjaan          = $_POST['pekerjaan'];
$status_perkawinan  = $_POST['status_perkawinan'];
$tindak             = $_POST['tindak_kekerasan'];

date_default_timezone_set('Asia/Makassar');
$date               = date("Y-m-d H:i:s");

// echo $id_korban;
$query = mysqli_query($koneksi, "UPDATE tb_korban SET 
nama                ='$nama',
tgl_lahir           ='$tgl',
alamat              ='$alamat',
jns_kelamin         ='$jns_kel',
pendidikan          ='$pend', 
pekerjaan           ='$pekerjaan', 
status_perkawinan   ='$status_perkawinan', 
tindak_kekerasan    ='$tindak',
last_edited         ='$date'
WHERE 
id_korban     ='$id_korban'");

header('location: ../../index.php?page=pengaduan-masyarakat&& userid='."$userid");
?>
