    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
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
                    <th>Tempat, tgl lahir</th>
                    <th>Alamat</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>No Telp</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no =0; 
                    $query = mysqli_query($koneksi, "SELECT * FROM akun_masyarakat");
                    while($user = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='5%'><?php echo $no;?></td>
                    <td><?php echo $user['nama'];?></td>
                    <td width='10%'><?php echo $user['ttl'];?></td>
                    <td><?php echo $user['alamat'];?></td>
                    <td><?php echo $user['username'];?></td>
                    <td><?php echo $user['password'];?></td>
                    <td><?php echo $user['no_telp'];?></td>
                    <td>
                   
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus-masyarakat<?php echo $user['id'];?>">
                          Hapus  
                        </button>
                            
                            <div class="modal fade" id="modal-hapus-masyarakat<?php echo $user['id'];?>">
                              <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Hapus Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method="GET" action="page/admin/process_hapus_masyarakat.php?">
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


                      <a href="index.php?page=edit-akun-masyarakat&& id=<?php echo $user['id'];?>" class="btn btn-sm btn-success">Edit</a>
                    </td>
                  </tr>
                  <?php };?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tempat, tgl lahir</th>
                    <th>Alamat</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>No Telp</th>
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
            <form method="get" action="page/admin/process_tambah_masyarakat.php">
            <div class="modal-body">
              <input type="text" name="level" value="masyarakat" hidden/>

              <div class="form-row mb-3">
                <div class="col">
                  <label for="Nama">Nama :</label>
                  <input type="text" class="form-control" placeholder="Masukkan nama" name="nama" required>
                </div>
                <div class="col">
                  <label for="Username">Alamat :</label>
                  <input type="text" class="form-control" placeholder="Masukkan alamat" name="alamat" required>
                </div>
              </div>
              <div class="form-row mb-3">
                <div class="col">
                  <label for="TTL">Tempat, Tgl lahir :</label>
                  <input type="text" class="form-control" placeholder="Masukkan tempat, tanggal lahir" name="ttl" required>
                </div>
                <div class="col">
                  <label for="NoTelp">No Telp :</label>
                  <input type="text" class="form-control" placeholder="Masukkan nomor telepon" name="no_telp" required>
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
