<?php
include('../../../conf/config.php');
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM akun_adminpetugas WHERE id='$id'");

header('location: ../../index.php?page=data-petugas');
?>