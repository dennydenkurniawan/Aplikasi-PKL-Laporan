<?php
$userid = $_SESSION['id'];

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_pelaku WHERE id_pelaku='$id'");
$view = mysqli_fetch_array($query);
?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- general form elements -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Data Pelaku</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  ID Pelaku <br />
                  Nomor Register <br />
                  Nama Lengkap <br />
                  Tanggal Lahir <br />
                  Alamat <br />
                  Jenis_Kelamin <br />
                  Pendidikan <br />
                  Pekerjaan <br />
                  Status Perkawian <br />
                  Hubungan Dengan Korban
                </div>
                <div class="col-sm-9">
                  : <?php echo $id; ?><br />
                  : <?php echo $view['id_kasus']; ?><br />
                  : <?php echo $view['nama']; ?><br />
                  : <?php echo $view['tgl_lahir']; ?> <br />
                  : <?php echo $view['alamat']; ?> <br />
                  : <?php echo $view['jns_kelamin']; ?> <br />
                  : <?php echo $view['pendidikan']; ?> <br />
                  : <?php echo $view['pekerjaan']; ?> <br />
                  : <?php echo $view['status_perkawinan']; ?> <br />
                  : <?php echo $view['hubungan_dengan_korban']; ?> <br />
                </div>
                  <div class="col mt-3">
                  <a href="index.php?page=pengaduan-masyarakat&& userid=<?php echo $userid ?>" class="btn btn-primary">Tutup</a>
                  </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card -->