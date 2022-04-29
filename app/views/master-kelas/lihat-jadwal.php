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
<div class="modal fade" id="lihatJadwal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="lihatJadwalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="lihatJadwalLabel">Pengaturan Jadwal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= BASE_URL; ?>/masterkelas/lihatjadwal" class="needs-validation" method="POST" novalidate>
      <div class="modal-body">
        <table class="tg">
          <thead>
            <tr class="tr-header">
              <th class="tg-dvpl text-center">HARI</th>
              <th class="tg-0pky text-center">MATA PELAJARAN</th>
              <th class="tg-0pky text-center">JAM</th>
              <th class="tg-0pky text-center">GURU</th>
            </tr>
          </thead>
          <tbody id="list-jadwal">
            <!-- <tr>
              <td class="tg-0pky text-center" style="vertical-align: middle;" >Senin</td>
              <td class="tg-0pky text-center">Bahasa Indonesia</td>
              <td class="tg-0pky text-center">10:00 - 11:00</td>
              <td class="tg-0pky text-center">Lasmargo Nendra Wono</td>
            </tr>
            <tr>
              <td class="tg-0pky text-center" rowspan="2" style="vertical-align: middle;" >Senin</td>
              <td class="tg-0pky text-center">Bahasa Indonesia</td>
              <td class="tg-0pky text-center">10:00 - 11:00</td>
              <td class="tg-0pky text-center">Lasmargo Nendra Wono</td>
            </tr>
            <tr>
              <td class="tg-0pky text-center">Bahasa Indonesia</td>
              <td class="tg-0pky text-center">10:00 - 11:00</td>
              <td class="tg-0pky text-center">Lasmargo Nendra Wono</td>
            </tr>
            <tr>
              <td class="tg-0pky text-center" rowspan="3" style="vertical-align: middle;" >Senin</td>
              <td class="tg-0pky text-center">Bahasa Indonesia</td>
              <td class="tg-0pky text-center">10:00 - 11:00</td>
              <td class="tg-0pky text-center">Lasmargo Nendra Wono</td>
            </tr>
            <tr>
              <td class="tg-0pky text-center">Bahasa Indonesia</td>
              <td class="tg-0pky text-center">10:00 - 11:00</td>
              <td class="tg-0pky text-center">Lasmargo Nendra Wono</td>
            </tr>
            <tr>
              <td class="tg-0pky text-center">Bahasa Indonesia</td>
              <td class="tg-0pky text-center">10:00 - 11:00</td>
              <td class="tg-0pky text-center">Lasmargo Nendra Wono</td>
            </tr> -->
          </tbody>
          </table>
      </div>
      
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
      </form>
    </div>
  </div>
</div>