
<section class="content">
  <div class="container-fluid">
    <!-- <div class="row"> -->

    <div class="row">
        <div class="col-lg-12">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <?php if( $data['publish'] == 1 ){ ?>
    <div class="card mr-5 ml-5" id="report-reguler">
      <form action="<?= BASE_URL; ?>/mastersiswa/raportUpdate" class="needs-validation" method="POST"  id="form-raport" enctype="multipart/form-data" novalidate>

        <div class="card-body">
          <input type="hidden" name="id_raport" id="id_raport" value="<?= $data['id_raport']; ?>" ></input>

            <div class="row justify-content-md-center">
              <p>
                <h4> PENCAPAIAN KOMPETENSI SISWA </h4>
              </p>
            </div>

            <div class="row ml-5 mr-5 mt-5">
              <div class="col-6">
                <table id="table-sikap-spiritual" style="width:100%"  >
                  <tbody>
                    <tr>
                      <td style="width: 20%">Nama Sekolah</td>
                      <td class= "text-center" style="width: 5%">:</td>
                      <td style="width: 80%"> SMP NEGERI 1 PRAMBON</td>
                    </tr>
                    <tr>
                      <td style="width: 20%">Alamat</td>
                      <td class= "text-center" style="width: 5%">:</td>
                      <td style="width: 80%"> Jl. Anggrek, Klampisan, Wirobiting, Kec. Prambon</td>
                    </tr>
                    <tr>
                      <td style="width: 20%">No. Induk</td>
                      <td class= "text-center" style="width: 5%">:</td>
                      <td style="width: 80%">
                        <input type="hidden" name="nis" id="nis" value="<?= $data['siswa']['nis']; ?>" ></input>
                        <?= $data['siswa']['nis']; ?>
                      </td>
                    </tr>
                  </tbody>
                </table>    
              </div>
              <div class="col-6">
                <table id="table-sikap-spiritual" style="width:100%" >
                  <tbody>
                    <tr>
                      <td style="width: 20%">Kelas</td>
                      <td class= "text-center" style="width: 5%">:</td>
                      <td style="width: 80%"> 
                        <input type="hidden" name="kelas_sekarang_id" id="kelas_sekarang_id" value="<?= $data['siswa']['kelas_sekarang']; ?>" ></input>
                        <?= $data['siswa']['nm_kelas']; ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 20%">Semester</td>
                      <td class= "text-center" style="width: 5%">:</td>
                      <td style="width: 80%">
                        <input type="hidden" name="tahun_ajaran_id" id="tahun_ajaran_id" value="<?= $data['tahun_ajaran']['semester']; ?>" ></input>
                        <?php 
                          $semester = (int)$data['tahun_ajaran']['semester'];
                          echo ( $semester % 2 == 0 ? $semester." ( GENAP )":  $semester." ( GANJIL )"); 
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 20%">Tahun Ajaran</td>
                      <td class= "text-center" style="width: 5%">:</td>
                      <td style="width: 80%"> 
                      <?= $data['tahun_ajaran']['tahun_ajaran'] ?>
                      </td>
                    </tr>
                  </tbody>
                </table>    
              </div>
            </div>

            <div class="row ml-2 mr-2 mt-5 d-block">
              <p class="font-weight-bold"> A. Sikap</p>
              <p class="font-weight-bold"> 1. Sikap Spiritual</p>
              <table id="table-sikap-spiritual" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 14%">Predikat</th>
                    <th class="text-center">Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">
                      <div class="form-group">
                        <select class="form-control select2" id="spiritual_predikat" name="predikat_spiritual" style="width: 100%;" disabled="true"> 
                          <option value="SB">SANGAT BAIK</option>
                          <option value="B">BAIK</option>
                          <option value="C">CUKUP</option>
                          <option value="K">KURANG</option>
                        </select>
                      </div>
                    </td>
                    <td>
                      <textarea class="form-control" rows="3" id="spiritual_des" name="spiritual_des"  width="100%"><?= $data['raport']['spiritual_des'] ?></textarea>
                    </td>
                  </tr>
                </tbody>
              </table>

              <p class="font-weight-bold"> 2. Sikap Sosial</p>
              <table id="table-sikap-spiritual" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 14%">Predikat</th>
                    <th class="text-center">Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">
                      <select class="form-control select2" id="sosial_predikat" name="sosial_predikat" style="width: 100%;" disabled="true">
                        <option value="SB">SANGAT BAIK</option>
                        <option value="B">BAIK</option>
                        <option value="C">CUKUP</option>
                        <option value="K">KURANG</option>
                      </select>
                    </th>
                    <td>
                      <textarea class="form-control" rows="3"  name="sosial_des" id="sosial_des" width="100%"><?= $data['raport']['sosial_des'] ?></textarea>
                    </th>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="row ml-2 mr-2 mt-5 d-block">
              <p class="font-weight-bold"> B. Pengetahuan Dan Ketrampilan</p>
              
              <table id="table-sikap-spiritual" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center" rowspan="2" style="width: 5%;vertical-align: middle;">No</th>
                    <th class="text-center" rowspan="2" style="width: 25%;vertical-align: middle;">Mata Pelajaran</th>
                    <th class="text-center" colspan="4">Pengetahuan</th>
                  </tr>
                  <tr>
                    <th class="text-center" style="width: 5%;" >KKM</th>
                    <th class="text-center" style="width: 8%;" >Nilai</th>
                    <th class="text-center" style="width: 5%;" >Predikat</th>
                    <th class="text-center" >Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 0;
                    $no = 1;
                    $arr_kelompok = ["A", "B", ""];
                  ?>
                  <?php foreach ($data['matpel_siswa'] as $m) : ?>
                    <?php if($m['kelompok'] = $arr_kelompok[$i]){  ?>
                    <tr>
                      <td class="text-left" colspan="6">Kelompok <?= $arr_kelompok[$i] ?></th>
                    </tr>
                    <?php $i++; } ?>
                    <tr>
                      <td class="text-center"><?= $no++ ?></th>
                      <td class="text-left">
                        <input type="hidden" class="form-control" name="matpel_id[]" value="<?= $m['matpel_id'] ?>"> </input>
                        <?= $m['nm_matpel'] ?>
                      </td>
                      <td class="text-center"><?= $m['kkm'] ?></th>
                      <td class="text-center">
                        <input type="number" class="form-control nilai" name="nilai[]" value="<?= $m['nilai'] ?>"> </input>
                      </th>
                      <td class="text-center">
                        <input type="hidden" class="form-control predikat" name="predikat[]"  value="<?= $m['predikat'] ?>"> </input>
                        <p class="lbl-predikat"><?= $m['predikat'] ?></p>
                      </th>
                      <td class="text-left"><?= $m['deskripsi'] ?></th>
                      <!-- <td class="text-left">Memiliki deskripsi</th> -->
                    </tr>
                  <?php endforeach; ?>
                  
                  <!-- <tr>
                    <td class="text-left" colspan="6">Kelompok A</th>
                  </tr>
                  <tr>
                    <td class="text-center">1</th>
                    <td class="text-left">Pendidikan Agama</th>
                    <td class="text-center">76</th>
                    <td class="text-center">77</th>
                    <td class="text-center">C</th>
                    <td class="text-left">Memiliki deskripsi</th>
                  </tr>
                  <tr>
                    <td class="text-center">2</th>
                    <td class="text-left">Ilmu Pengethuan Alam</th>
                    <td class="text-center">76</th>
                    <td class="text-center">77</th>
                    <td class="text-center">C</th>
                    <td class="text-left">Memiliki deskripsi</th>
                  </tr>
                  <tr>
                    <td class="text-left" colspan="6">Kelompok B</th>
                  </tr>
                  <tr>
                    <td class="text-center">3</th>
                    <td class="text-left">Seni Budaya</th>
                    <td class="text-center">76</th>
                    <td class="text-center">77</th>
                    <td class="text-center">C</th>
                    <td class="text-left">Memiliki deskripsi</th>
                  </tr> -->
                </tbody>
              </table>
            </div>

            <div class="row ml-2 mr-2 mt-5 d-block">
              <p class="font-weight-bold"> C. Ekstrakulikuler</p>
              
              <table id="table-sikap-spiritual" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 5%;">No</th>
                    <th class="text-center" >Kegiatan Ekstrakulikuler</th>
                    <th class="text-center" >Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                  ?>
                  <?php foreach ($data['bakatminat_siswa'] as $bm) : ?>
                  <tr>
                    <td class="text-center" style="width: 5%; vertical-align: middle;"> <?= $no++ ?></td>
                    <td class="text-center" style="width: 20%; vertical-align: middle;" >
                      <input type="hidden" class="form-control predikat" name="bakatminat_id[]"  value="<?= $bm['ekstra_id'] ?>"> </input>
                      <?= $bm['nm_ekstra'] ?>
                    </td>
                    <!-- <td class="text-left" >Baik<br>Mampu menguasa materi</td> -->
                    <td class="text-left" >
                      <textarea class="form-control" rows="2" id="bakatminat_ket" name="bakatminat_ket[]" width="100%"> <?= $bm['keterangan'] ?> </textarea>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

            <div class="row ml-2 mr-2 mt-5 d-block">
              <div class="col-6">
              <p class="font-weight-bold"> D. Ketidak Hadiran</p>
              
              <table id="table-sikap-spiritual" class="table table-bordered table-striped" style="widh:50%">
                <tbody>
                  <tr>
                      <td style="width: 30%">Sakit</td>
                      <td class= "text-center" style="width: 5%">:</td>
                      <td style="width: 80%">
                        <input type="number" class="form-control" style="width:4em;" name="sakit" value="<?= $data['raport']['sakit'] ?>" > </input>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 30%">Ijin</td>
                      <td class= "text-center" style="width: 5%">:</td>
                      <td style="width: 80%">
                        <input type="number" class="form-control" style="width:4em;" name="ijin" value="<?= $data['raport']['ijin'] ?>" > </input>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 30%">Tanpa Keterangan</td>
                      <td class= "text-center" style="width: 5%">:</td>
                      <td style="width: 80%">
                        <input type="number" class="form-control" style="width:4em;" name="tanpa_ket" value="<?= $data['raport']['tanpa_keterangan'] ?>" > </input>
                      </td>
                    </tr>
                </tbody>
              </table>
              </div>
              
            </div>

          </div>
          </div>


          <div class="card mr-5 ml-5" id="report-khusus">
          <div class="card-body">

            <div class="row justify-content-md-center">
              <p>
                <h4  class="text-center"> LAPORAN PERKEMBANGAN SISWA </br> PROGRAM BIMBINGAN KHUSUS </h4>
              </p>
            </div>

            <div class="row ml-5 mr-5 mt-5">
              <div class="col-6">
                <table id="table-sikap-spiritual" style="width:100%"  >
                  <tbody>
                    <tr>
                      <td style="width: 20%">Nama</td>
                      <td class= "text-center" style="width: 5%">:</td>
                      <td style="width: 80%">
                        <input type="hidden" name="nis" id="nis" value="<?= $data['siswa']['nis']; ?>" ></input>
                        <?= $data['siswa']['nm_siswa']; ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 20%">Kelas</td>
                      <td class= "text-center" style="width: 5%">:</td>
                      <td style="width: 80%">
                        <input type="hidden" name="kelas_sekarang_id" id="kelas_sekarang_id" value="<?= $data['siswa']['kelas_sekarang']; ?>" ></input>
                        <?= $data['siswa']['nm_kelas']; ?>
                      </td>
                    </tr>
                  </tbody>
                </table>    
              </div>
              <div class="col-6">
                <table id="table-sikap-spiritual" style="width:100%" >
                  <tbody>
                    <tr>
                      <td style="width: 20%">Semester</td>
                      <td class= "text-center" style="width: 5%">:</td>
                      <td style="width: 80%">
                        <input type="hidden" name="tahun_ajaran_id" id="tahun_ajaran_id" value="<?= $data['tahun_ajaran']['semester']; ?>" ></input>
                        <?php 
                          $semester = (int)$data['tahun_ajaran']['semester'];
                          echo ( $semester % 2 == 0 ? $semester." ( GENAP )":  $semester." ( GANJIL )"); 
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 20%">Tahun Ajaran</td>
                      <td class= "text-center" style="width: 5%">:</td>
                      <td style="width: 80%">
                        <?= $data['tahun_ajaran']['tahun_ajaran'] ?>
                      </td>
                    </tr>
                  </tbody>
                </table>    
              </div>
            </div>

            <div class="row ml-2 mr-2 mt-5 d-block">
              <p class="font-weight-bold"> A. PROGRAM BIMBINGAN</p>
              <p class="font-weight-bold ml-3"> 1. MEMBACA</p>
              <textarea class="form-control ml-3" rows="4" name="membaca" id="membaca" width="100%"> <?= $data['raport']['membaca'] ?> </textarea>

              <p class="font-weight-bold ml-3 mt-3"> 2. MENGHITUNG</p>
              <textarea class="form-control ml-3" rows="3" name="menghitung" id="menghitung" width="100%"> <?= $data['raport']['menghitung'] ?> </textarea>

              <p class="font-weight-bold ml-3 mt-3"> 3. PRILAKU SISWA</p>
              <textarea class="form-control ml-3" rows="7" name="prilaku" id="prilaku" width="100%"> <?= $data['raport']['prilaku'] ?> </textarea>

              <p class="font-weight-bold ml-3 mt-3"> 4. VOKASIONAL</p>

              <p class="font-weight-bold ml-4 mt-3"> a. DISIPLIN</p>
              <textarea class="form-control ml-4" rows="2" name="disiplin" id="disiplin" width="100%"> <?= $data['raport']['disiplin'] ?> </textarea>

              <p class="font-weight-bold ml-4 mt-3"> b. KERJAKERAS</p>
              <textarea class="form-control ml-4" rows="6" name="kerja_keras" id="kerja_keras" width="100%"> <?= $data['raport']['kerja_keras'] ?> </textarea>

              <p class="font-weight-bold ml-4 mt-3"> c. KREATIF</p>
              <textarea class="form-control ml-4" rows="6" name="kreatif" id="kreatif" width="100%"> <?= $data['raport']['kreatif'] ?> </textarea>

              <p class="font-weight-bold ml-4 mt-3"> d. MANDIRI</p>
              <textarea class="form-control ml-4" rows="4" name="mandiri" id="mandiri" width="100%"> <?= $data['raport']['mandiri'] ?> </textarea>

              <p class="font-weight-bold ml-4 mt-3"> e. RASA INGIN TAHU</p>
              <textarea class="form-control ml-4" rows="4" name="rasa_ingin_tau" id="rasa_ingin_tau" width="100%"> <?= $data['raport']['rasa_ingin_tau'] ?> </textarea>

              <p class="font-weight-bold ml-4 mt-3"> f. TANGGUNG JAWAB</p>
              <textarea class="form-control ml-4" rows="4" name="tanggung_jawab" id="tanggung_jawab" width="100%"> <?= $data['raport']['tanggung_jawab'] ?> </textarea>
            
            </div>

            

        </div>

      </form>
    </div>
    <?php }else{ ?>
      raport belum tersedia
    <?php } ?>
  </div>
</section>


<script type="text/javascript" src="<?= BASE_JS; ?>/raporsiswa.js"></script>


