<style>
    .datepickers {
      z-index: 1600 !important; /* has to be larger than 1050 */
    }
</style>
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Form Tambah User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASE_URL; ?>/mastersiswa/tambah" class="needs-validation" method="POST"  enctype="multipart/form-data" novalidate>
      <div class="modal-body">
        <input type="hidden" class="form-control" name="id" id="id">
        <div class="row">

          <!-- Start Form Kiri -->
          <div class="col-6">
            <div class="form-group">
              <label>Nama Peseta Didik (Lengkap)</label>
              <input type="text" class="form-control" name="nm_siswa" id="nm_siswa" placeholder="Nama" required>
              <div class="invalid-feedback">
                  Nama tidak boleh kosong.
              </div>
            </div>

            <div class="form-group">
              <label>Nomor Induk</label>
              <input type="number" class="form-control" name="nis" id="nis" placeholder="Nomor Induk" required>
              <div class="invalid-feedback">
                  Nomor Induk tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group">
              <label>Tempat Tanggal Lahir</label>
              <div class="row">
                <div class="col-6"> 
                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" required>
                </div>
                <div class="col-6"> 
                  <div class="input-group date datepickers" id="tgl-lahir" data-target-input="nearest">
                    <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control datetimepicker-input" placeholder="dd/mm/yyyy" data-target="#tgl-lahir" required/>
                    <div class="input-group-append" data-target="#tgl-lahir" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="invalid-feedback">
                  Tempat Tanggal Lahir tidak boleh kosong.
              </div>
            </div>

            <div class="form-group clearfix">
              <label>Jenis Kelamin</label>
              <div class="row">
                <div class="icheck-primary d-inline ml-1">
                  <input type="radio" name="jenis_kelamin"  value="L" id="radioLakiLaki" name="jk" checked>
                  <label for="radioLakiLaki"> Laki - Laki </label>
                </div>
                <div class="icheck-primary d-inline ml-5">
                  <input type="radio" name="jenis_kelamin" value="P" id="radioPerempuan" name="jk">
                  <label for="radioPerempuan">Perempuan</label>
                </div>
              </div>
              <div class="invalid-feedback">
                  Jenis Kelamin tidak boleh kosong.
              </div>
            </div>

            <div class="form-group">
              <label for="exampleInputFile">Upload Foto Siswa</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="reff_passfoto" id="reff_passfoto">
                  <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Jenis ABK</label>
              <select class="form-control select2" id="jenis_abk_id" name="jenis_abk_id" style="width: 100%;">
                <?php foreach ($data['select2_jenis'] as $o) : ?>
                  <option value="<?= $o['id']; ?>"><?= $o['jenis_abk']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label>Agama</label>
              <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" required>
              <div class="invalid-feedback">
                  Agama tidak boleh kosong.
              </div>
            </div> 

            <!-- <div class="form-group clearfix">
              <label>Status Peserta Didik</label>
              <div class="row">
                <div class="icheck-primary d-inline ml-1">
                  <input type="radio" id="radioStatusSiswaReguler" name="statussiswa" checked>
                  <label for="radioStatusSiswaReguler"> Reguler </label>
                </div>
                <div class="icheck-primary d-inline ml-5">
                  <input type="radio" id="radioStatusSiswaKhusus" name="statussiswa">
                  <label for="radioStatusSiswaKhusus"> Non-Reguler ( Khusus ) </label>
                </div>
              </div>
              <div class="invalid-feedback">
                  Status Siswa tidak boleh kosong.
              </div>
            </div> -->

            <div class="form-group">
              <label>Status Dalam Keluarga</label>
              <input type="text" class="form-control" name="status_dalam_keluarga" id="status_dalam_keluarga" placeholder="Status Dalam Keluarga" required>
              <div class="invalid-feedback">
                  Status Dalam Keluarga tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group">
              <label>Anak Ke</label>
              <input type="text" class="form-control" name="anak_ke" id="anak_ke" placeholder="1, 2, 3" required>
              <div class="invalid-feedback">
                  Anak Ke tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group">
              <label>Alamat Peserta Didik</label>
              <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Peserta Didik" required>
              <div class="invalid-feedback">
                  Alamat Peserta Didik tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group">
              <label>No Telepon Rumah/HP</label>
              <input type="number" class="form-control" name="tlp" id="tlp" placeholder="No Telepon" required>
              <div class="invalid-feedback">
                  No Telepon Rumah tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group">
              <label>Asal Sekolah</label>
              <input type="text" class="form-control" name="sekolah_asal" id="sekolah_asal" placeholder="No Telepon" required>
              <div class="invalid-feedback">
                  Asal Sekolah tidak boleh kosong.
              </div>
            </div> 

          </div>   
          <!-- End Form Kiri -->

          <!-- Start Form Kanan -->
          <div class="col-6">

            <!-- <div class="form-group">
              <label>Diterima Disekolah Ini Dikelas</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="VII-A" required>
              <div class="invalid-feedback">
                Diterima Disekolah tidak boleh kosong.
              </div>
            </div>  -->

            <div class="form-group">
              <label>Diterima Disekolah Ini Dikelas</label>
              <select class="form-control select2bs4" name="kelas_id" id="kelas_id" style="width: 100%;">
                <?php foreach ($data['select2_kelas'] as $i => $o) : ?>
                  <option value="<?= $o['id']; ?>"><?= $o['nm_kelas']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label>Diterima Disekolah Ini Pada Tanggal</label>
              <div class="input-group date datepickers" id="tgl-diterima" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" name="diterima_tgl" id="diterima_tgl" placeholder="dd/mm/yyyy" data-target="#tgl-diterima" required/>
                <div class="input-group-append" data-target="#tgl-diterima" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
              <div class="invalid-feedback">
                Tanggal Diterima Disekolah tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group ortu-murid">
              <label>Nama Ayah</label>
              <input type="text" class="form-control" name="nm_ayah" id="nm_ayah" placeholder="Nama Ayah" required>
              <div class="invalid-feedback">
                  Nama Ayah tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group ortu-murid">
              <label>Pekerjaan Ayah</label>
              <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" required>
              <div class="invalid-feedback">
                  Pekerjaan Ayah tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group ortu-murid">
              <label>Nama Ibu</label>
              <input type="text" class="form-control" name="nm_ibu" id="nm_ibu" placeholder="Nama Ibu" required>
              <div class="invalid-feedback">
                  Nama Ibu tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group ortu-murid">
              <label>Pekerjaan Ibu</label>
              <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" required>
              <div class="invalid-feedback">
                  Pekerjaan Ibu tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group ortu-murid">
              <label>Alamat Orang Tua</label>
              <input type="text" class="form-control" name="alamat_ortu" id="alamat_ortu" placeholder="Alamat Orang Tua" required>
              <div class="invalid-feedback">
                  Alamat Orang Tua tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group ortu-murid">
              <label>No Telepon Rumah</label>
              <input type="number" class="form-control" name="tlp_ortu" id="tlp_ortu" placeholder="No Telepon Rumah" required>
              <div class="invalid-feedback">
                  No Telepon Rumah tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group clearfix">
              <div class="icheck-primary d-inline float-right">
                <input type="checkbox" id="memiliki-wali">
                <label for="memiliki-wali">Memiliki Wali Murid ?</label>
              </div>
            </div>

            <div class="form-group wali-murid d-none" style="padding-top:2em">
              <label>Nama Wali Peseta Didik</label>
              <input type="text" class="form-control" name="nm_wali" id="nm_wali" placeholder="Nama Wali Peserta Didik">
              <div class="invalid-feedback">
                  Nama Wali Peseta Didik tidak boleh kosong.
              </div>
            </div> 
            
            <div class="form-group wali-murid d-none">
              <label>Alamat Wali Peseta Didik</label>
              <input type="text" class="form-control" name="alamat_wali" id="alamat_wali" placeholder="Alamat Wali Peserta Didik">
              <div class="invalid-feedback">
                  Alamat Wali Peseta Didik tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group wali-murid d-none">
              <label>Nomor Telepon Rumah</label>
              <input type="number" class="form-control" name="tlp_wali" id="tlp_wali" placeholder="Nomor Telepon Wali Peserta Didik">
              <div class="invalid-feedback">
                 Nomor Telepon Rumah Wali Peseta Didik tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group wali-murid d-none">
              <label>Pekerjaan Wali Peseta Didik</label>
              <input type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" placeholder="Pekerjaan Wali Peserta Didik">
              <div class="invalid-feedback">
                Pekerjaan Wali Peseta Didik tidak boleh kosong.
              </div>
            </div> 

          </div>
          <!-- End Form Kanan -->


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