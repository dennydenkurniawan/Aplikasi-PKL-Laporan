<?php
$data_user = mysqli_query($koneksi, "SELECT * FROM akun_adminpetugas");

$id_user = $_SESSION['id'];
$pengaduan = mysqli_query($koneksi, "SELECT * FROM tb_kasus");

$masuk = mysqli_query($koneksi, "SELECT status FROM tb_kasus WHERE status = 'masuk'");
$diterima = mysqli_query($koneksi, "SELECT status FROM tb_kasus WHERE status = 'diterima'");
$ditolak = mysqli_query($koneksi, "SELECT status FROM tb_kasus WHERE status = 'ditolak'");




?>
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo mysqli_num_rows($pengaduan) ?></h3>
                <p>Total Pengaduan</p>
              </div>
              <div class="icon">
                <i class="fas fa-envelope-open"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo mysqli_num_rows($masuk)  ?></h3>

                <p>Masuk</p>
              </div>
              <div class="icon">
                <i class="fas fa-pencil-alt"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo mysqli_num_rows($diterima)  ?></h3>
                <p>Diterima</p>
              </div>
              <div class="icon">
                <i class="fas fa-check-circle"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo mysqli_num_rows($ditolak)  ?></h3>
                <p>Ditolak</p>
              </div>
              <div class="icon">
                <i class="fas fa-ban"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>