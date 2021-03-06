<?php

class MasterEkstra extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Master',
            'title_page' => 'Data Master Bakat Minat',
            'ekstra' => $this->model('EkstraModel')->getAllEkstra()
        ];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('master-ekstra/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;
        if ($this->model('EkstraModel')->tambahDataEkstra($_POST) > 0) {
            Flasher::setFlash('Data Bakat Minat telah berhasil ditambahkan.');
        } else {
            Flasher::setFlash('Data Bakat Minat gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASE_URL . '/masterekstra');
        exit;
    }

    public function delete($id)
    {
        if (isset($_POST['_method'])) {
            $datetime = date('Y-m-d H:i:s');
            $_POST['deleted_at'] = $datetime;
            $_POST['id'] = $id;
            if ($this->model('EkstraModel')->deleteEkstra($_POST) > 0) {
                Flasher::setFlash('Data Bakat Minat telah berhasil dihapus.');
            } else {
                Flasher::setFlash('Data Bakat Minat gagal dihapus.', 'danger');
            }
            header('Location: ' . BASE_URL . '/masterekstra');
            exit;
        } else {
            die("Error: The Page does not exist.");
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('EkstraModel')->getEkstraByID($_POST['id']));
    }

    public function getUbahPeserta()
    {
        echo json_encode($this->model('EkstraModel')->getPesertaByID($_POST));
    }

    public function getSelect2Peserta()
    {
        echo json_encode($this->model('EkstraModel')->getSelect2Peserta($_POST));
    }

    public function ubah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['updated_at'] = $datetime;
        if ($this->model('EkstraModel')->ubahDataEkstra($_POST) > 0) {
            Flasher::setFlash('Data Bakat Minat telah berhasil diubah.');
        } else {
            Flasher::setFlash('Data Bakat Minat gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/masterekstra');
        exit;
    }

    public function ubahPeserta()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['updated_at'] = $datetime;
        if ($this->model('EkstraModel')->ubahDataPeserta($_POST) > 0) {
            Flasher::setFlash('Data Peserta Bakat Minat telah berhasil diubah.');
        } else {
            Flasher::setFlash('Data Peserta Bakat Minat gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/masterekstra');
        exit;
    }
}
