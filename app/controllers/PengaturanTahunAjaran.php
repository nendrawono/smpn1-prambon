<?php

class PengaturanTahunAjaran extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pengaturan',
            'title_page' => 'Tahun Ajaran',
            'tahun_ajaran' => $this->model('TahunAjaranModel')->getAllTahunAjaran()
        ];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pengaturan-tahun-ajaran/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;
        if ($this->model('TahunAjaranModel')->tambahDataTahunAjaran($_POST) > 0) {
            Flasher::setFlash('Data Tahun Ajaran telah berhasil ditambahkan.');
        } else {
            Flasher::setFlash('Data Tahun Ajaran gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASE_URL . '/pengaturantahunajaran');
        exit;
    }

    public function delete($id)
    {
        if (isset($_POST['_method'])) {
            $datetime = date('Y-m-d H:i:s');
            $_POST['deleted_at'] = $datetime;
            $_POST['id'] = $id;
            if ($this->model('TahunAjaranModel')->deleteTahunAjaran($_POST) > 0) {
                Flasher::setFlash('Data Tahun Ajaran telah berhasil dihapus.');
            } else {
                Flasher::setFlash('Data Tahun Ajaran gagal dihapus.', 'danger');
            }
            header('Location: ' . BASE_URL . '/pengaturantahunajaran');
            exit;
        } else {
            die("Error: The Page does not exist.");
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('TahunAjaranModel')->getTahunAjaranByID($_POST['id']));
    }

    public function ubah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['updated_at'] = $datetime;
        if ($this->model('TahunAjaranModel')->ubahDataTahunAjaran($_POST) > 0) {
            Flasher::setFlash('Data Tahun Ajaran telah berhasil diubah.');
        } else {
            Flasher::setFlash('Data Tahun Ajaran gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/pengaturantahunajaran');
        exit;
    }
}
