
<div class="modal-dialog"  id="modal_add">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Add Data Using Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
          <form action="proses_save_user.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Username">Username</label>
                  <input type="text" name="username"  class="form-control" placeholder="Username" required />
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Nama">Nama</label>
                  <input type="text" name="nama"  class="form-control" placeholder="Nama User" required/>
                </div>
				
				<div class="form-group" style="padding-bottom: 20px;">
                  <label for="Password">Password</label>
                  <input type="password" name="password"  class="form-control" placeholder="Password" required/>
                </div>
				
				<div class="form-group" style="padding-bottom: 20px;">
                  <label for="Level">Level</label>
                  <select name="level"  class="form-control" required>
				  <option value="admin">Admin</option>
				  <option value="user">User</option>
				  </select>
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