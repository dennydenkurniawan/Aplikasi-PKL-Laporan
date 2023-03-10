<?php
include('../../../conf/config.php');

$id_kasus   = $_POST['id_kasus'];
$no_reg     = $_POST['no_reg'];

$nama       = $_POST['nama_petugas'];
$tgl        = date('Y-m-d', strtotime($_POST['tgl_pelayanan']));

$jns_pel    = $_POST['jns_pelayanan'];
$des        = $_POST['deskripsi'];

date_default_timezone_set('Asia/Makassar');
$date       = date("Y-m-d H:i:s");

$myuid      = uniqid();

$query      = mysqli_query($koneksi, "INSERT INTO tb_pelayanan
 (
  id_pelayanan,
  id_kasus, 
  no_register,
  nama_petugas, 
  tgl_pelayanan, 
  pelayanan,
  deskripsi_pelayanan,
  date_created
  ) 
VALUES 
(
    '$myuid',
    '$id_kasus',
    '$no_reg', 
    '$nama', 
    '$tgl', 
    '$jns_pel', 
    '$des',
    '$date'
    )"
);

header('location: ../../index.php?page=data-kasus-diterima-petugas');
