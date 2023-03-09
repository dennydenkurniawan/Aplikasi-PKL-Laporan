<?php
include('../../../conf/config.php');
$reg        = $_POST['register'];
$tgl        = date('Y-m-d', strtotime($_POST['tanggal']));
$tgl_lap        = date('Y-m-d', strtotime($_POST['tanggal_lapor']));
$kronologi  = $_POST['kronologi'];
$alamat_kejadian    = $_POST['lok_kejadian'];

$provinsi = $_POST['provinsi'];
$kabupaten = $_POST['kabupaten'];
$kecamatan = $_POST['kecamatan'];

$status = $_POST['status'];
$progress = $_POST['progress'];


$id_input   = $_POST['id_input'];

date_default_timezone_set('Asia/Makassar');
$date          = date("Y-m-d H:i:s");

$myuid      = uniqid();

$query = mysqli_query($koneksi, "INSERT INTO tb_kasus 
(
    id, 
    no_reg,
    tgl_lapor, 
    tgl, 
    kronologi, 
    alamat_kej,
    provinsi,
    kabupaten,
    kecamatan, 
    id_input, 
    status,
    progress, 
    date_created
) 

VALUES 
(
    '$myuid',
    '$reg',
    '$tgl_lap', 
    '$tgl', 
    '$kronologi',
    '$alamat_kejadian',
    '$provinsi',
    '$kabupaten',
    '$kecamatan',
    '$id_input', 
    '$status',
    '$progress', 
    '$date'
)

");

$nama_petugas   = $_SESSION['nama'];

$myuid_terima          = uniqid();

$query = mysqli_query($koneksi, "INSERT INTO tb_pengaduan_diterima 
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
    '$myuid_terima',
    '$myuid',
    '$reg',
    '$nama_petugas',
    '$status',
    '$date'
)
");
header("location: ../../index.php?page=data-kasus-admin");

?>