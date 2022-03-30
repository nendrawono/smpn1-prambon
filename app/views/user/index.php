<div class="container" style="padding-top: 70px;">

    <div class="row">
        <div class="col">
            <h1>Daftar Orang</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tampilModalTambah" data-toggle="modal" data-target="#staticBackdrop">
                Tambah Data Orang
            </button>


            <div class="row float-right">
                <div class="col">
                    <form action="<?= BASE_URL; ?>/orang/search" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Orang" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?php Flasher::flash(); ?>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Data Orang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= BASE_URL; ?>/orang/tambah" class="needs-validation" method="POST" novalidate>
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="created_at" id="created_at">
                            <div class="modal-body">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                                <div class="invalid-feedback">
                                    Nama tidak boleh kosong.
                                </div>
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                                <div class="invalid-feedback">
                                    Alamat tidak boleh kosong.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data['orang'] as $o) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $o['nama']; ?></td>
                            <td><?= $o['alamat']; ?></td>
                            <td>
                                <a href="<?= BASE_URL; ?>/orang/detail/<?= $o['id']; ?>" class="btn btn-success">Detail</a>
                                <button type="button" class="btn btn-warning tampilModalUbah" data-toggle="modal" data-target="#staticBackdrop" data-id="<?= $o['id']; ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg></button>
                                <form action="<?= BASE_URL; ?>/orang/delete/<?= $o['id']; ?>" method="post" class="d-inline">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                        </svg></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
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
</script>