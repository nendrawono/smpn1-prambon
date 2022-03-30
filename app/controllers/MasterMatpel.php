<?php

class MasterMatpel extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Master',
            'title_page' => 'Data Master Mata Pelajaran',
            'matpel' => $this->model('MatpelModel')->getAllMatpel()
        ];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('master-matpel/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;
        if ($this->model('MatpelModel')->tambahDataMatpel($_POST) > 0) {
            Flasher::setFlash('Data Mata Pelajaran telah berhasil ditambahkan.');
        } else {
            Flasher::setFlash('Data Mata Pelajaran gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASE_URL . '/mastermatpel');
        exit;
    }

    public function delete($id)
    {
        if (isset($_POST['_method'])) {
            $datetime = date('Y-m-d H:i:s');
            $_POST['deleted_at'] = $datetime;
            $_POST['id'] = $id;
            if ($this->model('MatpelModel')->deleteMatpel($_POST) > 0) {
                Flasher::setFlash('Data Mata Pelajaran telah berhasil dihapus.');
            } else {
                Flasher::setFlash('Data Mata Pelajaran gagal dihapus.', 'danger');
            }
            header('Location: ' . BASE_URL . '/mastermatpel');
            exit;
        } else {
            die("Error: The Page does not exist.");
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('MatpelModel')->getMatpelByID($_POST['id']));
    }

    public function ubah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['updated_at'] = $datetime;
        if ($this->model('MatpelModel')->ubahDataMatpel($_POST) > 0) {
            Flasher::setFlash('Data Mata Pelajaran telah berhasil diubah.');
        } else {
            Flasher::setFlash('Data Mata Pelajaran gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/mastermatpel');
        exit;
    }
}
