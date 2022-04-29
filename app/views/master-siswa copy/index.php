
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
      include 'master-detail.php'; 

    ?>

  </div>
</section>


<script type="text/javascript" src="<?= BASE_JS; ?>/mastersiswa.js"></script>


