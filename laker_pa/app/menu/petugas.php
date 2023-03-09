<?php
$dashboard_active = "fw-bold";
$pengaduan_masuk_active = "fw-bold";
$pengaduan_diterima_active = "fw-bold";
$pengaduan_ditolak_active = "fw-bold";

if (empty($_GET["page"])){
  $dashboard_active = "active";
} else {
$page = $_GET["page"];

switch ($page) {
  case "";
  case "dashboard-petugas" :
    $dashboard_active = "active";
    break;
  case "data-kasus-masuk-petugas" :
  case "tambah-pelayanan-petugas" :
    $pengaduan_masuk_active = "active";
    break;
  case "data-kasus-diterima-petugas":
  case "view-pelayanan-petugas":
  case "edit-pelayanan-petugas":
  case "hapus-pelayanan-petugas":
    $pengaduan_diterima_active = "active";
    break;
  case "data-kasus-ditolak-petugas":
    $pengaduan_ditolak_active = "active";
  }
};
?>

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php?page=dashboard-petugas" class="nav-link <?php echo $dashboard_active ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=data-kasus-masuk-petugas" class="nav-link <?php echo $pengaduan_masuk_active ?>">
            <i class="nav-icon fas fa-inbox"></i>
              <p>
                Pengaduan Masuk
              </p>
              <?php $data_masuk = mysqli_query($koneksi, "SELECT * FROM tb_kasus WHERE status = 'masuk'"); ?>
              <span class="right badge badge-danger"><?php echo mysqli_num_rows($data_masuk);?></span>
            </a>
          </li>

          <li class="nav-header">Kasus</li>
          <li class="nav-item">
            <a href="index.php?page=data-kasus-diterima-petugas" class="nav-link <?php echo $pengaduan_diterima_active ?>">
            <i class="nav-icon fas fa-check-circle"></i>
              <p>
                Diterima
              </p>
              <?php $data_diterima = mysqli_query($koneksi, "SELECT * FROM tb_kasus WHERE status = 'diterima'"); ?>
              <span class="right badge badge-danger"><?php echo mysqli_num_rows($data_diterima);?></span>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=data-kasus-ditolak-petugas" class="nav-link <?php echo $pengaduan_ditolak_active ?>">
            <i class="nav-icon fas fa-comment-slash"></i>
              <p>
                Ditolak
              </p>
              <?php $data_ditolak = mysqli_query($koneksi, "SELECT * FROM tb_kasus k 
                    INNER JOIN tb_pengaduan_ditolak t ON k.id = t.id_kasus
                    WHERE t.status = 'ditolak'"); ?>
              <span class="right badge badge-danger"><?php echo mysqli_num_rows($data_ditolak);?></span>
            </a>
          </li>

          <li class="nav-header">Keluar</li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link text-red">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>