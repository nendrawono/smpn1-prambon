<section class="content">   
    <?php 
        // var_dump($_SESSION["user_login"]) 
        // print("<pre>".print_r($_SESSION["user_login"],true)."</pre>");
        echo $_SESSION["user_login"]['siswa']['nm_siswa'];
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Identitas Siswa</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                            <img class="center" src="data:image/jpeg;base64,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" alt="foto-siswa" width="150" height="150">
                            </div>
                        </div> 
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>NIS</label>
                                <p style="margin-top:-0.75rem!important">238278</p>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <p style="margin-top:-0.75rem!important">VII A</p>
                            </div>
                            <div class="form-group">
                               
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Nama</label>
                                <p style="margin-top:-0.75rem!important">Nama Peserta didik</p>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <p style="margin-top:-0.75rem!important">Siswa Aktif</p>
                            </div>
                            <div class="form-group">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Jadwal Pelajaran</h3>
                    <!-- <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div> -->
                </div>
                <div class="card-body">
                    Jadwal
                </div>
            </div>
        </div>
    </div>
   <!-- LINE CHART -->
   <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Grafik Emosional</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
            <!-- /.card-body -->
    </div>
        <!-- /.card -->
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Pengumuman</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            Pengumuman
        </div>
    </div>
</section>

<script type="text/javascript" src="<?= BASE_JS; ?>/dashboard.js"></script>


