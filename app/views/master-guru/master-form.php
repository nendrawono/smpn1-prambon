<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Form Tambah Guru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASE_URL; ?>/masterguru/tambah" class="needs-validation" method="POST" novalidate>
      <div class="modal-body">
        <input type="hidden" class="form-control" name="id" id="id">
            <div class="form-group">
              <label>NIP</label>
              <input type="number" class="form-control" name="nip" id="nip" placeholder="NIP" required>
              <div class="invalid-feedback">
                  Nip tidak boleh kosong.
              </div>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nm_guru" id="nm_guru" placeholder="Nama Lengkap Guru Dan Gelar" required>
              <div class="invalid-feedback">
                  Nama tidak boleh kosong.
              </div>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat_guru" id="alamat_guru" placeholder="Alamat Lengkap" required>
              <div class="invalid-feedback">
                  Alamat tidak boleh kosong.
              </div>
            </div>

            <div class="form-group">
              <label>Jabatan Saat Ini</label>
              <select class="form-control select2" id="jabatan_id" name="jabatan_id" style="width: 100%;">
                <?php foreach ($data['jabatan'] as $o) : ?>
                  <option value="<?= $o['id']; ?>"><?= $o['nm_jabatan']; ?></option>
                <?php endforeach; ?>
              </select>
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