<div class="modal fade" id="ubahPeserta" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ubahPesertaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ubahPesertaLabel">Ubah Peserta</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASE_URL; ?>/masterkelas/ubahPeserta" class="needs-validation" method="POST" novalidate>
      <div class="modal-body">
        <input type="hidden" class="form-control" name="ekstra_id" id="ekstra_id">
          <div class="form-group row">
            <label class="ml-2 mt-2">Pilih Siswa</label>
            <div class="col-sm-5 ml-5">
              <select class="form-control select2 ipilihPeserta" name="ipilihPeserta" id="ipilihPeserta" style="width: 100%;">
                <!-- <option value= "-">-</option>
                <option value= "senin">Senin</option>
                <option value= "selasa">Selasa</option>
                <option value= "rabu">Rabu</option>
                <option value= "kamis">Kamis</option>
                <option value= "jumat">Jumat</option>
                <option value= "sabtu">Sabtu</option> -->
              </select>
            </div>
            <button type="button" class="btn btn-success float-right btn-addMatpel"><i class="fas fa-plus"></i> Siswa</button>

          </div>
          
          <hr>

          <div>
            <table id="tablePeserta" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th style="width: 20%">Kelas</th>
                  <th style="width: 10%">#</th>
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