<?php

class MasterJenisABK extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Master',
            'title_page' => 'Data Master Jenis ABK',
            'jenis_abk' => $this->model('JenisAbkModel')->getAllJenisAbk(),
        ];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('master-jenis-abk/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;
        if ($this->model('JenisAbkModel')->tambahDataJenisAbk($_POST) > 0) {
            Flasher::setFlash('Data Jenis ABK telah berhasil ditambahkan.');
        } else {
            Flasher::setFlash('Data Jenis ABK gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASE_URL . '/masterjenisabk');
        exit;
    }

    public function delete($id)
    {
        if (isset($_POST['_method'])) {
            $datetime = date('Y-m-d H:i:s');
            $_POST['deleted_at'] = $datetime;
            $_POST['id'] = $id;
            if ($this->model('JenisAbkModel')->deleteJenisAbk($_POST) > 0) {
                Flasher::setFlash('Data Jenis ABK telah berhasil dihapus.');
            } else {
                Flasher::setFlash('Data Jenis ABK gagal dihapus.', 'danger');
            }
            header('Location: ' . BASE_URL . '/masterjenisabk');
            exit;
        } else {
            die("Error: The Page does not exist.");
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('JenisAbkModel')->getJenisAbkByID($_POST['id']));
    }

    public function ubah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['updated_at'] = $datetime;
        if ($this->model('JenisAbkModel')->ubahDataJenisAbk($_POST) > 0) {
            Flasher::setFlash('Data Jenis ABK telah berhasil diubah.');
        } else {
            Flasher::setFlash('Data Jenis ABK gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/masterjenisabk');
        exit;
    }
}
