
<section class="content">
  <div class="container-fluid">
    <!-- <div class="row"> -->

   <div class="row">
        <div class="col-lg-12">
            <?php Flasher::flash(); ?>
        </div>
    </div>
      
    <?php 
      include 'master-table.php'; 
      include 'master-form.php'; 
      include 'master-prestasi.php'; 
      include 'master-guru-pendamping.php'; 
      include 'master-detail.php'; 
      include 'isi-raport-reguler.php'; 
      // include 'isi-raport-khusus.php'; 
    ?>

  </div>
</section>


<script type="text/javascript" src="<?= BASE_JS; ?>/mastersiswa.js"></script>


