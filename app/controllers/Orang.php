<?php

class Orang extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Orang',
            'orang' => $this->model('OrangModel')->getAllOrang()
        ];

        $this->view('templates/header', $data);
        $this->view('orang/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Orang',
            'orang' => $this->model('OrangModel')->getOrangByID($id)
        ];

        $this->view('templates/header', $data);
        $this->view('orang/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['nama'] = "WONO";
        $_POST['alamat'] = "kKRI FATAHILAH 245";
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;
        if ($this->model('OrangModel')->tambahDataOrang($_POST) > 0) {
            Flasher::setFlash('Data Orang telah berhasil ditambahkan.');
        } else {
            Flasher::setFlash('Data Orang gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASE_URL . '/orang');
        exit;
    }

    public function delete($id)
    {
        if (isset($_POST['_method'])) {
            if ($this->model('OrangModel')->deleteOrang($id) > 0) {
                Flasher::setFlash('Data Orang telah berhasil dihapus.');
            } else {
                Flasher::setFlash('Data Orang gagal dihapus.', 'danger');
            }
            header('Location: ' . BASE_URL . '/orang');
            exit;
        } else {
            die("Error: The Page does not exist.");
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('OrangModel')->getOrangByID($_POST['id']));
    }

    public function ubah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['updated_at'] = $datetime;
        if ($this->model('OrangModel')->ubahDataOrang($_POST) > 0) {
            Flasher::setFlash('Data Orang telah berhasil diubah.');
        } else {
            Flasher::setFlash('Data Orang gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/orang');
        exit;
    }

    public function search()
    {
        $data = [
            'title' => 'Data Orang',
            'orang' => $this->model('OrangModel')->searchOrang($_POST['keyword'])
        ];

        $this->view('templates/header', $data);
        $this->view('orang/index', $data);
        $this->view('templates/footer');
    }
}
