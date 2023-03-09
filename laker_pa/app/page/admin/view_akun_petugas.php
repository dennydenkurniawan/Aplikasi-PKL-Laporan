    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Petugas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                  Tambah Data
              </button>
              <br></br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no =0;
                    $filter = ""; 
                    $query = mysqli_query($koneksi, "SELECT * FROM akun_adminpetugas WHERE level = 'petugas'");
                    while($user = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='5%'><?php echo $no;?></td>
                    <td><?php echo $user['nama'];?></td>
                    <td><?php echo $user['username'];?></td>
                    <td><?php echo $user['password'];?></td>
                    <td><?php echo $user['level'];?></td>
                    <td>

                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus-petugas<?php echo $user['id'];?>">
                          Hapus  
                        </button>
                            
                            <div class="modal fade" id="modal-hapus-petugas<?php echo $user['id'];?>">
                              <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Hapus Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method="GET" action="page/admin/process_hapus_petugas.php?">
                                  <div class="modal-body">

                                    <div class="form-row mb-3">
                                      <div class="col">
                                        <input type="text" name="id" value="<?php echo $user['id'];?>" hidden>

                                        Apakah data ingin dihapus ?
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



                      <a href="index.php?page=edit-akun-petugas&& id=<?php echo $user['id'];?>" class="btn btn-sm btn-success">Edit</a>
                    </td>
                  </tr>
                  <?php };?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
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
            <form method="get" action="page/admin/process_tambah_petugas.php">
            <div class="modal-body">
              <input type="text" name="level" value="petugas" hidden/>

              <div class="form-row mb-3">
                <div class="col">
                  <label for="Nama">Nama :</label>
                  <input type="text" class="form-control" placeholder="Masukkan nama" name="nama" required>
                </div>
              </div>
              <div class="form-row mb-3">
                <div class="col">
                  <label for="Username">Username :</label>
                  <input type="text" class="form-control" placeholder="Masukkan username" name="username" required>
                </div>
                <div class="col">
                  <label for="Password">Password :</label>
                  <input type="password" class="form-control" placeholder="Masukkan password" name="password" required>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<script>
  function hapus_data(data_id){
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
        window.location=("page/admin/process_hapus_petugas.php?id="+data_id);
      } 
    })
}
</script>