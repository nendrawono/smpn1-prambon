<div class="modal fade" id="aturJadwal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="aturJadwalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="aturJadwalLabel">Pengaturan Jadwal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASE_URL; ?>/masterkelas/aturjadwal" class="needs-validation" method="POST" novalidate>
      <div class="modal-body">
        <input type="hidden" class="form-control" name="id" id="id">
        <input type="hidden" class="form-control" name="kelas_id" id="kelas_id">
          <div class="form-group row">
            <label class="ml-2 mt-2">Pilih Hari</label>
            <div class="col-sm-2 ml-5">
              <select class="form-control select2 pilihHari" name="pilihHari" id="pilihHari" style="width: 100%;">
                <option value= "-">-</option>
                <option value= "senin">Senin</option>
                <option value= "selasa">Selasa</option>
                <option value= "rabu">Rabu</option>
                <option value= "kamis">Kamis</option>
                <option value= "jumat">Jumat</option>
                <option value= "sabtu">Sabtu</option>
              </select>
            </div>
          </div>

          <hr>

          <div class="row d-none formAdd">
            <div class="col-6">
              <div class="form-group">
                <label>Pilih Matpel</label>
                <select class="form-control select2 selectMatpel" name="iselectMatpel" id="iselectMatpel" style="width: 100%;">
                </select>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label>Guru</label>
                <select class="form-control select2 selectGuru" name="iselectGuru" id="iselectGuru" style="width: 100%;">
                </select>
              </div>
            </div>

          </div>

          <div class="row d-none formAdd">
            <div class="col-2">
              <div class="form-group">
                <label>Jam Ke</label>
                <input type="text" class="form-control" name="ijam_ke" id="ijam_ke" placeholder="Jam Ke">
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label>Jam Mulai</label>
                <input type="text" class="form-control" name="ijam_mulai" id="ijam_mulai" placeholder="Jam Mulai">
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label>Jam Selesai</label>
                <input type="text" class="form-control" name="ijam_selesai" id="ijam_selesai" placeholder="Jam Selesai">
              </div>
            </div>

            <div class="col-2">
              <div class="form-group" style="padding-top:2em;">
                <button type="button" class="btn btn-success float-right btn-addMatpel"><i class="fas fa-plus"></i> Matpel</button>
              </div>
            </div>

          </div>
          
          <hr>

          <div>
            <span>Hari : </span>  <span id="hariSelected">-</span> <br>
            <table id="tablejadwal" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10%">Jam Ke</th>
                  <th>Matpel</th>
                  <th style="width: 10%">Mulai</th>
                  <th style="width: 10%">Selesai</th>
                  <th>Guru</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>

      </div>
      
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" id="simpan-jadwal">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>