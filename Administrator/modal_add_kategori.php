
<div class="modal-dialog"  id="modal_add">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Add Data Using Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
          <form action="proses_save_kategori.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="ID Kategori">ID Kategori</label>
                  <input type="text" name="id_kategori"  class="form-control" placeholder="ID Kategori Otomatis" required disabled/>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Nama Kategori">Nama Kategori</label>
                  <input type="text" name="nama_kategori"  class="form-control" placeholder="Nama Kategori" required/>
                </div>

                

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit">
                      Confirm
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>

              </form>
            </div>
        </div>
    </div>
</div>