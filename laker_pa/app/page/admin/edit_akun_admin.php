<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM akun_adminpetugas WHERE id='$id'");
$user = mysqli_fetch_array($query);
?>
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="page/admin/process_edit_akun_admin.php">
                            <div class="modal-body">
                              <input type="text" name="id" value="<?php echo $user['id']?>" hidden/>
                              <div class="form-row mb-3">
                                <div class="col">
                                  <label for="Nama">Nama :</label>
                                  <input type="text" class="form-control" name="nama" value="<?php echo $user['nama']?>" required>
                                </div>
                              </div>
                              <div class="form-row mb-3">
                                <div class="col">
                                  <label for="Username">Username :</label>
                                  <input type="text" class="form-control" name="username" value="<?php echo $user['username']?>" required>
                                </div>
                                <div class="col">
                                  <label for="Password">Password :</label>
                                  <input type="password" class="form-control" name="password" value="<?php echo $user['password']?>" required>
                                </div>
                              </div>
                              <div class="form-row mb-3">
                                <div class="col">
                                  <label for="level">Level :</label>
                                <select class="custom-select" id="inputGroupSelect01" name="level" required>
                                  <option <?php if ($user['level'] == "admin") { echo 'selected'; }?> value="admin">Admin</option>
                                  <option <?php if ($user['level'] == "petugas") { echo 'selected'; }?> value="petugas">Petugas</option>
                                </select>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                            <a href="index.php?page=data-admin" class="btn btn-danger">Tutup</a> 
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </div>
                          </form>
            </div>
          </div>
        </div>
      </div>