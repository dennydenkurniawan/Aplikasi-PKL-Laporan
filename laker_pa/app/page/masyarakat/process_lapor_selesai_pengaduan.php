<?php
include('../../../conf/config.php');
session_start();
$userid = $_SESSION['id'];

$id_kasus = $_POST['id'];

$progress = 'selesai';


$query = mysqli_query($koneksi, "UPDATE tb_kasus SET progress ='$progress' WHERE id='$id_kasus'");
header('location: ../../index.php?page=pengaduan-masyarakat&& userid='."$userid");
?>