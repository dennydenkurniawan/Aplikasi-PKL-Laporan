<?php
$userid = $_SESSION['id'];

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_kasus WHERE id='$id'");

$query_korban = mysqli_query($koneksi, "SELECT * FROM tb_kasus ks
INNER JOIN tb_korban k ON ks.id = k.id_kasus
INNER JOIN tb_pelaku p ON ks.id = p.id_kasus
WHERE id='$id'");


$view = mysqli_fetch_array($query);
?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- general form elements -->
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Detail Kasus</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  ID Kasus <br />
                  Nomor Register <br />
                  Di Input Oleh <br />
                  Tanggal Lapor <br />
                  Tanggal Kejadian <br />
                  Alamat Kejadian <br />
                  Provinsi <br />
                  Kabupaten <br />
                  Kecamatan <br /> 
                  Status <br /> <br />
                  
                </div>
                <div class="col-sm-9">
                  : <?php echo $id; ?><br />
                  : <?php echo $view['no_reg']; ?><br />
                  : <?php ?><br />
                  : <?php echo $view['tgl_lapor']; ?><br />
                  : <?php echo $view['tgl']; ?> <br />
                  : <?php echo $view['alamat_kej']; ?> <br />
                  : <?php echo $view['provinsi']; ?> <br />
                  : <?php echo $view['kabupaten']; ?> <br />
                  : <?php echo $view['kecamatan']; ?> <br />
                  : <button class="btn btn-secondary btn-sm"><?php echo $view['status']; ?></button><br /> <br />

                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                Kronologi :<br /> 
                  <textarea class="form-control" rows="3" name="kronologi" readonly><?php echo $view['kronologi']; ?></textarea>  
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-sm-6">
                Korban : <br>
                  <?php
                  $querys = mysqli_query($koneksi, "SELECT * FROM tb_kasus
                  INNER JOIN tb_korban ON
                  tb_kasus.id=tb_korban.id_kasus
                  WHERE tb_kasus.id='$id'");
                  while($korban = mysqli_fetch_array($querys)){
                  ?>
                    <li class="mb-2 col-6 mt-2">
                      <a href="index.php?page=view-korban-m&& id=<?php echo $korban['id_korban']; ?>" class="btn btn-outline-secondary">
                        <?php echo $korban['nama'];?>
                      </a>
                  <?php };?>
                    </li>
                </div>
                <div class="col-sm-6">
                Pelaku : <br>
                  <?php
                  $querys = mysqli_query($koneksi, "SELECT * FROM tb_kasus
                  INNER JOIN tb_pelaku ON
                  tb_kasus.id=tb_pelaku.id_kasus
                  WHERE tb_kasus.id='$id'");
                  while($pelaku = mysqli_fetch_array($querys)){
                  ?>
                  <li class="mb-2 col-6 mt-2">
                    <a href="index.php?page=view-pelaku-m&& id=<?php echo $pelaku['id_pelaku']; ?>" class="btn btn-outline-secondary">
                      <?php echo $pelaku['nama'];?>
                    </a>
                  <?php };?>
                  </li>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                Layanan yang telah diberikan : <br>
                <?php
                  $queryz = mysqli_query($koneksi, "SELECT * FROM tb_kasus
                  INNER JOIN tb_pelayanan ON
                  tb_kasus.id = tb_pelayanan.id_kasus
                  WHERE tb_kasus.id='$id'");
                  while($pelayanan = mysqli_fetch_array($queryz)){
                ?>
                <li class="mb-2 col-6 mt-2 mb-5">
                  <a href="index.php?page=view-pelayanan-petugas&& id=<?php echo $pelayanan['id_pelayanan']; ?>" class="btn btn-outline-secondary">
                    <?php echo $pelayanan['pelayanan']; ?>
                  </a>
                <?php };?>
                </li>
                </div>
                <br><br><br>
              </div>




              <div class="row justify-content-start ">
                <div class="col-4 ">
                  <a href="index.php?page=pengaduan-masyarakat&& userid=<?php echo $userid ?>" class="btn btn-primary mr-4">Kembali</a>
             
                
                  <a onclick="hapus_data(<?php echo $view['id'];?>)" class="btn btn-sn btn-danger">Hapus</a> 
                </div>
                <div>  
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                  Lapor Pengaduan Telah Dilayani
                </button>
                  

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Selesaikan Pengaduan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="page/admin/process_lapor_selesai_pengaduan.php?">
            <div class="modal-body">
              <input type="text" name="level" value="petugas" hidden/>

              <div class="form-row mb-3">
                <div class="col">
                  <input type="text" name="id" value="<?php echo $view['id']?>" hidden>
                  Yakin bahwa pengaduan anda telah selesai dilayani dan di proses ?
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary">Yakin</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<script>
  function selesai_pengaduan(data_id){
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
        window.location=("page/masyarakat/process_lapor_selesai_pengaduan.php?id="+data_id);
      } 
    })
  }
</script>
