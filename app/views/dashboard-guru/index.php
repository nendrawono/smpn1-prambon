<style type="text/css">
.tg {
	border-collapse: collapse;
	border-spacing: 0;
	width: 100%;
}

.tg td {
	border-color: black;
	border-style: solid;
	border-width: 1px;
	font-family: Arial, sans-serif;
	font-size: 14px;
	overflow: hidden;
	padding: 10px 5px;
	word-break: normal;
}

.tg th {
	border-color: black;
	border-style: solid;
	border-width: 1px;
	font-family: Arial, sans-serif;
	font-size: 14px;
	font-weight: normal;
	overflow: hidden;
	padding: 10px 5px;
	word-break: normal;
}

.tg .tg-dvpl {
	border-color: inherit;
	text-align: right;
	vertical-align: top
}

.tg .tg-0pky {
	border-color: inherit;
	text-align: left;
	vertical-align: top
}

.tr-header{
  background-color: #efeeee;  
}
</style>
<section class="content">   
    <?php 
        // var_dump($_SESSION["user_login"]) 
        // print("<pre>".print_r($_SESSION["user_login"],true)."</pre>");
        // echo $_SESSION["user_login"]['siswa']['nm_siswa'];
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Identitas Guru</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>NIP</label>
                                <p style="margin-top:-0.75rem!important"><?= $_SESSION["user_login"]['siswa']['nip'] ?></p>
                            </div>
                           
                            <div class="form-group">
                               
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Nama</label>
                                <p style="margin-top:-0.75rem!important"><?= $_SESSION["user_login"]['siswa']['nm_guru'] ?></p>
                            </div>
                            <div class="form-group">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            <?= $data['pengumuman'][0]['isi_pengumuman'] ?>
        </div>
    </div>
</section>

<script type="text/javascript">
var dataChartEmosi = <?= $data['emosi'] ?>;
var dataChartTidakEmosi = <?= $data['tidak_emosi'] ?>;
var label = <?= $data['label'] ?>;

// alert(dataChartEmosi);
// alert(dataChartTidakEmosi);
</script>
<script type="text/javascript" src="<?= BASE_JS; ?>/dashboard.js"></script>


