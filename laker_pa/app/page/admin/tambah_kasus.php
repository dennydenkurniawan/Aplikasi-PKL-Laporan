<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Kasus Baru</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="page/admin/process_tambah_kasus.php">
                
                <input type="text" name="id_input" value="<?php echo $_GET['userid'] ?>" hidden>

                <input type="text" name="status" value="diterima" hidden>
             

              <div class="card-body">
                <div class="form-group">
                  <label for="">Nomor Register</label>
                  <input type="text" name="register"  class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="">Tanggal Melapor</label>
                  <input type="date" name="tanggal_lapor" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="">Tanggal Kejadian</label>
                  <input type="date" name="tanggal" class="form-control"/>
                </div>
                <div class="form-group">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Kronologi Kejadian</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="kronologi"></textarea>
                      </div>
                </div>
                <div class="form-group ">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Alamat Kejadian</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="lok_kejadian"></textarea>
                      </div>
                </div>
                <div class="form-group ">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" name="provinsi" value="Kalimantan Selatan" class="form-control" readonly>
                      </div>
                </div>
                <div class="form-group ">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Kabupaten</label>
                        <input type="text" name="kabupaten" value="Barito Kuala" class="form-control" readonly>
                      </div>
                </div>
                <div class="form-group ">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <select name="kecamatan" class="form-control">
                          <option value="Alalak">Alalak</option>
                          <option value="Anjir Muara">Anjir Muara</option>
                          <option value="Anjir Pasar">Anjir Pasar</option>
                          <option value="Bakumpai">Bakumpai</option>
                          <option value="Barambai">Barambai</option>
                          <option value="Belawang">Belawang</option>
                          <option value="Cerbon">Cerbon</option>
                          <option value="Kuripan">Kuripan</option>
                          <option value="Jejangkit">Jejangkit</option>
                          <option value="Mandastana">Mandastana</option>
                          <option value="Marabahan">Marabahan</option>
                          <option value="Mekarsari">Mekarsari</option>
                          <option value="Rantau Badauh">Rantau Badauh</option>
                          <option value="Tabukan">Tabukan</option>
                          <option value="Tabunganen">Tabunganen</option>
                          <option value="Tamban">Tamban</option>
                          <option value="Wanaraya">Wanaraya</option>
                        </select>
                      </div>
                </div>
                <div class="form-group ">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Progress</label>
                        <select name="progress" class="form-control">
                          <option value="belum">Belum</option>
                          <option value="selesai">Selesai</option>
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
    </section>
            <!-- /.card -->