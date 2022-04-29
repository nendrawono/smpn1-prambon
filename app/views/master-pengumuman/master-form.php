<div class="row">
  <div class="col-md-12">
    <div class="card card-outline card-info">
      <div class="card-header">
        <h3 class="card-title" style="padding-left:521px; font-size:25px;">
          Buat Pengumuman
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="col-12">
          <form action="<?= BASE_URL; ?>/masterpengumuman/ubah" class="needs-validation" method="POST" novalidate>
          <input type="hidden" name="id" value="<?= $data['pengumuman'][0]['id'] ?>"></input>
          <textarea id="summernote" name="isi_pengumuman" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
          
          <?= $data['pengumuman'][0]['isi_pengumuman'] ?>
          </textarea>
          <!-- <div id="summernote"></div> -->
        </div>
        <button type="submit" class="btn btn-primary float-right">Simpan</button>       
        </form>
      </div>
    </div>
  </div>
  <!-- /.col-->
</div>