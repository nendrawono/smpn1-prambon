<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Form Tambah Bakat Minat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASE_URL; ?>/pengaturantahunajaran/tambah" class="needs-validation" method="POST" novalidate>
      <div class="modal-body">
        <input type="hidden" class="form-control" name="id" id="id">
            <div class="form-group">
              <label>Tahun Ajaran</label>
              <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" placeholder="contoh: 2021 - 2022" required>
              <div class="invalid-feedback">
                Tahun Ajaran tidak boleh kosong.
              </div>
            </div>
            <div class="form-group">
              <label>Semester</label>
              <input type="number" class="form-control" name="semester" id="semester" placeholder="" required>
              <div class="invalid-feedback">
                Tahun Ajaran tidak boleh kosong.
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