<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Form Tambah User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASE_URL; ?>/mastersiswa/tambah" class="needs-validation" method="POST" novalidate>
      <div class="modal-body">
        <input type="hidden" class="form-control" name="id" id="id">
        <div class="row">

          <!-- Start Form Kiri -->
          <div class="col-6">
            <div class="form-group">
              <label>Nama Peseta Didik (Lengkap)</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Nama" required>
              <div class="invalid-feedback">
                  Nama tidak boleh kosong.
              </div>
            </div>

            <div class="form-group">
              <label>Nomor Induk</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Nomor Induk" required>
              <div class="invalid-feedback">
                  Nomor Induk tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group">
              <label>Tempat Tanggal Lahir</label>
              <div class="row">
                <div class="col-6"> 
                  <input type="text" class="form-control" name="password" id="password" placeholder="Tempat Lahir" required>
                </div>
                <div class="col-6"> 
                  <div class="input-group date datepickers" id="tgl-lahir" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" placeholder="dd/mm/yyyy" data-target="#tgl-lahir" required/>
                    <div class="input-group-append" data-target="#tgl-lahir" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="invalid-feedback">
                  Nomor Induk tidak boleh kosong.
              </div>
            </div>

            <div class="form-group clearfix">
              <label>Jenis Kelamin</label>
              <div class="row">
                <div class="icheck-primary d-inline ml-1">
                  <input type="radio" id="radioLakiLaki" name="jk" checked>
                  <label for="radioLakiLaki"> Laki - Laki </label>
                </div>
                <div class="icheck-primary d-inline ml-5">
                  <input type="radio" id="radioPerempuan" name="jk">
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
                  <input type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Agama</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Agama" required>
              <div class="invalid-feedback">
                  Agama tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group clearfix">
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
            </div>

            <div class="form-group">
              <label>Status Dalam Keluarga</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Status Dalam Keluarga" required>
              <div class="invalid-feedback">
                  Status Dalam Keluarga tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group">
              <label>Anak Ke</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="1, 2, 3" required>
              <div class="invalid-feedback">
                  Anak Ke tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group">
              <label>Alamat Peserta Didik</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Alamat Peserta Didik" required>
              <div class="invalid-feedback">
                  Alamat Peserta Didik tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group">
              <label>No Telepon Rumah/HP</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="No Telepon" required>
              <div class="invalid-feedback">
                  No Telepon Rumah tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group">
              <label>Asal Sekolah</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="No Telepon" required>
              <div class="invalid-feedback">
                  Asal Sekolah tidak boleh kosong.
              </div>
            </div> 

          </div>   
          <!-- End Form Kiri -->

          <!-- Start Form Kanan -->
          <div class="col-6">

            <div class="form-group">
              <label>Diterima Disekolah Ini Dikelas</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="VII-A" required>
              <div class="invalid-feedback">
                Diterima Disekolah tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group">
              <label>Diterima Disekolah Ini Pada Tanggal</label>
              <div class="input-group date datepickers" id="tgl-diterima" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" placeholder="dd/mm/yyyy" data-target="#tgl-diterima" required/>
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
              <input type="text" class="form-control" name="password" id="password" placeholder="Nama Ayah" required>
              <div class="invalid-feedback">
                  Nama Ayah tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group ortu-murid">
              <label>Pekerjaan Ayah</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Pekerjaan Ayah" required>
              <div class="invalid-feedback">
                  Pekerjaan Ayah tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group ortu-murid">
              <label>Nama Ibu</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Nama Ibu" required>
              <div class="invalid-feedback">
                  Nama Ibu tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group ortu-murid">
              <label>Pekerjaan Ibu</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Pekerjaan Ibu" required>
              <div class="invalid-feedback">
                  Pekerjaan Ibu tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group ortu-murid">
              <label>Alamat Orang Tua</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Alamat Orang Tua" required>
              <div class="invalid-feedback">
                  Alamat Orang Tua tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group ortu-murid">
              <label>No Telepon Rumah</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="No Telepon Rumah" required>
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
              <input type="text" class="form-control" name="password" id="password" placeholder="Nama Wali Peserta Didik">
              <div class="invalid-feedback">
                  Nama Wali Peseta Didik tidak boleh kosong.
              </div>
            </div> 
            
            <div class="form-group wali-murid d-none">
              <label>Alamat Wali Peseta Didik</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Alamat Wali Peserta Didik">
              <div class="invalid-feedback">
                  Alamat Wali Peseta Didik tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group wali-murid d-none">
              <label>Nomor Telepon Rumah</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Nomor Telepon Wali Peserta Didik">
              <div class="invalid-feedback">
                 Nomor Telepon Rumah Wali Peseta Didik tidak boleh kosong.
              </div>
            </div> 

            <div class="form-group wali-murid d-none">
              <label>Pekerjaan Wali Peseta Didik</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Pekerjaan Wali Peserta Didik">
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