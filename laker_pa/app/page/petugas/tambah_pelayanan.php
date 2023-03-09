<?php
$id = $_GET['id'];
$no_reg = $_GET['noreg']
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
          <form method="post" action="page/petugas/process_tambah_pelayanan.php">
            <div class="card-body">
              <div class="form-group">
                <label>ID Kasus</label>
                <input type="text" class="form-control" name="id_kasus" value="<?php echo $id ?>" readonly>
              </div>
              <div class="form-group">
                <label>No Reg</label>
                <input type="text" class="form-control" name="no_reg" value="<?php echo $no_reg ?>" readonly>
              </div>
              <div class="form-group">
                <label>Nama Petugas</label>
                <input type="text" class="form-control" name="nama_petugas" value="<?php echo $_SESSION['nama'] ?>" readonly>
              </div>
              <div class="form-group">
                <label>Tanggal Pelayanan</label>
                <input type="date" class="form-control" placeholder="Masukkan" name="tgl_pelayanan">
              </div>
              <div class="form-group">
                <label>Pelayanan yang diberikan</label>
                <div class="form-group">
                  <select class="custom-select" name="jns_pelayanan" required>
                    <option value="">Pilih ...</option>
                    <option value="Bantuan Hukum">Bantuan Hukum</option>
                    <option value="Kesehatan">Kesehatan</option>
                    <option value="Pendampingan">Pendampingan</option>
                    <option value="Penegakkan Hukum">Penegakkan Hukum</option>
                    <option value="Pengaduan">Pengaduan</option>
                    <option value="Rehabilitasi Sosial">Rehabilitasi Sosial</option>
                    <option value="Reintegrasi Sosial">Reintegrasi Sosial</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Deskripsi Pelayanan</label>
                <div class="form-group">
                  <textarea class="form-control" name="deskripsi" rows="3" placeholder="Masukkan ..."></textarea>
                </div>
              </div>
             
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                <input class="btn btn-danger" type="reset" value="Reset" name="reset"/>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- /.card -->