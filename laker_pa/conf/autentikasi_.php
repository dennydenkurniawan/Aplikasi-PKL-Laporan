<?php
session_start();
include ('config.php');
$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT * FROM akun_adminpetugas WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($login) == 0) {
    $login = mysqli_query($koneksi, "SELECT * FROM akun_masyarakat WHERE username='$username' AND password='$password'");
}

$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

if($ketemu > 0 ){
    $_SESSION['nama'] = $r['nama'];
    $_SESSION['level'] = $r['level'];
    $_SESSION['id'] = $r['id'];
    header("location: ../app");
} else {
    echo "Gagal";
}

?>