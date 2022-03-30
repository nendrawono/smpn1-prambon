$(function () {
  $(".tampilModalTambah").on("click", function () {
    $("#staticBackdropLabel").html("Form Tambah Data Orang");

    $(".modal-footer button[type=submit]").html("Simpan Data");

    $("#nama").val("");
    $("#alamat").val("");
  });

  $(".tampilModalUbah").on("click", function () {
    $("#staticBackdropLabel").html("Form Ubah Data Orang");

    $(".modal-footer button[type=submit]").html("Ubah Data");

    $(".modal-content form").attr(
      "action",
      "http://localhost/phpmvc/public/orang/ubah"
    );

    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/phpmvc/public/orang/getubah",
      data: { id: id },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama").val(data.nama);
        $("#alamat").val(data.alamat);
        $("#id").val(data.id);
        $("#created_at").val(data.created_at);
      },
    });
  });
});
