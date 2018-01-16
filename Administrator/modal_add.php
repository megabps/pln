
<div class="modal-dialog" id="modal_add">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h4 class="modal-title" id="myModalLabel">Add Data Using Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
          <form action="proses_save.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="No SAP">No. SAP</label>
                  <input type="text" name="no_sap"  class="form-control" placeholder="No. SAP" required/>
                </div>
                <?php
				include "koneksi.php";
				$modal=mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC") or die("Error: " . mysqli_error($koneksi));
				?>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Kategori">Kategori</label>
           				 <select class="form-control" name="kategori">
                			<option value="">--Pilih Kategori--</option>
                			<?php
								while($r=mysqli_fetch_array($modal)){ 
							?>
                            <option value="<?php echo $r['id_kategori'];?>"><?php echo $r['nama_kategori'];?></option>
                            <?php } ?>
           					 </select>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Nama Material">Nama Material</label>
                  <input type="text" name="nama_barang"  class="form-control" placeholder="Nama Material" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Satuan">Satuan</label>
                  <input type="text" name="satuan"  class="form-control" placeholder="Satuan" required/>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Stok">Stok</label>
                   <input type="text" name="stok"  class="form-control" placeholder="Stok" required/>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Lokasi">Lokasi</label>
                   <input type="text" name="lokasi"  class="form-control" placeholder="Lokasi" required/>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Foto Barang">Gambar Material</label>
                  <input type="file" name="foto"  class="form-control" placeholder="Foto" required/>
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
