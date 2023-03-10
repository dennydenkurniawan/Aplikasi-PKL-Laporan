<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM tb_kasus WHERE id='$id'");
$view = mysqli_fetch_array($query);
?>
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Pengaduan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="page/masyarakat/process_edit_pengaduan.php">
                <input type="text" name="id_kasus" id="id" value="<?php echo $id;?>" hidden>

                <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">No Register</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="register" value="<?php echo $view['no_reg'] ;?>" readonly>
                    </div>
                <div class="form-group">
                  <label for="">Tanggal Melapor</label>
                  <input type="date" name="tanggal_lapor" class="form-control" value="<?php echo $view['tgl_lapor'];?>"/>
                </div>
                <div class="form-group">
                  <label for="">Tanggal Kejadian</label>
                  <input type="date" name="tanggal_kejadian" class="form-control" value="<?php echo $view['tgl'];?>"/>
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <label>Kronologi Kejadian</label>
                    <textarea class="form-control" rows="3" name="kronologi"><?php echo $view['kronologi'];?></textarea>
                  </div>
                </div>
                <div class="form-group ">
                  <div class="form-group">
                    <label>Alamat Kejadian</label>
                    <textarea class="form-control" rows="3" name="alamat_kejadian"><?php echo $view['alamat_kej'];?></textarea>
                  </div>
                </div>
                <div class="form-group ">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" name="provinsi" value="<?php echo $view['provinsi'];?>" class="form-control" readonly>
                      </div>
                </div>
                <div class="form-group ">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Kabupaten</label>
                        <input type="text" name="kabupaten" value="<?php echo $view['kabupaten'];?>" class="form-control" readonly>
                      </div>
                </div>
                <div class="form-group ">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <select name="kecamatan" class="form-control">
                          <option <?php if ($view['kecamatan'] == "Alalak") { echo 'selected'; }?> value="Alalak">Alalak</option>
                          <option <?php if ($view['kecamatan'] == "Anjir Muara") { echo 'selected'; }?> value="Anjir Muara">Anjir Muara</option>
                          <option <?php if ($view['kecamatan'] == "Anjir Pasar") { echo 'selected'; }?> value="Anjir Pasar">Anjir Pasar</option>
                          <option <?php if ($view['kecamatan'] == "Bakumpai") { echo 'selected'; }?> value="Bakumpai">Bakumpai</option>
                          <option <?php if ($view['kecamatan'] == "Barambai") { echo 'selected'; }?> value="Barambai">Barambai</option>
                          <option <?php if ($view['kecamatan'] == "Belawang") { echo 'selected'; }?> value="Belawang">Belawang</option>
                          <option <?php if ($view['kecamatan'] == "Cerbon") { echo 'selected'; }?> value="Cerbon">Cerbon</option>
                          <option <?php if ($view['kecamatan'] == "Kuripan") { echo 'selected'; }?> value="Kuripan">Kuripan</option>
                          <option <?php if ($view['kecamatan'] == "Jejangkit") { echo 'selected'; }?> value="Jejangkit">Jejangkit</option>
                          <option <?php if ($view['kecamatan'] == "Mandastana") { echo 'selected'; }?> value="Mandastana">Mandastana</option>
                          <option <?php if ($view['kecamatan'] == "Marabahan") { echo 'selected'; }?> value="Marabahan">Marabahan</option>
                          <option <?php if ($view['kecamatan'] == "Mekarsari") { echo 'selected'; }?> value="Mekarsari">Mekarsari</option>
                          <option <?php if ($view['kecamatan'] == "Rantau Badauh") { echo 'selected'; }?> value="Rantau Badauh">Rantau Badauh</option>
                          <option <?php if ($view['kecamatan'] == "Tabukan") { echo 'selected'; }?> value="Tabukan">Tabukan</option>
                          <option <?php if ($view['kecamatan'] == "Tabunganen") { echo 'selected'; }?> value="Tabunganen">Tabunganen</option>
                          <option <?php if ($view['kecamatan'] == "Tamban") { echo 'selected'; }?> value="Tamban">Tamban</option>
                          <option <?php if ($view['kecamatan'] == "Wanaraya") { echo 'selected'; }?> value="Wanaraya">Wanaraya</option>

                        </select>
                      </div>
                </div>
               <div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>