<div class="card mr-5 ml-5" id="report-reguler">
  <div class="card-body">

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
                <select class="form-control select2" id="spiritual_predikat" name="predikat_spiritual" style="width: 100%;">
                  <option value="SB">SANGAT BAIK</option>
                  <option value="B">BAIK</option>
                  <option value="C">CUKUP</option>
                  <option value="K">CUKUP</option>
                </select>
              </div>
            </td>
            <td>
              <textarea class="form-control" rows="3" id="spiritual_des" width="100%"> </textarea>
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
              <select class="form-control select2" id="sosial_predikat" name="predikat_spiritual" style="width: 100%;">
                <option value="SB">SANGAT BAIK</option>
                <option value="B">BAIK</option>
                <option value="C">CUKUP</option>
                <option value="K">CUKUP</option>
              </select>
            </th>
            <td>
              <textarea class="form-control" rows="3" id="sosial_des" width="100%"> </textarea>
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
                <input type="hidden" class="form-control" name="matpel[]"> </input>
                <?= $m['nm_matpel'] ?>
              </td>
              <td class="text-center"><?= $m['kkm'] ?></th>
              <td class="text-center">
                <input type="number" class="form-control nilai" name="nilai[]"> </input>
              </th>
              <td class="text-center">
                <input type="hidden" class="form-control predikat" name="predikat[]"> </input>
                <p class="lbl-predikat">-</p>
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
            <td class="text-center" style="width: 20%; vertical-align: middle;" ><?= $bm['nm_ekstra'] ?></td>
            <!-- <td class="text-left" >Baik<br>Mampu menguasa materi</td> -->
            <td class="text-left" >
              <textarea class="form-control" rows="2" id="bakatminat_ket" name="bakatminat_ket[]" width="100%"> </textarea>
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
                <input type="number" class="form-control" style="width:4em;" name="sakit[]"> </input>
              </td>
            </tr>
            <tr>
              <td style="width: 30%">Ijin</td>
              <td class= "text-center" style="width: 5%">:</td>
              <td style="width: 80%">
                <input type="number" class="form-control" style="width:4em;" name="ijin[]"> </input>
              </td>
            </tr>
            <tr>
              <td style="width: 30%">Tanpa Keterangan</td>
              <td class= "text-center" style="width: 5%">:</td>
              <td style="width: 80%">
                <input type="number" class="form-control" style="width:4em;" name="tanpa_ket[]"> </input>
              </td>
            </tr>
        </tbody>
      </table>
      </div>
      
    </div>

    <div class="row ml-5 mr-5 mt-5">
      <div class="col-7">
        <table id="table-sikap-spiritual" style="width:100%"  >
          <tbody>
            <tr>
              <td style="width: 20%">Mengetahui:</td>
              <td class= "text-center" style="width: 5%"></td>
              <!-- <td style="width: 80%"> -</td> -->
            </tr>
            <tr>
              <td style="width: 20%">Orang Tua Wali</td>
              <td class= "text-center" style="width: 5%"></td>
              <td style="width: 80%"></td>
            </tr>
            <tr>
              <td style="width: 20%;height:120px;"></td>
              <td class= "text-center" style="width: 5%"></td>
              <td style="width: 80%"> </td>
            </tr>
            <tr>
              <td style="width: 20%" colspan="2"><hr></td>
              <td style="width: 80%"> </td>
            </tr>
          </tbody>
        </table>    
      </div>
      <div class="col-4">
        <table id="table-sikap-spiritual" style="width:100%" border=0>
          <tbody>
            <tr>
              <td style="width: 20%" colspan="3">Krian, 15 Desember 2022</td>
              <!-- <td style="width: 80%"> -</td> -->
            </tr>
            <tr>
              <td style="width: 20%" colspan="3">Wali Kelas</td>
            </tr>
            <tr>
              <td style="width: 20%;height:120px;"></td>
              <td class= "text-center" style="width: 5%"></td>
              <td style="width: 80%"> </td>
            </tr>
            <tr>
              <td style="width: 20%; vertical-align: bottom;" colspan="3">
                <p style="font-weight-bold">KHALIMAH, Spd</p>
              </td>
            </tr>
            <tr>
              <td style="width: 20%; vertical-align: top;" colspan="3"><p>NIP. 124343132</p></td>
            </tr>
            
          </tbody>
        </table>    
      </div>
    </div>
      


  </div>
</div>

<script type="text/javascript" src="<?= BASE_JS; ?>/mastersiswa.js"></script>
