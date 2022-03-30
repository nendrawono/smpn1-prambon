<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Form Tambah User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASE_URL; ?>/masteruser/tambah" class="needs-validation" method="POST" novalidate>
      <div class="modal-body">
        <input type="hidden" class="form-control" name="id" id="id">
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
              <div class="invalid-feedback">
                  Username tidak boleh kosong.
              </div>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
              <div class="invalid-feedback">
                  Password tidak boleh kosong.
              </div>
            </div>  
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
              <div class="invalid-feedback">
                  Password tidak boleh kosong.
              </div>
            </div>  
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>