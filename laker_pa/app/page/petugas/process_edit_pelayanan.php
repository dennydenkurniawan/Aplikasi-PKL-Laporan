<?php
include('../../../conf/config.php');

$id_pel   = $_POST['id_pelayanan'];

$nama     = $_POST['nama_petugas'];
$tgl      = date('Y-m-d', strtotime($_POST['tgl_pelayanan']));

$jns_pel  = $_POST['jns_pelayanan'];
$des      = $_POST['deskripsi'];

date_default_timezone_set('Asia/Makassar');
$date     = date("Y-m-d H:i:s");

$query = mysqli_query($koneksi, "UPDATE tb_pelayanan SET
  tgl_pelayanan         = '$tgl',
  pelayanan             = '$jns_pel',  
  deskripsi_pelayanan   = '$des',
  last_edited           = '$date'
WHERE
id_pelayanan = '$id_pel'
");

header('location: ../../index.php?page=data-kasus-diterima-petugas');
