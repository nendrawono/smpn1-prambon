<div class="modal fade" id="guruPendampingSiswa" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="guruPendampingSiswaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="guruPendampingSiswaLabel">Guru Pendaming</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASE_URL; ?>/mastersiswa/updategurupendamping" class="needs-validation" method="POST"  enctype="multipart/form-data" novalidate>
      <div class="modal-body">
            <input type="hidden" class="form-control" name="siswa_id" id="pendamping_siswa_id">
            <div class="form-group">
              <label>Guru Pendaming</label>
              <select class="form-control" name="guru_pendamping" id="guru_pendamping" style="width: 100%;">
                <?php foreach ($data['select2_guru'] as $i => $o) : ?>
                  <option value="<?= $o['id']; ?>"><?= $o['nm_guru']; ?></option>
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