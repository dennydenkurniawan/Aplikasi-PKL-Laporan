<?php
$id = $_GET['id'];
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
          <form method="post" action="page/admin/process_tambah_korban.php">
            <div class="card-body">
              <div class="form-group">
                <label>ID Kasus</label>
                <input type="text" class="form-control" placeholder="Masukkan" name="id_kasus" value="<?php echo $id; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Masukkan" name="nama">
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" placeholder="Masukkan" name="tgl_lahir">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" rows="2" placeholder="Masukkan" name="alamat"></textarea>
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="form-group">
                  <select class="custom-select" name="jns_kelamin" id="jns_kel" required>
                    <option value="">Pilih ...</option>
                    <option value="perempuan">Perempuan</option>
                    <option value="laki-laki">Laki-laki</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Pendidikan</label>
                <div class="form-group">
                  <select class="custom-select" name="pendidikan" id="pend" required>
                    <option value="">Pilih ...</option>
                    <option value="na">NA</option>
                    <option value="sd">SD</option>
                    <option value="sltp">SLTP</option>
                    <option value="slta">SLTA</option>
                    <option value="pt">Perguruan Tinggi</option>
                    <option value="tk">TK/PAUD</option>
                    <option value="tdk_sekolah">Tidak / Belum Pernah Sekolah</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Pekerjaan</label>
                <div class="form-group">
                  <select class="custom-select" name="pekerjaan" id="pekerjaan" required>
                    <option value="">Pilih ...</option>
                    <option value="na">NA</option>
                    <option value="pelajar">Pelajar</option>
                    <option value="swasta">Swasta/Buruh</option>
                    <option value="pegawai">PNS/TNI/POLRI</option>
                    <option value="pedagang">Pedagang/Nelayan</option>
                    <option value="irt">Ibu Rumah Tanggal</option>
                    <option value="tdk_bekerja">Tidak Bekerja</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Status Perkawinan</label>
                <div class="form-group">
                  <select class="custom-select" name="status_perkawinan" id="status_perkawinan" required>
                    <option value="">Pilih ...</option>
                    <option value="na">NA</option>
                    <option value="kawin">Kawin</option>
                    <option value="cerai">Cerai</option>
                    <option value="belum">Belum Kawin</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                  <label>Tindak Kekerasan yang Dialami</label>
                  <select class="select2bs4" multiple="multiple" data-placeholder="Pilih Tindak Kekerasan" style="width: 100%;" name="tindak_kekerasan" required>
                    <option value="">Pilih ...</option>  
                    <option value="fisik">Fisik</option>
                    <option value="psikis">Psikis</option>
                    <option value="seksual">Seksual</option>
                    <option value="eksploitasi">Eksploitasi</option>
                    <option value="penelantaran">Penelantaran</option>
                    <option value="lainnya">Lainnya</option>
                  </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <input class="btn btn-danger" type="reset" value="Reset" name="reset"/>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card -->