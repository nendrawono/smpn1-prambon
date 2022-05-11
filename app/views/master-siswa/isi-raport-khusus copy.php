
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
      <textarea class="form-control ml-3" rows="4" name="membaca" id="membaca" width="100%"> </textarea>

      <p class="font-weight-bold ml-3 mt-3"> 2. MENGHITUNG</p>
      <textarea class="form-control ml-3" rows="3" name="menghitung" id="menghitung" width="100%"> </textarea>

      <p class="font-weight-bold ml-3 mt-3"> 3. PRILAKU SISWA</p>
      <textarea class="form-control ml-3" rows="7" name="prilaku" id="prilaku" width="100%"> </textarea>

      <p class="font-weight-bold ml-3 mt-3"> 4. VOKASIONAL</p>

      <p class="font-weight-bold ml-4 mt-3"> a. DISIPLIN</p>
      <textarea class="form-control ml-4" rows="2" name="disiplin" id="disiplin" width="100%"> </textarea>

      <p class="font-weight-bold ml-4 mt-3"> b. KERJAKERAS</p>
      <textarea class="form-control ml-4" rows="6" name="kerja_keras" id="kerja_keras" width="100%"> </textarea>

      <p class="font-weight-bold ml-4 mt-3"> c. KREATIF</p>
      <textarea class="form-control ml-4" rows="6" name="kreatif" id="kreatif" width="100%"> </textarea>

      <p class="font-weight-bold ml-4 mt-3"> d. MANDIRI</p>
      <textarea class="form-control ml-4" rows="4" name="mandiri" id="mandiri" width="100%"> </textarea>

      <p class="font-weight-bold ml-4 mt-3"> e. RASA INGIN TAHU</p>
      <textarea class="form-control ml-4" rows="4" name="rasa_ingin_tahu" id="rasa_ingin_tahu" width="100%"> </textarea>

      <p class="font-weight-bold ml-4 mt-3"> f. TANGGUNG JAWAB</p>
      <textarea class="form-control ml-4" rows="4" name="tanggung_jawab" id="tanggung_jawab" width="100%"> </textarea>
     
    </div>

    <div class="row ml-5 mr-5 mt-5">
      <div class="col-7">
        <table id="table-sikap-spiritual" style="width:100%" border=0>
          <tbody>
            <tr>
              <td style="width: 20%">Mengetahui:</td>
              <td class= "text-center" style="width: 5%"></td>
              <!-- <td style="width: 80%"> -</td> -->
            </tr>
            <tr>
              <td style="width: 20%">Kepala Sekolah</td>
              <td class= "text-center" style="width: 5%"></td>
              <td style="width: 80%"></td>
            </tr>
            <tr>
              <td style="width: 20%;height:120px;"></td>
              <td class= "text-center" style="width: 5%"></td>
              <td style="width: 80%"> </td>
            </tr>
            <tr>
              <td style="width: 20%; vertical-align: bottom;" colspan="3">
                <p style="font-weight-bold">Drs H. Suwarno, M.M</p>
              </td>
            </tr>
            <tr>
              <td style="width: 20%; vertical-align: top;" colspan="3"><p>NIP. 124343132</p></td>
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
              <td style="width: 20%" colspan="3">Koor. Pend Inklusif</td>
            </tr>
            <tr>
              <td style="width: 20%;height:120px;"></td>
              <td class= "text-center" style="width: 5%"></td>
              <td style="width: 80%"> </td>
            </tr>
            <tr>
              <td style="width: 20%; vertical-align: bottom;" colspan="3">
                <p style="font-weight-bold">IDA HAYATI, S.Pd, M.Pd</p>
              </td>
            </tr>
            <tr>
              <td style="width: 20%; vertical-align: top;" colspan="3"><p>NIP. 124343132</p></td>
            </tr>
            
          </tbody>
        </table>    
      </div>
    </div>

    <div class="row ml-5 mr-5 mt-5">
      <div class="col-4">
        <table id="table-sikap-spiritual" style="width:100%; margin-left:18em;" border=0>
          <tbody>
            <tr>
              <td style="width: 20%; text-align:center;" colspan="3">Orang Tua/Wali Murid</td>
            </tr>
            <tr>
              <td style="width: 20%;height:120px;"></td>
              <td class= "text-center" style="width: 5%"></td>
              <td style="width: 80%"> </td>
            </tr>
            <tr>
              <td style="width: 20%; vertical-align: bottom;" colspan="3">
                <p style="font-weight-bold;text-align:center;">.............................</p>
              </td>
            </tr>            
          </tbody>
        </table>    
      </div>
    </div>
      


  </div>
</div>