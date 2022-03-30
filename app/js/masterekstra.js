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
      $("#staticBackdropLabel").html("Tambah Data Ekstrakurikuler");  
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

  return {
    init: function () {
    
      masterdataTables();
      tambahEkstra();
      ubahEkstra();
    }
  };

}();

$(document).ready(function () {
  console.log('master-ekstra-js');

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


