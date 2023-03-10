<?php
$userid = $_SESSION['id'];

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_pelayanan p 
INNER JOIN tb_kasus k ON p.id_kasus = k.id WHERE p.id_pelayanan='$id'");
$view = mysqli_fetch_array($query);
?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- general form elements -->
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Data Pelayanan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  ID Kasus <br />
                  Nomor Pelayanan <br />
                  Nama Petugas <br />
                  Tanggal Pelayanan <br />
                  Jenis pelayanan yang diberikan <br />
                  Deskripsi Pelayanan <br />
                </div>
                <div class="col-sm-9">
                  : <?php echo $view['id']; ?><br />
                  : <?php echo $view['id_pelayanan']; ?><br />
                  : <?php echo $view['nama_petugas']; ?><br />
                  : <?php echo $view['tgl_pelayanan']; ?> <br />
                  : <?php echo $view['pelayanan']; ?> <br />
                  : <?php echo $view['deskripsi_pelayanan']; ?> <br />
                </div>
                  <div class="col mt-3">
                  <a href="index.php?page=data-kasus-diterima-petugas" class="btn btn-primary">Tutup</a>
                  </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card -->