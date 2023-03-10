<button type="button" class="text-danger ml-2 border-0 fa-sm" data-toggle="modal" data-target="#modal-hapus-kasus<?php echo $ksus['id'];?>">
                          <i class="fas fa-trash" style="color:#DC3545"></i>
                          </button>
                            
                            <div class="modal fade" id="modal-hapus-kasus<?php echo $ksus['id'];?>">
                              <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Hapus Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method="POST" action="page/masyarakat/hapus_data_kasus.php?">
                                  <div class="modal-body">

                                    <div class="form-row mb-3">
                                      <div class="col">
                                        <input type="text" name="id" value="<?php echo $ksus['id'];?>" hidden>

                                        Apakah data kasus ingin dihapus ?
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