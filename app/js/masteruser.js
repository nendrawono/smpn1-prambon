const MasterUser = function () {

  // TODO: base url
  var base_url = window.location;
  console.log("BASE_URL => "+base_url);

  // const getUsers = function () {
  //   $("#tableperencanaan").LoadingOverlay("show", {
  //     image: "../custom/img/loading2.gif"
  //   });
  //   var t = $('#tableperencanaan').DataTable({
  //     'ajax': {
  //       'url': '/perencanaan/tableperencanaan',
  //       'dataSrc': 'data',
  //       'complete': function () {
  //         $("#tableperencanaan").LoadingOverlay("hide");
  //       }
  //     },
  //     'columns': [
  //       { 'render': function (data, type, full, meta) {
  //         return meta.row +1
  //       }, className: 'text-center' },
  //       { 'data': 'perusahaan.badan_usaha', 'name' : 'perusahaan.badan_usaha',  className: 'text-center' },
  //       { 'data': 'perusahaan.bidang_usaha', 'name' : 'perusahaan.bidang_usaha', className: 'text-center' },
  //       { 'data': 'perusahaan.lokasi_usaha', 'name' : 'perusahaan.lokasi_usaha', className: 'text-center' },
  //       { 'data': 'mulai', 'name' : 'mulai', className: 'text-center' },
  //       { 'data': 'selesai', 'name' : 'selesai', className: 'text-center' },
  //       { 'data': 'petugas[<br> ]', className: 'text-left' , searchable: false },
  //       // { 'data': 'lampiran', className: 'text-center', defaultContent: '-' },
  //       {
  //         'render': function (data, type, full, meta) {
  //           var html = '';
  //           html += '<div class="text-center">';
  //           html += '<div class="btn-group btn-group-solid">';
  //           html += '<button class="btn btn-primary btn-raised btn-xs" data-id="' + full["id"] + '" id="btn-show" title="Lihat Data"><i class="fa fa-search"></i></button> &nbsp;';
  //           html += '<button class="btn btn-primary blue btn-raised btn-xs" data-id="' + full["id"] + '" id="btn-edit" title="Ubah Data"><i class="fa fa-pencil"></i></button> &nbsp;';
  //           html += '<button class="btn btn-danger btn-raised btn-xs" data-id="' + full["id"] + '" data-nama="' + full["nama_pegawai"] + '" id="btn-hapus" title="Hapus Data"><i class="fa fa-trash"></i></button> &nbsp;';
  //           // html += '<button class="btn btn-primary btn-raised btn-xs" data-id="' + full["id"] + '" data-nama="' + full["nama_pegawai"] + '" id="btn-approve" title="Approve Data"><i class="fa fa-check"></i></button>';
  //           html += '</div>';
  //           html += '</div>';
  //           return html;
  //         }, className: 'text-center'
  //       }
  //     ],
  //     "processing": true,
  //     "serverSide": true,
  //     "order": [[0, 'desc']],
  //     "columnDefs": [
  //       { "orderable": false, "targets": [0] }
  //     ]
  //   });
  // }

  const masterdataTables = function () {
    $('#tableuser').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }

  const tambahUser = function () {
    $(document).on('click', '.tampilModalTambah', function(){
      $("#staticBackdropLabel").html("Tambah Data User");  
      $(".modal-footer button[type=submit]").html("Simpan Data");
  
      $("#username").val("");
      $("#password").val("");
      $("#confirm_password").val("");
    });
  }

  const ubahUser = function () {
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
          $("#username").val(data.username);
          $("#password").val(data.password);
          $("#id").val(data.id);
        },
      });
    });
  }

  return {
    init: function () {
    
      masterdataTables();
      tambahUser();
      ubahUser();
    }
  };

}();

$(document).ready(function () {
  console.log('master-user-js');

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
  MasterUser.init();
});


