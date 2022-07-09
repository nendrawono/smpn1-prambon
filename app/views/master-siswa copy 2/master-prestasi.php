<div class="modal fade" id="prestasiSiswa" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="prestasiSiswaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="prestasiSiswaLabel">Prestasi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASE_URL; ?>/mastersiswa/updateprestasi" class="needs-validation" method="POST"  enctype="multipart/form-data" novalidate>
      <div class="modal-body">

            <input type="hidden" class="form-control" name="siswa_id" id="siswa_id">
            <div class="form-group">
              <label>Nama Dokumen</label>
              <textarea type="text" class="form-control" name="iprestasi_siswa" id="iprestasi_siswa" placeholder="Prestasi Siswa" required></textarea>
              <div class="invalid-feedback">
                Nama Siswa tidak boleh kosong.
              </div>

            </div>

            <div class="form-group">
              <label for="exampleInputFile">Upload Dokumen</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="file_dokumen" id="file_dokumen">
                  <label class="custom-file-label" for="exampleInputFile">Pilih Dokumen</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>

            <div style="padding-bottom:2em;">
              <button type="button" class="btn btn-success float-right btn-addPrestasi"><i class="fas fa-plus"></i> Prestasi</button>
            </div>
            <hr>
            <table id="table-prestasi" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center" style="width: 10%">Nama Dokumen</th>
                  <th class="text-center" style="width: 10%">Dokumen</th>
                  <th class="text-center">#</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="simpan-prestasi">Simpan</button>        
      </div>
      </form>
    </div>
  </div>
</div>