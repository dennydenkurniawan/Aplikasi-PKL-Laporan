    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <div class="col">
                <h3 class="">Report Kasus Selesai</h3>
                </div>
                <div class="col">
                <a href="page/admin/cetak_kasus_selesai.php" target="_BLANK" class="btn btn-secondary btn-sm">
                <i class="fas fa-print"></i>
                Cetak Laporan
                </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2 " class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No Register</th>
                    <th>Tanggal Kejadian</th>
                    <th>Kronologi</th>
                    <th>Alamat Kejadian</th>
                    <th>Korban</th>
                    <th>Pelaku</th>
                    <th>Progress</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no =0;
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_kasus WHERE progress = 'selesai'");
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
                    <td>
                      <a><?php echo $ksus['progress'] ?></a>
                    </td>
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
                    <th>Progress</th>
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
