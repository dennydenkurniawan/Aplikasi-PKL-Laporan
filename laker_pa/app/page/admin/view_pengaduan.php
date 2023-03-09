    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengaduan Masyarakat</h3>
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
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_kasus WHERE status = 'masuk'");
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
                          </li>
                        <?php };?> 
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
                          </li>
                        <?php };?>    
                        </ul>
                    </td>
                    <!-- Tabel Pelaku end -->
                    
                            
                    <!-- Kolom Status -->
                    <td>
                      <i><?php echo $ksus['status'];?></i>
                    </td>
                    
                    <!-- Kolom Action -->
                    <td>
                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalTerimaPengaduan<?php echo $ksus['id'] ?>"  title="Terima Kasus">
                      <i class="fas fa-check-circle"></i>
                    </button>

                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalTolakPengaduan<?php echo $ksus['id'] ?>"  title="Tolak Kasus">
                      <i class="fas fa-times-circle"></i>
                    </button>
                    
                    <div class="modal fade" id="modalTerimaPengaduan<?php echo $ksus['id'] ?>">
                          <div class="modal-dialog modal-md">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Terima Pengaduan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form method="post" action="page/admin/process_terima_pengaduan.php">
                              <div class="modal-body">
                                <input type="text" name="id" value="<?php echo $ksus['id'] ?>" hidden>

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

                        <div class="modal fade" id="modalTolakPengaduan<?php echo $ksus['id'] ?>">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Alasan Kasus Ditolak</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form method="post" action="page/admin/process_tolak_pengaduan.php">
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
 

<script>
  function hapus_data(data_id_kasus){
    // alert('ok');
    // window.location=("delete/hapus_data.php?id="+data_id);
    Swal.fire({
      title: 'Apakah Datanya akan Dihapus?',
      // showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'Hapus Data',
      confirmButtonColor: '#CD5C5C',
      // denyButtonText: `Don't save`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location=("page/delete_data/hapus_data_kasus.php?id="+data_id_kasus);
      } 
    })
  }
  function hapus_data_korban(data_id_korban){
    // alert('ok');
    // window.location=("delete/hapus_data.php?id="+data_id);
    Swal.fire({
      title: 'Apakah Datanya akan Dihapus?',
      // showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'Hapus Data',
      confirmButtonColor: '#CD5C5C',
      // denyButtonText: `Don't save`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location=("page/delete_data/hapus_data_korban.php?id="+data_id_korban);
      } 
    })
  }
  function hapus_data_pelaku(data_id_pelaku){
    // alert('ok');
    // window.location=("delete/hapus_data.php?id="+data_id);
    Swal.fire({
      title: 'Apakah Datanya akan Dihapus?',
      // showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: 'Hapus Data',
      confirmButtonColor: '#CD5C5C',
      // denyButtonText: `Don't save`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        window.location=("page/delete_data/hapus_data_pelaku.php?id="+data_id_pelaku);
      } 
    })
  }

  // function pengaduan_diterima(status_diterima){
  //   Swal.fire({
  //     title: 'Terima Pengaduan?',
      
  //     showCancelButton: true,
  //     confirmButtonText: 'Ya',
     
  //   }).then((result) => {
  //     /* Read more about isConfirmed, isDenied below */
  //     if (result.isConfirmed) {
  //       window.location=("page/edit_data/proses_edit_status_kasus.php?id="+status_diterima);
  //     }
  //   })
  // }

  // function pengaduan_ditolak(status_ditolak){
  //   Swal.fire({
  //     title: 'Terima Pengaduan?',
      
  //     showCancelButton: true,
  //     confirmButtonText: 'Ya',
     
  //   }).then((result) => {
  //     /* Read more about isConfirmed, isDenied below */
  //     if (result.isConfirmed) {
  //       window.location=("page/edit_data/proses_edit_status_kasus.php?id="+status_ditolak);
  //     }
  //   })
  // }
</script>