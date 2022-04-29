const MasterMatpel = function () {

  // TODO: base url
  var base_url = window.location;
  console.log("BASE_URL => "+base_url);

  const masterdataTables = function () {
    $('#tablematpel').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }

  const tambahMatpel = function () {
    $(document).on('click', '.tampilModalTambah', function(){
      $("#staticBackdropLabel").html("Tambah Data Mata Pelajaran");  
      $(".modal-footer button[type=submit]").html("Simpan Data");
  
      $("#kelas_id").val("");
      $("#nm_pelajaran").val("");
      $("#kkm").val("");
      $("#deskripsi").val("");
      $("#kelompok").val("");
    });
  }

  const ubahMatpel = function () {
      $(document).on('click', '.tampilModalUbah', function(){
      $("#staticBackdropLabel").html("Ubah Data Mata Pelajaran");  
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
          $("#nm_matpel").val(data.nm_matpel);
          $("#kkm").val(data.kkm);
          $("#kelompok").val(data.kelompok);
          $("#id").val(data.id);
        },
      });
    });
  }

  return {
    init: function () {
    
      masterdataTables();
      tambahMatpel();
      ubahMatpel();
    }
  };

}();

$(document).ready(function () {
  console.log('master-matpel-js');

   //Initialize Select2 Elements
   $('.select2').select2({
    placeholder: 'Select an option'
  });
   //Initialize Select2 Elements
   $('.select2bs4').select2({
     theme: 'bootstrap4'
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

  $('.select2').select2();

  $.fn.dataTable.ext.errMode = 'none';
  MasterMatpel.init();
});


