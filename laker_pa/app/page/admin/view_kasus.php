    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengaduan Masuk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No Register</th>
                    <th>Tanggal Kejadian</th>
                    <th>Kronologi</th>
                    <th>Alamat Kejadian</th>
                    <th>Korban</th>
                    <th>Pelaku</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no =0;
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_kasus 
                    ");
                    while($ksus = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='2%'><?php echo $no;?></td>
                    <td><?php echo $ksus['no_reg'];?></td>
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
                            <a href="index.php?page=view-korban-by-admin&& id=<?php echo $korban['id_korban']; ?>" 
                            class="text-body">
                              <?php echo $korban['nama'];?>
                            </a>
                          </li>  
                        <?php };?>
                          <li>
                            <a href="index.php?page=tambah-korban-by-admin&&id=<?php echo $ksus['id'] ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-plus fa-inverse"></i>
                            </a>
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
                            <a href="index.php?page=view-pelaku-by-admin&& id=<?php echo $pelaku['id_pelaku']; ?>" 
                            class="text-body">
                              <?php echo $pelaku['nama'];?>
                            </a>
                          </li>   
                        <?php };?>
                          <li>
                            <a href="index.php?page=tambah-pelaku-by-admin&&id=<?php echo $ksus['id'] ?>" class="btn btn-warning btn-sm">
                              <i class="fas fa-plus fa-inverse"></i>
                            </a> 
                          </li>
                        </ul>
                    </td>
                    <!-- Tabel Pelaku end -->

                    <td>
                    <?php
                      if ($ksus['status'] == "masuk"){
                        $warna = 'btn-primary';
                      }else if ($ksus['status'] == "diterima"){
                        $warna = 'btn-success';
                      } else {
                        $warna = 'btn-danger';
                      }
                    ?>

                      <label class="btn <?php echo $warna ?> btn-sm"><?php echo $ksus['status'] ?></label>
                    </td>

                    <!-- Tabel Action -->
                    <td>
                      <a href="index.php?page=edit-pengaduan-admin&& id=<?php echo $ksus['id'];?>" class="btn btn-success btn-sm mb-2 mr-2">
                        <i class="fas fa-edit"></i>
                      </a>
                        <!-- <button data-toggle="modal" data-target="#modalTerimaPengaduan" class="btn btn-sm btn-primary" title="Terima Kasus">
                          <i class="fas fa-check-circle"></i>
                        </button>
                        <button data-toggle="modal" data-target="#modal-lg" class="btn btn-sm btn-danger" title="Tolak Kasus">
                          <i class="fas fa-times-circle"></i>
                        </button> -->
                        
                    </td>
                    <div class="modal fade" id="modalTerimaPengaduan">
                          <div class="modal-dialog modal-md">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Terima Pengaduan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form method="post" action="page/petugas/process_terima_pengaduan.php">
                              <div class="modal-body">
                                <input type="text" name="id_kasus" value="<?php echo $ksus['id'] ?>" hidden>

                                <div class="form-group">
                                  <label for="Alasan">Masukkan Nomor Register Kasus :</label>
                                  <input type="text" name="no_register" class="form-control" required>
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

                        <div class="modal fade" id="modal-lg">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Alasan Kasus Ditolak</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form method="post" action="page/petugas/process_tolak_pengaduan.php">
                              <div class="modal-body">
                                <input type="text" name="id_kasus" value="<?php echo $ksus['id'] ?>" hidden>

                                <div class="form-row">
                                  <label for="Alasan">Tulis alasan kasus di tolak :</label>
                                </div>
                                <div class="form-row">
                                    <textarea class="form-control" name="alasan" id="Alasan" cols="10" rows="5" required></textarea>
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
                  </tr>
                  <?php };?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>No Register</th>
                    <th>Tanggal Kejadian</th>
                    <th>Kronologi</th>
                    <th>Alamat Kejadian</th>
                    <th>Korban</th>
                    <th>Pelaku</th>
                    <th>Status</th>
                    <th>Action</th>
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
