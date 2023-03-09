<?php
include('../../../conf/config.php');
$id = $_POST['id'];

$query = mysqli_query($koneksi, "DELETE FROM tb_pelayanan WHERE id_pelayanan='$id'");

header('location: ../../index.php?page=data-kasus-diterima-petugas');
?>