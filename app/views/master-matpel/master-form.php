<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Form Tambah Mata Pelajaran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASE_URL; ?>/mastermatpel/tambah" class="needs-validation" method="POST" novalidate>
      <div class="modal-body">
        <input type="hidden" class="form-control" name="id" id="id">
        <!-- <div class="form-group">
          <label>Minimal</label>
          <select class="form-control select2" style="width: 100%;">
            <option>Alabama</option>
            <option>Alaska</option>
            <option>California</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>
          </select>
        </div> -->
        <div class="form-group">
          <label>Nama Mata Pelajaran</label>
          <input type="text" class="form-control" name="nm_matpel" id="nm_matpel" placeholder="Nama Mata Pelajaran" required>
          <div class="invalid-feedback">
              Nama Mata Pelajaran tidak boleh kosong.
          </div>
        </div>

        <div class="form-group">
          <label>KKM</label>
          <input type="number" class="form-control" name="kkm" id="kkm" placeholder="KKM" required>
          <div class="invalid-feedback">
              KKM tidak boleh kosong.
          </div>
        </div>

        <div class="form-group">
          <label>Kelompok Mata Pelajaran</label>
          <input type="text" class="form-control" name="kelompok" id="kelompok" placeholder="A, B, C" required>
          <div class="invalid-feedback">
              Kelompok Mata Pelajaran tidak boleh kosong.
          </div>
        </div>

        <div class="form-group">
          <label>Deskripsi</label>
          <textarea class="form-control" rows="5" name="deskripsi" id="deskripsi" placeholder=" " required> </textarea>
          <!-- <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder=" " required> -->
          <div class="invalid-feedback">
              Deskeipsi tidak boleh kosong.
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