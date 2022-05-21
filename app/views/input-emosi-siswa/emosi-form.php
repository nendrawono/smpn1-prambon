<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Form Emosi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASE_URL; ?>/emosisiswa/tambah" class="needs-validation" method="POST" novalidate>
      <div class="modal-body">
      <table id="tableguru" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width: 5%">#</th>
            <th>Nama</th>
            <th>Hari Ini Siswa Emosi ?</th>
          </tr>
        </thead>
          <?php $i = 1; ?>
          <?php foreach ($data['siswa'] as $index => $o) : ?>
              <tr>
                  <td scope="row"><?= $i++; ?></td>
                  <td scope="row">
                    <input type="hidden" name="nis[]" value="<?= $o['nis']; ?>"></input>
                    <?= $o['nm_siswa']; ?>
                  </td>
                  <td scope="row">
                    <div class="form-group form-check-inline">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" name="emosi<?=$index?>">
                        <label class="form-check-label">Ya</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" name="emosi<?=$index?>" checked="true">
                        <label class="form-check-label">Tidak</label>
                      </div>
                    </div>
                  </td>
              </tr>
          <?php endforeach; ?>
      </table>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>