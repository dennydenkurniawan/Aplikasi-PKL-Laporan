    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data pengaduan yang diterima</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No Register</th>
                    <th>Tanggal Kej</th>
                    <th>Kronologi</th>
                    <th>Alamat Kej</th>
                    <th>Korban</th>
                    <th>Pelaku</th>
                    <th>Status</th>
                    <th>Pelayanan</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no =0;
                    $query = mysqli_query($koneksi, "SELECT k.*, t.*, k.id kid FROM tb_kasus k 
                    INNER JOIN tb_pengaduan_diterima t ON k.id = t.id_kasus
                    WHERE t.status = 'diterima'");
                    while($ksus = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='2%'><?php echo $no;?></td>
                    <td><?php echo $ksus['no_register'];?></td>
                    <td><?php echo $ksus['tgl'];?></td>
                    <td><?php echo $ksus['kronologi'];?></td>
                    <td><?php echo $ksus['alamat_kej'];?></td>
                    <td>
                      <!-- Table Korban start-->
                      <ul>
                        <?php
                          $querys = mysqli_query($koneksi, "SELECT * FROM tb_kasus
                          INNER JOIN tb_korban ON
                          tb_kasus.id=tb_korban.id_kasus
                          WHERE tb_kasus.id='$ksus[id]'");
                          while($korban = mysqli_fetch_array($querys)){
                        ?>
                          <li class="mb-2">
                            <a href="index.php?page=view-korban&& id=<?php echo $korban['id_korban']; ?>" 
                            class="text-body">
                              <?php echo $korban['nama'];?>
                            </a>
                        <?php };?>
                          </li>
                        </ul>
                    </td>
                    <!-- Tabel Korban end -->

                    <!-- Tabel Pelaku start -->
                    <td>
                      <ul>
                        <?php
                          $querys = mysqli_query($koneksi, "SELECT * FROM tb_kasus
                          INNER JOIN tb_pelaku ON
                          tb_kasus.id=tb_pelaku.id_kasus
                          WHERE tb_kasus.id='$ksus[id]'");
                          while($pelaku = mysqli_fetch_array($querys)){
                        ?>
                          <li class="mb-2">
                            <a href="index.php?page=view-pelaku&& id=<?php echo $pelaku['id_pelaku']; ?>" 
                            class="text-body">
                              <?php echo $pelaku['nama'];?>
                            </a>
                        <?php };?>
                          </li>
                        </ul>
                    </td>
                    <!-- Tabel Pelaku end -->
                    
                    <!-- Status kasus -->
                    <td>
                      <label class="btn btn-success btn-sm"><?php echo $ksus['status'] ?></label>
                    </td>

                    <!-- Tabel Pelayanan Petugas-->
                    <td>
                    <ul>
                        <?php
                          $queryz = mysqli_query($koneksi, "SELECT * FROM tb_kasus
                          INNER JOIN tb_pelayanan ON
                          tb_kasus.id = tb_pelayanan.id_kasus
                          WHERE tb_kasus.id='$ksus[kid]'");
                          while($pelayanan = mysqli_fetch_array($queryz)){
                        ?>
                          <li class="mb-2">
                            <p><?php echo $pelayanan['pelayanan'] ?></p>
                            <a href="index.php?page=view-pelayanan-petugas&& id=<?php echo $pelayanan['id_pelayanan']; ?>">
                            <i class="fas fa-search fa-sm"></i>
                            </a>
                          <!-- Edit -->
                          <a href="index.php?page=edit-pelayanan-petugas&& id=<?php echo $pelayanan['id_pelayanan']; ?>" 
                            class="fas fa-edit text-danger ml-2 fa-sm">
                          </a>
                          <!-- Hapus -->
                          <button type="button" class="text-danger ml-2 border-0 fa-sm" data-toggle="modal" data-target="#modal-lg<?php echo $pelayanan['id_pelayanan']; ?>">
                           <i class="far fa-times-circle "></i>
                          </button>
                            

                <div class="modal fade" id="modal-lg<?php echo $pelayanan['id_pelayanan']; ?>">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="POST" action="page/petugas/process_hapus_data_pelayanan.php?">
                      <div class="modal-body">

                        <div class="form-row mb-3">
                          <div class="col">
                            <input type="text" name="id" value="<?php echo $pelayanan['id_pelayanan'];?>" hidden>

                            Apakah anda ingin menghapus data pelayanan?
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                      </div>
                    </div>
                    </form>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                        <?php };?>
                          </li>
                          <li>
                            <a href="index.php?page=tambah-pelayanan-petugas&&id=<?php echo $ksus['kid'] ?>&&noreg=<?php echo $ksus['no_register'] ?>" 
                            class="fa fa-plus text-warning">
                            </a> 
                          </li>  
                        </ul>
                    </td>
                  </tr>
                  <?php };?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>No Register</th>
                    <th>Tanggal Kej</th>
                    <th>Kronologi</th>
                    <th>Alamat Kej</th>
                    <th>Korban</th>
                    <th>Pelaku</th>
                    <th>Status</th>
                    <th>Pelayanan</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="get" action="add/tambah_data.php">
            <div class="modal-body">
            
              <div class="form-row">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="NIM" name="nim" required>
                </div>
                <div class="col">
                <select class="custom-select" id="inputGroupSelect01" name="semester">
                  <option selected>Pilih...</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="3">4</option>
                  <option value="3">5</option>
                  <option value="3">6</option>
                  <option value="3">7</option>
                  <option value="3">8</option>
                </select>
                </div>
              </div>
            
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          </form>
        </div>
      </div>