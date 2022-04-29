const MasterEkstra = function () {

  // TODO: base url
  var base_url = window.location;
  console.log("BASE_URL => "+base_url);

  const masterdataTables = function () {
    $('#tableekstra').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }

  const tambahEkstra = function () {
    $(document).on('click', '.tampilModalTambah', function(){
      $("#staticBackdropLabel").html("Tambah Data Bakat Minat");  
      $(".modal-footer button[type=submit]").html("Simpan Data");
  
      $("#nm_ekstra").val("");
    });
  }

  const ubahEkstra = function () {
      $(document).on('click', '.tampilModalUbah', function(){
      $("#staticBackdropLabel").html("Ubah Data User");  
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
          $("#nm_ekstra").val(data.nm_ekstra);
          $("#id").val(data.id);
        },
      });
    });
  }

  const ubahPeserta = function () {
      $(document).on('click', '.ubahPeserta', function(){

      const id = $(this).data("id");
      $("#ekstra_id").val(id);
      const nm_ekstra = $(this).data("nm");

      $("#ubahPesertaLabel").html("Peserta Bakat Minat " + nm_ekstra);  
      $(".modal-footer button[type=submit]").html("Ubah Data");  
      $(".modal-content form").attr(
        "action",
        base_url+"/ubahpeserta"
      );

      $("#tablePeserta tbody").empty();


      select2Peserta(id);

      $.ajax({
        url: base_url+"/getubahpeserta",
        data: { id: id },
        method: "post",
        dataType: "json",
        success: function (data) {
          console.log(data);
          $.each(data, function(index, values) {
            var tr = `<tr class="row-peserta">
                    <td class="text-left">
                      `+values['nm_siswa']+`
                      <input type="hidden" name="siswa_id[]" value="`+values['id']+`">
                    </td>
                    <td class="text-left">
                      `+values['nm_kelas']+`
                      <input type="hidden" name="nm_kelas[]" value="`+values['nm_kelas']+`">
                    </td>
                    <td class="text-center" width="5%"><button class="btn btn-danger btn-raised btn-xs hapus" id="btn-hapus" title="Hapus Data"><i class="fa fa-trash"></i></button></td>
                  </tr>`;

              $("#tablePeserta tbody").append(tr);
          });
        },
      });
    });
  }

  const select2Peserta = function (id) {
      const ekstra_id = id;
      // const nm_ekstra = $(this).data("nm");

      $("#ipilihPeserta").empty();

      $.ajax({
        url: base_url+"/getselect2peserta",
        data: { ekstra_id: ekstra_id },
        method: "post",
        dataType: "json",
        success: function (data) {
          console.log(data);
          $.each(data, function(index, values) {
            var options =  `<option 
                            value= "`+values['id']+`" 
                            data-nmsiswa="`+values['nm_siswa']+`" 
                            data-nmkelas="`+values['nm_kelas']+`" >
                            `+values['nm_siswa']+
                            `</option>`;

              $("#ipilihPeserta").append(options);
          });
        },
      });
  }

  const addToPeserta = function(){
    var nomer = ($('.row-peserta').length) ? $('.row-peserta').length : 0;

    $(document).on('click', '.btn-addMatpel', function(index){
      nomer = ($('.row-peserta').length) ? $('.row-peserta').length : 0;
      console.log(nomer);
      nomer++;

      var selectedPesertaNama = $('#ipilihPeserta option').filter(':selected').data('nmsiswa');
      var selectedPesertaID = $('#ipilihPeserta option').filter(':selected').val();
      var selectedPesertaKelas = $('#ipilihPeserta option').filter(':selected').data('nmkelas');


      var newrow = `<tr class="row-peserta">
                    <td class="text-left">
                      `+selectedPesertaNama+`
                      <input type="hidden" name="siswa_id[]" value="`+selectedPesertaID+`">
                    </td>
                    <td class="text-left">
                    `+selectedPesertaKelas+`
                  </td>
                    <td class="text-center" width="5%"><button class="btn btn-danger btn-raised btn-xs hapus" id="btn-hapus" title="Hapus Data"><i class="fa fa-trash"></i></button></td>
                  </tr>`;

      $('#tablePeserta tbody').append(newrow);
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

  const lihatPeserta = function () {
      $(document).on('click', '.lihatPeserta', function(){

      const id = $(this).data("id");
      $("#ekstra_id").val(id);
      const nm_ekstra = $(this).data("nm");

      $("#lihatPesertaLabel").html("Peserta Bakat Minat " + nm_ekstra);  
      // $(".modal-footer button[type=submit]").html("Ubah Data");  
      $(".modal-content form").attr(
        "action",
        base_url+"/ubahpeserta"
      );

      $("#tableLihatPeserta tbody").empty();

      $.ajax({
        url: base_url+"/getubahpeserta",
        data: { id: id },
        method: "post",
        dataType: "json",
        success: function (data) {
          console.log(data);
          var n=1;
          $.each(data, function(index, values) {
            var tr = `<tr class="row-peserta">
                    <td class="text-center">
                      `+ n++ +`
                      <input type="hidden" name="siswa_id[]" value="`+values['id']+`">
                    </td>
                    <td class="text-left">
                      `+values['nm_siswa']+`
                      <input type="hidden" name="siswa_id[]" value="`+values['id']+`">
                    </td>
                    <td class="text-left">
                      `+values['nm_kelas']+`
                      <input type="hidden" name="nm_kelas[]" value="`+values['nm_kelas']+`">
                    </td>
                  </tr>`;

              $("#tableLihatPeserta tbody").append(tr);
          });
        },
      });
    });
  }

  return {
    init: function () {
    
      masterdataTables();
      tambahEkstra();
      ubahEkstra();
      ubahPeserta();
      addToPeserta();
      lihatPeserta();
    }
  };

}();

$(document).ready(function () {
  console.log('master-ekstra-js');

  $('#ipilihPeserta').select2({
      dropdownParent: $('#ubahPeserta')
  });

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
  MasterEkstra.init();
});


