<?php
  $nama_user = $_SESSION['nama'];
  $ambil_id_user = mysqli_query($koneksi, "SELECT id FROM akun_adminpetugas WHERE nama = '$nama_user'");
  $id_user = mysqli_fetch_array($ambil_id_user);


$dashboard_active = "fw-bold";
$data_kasus_admin = "fw-bold";
$kasus_baru_active = "fw-bold";
$pengaduan_masuk_active = "fw-bold";
$report_masuk_active = "fw-bold";
$report_diterima_active = "fw-bold";
$report_ditolak_active = "fw-bold";
$report_selesai_active = "fw-bold";
$report_pengguna_active = "fw-bold";
$data_admin_active = "fw-bold";
$data_petugas_active = "fw-bold";
$data_masyarakat_active = "fw-bold";

if (empty($_GET["page"])){
  $dashboard_active = "active";
} else {
$page = $_GET["page"];

switch ($page) {
  case "";
  case "dashboard-admin" :
    $dashboard_active = "active";
    break;
  case "data-kasus-admin" :
    $data_kasus_admin = "active";
    break;
  case "tambah-kasus-admin" :
    $kasus_baru_active = "active";
    break;
  case "data-pengaduan-admin" :
    $pengaduan_masuk_active = "active";
    break;
  case "report-kasus-masuk-admin":
    $report_masuk_active = "active";
    break;
  case "report-kasus-diterima-admin":
    $report_diterima_active = "active";
    break;
  case "report-kasus-ditolak-admin":
    $report_ditolak_active = "active";
    break;
  case "report-kasus-selesai-admin":
    $report_selesai_active = "active";
    break;
  case "report-pengguna":
    $report_pengguna_active = "active";
    break;
  case "data-admin":
    $data_admin_active = "active";
    break;
  case "data-petugas":
    $data_petugas_active = "active";
    break;
  case "data-masyarakat":
    $data_masyarakat_active = "active";
    break;
  }
};

?>

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php?page=dashboard-admin" class="nav-link <?php echo $dashboard_active ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
               <a href="index.php?page=data-kasus-admin" class="nav-link <?php echo $data_kasus_admin ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Total Kasus</p>
                <?php $data_user = mysqli_query($koneksi, "SELECT * FROM tb_kasus"); ?>
                <span class="right badge badge-danger"><?php echo mysqli_num_rows($data_user);?></span>
              </a>
          </li>

            <li class="nav-header">Buat</li>
              <li class="nav-item">
                <!-- <a href="index.php?page=data-mahasiswa" class="nav-link active"> -->
                <a href="index.php?page=tambah-kasus-admin&& userid=<?php echo $id_user['id']; ?>" class="nav-link <?php echo $kasus_baru_active ?>">
                <i class="nav-icon fas fa-pencil-alt"></i>
                  <p>Kasus Baru</p>
                </a>
              </li>
            
          <li class="nav-header">Masuk</li>
          <li class="nav-item">
            <a href="index.php?page=data-pengaduan-admin" class="nav-link <?php echo $pengaduan_masuk_active ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Pengaduan
              </p>
            </a>
          </li>


          <li class="nav-header">Akun</li>
          <li class="nav-item">
            <a href="index.php?page=data-admin" class="nav-link <?php echo $data_admin_active ?>">
            <i class="nav-icon fas fa-user-tie"></i>            
              <p>
                Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=data-petugas" class="nav-link <?php echo $data_petugas_active ?>">
            <i class="nav-icon fas fa-users"></i>
              <p>
                Petugas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=data-masyarakat" class="nav-link <?php echo $data_masyarakat_active ?>">
            <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Masyarakat
              </p>
            </a>
          </li>

          <li class="nav-header">Report</li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
              Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="index.php?page=report-kasus-masuk-admin" class="nav-link <?php echo $report_masuk_active ?>">
            <i class="nav-icon fas fa-envelope-open"></i>
              <p>
                 Kasus Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=report-kasus-diterima-admin" class="nav-link <?php echo $report_diterima_active ?>">
            <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Kasus diterima
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=report-kasus-ditolak-admin" class="nav-link <?php echo $report_ditolak_active ?>">
            <i class="nav-icon fas fa-ban"></i>
              <p>
                Kasus ditolak
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?page=report-kasus-selesai-admin" class="nav-link <?php echo $report_selesai_active ?>">
            <i class="nav-icon fas fa-clipboard-check"></i>
              <p>
                Kasus Selesai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=report-pengguna" class="nav-link <?php echo $report_pengguna_active ?>">
            <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          </ul>

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