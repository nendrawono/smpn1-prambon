<div class="card">
    <div class="card-header">
      <?php if($_SESSION["user_login"]['role'] == "ADMIN"){ ?>
      <div class="card-tools">
        <button type="button" class="btn btn-primary tampilModalTambah" data-toggle="modal" data-target="#staticBackdrop">
        <i class="fas fa-plus"></i> Data
            </button>
      </div>
      <?php } ?>
    </div>
    <div class="card-body">
      <table id="tableekstra" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width: 5%">#</th>
            <th>Nama Bakat Minat</th>
            <th>Aksi</th>
          </tr>
        </thead>
          <?php $i = 1; ?>
          <?php foreach ($data['ekstra'] as $o) : ?>
              <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $o['nm_ekstra']; ?></td>
                  <td>
                    <div class="dropdown d-inline">
                          <button class="btn  btn-default btn-sm dropdown-toggle" data-toggle="dropdown" style="height:38px">
                              <i class="fa fa-bars"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                              <a href="#" class="dropdown-item lihatPeserta" data-toggle="modal" data-target="#lihatPeserta" data-id="<?= $o['id']; ?>" data-nm="<?= $o['nm_ekstra']; ?>" title="Lihat Jadwal">Lihat Peserta</a>
                              <?php if($_SESSION["user_login"]['role'] == "ADMIN"){ ?>
                              <a href="#" class="dropdown-item ubahPeserta" data-toggle="modal" data-target="#ubahPeserta" data-id="<?= $o['id']; ?>" data-nm="<?= $o['nm_ekstra']; ?>" title="Atur Jadwal">Tambah/Ubah Peserta</a>
                              <?php } ?>
                            </li>
                          </ul>
                      </div>
                      <?php if($_SESSION["user_login"]['role'] == "ADMIN"){ ?>
                      <button type="button" class="btn btn-warning tampilModalUbah" data-toggle="modal" data-target="#staticBackdrop" data-id="<?= $o['id']; ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                          </svg></button>
                      <form action="<?= BASE_URL; ?>/masterekstra/delete/<?= $o['id']; ?>" method="post" class="d-inline">
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                              </svg></button>
                      </form>
                      <?php } ?>
                  </td>
              </tr>
          <?php endforeach; ?>
      </table>
    </div>
  </div>