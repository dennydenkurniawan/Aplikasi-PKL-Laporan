<?php
session_start();
include ('config.php');
$nama       = $_POST['nama'];
$ttl        = $_POST['ttl'];
$alamat     = $_POST['alamat'];
$no_telp    = $_POST['no_telp'];
$username   = $_POST['username'];
$password   = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT * FROM akun_masyarakat WHERE username='$username' AND password='$password'");

$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

$myuid      = uniqid();

if($ketemu == 0 ){
$query = mysqli_query($koneksi, "INSERT INTO akun_masyarakat 
(
    id,
    nama, 
    ttl,
    alamat,
    no_telp,
    username, 
    password, 
    level
) 
VALUES
(
    '$myuid',
    '$nama',
    '$ttl',
    '$alamat',
    '$no_telp',
    '$username',
    '$password',
    'masyarakat'
)");

echo ("
<script LANGUAGE='JavaScript'>
    window.alert('Pendaftaran Berhasil');
    window.location.href='../login.php';
</script>
");
} else {
    echo ("
    <script LANGUAGE='JavaScript'>
        window.alert('Akun sudah terdaftar !!');
        window.location.href='../registrasi.php';
    </script>
    ");
}
?>