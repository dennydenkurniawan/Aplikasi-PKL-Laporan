<?php
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
          <form method="POST" action="page/masyarakat/process_edit_korban.php">
            <div class="card-body">

              <div class="form-group">
                <label>Id Korban</label>
                <input type="text" class="form-control" name="id_korban" value="<?php echo $id; ?>" >
              </div>
              <div class="form-group">
                <label>Nomor Register</label>
                <input type="text" class="form-control" name="no_reg" value="<?php echo $view['id_kasus']; ?>" disabled>
              </div>
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $view['nama']; ?>">
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $view['tgl_lahir']; ?>">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" rows="2" name="alamat"><?php echo $view['alamat']; ?></textarea>
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="form-group">
                  <select class="custom-select" name="jns_kelamin" id="jns_kel" value="<?php echo $view['jns_kelamin']; ?>">
                    <option value="perempuan">Perempuan</option>
                    <option value="laki-laki">Laki-laki</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Pendidikan</label>
                <div class="form-group">
                  <?php
                    $selected_pend = $view['pendidikan'];
                  ?>
                  <select class="custom-select" name="pendidikan" id="pend" >
                    <option <?php if ($selected_pend == "na") { echo 'selected'; }?> value="na">NA</option>
                    <option <?php if ($selected_pend == "sd") { echo 'selected'; }?> value="sd">SD</option>
                    <option <?php if ($selected_pend == "sltp") { echo 'selected'; }?> value="sltp">SLTP</option>
                    <option <?php if ($selected_pend == "slta") { echo 'selected'; }?> value="slta">SLTA</option>
                    <option <?php if ($selected_pend == "pt") { echo 'selected'; }?> value="pt">Perguruan Tinggi</option>
                    <option <?php if ($selected_pend == "tk") { echo 'selected'; }?> value="tk">TK/PAUD</option>
                    <option <?php if ($selected_pend == "tdk_sekolah") { echo 'selected'; }?>value="tdk_sekolah">Tidak / Belum Pernah Sekolah</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Pekerjaan</label>
                <div class="form-group">
                  <?php
                    $selected_pekerjaan = $view['pekerjaan'];
                  ?>
                  <select class="custom-select" name="pekerjaan" id="pekerjaan">
                    <option <?php if ($selected_pekerjaan == "na") { echo 'selected'; }?> value="na">NA</option>
                    <option <?php if ($selected_pekerjaan == "pelajar") { echo 'selected'; }?> value="pelajar">Pelajar</option>
                    <option <?php if ($selected_pekerjaan == "swasta") { echo 'selected'; }?> value="swasta">Swasta/Buruh</option>
                    <option <?php if ($selected_pekerjaan == "pegawai") { echo 'selected'; }?> value="pegawai">PNS/TNI/POLRI</option>
                    <option <?php if ($selected_pekerjaan == "pedagang") { echo 'selected'; }?> value="pedagang">Pedagang/Nelayan</option>
                    <option <?php if ($selected_pekerjaan == "irt") { echo 'selected'; }?> value="irt">Ibu Rumah Tanggal</option>
                    <option <?php if ($selected_pekerjaan == "tdk_bekerja") { echo 'selected'; }?> value="tdk_bekerja">Tidak Bekerja</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Status Perkawinan</label>
                <div class="form-group">
                  <?php
                    $selected_status_perkawinan = $view['status_perkawinan'];
                  ?>
                  <select class="custom-select" name="status_perkawinan" id="status_perkawinan">
                    <option <?php if ($selected_status_perkawinan == "na") { echo 'selected'; }?> value="na">NA</option>
                    <option <?php if ($selected_status_perkawinan == "kawin") { echo 'selected'; }?> value="kawin">Kawin</option>
                    <option <?php if ($selected_status_perkawinan == "cerai") { echo 'selected'; }?> value="cerai">Cerai</option>
                    <option <?php if ($selected_status_perkawinan == "belum") { echo 'selected'; }?> value="belum">Belum Kawin</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label>Tindak Kekerasan yang Dialami</label>
                  <?php
                    $selected_tindak_kekerasan = $view['tindak_kekerasan'];
                  ?>
                  <select class="select2bs4" multiple="multiple" style="width: 100%;" name="tindak_kekerasan">
                      <option <?php if ($selected_tindak_kekerasan == "fisik") { echo 'selected'; }?> value="fisik">Fisik</option>
                      <option <?php if ($selected_tindak_kekerasan == "psikis") { echo 'selected'; }?> value="psikis">Psikis</option>
                      <option <?php if ($selected_tindak_kekerasan == "seksual") { echo 'selected'; }?> value="seksual">Seksual</option>
                      <option <?php if ($selected_tindak_kekerasan == "exploitasi") { echo 'selected'; }?> value="eksploitasi">Eksploitasi</option>
                      <option <?php if ($selected_tindak_kekerasan == "penelantaran") { echo 'selected'; }?> value="penelantaran">Penelantaran</option>
                      <option <?php if ($selected_tindak_kekerasan == "lainnya") { echo 'selected'; }?> value="lainnya">Lainnya</option>
                  </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card -->