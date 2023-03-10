<?php
include('../../../conf/config.php');
session_start();

$id_kasus = $_POST['id'];

$progress = 'selesai';


$query = mysqli_query($koneksi, "UPDATE tb_kasus SET progress ='$progress' WHERE id='$id_kasus'");
header('location: ../../index.php?page=data-kasus-admin');
?>