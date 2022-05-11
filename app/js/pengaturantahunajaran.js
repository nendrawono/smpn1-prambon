const PengaturanTahunAjaran = function () {

  // TODO: base url
  var base_url = window.location;
  console.log("BASE_URL => "+base_url);

  const masterdataTables = function () {
    $('#tabletahunajaran').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }

  const tambahTahunAjaran = function () {
    $(document).on('click', '.tampilModalTambah', function(){
      $("#staticBackdropLabel").html("Tambah Tahun Ajaran");  
      $(".modal-footer button[type=submit]").html("Simpan Data");
  
      $("#tahun_ajaran").val("");
      $("#semester").val("");
      $("#is_active").val("");
    });
  }

  const ubahTahunAjaran = function () {
      $(document).on('click', '.tampilModalUbah', function(){
      $("#staticBackdropLabel").html("Ubah Tahun Ajaran");  
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
          $("#tahun_ajaran").val(data.tahun_ajaran);
          $("#semester").val(data.semester);
          $("#is_active").val(data.is_active);
          $("#id").val(data.id);
        },
      });
    });
  }

  return {
    init: function () {
    
      masterdataTables();
      tambahTahunAjaran();
      ubahTahunAjaran();
    }
  };

}();

$(document).ready(function () {
  console.log('pengaturan-tahun-ajaran-js');

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
  PengaturanTahunAjaran.init();
});


