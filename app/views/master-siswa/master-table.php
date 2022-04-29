<div class="card">
    <div class="card-header">
      <div class="card-tools">
        <button type="button" class="btn btn-primary tampilModalTambah" data-toggle="modal" data-target="#staticBackdrop">
        <i class="fas fa-plus"></i> Data
            </button>
      </div>
    </div>
    <div class="card-body">
      <table id="tablesiswa" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width: 5%">#</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Prestasi</th>
            <th>Guru Pendamping</th>
            <th>Aksi</th>
          </tr>
        </thead>
          <?php $i = 1; ?>
          <?php foreach ($data['siswa'] as $o) : ?>
              <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $o['id']; ?></td>
                  <td><?= $o['nm_siswa']; ?></td>
                  <td><?= $o['nm_kelas']; ?></td>
                  <td><?php
                      $arrPrestasi = array();
                      $arrPrestasi = explode(";",$o['prestasi']);

                      foreach($arrPrestasi as $val){
                        echo "- ".$val."</br>";
                      }
                  ?></td>
                  <td><?= $o['nm_guru']; ?></td>
                  <td>
                      <!-- <button type="button" class="btn btn-success detailSiswa" data-toggle="modal" data-target="#detailSiswa" data-id="<?= $o['id']; ?>" title="Detail">
                        <i class="fa fa-eye"></i>
                      </button> -->
                      <div class="dropdown d-inline">
                          <button class="btn  btn-default btn-sm dropdown-toggle" data-toggle="dropdown" style="height:38px">
                              <i class="fa fa-bars"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                              <a href="#" class="dropdown-item detailSiswa" data-toggle="modal" data-target="#detailSiswa" data-id="<?= $o['id']; ?>" title="Detail">Lihat Data Siswa</a>
                            </li>
                            <li>
                              <a href="#" class="dropdown-item tampilModalUbah" id="tampilModalUbah" data-toggle="modal" data-target="#staticBackdrop" data-id="<?= $o['id']; ?>">Ubah Data Siswa</a>
                            </li>
                            <li>
                              <a href="#" class="dropdown-item prestasiSiswa" data-toggle="modal" data-target="#prestasiSiswa" data-id="<?= $o['id']; ?>" data-nama="<?= $o['nm_siswa']; ?>">Prestasi Siswa</a>
                            </li>
                            <li>
                              <a href="#" class="dropdown-item guruPendampingSiswa" data-toggle="modal" data-target="#guruPendampingSiswa" data-id="<?= $o['id']; ?>" data-guru="<?= $o['guru_pendamping_sekarang']; ?>" data-nmsiswa="<?= $o['nm_siswa']; ?>">Guru Pendamping</a>
                            </li>
                            <li>
                              <a href="#" class="dropdown-item tampilModalUbah" id="tampilModalUbah" data-toggle="modal" data-target="#staticBackdrop" data-id="<?= $o['id']; ?>">Isi Rapot</a>
                            </li>
                          </ul>
                      </div>
                      <!-- <button type="button" class="btn btn-warning tampilModalUbah" data-toggle="modal" data-target="#staticBackdrop" data-id="<?//= $o['id']; ?>" title="Edit">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                          </svg>
                      </button> -->
                      <!-- <div class="btn-group">
                          <button type="button" class="btn btn-warning">Aksi</button>
                          <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                            <div class="dropdown-menu" role="menu">
                              <a href="#" class="dropdown-item tampilModalUbah" id="tampilModalUbah" data-toggle="modal" data-target="#staticBackdrop" data-id="<?= $o['id']; ?>">Ubah Data Siswa</a>
                              <a class="dropdown-item" href="#">Prestasi Siswa</a>
                              <a class="dropdown-item" href="#">Guru Pendamping</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Isi Rapot</a>
                            </div>
                        </button>
                      </div> -->
                      <form action="<?= BASE_URL; ?>/mastersiswa/delete/<?= $o['id']; ?>" method="post" class="d-inline">
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" title="Hapus" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Data Siswa ?');"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                              </svg></button>
                      </form>
                  </td>
              </tr>
          <?php endforeach; ?>
      </table>
    </div>
  </div>