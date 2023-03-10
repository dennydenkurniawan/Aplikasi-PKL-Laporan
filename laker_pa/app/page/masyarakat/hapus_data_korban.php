<?php
include('../../../conf/config.php');
session_start();
$userid = $_SESSION['id'];

$id = $_POST['id'];


$query = mysqli_query($koneksi, "DELETE FROM tb_korban WHERE id_korban = '$id'");

header('location: ../../index.php?page=pengaduan-masyarakat&& userid='."$userid");
?>