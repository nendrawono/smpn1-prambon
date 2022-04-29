<div class="modal fade" id="lihatPeserta" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="lihatPesertaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h4 class="modal-title" id="lihatPesertaLabel">Ubah Peserta</h4> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4 class="modal-title" id="lihatPesertaLabel" style="text-align: center;padding-bottom: 1em;">Ubah Peserta</h4>

          <input type="hidden" class="form-control" name="ekstra_id" id="ekstra_id">
          <div>
            <table id="tableLihatPeserta" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10%">No</th>
                  <th>Nama</th>
                  <th style="width: 20%">Kelas</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
      </div>
      
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default float-right" data-dismiss="modal">Batal</button>
      </div>
      </form>
    </div>
  </div>
</div>