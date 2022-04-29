const MasterKelas = function () {

  // TODO: base url
  var base_url = window.location;
  console.log("BASE_URL => "+base_url);
  
  const masterdataTables = function () {
    $('#tablekelas').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }

  const getMatpel = function () {
    $.ajax({
      url: base_url+"/getMatpel",
      method: "get",
      dataType: "json",
      success: function (data) {
        $.each(data, function(index, values) {
          var option =  `<option value= "`+values['id']+`" data-nm="`+values['nm_matpel']+`">`+values['nm_matpel']+`</option>`;
          $("#iselectMatpel").append(option);
        });
      },
    });
  }

  const getGuru = function () {
    $.ajax({
      url: base_url+"/getGuru",
      method: "get",
      dataType: "json",
      success: function (data) {
        $.each(data, function(index, values) {
          var option =  `<option value= "`+values['id']+`" data-nm="`+values['nm_guru']+`">`+values['nm_guru']+`</option>`;
          $("#iselectGuru").append(option);
        });
      },
    });
  }

  const addToJadwal = function(){
    var nomer = ($('.row-jadwal').length) ? $('.row-jadwal').length : 0;

    $(document).on('click', '.btn-addMatpel', function(index){
      nomer = ($('.row-jadwal').length) ? $('.row-jadwal').length : 0;
      console.log(nomer);
      nomer++;

      var selectedMatpel = $('#iselectMatpel option').filter(':selected').data('nm');
      var selectedMatpelID = $('#iselectMatpel option').filter(':selected').val();
      var selectedJamKe = $('#ijam_ke').val();
      var selectedJamMulai = $('#ijam_mulai').val();
      var selectedJamSelesai = $('#ijam_selesai').val();
      var selectedGuru = $('#iselectGuru option').filter(':selected').data('nm');
      var selectedGuruID = $('#iselectGuru option').filter(':selected').val();

      var newrow = `<tr class="row-jadwal">
                    <td class="text-center">
                      `+selectedJamKe+`
                      <input type="hidden" name="jam_ke[]" value="`+selectedJamKe+`">
                    </td>
                    <td class="text-left">
                      `+selectedMatpel+`
                      <input type="hidden" name="matpel_id[]" value="`+selectedMatpelID+`">
                    </td>
                    <td class="text-center">
                      `+selectedJamMulai+`
                      <input type="hidden" name="jam_mulai[]" value="`+selectedJamMulai+`">
                    </td>
                    <td class="text-center">
                      `+selectedJamSelesai+`
                      <input type="hidden" name="jam_selesai[]" value="`+selectedJamSelesai+`">
                    </td>
                    <td class="text-left">
                      `+selectedGuru+`
                      <input type="hidden" name="guru_id[]" value="`+selectedGuruID+`">
                    </td>
                    <td class="text-center" width="5%"><button class="btn btn-danger btn-raised btn-xs hapus" id="btn-hapus" title="Hapus Data"><i class="fa fa-trash"></i></button></td>
                  </tr>`;

      $('#tablejadwal tbody').append(newrow);
    });

    $(document).on('click', '.hapus', function() {
      $(this).closest("tr").remove(); //use closest here
      $('#body-detail tr').each(function(index) {
        //change id of first tr
        $(this).find("td:eq(0)").attr("id", "row_num" + (index + 1))
        //change hidden input value 
        $(this).find("td:eq(0)").html((index + 1) + '<input type="hidden" name="task_number[]" value=' + (index + 1) + '>')
      });
      nomer--;
    });
  }

  const tambahKelas = function () {
    $(document).on('click', '.tampilModalTambah', function(){
      $("#staticBackdropLabel").html("Tambah Data Kelas");  
      $(".modal-footer button[type=submit]").html("Simpan Data");
  
      $("#nm_kelas").val("");
      $("#jenis_kelas").val("");
    });
  }

  const pilihHari = function () {
    $(document).on('change', '.pilihHari', function(){
      const id = $(this).data("idkelas");
      var hari = $('#pilihHari option').filter(':selected').val();

      $("#hariSelected").html(hari);  
      $(".formAdd").removeClass('d-none'); 

      $("#tablejadwal tbody").empty();
  
      $.ajax({
        url: base_url+"/getjadwal",
        data: { id: id, hari: hari },
        method: "post",
        dataType: "json",
        success: function (data) {

          $.each(data, function(index, values) {
            var tr = `<tr class="row-jadwal">
                    <td class="text-center">
                      `+values['jam_ke']+`
                      <input type="hidden" name="jam_ke[]" value="`+values['jam_ke']+`">
                    </td>
                    <td class="text-left">
                      `+values['nm_matpel']+`
                      <input type="hidden" name="matpel_id[]" value="`+values['matpel_id']+`">
                    </td>
                    <td class="text-center">
                      `+values['jam_mulai']+`
                      <input type="hidden" name="jam_mulai[]" value="`+values['jam_mulai']+`">
                    </td>
                    <td class="text-center">
                      `+values['jam_selesai']+`
                      <input type="hidden" name="jam_selesai[]" value="`+values['jam_selesai']+`">
                    </td>
                    <td class="text-left">
                      `+values['nm_guru']+`
                      <input type="hidden" name="guru_id[]" value="`+values['guru_id']+`">
                    </td>
                    <td class="text-center" width="5%"><button class="btn btn-danger btn-raised btn-xs hapus" id="btn-hapus" title="Hapus Data"><i class="fa fa-trash"></i></button></td>
                  </tr>`;

              $("#tablejadwal tbody").append(tr);
          });

        },
      });

    });
  }

  const lihatJadwal = function () {
    $(document).on('click', '.lihatJadwal', function(){

      const id = $(this).data("id");      
      const nmKelas = $(this).data("nm");      

      $(".modal-footer button[type=submit]").html("Simpan Jadwal Pelajaran");
      $(".modal-content form").attr(
        "action",
        base_url+"/lihatJadwal"
      );

      $('#kelas_id').val(id);
      $("#lihatJadwalLabel").html("Jadwal Pelajaran Kelas "+nmKelas);

      // $("#list-jadwal").empty();

      var arrHari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];   
      for(var i=0; i<6;i++){
        
        // alert("hari => "+ arrHari[i]);

        $.ajax({
          url: base_url+"/lihatjadwal",
          data: { id: id, hari: arrHari[i] },
          method: "post",
          dataType: "json",
          async: false,
          success: function (data) {


            var countSpan = data.length;
            var rowSpan = 'rowspan="'+countSpan+'"';
            var fristTD = '<td class="tg-0pky text-center" '+rowSpan+' style="vertical-align: middle;" >'+arrHari[i]+'</td>';
            // alert(data.length);

            // if(data.length == 0){
            //   rowSpan='<td class="tg-0pky text-center" style="vertical-align: middle;" >'+arrHari[i]+'</td>';
            //   var row = `<tr>
            //               `+rowSpan+`
            //               <td class="tg-0pky text-center">-</td>
            //               <td class="tg-0pky text-center">-</td>
            //               <td class="tg-0pky text-center">-</td>
            //             </tr>`;

            //   $("#list-jadwal").append(row);
            // }

            // if(data.length > 1){
            //   rowSpan='<td class="tg-0pky text-center" style="vertical-align: middle;" >'+arrHari[i]+'</td>';
            // }

            $.each(data, function(index, values) {

                var row = `<tr>
                          `+fristTD+`
                          <td class="tg-0pky text-center">`+data[index].nm_matpel+`</td>
                          <td class="tg-0pky text-center">`+data[index].jam_mulai+` - `+data[index].jam_selesai+`</td>
                          <td class="tg-0pky text-center">`+data[index].nm_guru+`</td>
                        </tr>`;
  
                $("#list-jadwal").append(row);

                fristTD='';
            });

            rowSpan
  
          },
        });
      }   
    });
  }

  const aturJadwal = function () {
    $(document).on('click', '.aturJadwal', function(){

      const id = $(this).data("id");
      const nmKelas = $(this).data("nm");
      

      $(".modal-footer button[type=submit]").html("Simpan Jadwal Pelajaran");
      $(".modal-content form").attr(
        "action",
        base_url+"/simpanJadwal"
      );

      $('#pilihHari').attr('data-idKelas', id);
      $('#kelas_id').val(id);
      $("#aturJadwalLabel").html("Pengaturan Jadwal Kelas "+nmKelas);  
      $("#tablejadwal tbody").empty();
  
    });
  }

  const simpanJadwal = function () {
    $(document).on('click', '#simpan-jadwal', function(){

      alert("simpan");
      // const id = $(this).data("idkelas");
      // var hari = $('#pilihHari option').filter(':selected').val();

      // $("#hariSelected").html(hari);  
      // $(".formAdd").removeClass('d-none'); 

      // $("#tablejadwal tbody").empty();
  
      // $.ajax({
      //   url: base_url+"/getjadwal",
      //   data: { id: id, hari: hari },
      //   method: "post",
      //   dataType: "json",
      //   success: function (data) {

      //     $.each(data, function(index, values) {
      //       var tr = `<tr class="row-jadwal">
      //               <td class="text-center">`+values['jam_ke']+`</td>
      //               <td class="text-left">`+values['nm_matpel']+`</td>
      //               <td class="text-center">`+values['jam_mulai']+`</td>
      //               <td class="text-center">`+values['jam_selesai']+`</td>
      //               <td class="text-left">`+values['nm_guru']+`</td>
      //               <td class="text-center" width="5%"><button class="btn btn-danger btn-raised btn-xs hapus" id="btn-hapus" title="Hapus Data"><i class="fa fa-trash"></i></button></td>
      //             </tr>`;

      //         $("#tablejadwal tbody").append(tr);
      //     });

      //   },
      // });

    });
  }

  const ubahKelas = function () {
      $(document).on('click', '.tampilModalUbah', function(){
      $("#staticBackdropLabel").html("Ubah Data Kelas");  
      $(".modal-footer button[type=submit]").html("Ubah Data");  
      $(".modal-content form").attr(
        "action",
        base_url+"/ubah"
      );
  
      const id = $(this).data("id");
  
      $.ajax({
        url: base_url+"/getubah",
        data: { id: id },
        method: "post",
        dataType: "json",
        success: function (data) {
          $("#nm_kelas").val(data.nm_kelas);
          $("#id").val(data.id);
        },
      });

    });
  }

  return {
    init: function () {
    
      masterdataTables();
      tambahKelas();
      ubahKelas();
      aturJadwal();
      pilihHari();
      getMatpel();
      getGuru();
      addToJadwal();
      simpanJadwal();
      lihatJadwal();
    }
  };

}();

$(document).ready(function () {
  console.log('master-kelas-js');

  (function() {
      'use strict';
      window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                  }
                  form.classList.add('was-validated');
              }, false);
          });
      }, false);
  })();

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.fn.dataTable.ext.errMode = 'none';
  MasterKelas.init();
});


