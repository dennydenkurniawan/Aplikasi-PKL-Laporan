<?php
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
          <form method="POST" action="page/masyarakat/process_edit_pelaku.php">
            <div class="card-body">
              <div class="form-group">
                <label>Id Pelaku</label>
                <input type="text" class="form-control" name="id_pelaku" value="<?php echo $id; ?>" >
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
                  <label>Hubungan Dengan Korban</label>
                  <?php
                    $selected_hub_dgn_korban= $view['hubungan_dengan_korban'];
                  ?>
                  <select class="select2bs4" multiple="multiple" style="width: 100%;" name="hubungan_dengan_korban">
                      <option <?php if ($selected_hub_dgn_korban == "na") { echo 'selected'; }?> value="na">NA</option>
                      <option <?php if ($selected_hub_dgn_korban == "orang_tua") { echo 'selected'; }?> value="orang_tua">Orang Tua</option>
                      <option <?php if ($selected_hub_dgn_korban == "keluarga/saudara") { echo 'selected'; }?> value="keluarga/saudara">Keluarga/Saudara</option>
                      <option <?php if ($selected_hub_dgn_korban == "lainnya") { echo 'selected'; }?> value="lainnya">Lainnya</option>
                      <option <?php if ($selected_hub_dgn_korban == "tetangga") { echo 'selected'; }?> value="tetangga">Tetangga</option>
                      <option <?php if ($selected_hub_dgn_korban == "pacar/teman") { echo 'selected'; }?> value="pacar/teman">Pacar/teman</option>
                      <option <?php if ($selected_hub_dgn_korban == "guru") { echo 'selected'; }?> value="guru">Guru</option>
                      <option <?php if ($selected_hub_dgn_korban == "majikan") { echo 'selected'; }?> value="majikan">Majikan</option>
                      <option <?php if ($selected_hub_dgn_korban == "rekan_kerja") { echo 'selected'; }?> value="rekan_kerja">Rekan Kerja</option>  
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