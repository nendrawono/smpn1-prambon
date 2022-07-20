const MasterSiswa = function () {

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
    $('#tablesiswa').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }

  const tambahSiswa = function () {
    $(document).on('click', '.tampilModalTambah', function(){
      $("#staticBackdropLabel").html("Tambah Data Siswa");  
      $(".modal-footer button[type=submit]").html("Simpan Data Siswa");
      $('#nis').prop('readonly', false);
  
      $("#id").val("");
      $("#nm_siswa").val("");
      $("#nis").val("");
      $("#tempat_lahir").val("");
      $("#tgl_lahir").val("");
      $("#jenis_kelamin").val("");
      $("#tgl_lahir").val("");
      $("#agama").val("");
      $("#status_dalam_keluarga").val("");
      $("#anak_ke").val("");
      $("#alamat").val("");
      $("#tlp").val("");
      $("#sekolah_asal").val("");
      $("#kelas").val("");
      $("#diterima_tgl").val("");
      $("#nm_ayah").val("");
      $("#pekerjaan_ayah").val("");
      $("#nm_ibu").val("");
      $("#pekerjaan_ibu").val("");
      $("#alamat_ortu").val("");
      $("#tlp_ortu").val("");
      $("#nm_wali").val("");
      $("#alamat_wali").val("");
      $("#tlp_wali").val("");
      $("#pekerjaan_wali").val("");

    });
  }

  const ubahSiswa = function () {
      $(document).on('click', '.tampilModalUbah', function(){
      $("#staticBackdropLabel").html("Ubah Data Siswa");  
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
          console.log(data);
          $('#nis').prop('readonly', true);
          $("#id").val(data.id);
          $("#nm_siswa").val(data.nm_siswa);
          $("#nis").val(data.nis);
          $("#tempat_lahir").val(data.tempat_lahir);
          $("#jenis_abk_id").val(data.jenis_abk_id);

          var tgl_lahir = dateViewFormat(data.tgl_lahir);
          $("#tgl_lahir").val(tgl_lahir);
          $("#jenis_kelamin").val(data.jenis_kelamin);
          $("#agama").val(data.agama);
          $("#status_dalam_keluarga").val(data.status_dalam_keluarga);
          $("#anak_ke").val(data.anak_ke);
          $("#alamat").val(data.alamat);
          $("#tlp").val(data.tlp);
          $("#sekolah_asal").val(data.sekolah_asal);
          $("#kelas").val(data.kelas);

          var diterima_tgl = dateViewFormat(data.diterima_tgl);
          $("#diterima_tgl").val(diterima_tgl);
          $("#nm_ayah").val(data.nm_ayah);
          $("#pekerjaan_ayah").val(data.pekerjaan_ayah);
          $("#nm_ibu").val(data.nm_ibu);
          $("#pekerjaan_ibu").val(data.pekerjaan_ibu);
          $("#alamat_ortu").val(data.alamat_ortu);
          $("#tlp_ortu").val(data.tlp_ortu);
          $("#nm_wali").val(data.nm_wali);
          $("#alamat_wali").val(data.alamat_wali);
          $("#tlp_wali").val(data.tlp_wali);
          $("#pekerjaan_wali").val(data.pekerjaan_wali);
        },
      });
    });
  }

  const detailSiswa = function () {
      $(document).on('click', '.detailSiswa', function(){
      // $("#staticBackdropLabel").html("Ubah Data Siswa");  
      // $(".modal-footer button[type=submit]").html("Ubah Data");  
      // $(".modal-content form").attr(
      //   "action",
      //   base_url+"/ubah"
      // );

      const id = $(this).data("id");

      // alert(id);

      $.ajax({
        url: base_url+"/getubah",
        data: { id: id },
        method: "post",
        dataType: "json",
        success: function (data) {
          console.log(data);
          $("#nm_siswa_v").html(data.nm_siswa);
          $("#nis_v").html(data.nis);
          var tgl_lahir = dateViewFormat(data.tgl_lahir);
          $("#tgl_lahir").val(tgl_lahir);

          $("#tempat_lahir_v").html(data.tempat_lahir+', '+tgl_lahir);
          
          $("#foto_siswa_v").attr("src",data.reff_passfoto);

          
          $("#jenis_kelamin_v").html(data.jenis_kelamin);
          $("#agama_v").html(data.agama);
          $("#status_dalam_keluarga_v").html(data.status_dalam_keluarga);
          $("#anak_ke_v").html(data.anak_ke);
          $("#alamat_v").html(data.alamat);
          $("#tlp_v").html(data.tlp);
          $("#sekolah_asal_v").html(data.sekolah_asal);
          $("#kelas").val(data.kelas);

          var diterima_tgl = dateViewFormat(data.diterima_tgl);
          $("#diterima_dikelas_v").html('<b> - Dikelas : </b>'+data.diterima_dikelas);
          $("#diterima_tgl_v").html('<b> - Pada Tanggal : </b> '+diterima_tgl);
          $("#nm_ayah_v").html('<b> a. Ayah : </b>'+data.nm_ayah);
          $("#pekerjaan_ayah_v").html('<b> a. Ayah : </b>' +data.pekerjaan_ayah);
          $("#nm_ibu_v").html('<b> b. Ibu : </b>'+data.nm_ibu);
          $("#pekerjaan_ibu_v").html('<b> b. Ibu : </b>' +data.pekerjaan_ibu);
          $("#alamat_ortu_v").html('<b>Alamat Orang Tua : </b>'+data.alamat_ortu);
          $("#tlp_ortu_v").html('<b>No Telepon Rumah : </b>'+data.tlp_ortu);
          $("#nm_wali_v").html(data.nm_wali);
          $("#alamat_wali_v").html(data.alamat_wali);
          $("#tlp_wali_v").html(data.tlp_wali);
          $("#pekerjaan_wali_v").html(data.pekerjaan_wali);
        },
      });
    });
  }

  const inputNilai = function () {
      $(document).on('change', '.nilai', function(){


      // console.log($(this).next().next().next());
      console.log($(this).val());
      
      var nilaix = $(this).val();
      
      var konv = konversiNilai(nilaix);

      $(this).closest('.text-center')
      .next('.text-center, :has(.text-center)')
      .find('.predikat').val(konv);

      $(this).closest('.text-center')
      .next('.text-center, :has(.text-center)')
      .find('.lbl-predikat').text(konv);

      // console.log(selector);
      // #table-sikap-spiritual > tbody > tr:nth-child(2) > td:nth-child(5) > input



    });
  }

  const konversiNilai = function (nilaix) {

    var hitung = nilaix/100*4;

    if(hitung >= 4.0){
        return "A";
    }else if(hitung >= 3.6){
        return "A-";
    }else if(hitung >= 3.3){
        return "B+";
    }else if(hitung >= 3.0){
        return "B";
    }else if(hitung >= 2.6){
        return "B-";
    }else if(hitung >= 2.3){
        return "C+";
    }else if(hitung >= 2.0){
        return "C";
    }else if(hitung >= 1.6){
        return "C-";
    }else if(hitung >= 1.3){
        return "D+";
    }else if(hitung >= 1.0){
        return "D";
    }else if(hitung < 1.0){
        return "D";
    }
    else{
      return "#";
    }

    // switch(hitung) {
    //   case 4.0:
    //      return "A";
    //     break;
    //   case 3.6:
    //       return "A-";
    //     break;
    //   case 3.3:
    //       return "B+";
    //     break;
    //   case 3.0:
    //     return "B";
    //     break;
    //   case 2.6:
    //     return "B-";
    //     break;
    //   case 2.3:
    //     return "C+";
    //     break;
    //   case 2.0:
    //     return "C";
    //     break;
    //   case 1.6:
    //     return "C-";
    //     break;
    //   case 1.3:
    //     return "D+";
    //     break;
    //   case 1.0:
    //     return "D";
    //     break;
        
    //   default:
    //     // code block
    // }

     

    return hitung; 

  }

  const dateViewFormat = function (stringDate) {
    var date    = new Date(stringDate),
    yr      = date.getFullYear(),
    month   = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth(),
    day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),

    newDate = day + '/' + month + '/' + yr;

    return newDate;
  }

  const guruPendamping = function () {
    $(document).on('click', '.guruPendampingSiswa', function(){

    var id = $(this).data('id');
    var nm_siswa = $(this).data('nmsiswa');
    var id_guru = $(this).data('guru');
    
    $("#pendamping_siswa_id").val(id);

    $("#guruPendampingSiswaLabel").html("Guru Pendaming  "+nm_siswa);  
    $(".modal-footer button[type=submit]").html("Simpan");  
    $(".modal-content form").attr(
      "action",
      base_url+"/ubahgurupendampingsiswa"
    );

    $("#guru_pendamping").val(id_guru).change();

  });
}

  const prestasiSiswa = function () {
      $(document).on('click', '.prestasiSiswa', function(){

      var nm_siswa = $(this).data('nama');

      $("#prestasiSiswaLabel").html("Prestasi "+nm_siswa);  
      $(".modal-footer button[type=submit]").html("Simpan Prestasi");  
      $(".modal-content form").attr(
        "action",
        base_url+"/ubahprestasi"
      );

      const id = $(this).data("id");

      $("#table-prestasi tbody").empty();

      $.ajax({
        url: base_url+"/getprestasi",
        data: { id: id },
        method: "post",
        dataType: "json",
        success: function (data) {
          // console.log(data);
          $.each(data, function(index, values) {
            var tr = `<tr class="row-prestasi">
                    <td class="text-center">
                      `+values['prestasi']+`
                      <input type="hidden" name="prestasi[]" value="`+values['prestasi']+`">
                    </td>
                    <td class="text-center">
                      `+values['prestasi']+`
                      <input type="hidden" name="prestasi[]" value="`+values['prestasi']+`">
                    </td>
                    <td class="text-center" width="5%"><button class="btn btn-danger btn-raised btn-xs hapus" id="btn-hapus" title="Hapus Prestasi"><i class="fa fa-trash"></i></button></td>
                  </tr>`;

              $("#table-prestasi tbody").append(tr);
          });
        },
      });
    });
  }

  const addToPrestasi = function(){
    var nomer = ($('.row-prestasi').length) ? $('.row-prestasi').length : 0;

    $(document).on('click', '.btn-addPrestasi', function(index){
      nomer = ($('.row-jadwal').length) ? $('.row-prestasi').length : 0;
      console.log(nomer);
      nomer++;

      var prestasi_value = $('textarea#iprestasi_siswa').val();

      var newrow = `<tr class="row-prestasi">
                    <td class="text-center">
                      `+prestasi_value+`
                      <input type="hidden" name="prestasi[]" value="`+prestasi_value+`">
                    </td>
                    <td class="text-center" width="5%"><button class="btn btn-danger btn-raised btn-xs hapus" id="btn-hapus" title="Hapus Data"><i class="fa fa-trash"></i></button></td>
                  </tr>`;

      $('#table-prestasi tbody').append(newrow);
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

  const simpanJadwal = function () {
    $(document).on('click', '#simpan-prestasi', function(){

      alert("simpan jadwal");
      const id = $('#id').val();
      // const id = $(this).data("idkelas");
      // var hari = $('#pilihHari option').filter(':selected').val();

      // $("#hariSelected").html(hari);  
      // $(".formAdd").removeClass('d-none'); 

      // $("#tablejadwal tbody").empty();
  
      $.ajax({
        url: base_url+"/getjadwal",
        data: { id: id, hari: hari },
        method: "post",
        dataType: "json",
        success: function (data) {

          $.each(data, function(index, values) {
            var tr = `<tr class="row-jadwal">
                    <td class="text-center">`+values['jam_ke']+`</td>
                    <td class="text-left">`+values['nm_matpel']+`</td>
                    <td class="text-center">`+values['jam_mulai']+`</td>
                    <td class="text-center">`+values['jam_selesai']+`</td>
                    <td class="text-left">`+values['nm_guru']+`</td>
                    <td class="text-center" width="5%"><button class="btn btn-danger btn-raised btn-xs hapus" id="btn-hapus" title="Hapus Data"><i class="fa fa-trash"></i></button></td>
                  </tr>`;

              $("#tablejadwal tbody").append(tr);
          });

        },
      });

    });
  }

  const updateRaport = function () {


    $(document).on('click', '.simpan', function(){

      var status = $(this).data('status');

      var t = $("#form-raport").attr("action");
      var url = t+'/'+status;

      

      // $("#prestasiSiswaLabel").html("Prestasi "+nm_siswa);  
      // $(".modal-footer button[type=submit]").html("Simpan Prestasi");  
      

      const id = $(this).data("id");

      $("#table-prestasi tbody").empty();

      if(status == 'publish'){

        if (confirm("Raport Yang Dipublish Tidak Dapat Diubah Kembali") == true) {
          $.ajax({
              type : 'POST',
              url: url,
              data : $('#form-raport').serialize(),
              success: function (data) {
                alert(data);
              }
          })
        }
      }else{
        $.ajax({
            type : 'POST',
            url: url,
            data : $('#form-raport').serialize(),
            success: function (data) {
              alert(data);
            }
        })
      }

      // $.ajax({
      //   url: base_url+"/getprestasi",
      //   data: { id: id },
      //   method: "post",
      //   dataType: "json",
      //   success: function (data) {
      //     // console.log(data);
      //     $.each(data, function(index, values) {
      //       var tr = `<tr class="row-prestasi">
      //               <td class="text-center">
      //                 `+values['prestasi']+`
      //                 <input type="hidden" name="prestasi[]" value="`+values['prestasi']+`">
      //               </td>
      //               <td class="text-center" width="5%"><button class="btn btn-danger btn-raised btn-xs hapus" id="btn-hapus" title="Hapus Prestasi"><i class="fa fa-trash"></i></button></td>
      //             </tr>`;

      //         $("#table-prestasi tbody").append(tr);
      //     });
      //   },
      // });

    });
  }

  return {
    init: function () {
    
      masterdataTables();
      tambahSiswa();
      ubahSiswa();
      prestasiSiswa();
      addToPrestasi();
      simpanJadwal();
      detailSiswa();
      guruPendamping();
      inputNilai();
      updateRaport();
    }
  };

}();

$(document).ready(function () {
  console.log('master-siswa-js');

  // Date picker
 

  // $(function () {
    $('.datepickers').datetimepicker({
      format: 'DD/MM/YYYY',
    });
  // });

  // $('#staticBackdrop').on('shown.bs.modal', function() {
  //   $('.input-group.datepickers').datepicker({
  //     format: 'DD/MM/YYYY',
  //     // startDate: "01-01-2015",
  //     // endDate: "01-01-2020",
  //     // todayBtn: "linked",
  //     autoclose: true,
  //     // todayHighlight: true,
  //     // container: '#staticBackdrop modal-body'
  //   });
  // });
  

  // select 2 init
  $('.select2bs4').select2({
      dropdownParent: $('#staticBackdrop')
  });

  $('#guru_pendamping').select2({
      dropdownParent: $('#guruPendampingSiswa')
  });

  // punya wali murid ?
  $('#memiliki-wali').click(function(){
    if($(this).is(":checked")){
      // alert("Checkbox is checked.");
      $('.wali-murid').removeClass('d-none');
    }
    else if($(this).is(":not(:checked)")){
      // alert("Checkbox is unchecked.");
      $('.wali-murid').addClass('d-none');
    }
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
  MasterSiswa.init();
});


