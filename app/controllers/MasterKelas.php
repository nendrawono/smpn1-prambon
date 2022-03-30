<?php

class MasterKelas extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Master',
            'title_page' => 'Data Master Kelas',
            'kelas' => $this->model('KelasModel')->getAllKelas()
        ];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('master-kelas/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;
        if ($this->model('KelasModel')->tambahDataKelas($_POST) > 0) {
            Flasher::setFlash('Data Kelas telah berhasil ditambahkan.');
        } else {
            Flasher::setFlash('Data Kelas gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASE_URL . '/masterkelas');
        exit;
    }

    public function delete($id)
    {
        if (isset($_POST['_method'])) {
            $datetime = date('Y-m-d H:i:s');
            $_POST['deleted_at'] = $datetime;
            $_POST['id'] = $id;
            if ($this->model('KelasModel')->deleteKelas($_POST) > 0) {
                Flasher::setFlash('Data Kelas telah berhasil dihapus.');
            } else {
                Flasher::setFlash('Data Kelas gagal dihapus.', 'danger');
            }
            header('Location: ' . BASE_URL . '/masterkelas');
            exit;
        } else {
            die("Error: The Page does not exist.");
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('KelasModel')->getKelasByID($_POST['id']));
    }

    public function ubah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['updated_at'] = $datetime;
        if ($this->model('KelasModel')->ubahDataKelas($_POST) > 0) {
            Flasher::setFlash('Data Kelas telah berhasil diubah.');
        } else {
            Flasher::setFlash('Data Kelas gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/masterkelas');
        exit;
    }
}
