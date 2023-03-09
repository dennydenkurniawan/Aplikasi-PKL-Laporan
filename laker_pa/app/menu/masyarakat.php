<?php
$dashboard_active = "fw-bold";
$pengaduan_terkirim_active = "fw-bold";
$pengaduan_selesai_active = "fw-bold";
$pengaduan_ditolak_active = "fw-bold";
$tambah_pengaduan_active = "fw-bold";

if (empty($_GET["page"])){
  $dashboard_active = "active";
} else {
$page = $_GET["page"];

switch ($page) {
  case "";
  case "dashboard-petugas" :
    $dashboard_active = "active";
    break;
  case "pengaduan-masyarakat" :
  case "edit-pengaduan-masyarakat" :
  case "tambah-korban-by-masyarakat" :
  case "tambah-pelaku-by-masyarakat" :
  case "edit-korban-by-masyarakat" :
  case "edit-pelaku-by-masyarakat" :
  case "view-korban-m" :
  case "view-pelaku-m" :
  case "detail-kasus-m" :
    $pengaduan_terkirim_active = "active";
    break;
  case "pengaduan-masyarakat-selesai":
  case "":
  case "":
  case "":
    $pengaduan_selesai_active = "active";
    break;
  case "pengaduan-masyarakat-ditolak":
    $pengaduan_ditolak_active = "active";
    break;
  case "tambah-kasus-masyarakat":
    $tambah_pengaduan_active = "active";
  }
};
?>

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-header">Menu </li>
          <li class="nav-item">
            <a href="index.php?page=dashboard-user" class="nav-link <?php echo $dashboard_active ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Pengaduan Saya
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <?php
              $session_id = $_SESSION['id'];
              $nama_user = $_SESSION['nama'];
              $ambil_id_user = mysqli_query($koneksi, "SELECT id FROM akun_masyarakat WHERE id = '$session_id'");
              $id_user = mysqli_fetch_array($ambil_id_user);

              
            ?>
                <a href="index.php?page=pengaduan-masyarakat&& userid=<?php echo $id_user['id']; ?>" class="nav-link <?php echo $pengaduan_terkirim_active ?>">
                <i class="nav-icon fas fa-paper-plane"></i>
                  <p>Pengaduan Terikim</p>
                  <?php $data_user = mysqli_query($koneksi, "SELECT status FROM tb_kasus WHERE id_input= '$session_id' AND status != 'ditolak' AND progress != 'selesai'"); ?>

                  <span class="right badge badge-danger"><?php echo mysqli_num_rows($data_user);?></span>
                </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=pengaduan-masyarakat-selesai&& userid=<?php echo $id_user['id']; ?>" class="nav-link <?php echo $pengaduan_selesai_active ?>">
              <i class="nav-icon fas fa-clipboard-check"></i>
              <p>
                Pengaduan Selesai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=pengaduan-masyarakat-ditolak&& userid=<?php echo $id_user['id']; ?>" class="nav-link <?php echo $pengaduan_ditolak_active ?>">
            <i class="nav-icon fas fa-times"></i>
              <p>
                Pengaduan Ditolak
              </p>
            </a>
          </li>
          </ul>
          <li class="nav-header">Buat Pengaduan</li>
            <!-- <a href="#" class="nav-link active"> -->
            
              <li class="nav-item">
                <!-- <a href="index.php?page=data-mahasiswa" class="nav-link active"> -->
                <a href="index.php?page=tambah-kasus-masyarakat&& userid=<?php echo $id_user['id']; ?>" class="nav-link <?php echo $tambah_pengaduan_active ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaduan Baru</p>
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