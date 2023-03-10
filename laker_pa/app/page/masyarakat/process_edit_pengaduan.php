<?php
include('../../../conf/config.php');
session_start();
$nama_user = $_SESSION['nama'];
$ambil_id_user = mysqli_query($koneksi, "SELECT id FROM akun_masyarakat WHERE nama = '$nama_user'");
$id_user = mysqli_fetch_array($ambil_id_user);


$id_kasus         = $_POST['id_kasus'];

$no_reg        = $_POST['register'];
$tgl_lapor     = date('Y-m-d', strtotime($_POST['tanggal_lapor']));
$tgl_kejadian  = date('Y-m-d', strtotime($_POST['tanggal_kejadian']));
$kronologi     = $_POST['kronologi'];
$alamat_kej    = $_POST['alamat_kejadian'];
$prov          = $_POST['provinsi'];
$kab           = $_POST['kabupaten'];
$kec           = $_POST['kecamatan'];

date_default_timezone_set('Asia/Makassar');
$date          = date("Y-m-d H:i:s");

$query = mysqli_query($koneksi, "UPDATE tb_kasus SET 
no_reg              ='$reg',
tgl_lapor           ='$tgl_lapor',
tgl                 ='$tgl_kejadian',
kronologi           ='$kronologi',
alamat_kej          ='$alamat_kej',
provinsi            ='$prov', 
kabupaten           ='$kab', 
kecamatan           ='$kec',
last_edited         ='$date'

WHERE 
id                   ='$id_kasus'");

header("location: ../../index.php?page=pengaduan-masyarakat&& userid=" . $id_user['id']);
?>