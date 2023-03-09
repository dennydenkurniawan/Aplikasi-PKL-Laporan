    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3>Data Pengaduan Selesai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No Reg</th>
                    <th>Tgl Lap</th>
                    <th>Tgl Kej</th>
                    <th>Kronologi</th>
                    <th>Alamat Kej</th>
                    <th>Korban</th>
                    <th>Pelaku</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no =0;
                    $id_user = $_GET['userid'];
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_kasus WHERE id_input = '$id_user' AND progress = 'selesai'");
                    while($ksus = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='2%'><?php echo $no;?></td>
                    <td><?php echo $ksus['no_reg'];?></td>
                    <td><?php echo $ksus['tgl_lapor'];?></td>
                    <td><?php echo $ksus['tgl'];?></td>
                    <td><?php echo $ksus['kronologi'];?></td>
                    <td><?php echo $ksus['alamat_kej'];?></td>
                    <td>
                      <!-- Table Korban start-->
                        <?php
                          $querys = mysqli_query($koneksi, "SELECT * FROM tb_kasus
                          INNER JOIN tb_korban ON
                          tb_kasus.id=tb_korban.id_kasus
                          WHERE tb_kasus.id='$ksus[id]'");
                          while($korban = mysqli_fetch_array($querys)){
                        ?>
                          <li class="mb-2">
                            <a href="index.php?page=view-korban-m&& id=<?php echo $korban['id_korban']; ?>" 
                            class="text-body">
                              <?php echo $korban['nama'];?>
                            </a>
                          <?php };?>
                          </li>
                    </td>
                    <!-- Tabel Korban end -->

                    <!-- Tabel Pelaku start -->
                    <td>
                        <?php
                          // $querys = mysqli_query($koneksi, "SELECT * FROM tb_korban 
                          // INNER JOIN tb_kasus ON 
                          // tb_korban.id_kasus=tb_kasus.id 
                          // WHERE 
                          // tb_korban.id_kasus='$ksus[id]'");
                          $id_kasus = $ksus['id'];
                          $querys = mysqli_query($koneksi, "SELECT * FROM tb_kasus
                          INNER JOIN tb_pelaku ON
                          tb_kasus.id=tb_pelaku.id_kasus
                          WHERE tb_kasus.id='$ksus[id]'");
                          while($pelaku = mysqli_fetch_array($querys)){
                        ?>
                          <li class="mb-2">
                            <a href="index.php?page=view-pelaku-m&& id=<?php echo $pelaku['id_pelaku']; ?>" 
                            class="text-body">
                              <?php echo $pelaku['nama'];?>
                            </a> 
                        <?php };?>
                          </li>  
                    </td>
                    <!-- Tabel Pelaku end -->
                    <td>
                      <button class="btn btn-success btn-sm"><?php echo $ksus['progress'];?></button>
                    </td>

                    <td>
                      <a href="index.php?page=detail-kasus-m&& id=<?php echo $ksus['id'];?>" class="btn btn-info btn-sm mb-2 mr-2">
                        <i class="fas fa-search"></i>
                         Progress 
                      </a>
                    </td>
                  </tr>
                  <?php };?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>No Reg</th>
                    <th>Tgl Lap</th>
                    <th>Tgl Kej</th>
                    <th>Kronologi</th>
                    <th>Alamat Kej</th>
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


<script>
  function hapus_data_korban(data_id_korban){
    // alert('ok');
    // window.location=("delete/hapus_data.php?id="+data_id);
    Swal.fire({
      title: 'Apakah Data Korban akan Dihapus?',
      // showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'Hapus Data',
      confirmButtonColor: '#CD5C5C',
      // denyButtonText: `Don't save`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location=("page/masyarakat/hapus_data_korban.php?id="+data_id_korban);
      } 
    })
  }
  function hapus_data_pelaku(data_id_pelaku){
    // alert('ok');
    // window.location=("delete/hapus_data.php?id="+data_id);
    Swal.fire({
      title: 'Apakah Data Pelaku akan Dihapus?',
      // showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'Hapus Data',
      confirmButtonColor: '#CD5C5C',
      // denyButtonText: `Don't save`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location=("page/masyarakat/hapus_data_pelaku.php?id="+data_id_pelaku);
      } 
    })
  }
</script>