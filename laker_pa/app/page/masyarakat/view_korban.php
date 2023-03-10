<?php

$userid = $_SESSION['id'];

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_korban WHERE id_korban='$id'");
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
            <h3 class="card-title">Data Korban</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  ID Korban <br />
                  Nomor Register <br />
                  Nama Lengkap <br />
                  Tanggal Lahir <br />
                  Alamat <br />
                  Jenis_Kelamin <br />
                  Pendidikan <br />
                  Pekerjaan <br />
                  Status Perkawian <br />
                  Tindak Kekerasan yang dialami
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
                  : <?php echo $view['tindak_kekerasan']; ?> <br />
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