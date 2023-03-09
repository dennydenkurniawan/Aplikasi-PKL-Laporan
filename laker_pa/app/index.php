<!DOCTYPE html>
<html lang="en">
<?php session_start();
if(!$_SESSION['nama']){
  header('location: ../index.php?session=expired');
}
include('header.php');?>
<?php include('../conf/config.php');?> 
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <?php include('preloader.php');?>

  <!-- Navbar -->
  <?php include('navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php include('logo.php');?>

    <!-- Sidebar -->
  <?php include('sidebar.php');?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('content_header.php');?>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php 
    if (isset($_GET['page'])){
      
      // Admin
      if ($_GET['page']=='dashboard-admin'){
        include('page/admin/dashboard.php');
      }
      else if ($_GET['page']=='tambah-kasus-admin'){
        include('page/admin/tambah_kasus.php');
      }
      else if ($_GET['page']=='tambah-korban-by-admin'){
        include('page/admin/tambah_korban.php');
      }
      else if ($_GET['page']=='tambah-pelaku-by-admin'){
        include('page/admin/tambah_pelaku.php');
      }
      else if ($_GET['page']=='data-kasus-admin'){
        include('page/admin/view_kasus.php');
      }
      else if ($_GET['page']=='data-pengaduan-admin'){
        include('page/admin/view_pengaduan.php');
      }
      else if ($_GET['page']=='edit-pengaduan-admin'){
        include('page/admin/edit_kasus.php');
      }
      else if ($_GET['page']=='edit-akun-admin'){
        include('page/admin/edit_akun_admin.php');
      }
      else if ($_GET['page']=='edit-akun-petugas'){
        include('page/admin/edit_akun_petugas.php');
      }
      else if ($_GET['page']=='edit-akun-masyarakat'){
        include('page/admin/edit_akun_masyarakat.php');
      }
      else if ($_GET['page']=='report-kasus-masuk-admin'){
        include('page/admin/report_kasus_masuk.php');
      }
      else if ($_GET['page']=='report-kasus-diterima-admin'){
        include('page/admin/report_kasus_diterima.php');
      }
      else if ($_GET['page']=='report-kasus-ditolak-admin'){
        include('page/admin/report_kasus_ditolak.php');
      }
      else if ($_GET['page']=='report-kasus-selesai-admin'){
        include('page/admin/report_kasus_selesai.php');
      }
      else if ($_GET['page']=='report-pengguna'){
        include('page/admin/report_pengguna.php');
      }
      else if ($_GET['page']=='data-admin'){
        include('page/admin/view_akun_admin.php');
      }
      else if ($_GET['page']=='data-petugas'){
        include('page/admin/view_akun_petugas.php');
      }
      else if ($_GET['page']=='data-masyarakat'){
        include('page/admin/view_akun_masyarakat.php');
      }
      else if ($_GET['page']=='view-korban-by-admin'){
        include('page/admin/view_korban.php');
      }
      else if ($_GET['page']=='view-pelaku-by-admin'){
        include('page/admin/view_pelaku.php');
      }



      // Petugas
      else if ($_GET['page']=='dashboard-petugas'){
        include('page/petugas/dashboard.php');
      }     
      else if ($_GET['page']=='tambah-pelayanan-petugas'){
        include('page/petugas/tambah_pelayanan.php');
      }      
      else if ($_GET['page']=='view-pelayanan-petugas'){
        include('page/petugas/view_pelayanan.php');
      }      
      else if ($_GET['page']=='edit-pelayanan-petugas'){
        include('page/petugas/edit_pelayanan.php');
      }      
      else if ($_GET['page']=='hapus-pelayanan-petugas'){
        include('page/petugas/hapus_data_pelayanan.php');
      }
      else if ($_GET['page']=='data-kasus-masuk-petugas'){
        include('page/petugas/view_kasus_masuk.php');
      }      
      else if ($_GET['page']=='data-kasus-diterima-petugas'){
        include('page/petugas/view_kasus_diterima.php');
      }      
      else if ($_GET['page']=='data-kasus-ditolak-petugas'){
        include('page/petugas/view_kasus_ditolak.php');
      }      

      // Masyarakat
      else if ($_GET['page']=='dashboard-user'){
        include('page/masyarakat/dashboard.php');
      }
      else if ($_GET['page']=='pengaduan-masyarakat'){
        include('page/masyarakat/view_pengaduan.php');
      }
      else if ($_GET['page']=='pengaduan-masyarakat-selesai'){
        include('page/masyarakat/view_kasus_selesai.php');
      }
      else if ($_GET['page']=='pengaduan-masyarakat-ditolak'){
        include('page/masyarakat/view_kasus_ditolak.php');
      }
      else if ($_GET['page']=='tambah-kasus-masyarakat'){
        include('page/masyarakat/tambah_pengaduan.php');
      }
      else if ($_GET['page']=='edit-pengaduan-masyarakat'){
        include('page/masyarakat/edit_pengaduan.php');
      }
      else if ($_GET['page']=='tambah-korban-by-masyarakat'){
        include('page/masyarakat/tambah_korban.php');
      }
      else if ($_GET['page']=='tambah-pelaku-by-masyarakat'){
        include('page/masyarakat/tambah_pelaku.php');
      }
      else if ($_GET['page']=='edit-korban-by-masyarakat'){
        include('page/masyarakat/edit_korban.php');
      }
      else if ($_GET['page']=='edit-pelaku-by-masyarakat'){
        include('page/masyarakat/edit_pelaku.php');
      }
      else if ($_GET['page']=='view-korban-m'){
        include('page/masyarakat/view_korban.php');
      }
      else if ($_GET['page']=='view-pelaku-m'){
        include('page/masyarakat/view_pelaku.php');
      }
      else if ($_GET['page']=='detail-kasus-m'){
        include('page/masyarakat/view_detail_kasus.php');
      }

    }
    else{
      if($_SESSION['level'] == "admin") {
        include('page/admin/dashboard.php');
      } 
      else if($_SESSION['level'] == "superadmin") {
        include('page/view/dashboard.php');
      } 
      else if($_SESSION['level'] == "petugas") {
        include('page/petugas/dashboard.php');
      } 
      else {
      include('page/masyarakat/dashboard.php');
      }
    }
    ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</body>
</html>