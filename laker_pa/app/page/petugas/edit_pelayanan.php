<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_pelayanan WHERE id_pelayanan = '$id'");
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
            <h3 class="card-title">Data Layanan</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="page/petugas/process_edit_pelayanan.php">
            <div class="card-body">
              <div class="form-group">
                <label>ID Pelayanan</label>
                <input type="text" class="form-control" name="id_pelayanan" value="<?php echo $id ?>" readonly>
              </div>
              <div class="form-group">
                <label>Nama Petugas</label>
                <input type="text" class="form-control" name="nama_petugas" value="<?php echo $view['nama_petugas'] ?>" readonly>
              </div>
              <div class="form-group">
                <label>Tanggal Pelayanan</label>
                <input type="date" class="form-control" name="tgl_pelayanan" value="<?php echo $view['tgl_pelayanan'] ?>">
              </div>
              <div class="form-group">
                <label>Pelayanan yang diberikann</label>
                
                <div class="form-group">
                <select class="custom-select" name="jns_pelayanan" required>
                    <option <?php if ($view['pelayanan'] == "Bantuan Hukum") { echo 'selected'; }?> value="Bantuan Hukum">Bantuan Hukum</option>
                    <option <?php if ($view['pelayanan'] == "Kesehatan") { echo 'selected'; }?> value="Kesehatan">Kesehatan</option>
                    <option <?php if ($view['pelayanan'] == "Pendampingan") { echo 'selected'; }?> value="Pendampingan">Pendampingan</option>
                    <option <?php if ($view['pelayanan'] == "Penengakkan Hukum") { echo 'selected'; }?> value="Penegakkan Hukum">Penegakkan Hukum</option>
                    <option <?php if ($view['pelayanan'] == "Pengaduan") { echo 'selected'; }?> value="Pengaduan">Pengaduan</option>
                    <option <?php if ($view['pelayanan'] == "Rehabilitasi Sosial") { echo 'selected'; }?> value="Rehabilitasi Sosial">Rehabilitasi Sosial</option>
                    <option <?php if ($view['pelayanan'] == "Reintegrasi Sosial") { echo 'selected'; }?> value="Reintegrasi Sosial">Reintegrasi Sosial</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Deskripsi Pelayanan</label>
                <div class="form-group">
                  <textarea class="form-control" name="deskripsi" rows="3"><?php echo $view['deskripsi_pelayanan'] ?></textarea>
                </div>
              </div>
             
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Edit Data</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- /.card -->