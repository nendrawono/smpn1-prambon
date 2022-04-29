
<section class="content">
  <div class="container-fluid">
    <!-- <div class="row"> -->

    <div class="row">
        <div class="col-lg-12">
            <?php Flasher::flash(); ?>
        </div>
    </div>
      
    <?php 
      include 'pengaturan-table.php'; 
      include 'pengaturan-form.php'; 
    ?>

  </div>
</section>

<script type="text/javascript" src="<?= BASE_JS; ?>/pengaturantahunajaran.js"></script>


