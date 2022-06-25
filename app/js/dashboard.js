const MasterDashboard = function () {

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

  return {
    init: function () {
    
    }
  };

}();

$(document).ready(function () {
  console.log('dashboard-js');

      var url = 'masterkelas/lihatjadwal';
      console.log(dataChartTidakEmosi);

      // create jadwal
      $("#list-jadwal").empty();
      var arrHari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];   
      var id = $('#kelas_sekarang_id').val();

      // alert(id);
      for(var i=0; i<6;i++){      
        $.ajax({
          url: url,
          data: { id: id, hari: arrHari[i] },
          method: "post",
          dataType: "json",
          async: false,
          success: function (data) {
            var countSpan = data.length;
            var rowSpan = 'rowspan="'+countSpan+'"';
            var fristTD = '<td class="tg-0pky text-center" '+rowSpan+' style="vertical-align: middle;" >'+arrHari[i]+'</td>';

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
      // end create jadwal


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


  var areaChartData = {
    // labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    labels  : label,
    datasets: [
      {
        label               : 'Emosi',
        backgroundColor     : 'rgba(255, 0, 0,0.9)',
        borderColor         : 'rgba(255, 0, 0,0.8)',
        pointRadius          : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(255, 0, 0,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : dataChartEmosi
        // data                : [2]
        // data                : [28, 48, 40, 19, 86, 27, 90]
      },
      {
        label               : 'Tidak Emosi',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius         : false,
        pointColor          : 'rgba(60,141,188,1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : dataChartTidakEmosi
        // data                : [65]
        // data                : [65, 59, 80, 81, 56, 55, 40]
      },
    ]
  }

  var areaChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: true
    },
    scales: {
      xAxes: [{
        gridLines : {
          display : false,
        }
      }],
      yAxes: [{
        gridLines : {
          display : false,
        }
      }]
    }
  }

  //-------------
  //- LINE CHART -
  //--------------
  var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
  var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
  var lineChartData = jQuery.extend(true, {}, areaChartData)
  lineChartData.datasets[0].fill = false;
  lineChartData.datasets[1].fill = false;
  lineChartOptions.datasetFill = false;

  var lineChart = new Chart(lineChartCanvas, { 
    type: 'line',
    data: lineChartData, 
    options: lineChartOptions
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  // $.fn.dataTable.ext.errMode = 'none';
  // MasterEkstra.init();
});


