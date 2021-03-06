<?php

class MasterPengumuman extends Controller
{
    public function index()
    {

        // var_dump("Master Pengumuman");
        // die();

        $data = [
            'title' => 'Pengaturan',
            'title_page' => 'Pengumuman',
            'pengumuman' => $this->model('PengumumanModel')->getAllPengumuman()
        ];
        // var_dump($data['pengumuman'][0]['isi_pengumuman']);
        // die();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('master-pengumuman/index', $data);
        $this->view('templates/footer');
    }

    // public function tambah()
    // {
    //     $datetime = date('Y-m-d H:i:s');
    //     $_POST['created_at'] = $datetime;
    //     $_POST['updated_at'] = $datetime;
    //     if ($this->model('EkstraModel')->tambahDataEkstra($_POST) > 0) {
    //         Flasher::setFlash('Data Bakat Minat telah berhasil ditambahkan.');
    //     } else {
    //         Flasher::setFlash('Data Bakat Minat gagal ditambahkan.', 'danger');
    //     }
    //     header('Location: ' . BASE_URL . '/masterekstra');
    //     exit;
    // }

    // public function delete($id)
    // {
    //     if (isset($_POST['_method'])) {
    //         $datetime = date('Y-m-d H:i:s');
    //         $_POST['deleted_at'] = $datetime;
    //         $_POST['id'] = $id;
    //         if ($this->model('EkstraModel')->deleteEkstra($_POST) > 0) {
    //             Flasher::setFlash('Data Bakat Minat telah berhasil dihapus.');
    //         } else {
    //             Flasher::setFlash('Data Bakat Minat gagal dihapus.', 'danger');
    //         }
    //         header('Location: ' . BASE_URL . '/masterekstra');
    //         exit;
    //     } else {
    //         die("Error: The Page does not exist.");
    //     }
    // }

    // public function getUbah()
    // {
    //     echo json_encode($this->model('EkstraModel')->getEkstraByID($_POST['id']));
    // }

    public function ubah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['updated_at'] = $datetime;
        if ($this->model('PengumumanModel')->ubahDataPengumuman($_POST) > 0) {
            Flasher::setFlash('Data Pengumuman telah berhasil diubah.');
        } else {
            Flasher::setFlash('Data Pengumuman gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/masterpengumuman');
        exit;
    }
}
