<?php

class MasterGuru extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Master',
            'title_page' => 'Data Master Guru',
            'guru' => $this->model('GuruModel')->getAllGuru()
        ];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('master-guru/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;
        if ($this->model('GuruModel')->tambahDataGuru($_POST) > 0) {
            Flasher::setFlash('Data Guru telah berhasil ditambahkan.');
        } else {
            Flasher::setFlash('Data Guru gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASE_URL . '/masterguru');
        exit;
    }

    public function delete($id)
    {
        if (isset($_POST['_method'])) {
            $datetime = date('Y-m-d H:i:s');
            $_POST['deleted_at'] = $datetime;
            $_POST['id'] = $id;
            if ($this->model('GuruModel')->deleteGuru($_POST) > 0) {
                Flasher::setFlash('Data Guru telah berhasil dihapus.');
            } else {
                Flasher::setFlash('Data Guru gagal dihapus.', 'danger');
            }
            header('Location: ' . BASE_URL . '/masterguru');
            exit;
        } else {
            die("Error: The Page does not exist.");
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('GuruModel')->getGuruByID($_POST['id']));
    }

    public function ubah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['updated_at'] = $datetime;
        if ($this->model('GuruModel')->ubahDataGuru($_POST) > 0) {
            Flasher::setFlash('Data Guru telah berhasil diubah.');
        } else {
            Flasher::setFlash('Data Guru gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/masterguru');
        exit;
    }
}
