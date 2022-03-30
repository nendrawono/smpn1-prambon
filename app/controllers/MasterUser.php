<?php

class MasterUser extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Master',
            'title_page' => 'Data Master User',
            'user' => $this->model('UserModel')->getAllUser()
        ];

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('master-user/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;
        if ($this->model('UserModel')->tambahDataUser($_POST) > 0) {
            Flasher::setFlash('Data User telah berhasil ditambahkan.');
        } else {
            Flasher::setFlash('Data User gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASE_URL . '/masteruser');
        exit;
    }

    public function delete($id)
    {
        if (isset($_POST['_method'])) {
            $datetime = date('Y-m-d H:i:s');
            $_POST['deleted_at'] = $datetime;
            $_POST['id'] = $id;
            if ($this->model('UserModel')->deleteUser($_POST) > 0) {
                Flasher::setFlash('Data User telah berhasil dihapus.');
            } else {
                Flasher::setFlash('Data User gagal dihapus.', 'danger');
            }
            header('Location: ' . BASE_URL . '/masteruser');
            exit;
        } else {
            die("Error: The Page does not exist.");
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('UserModel')->getUserByID($_POST['id']));
    }

    public function ubah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['updated_at'] = $datetime;
        if ($this->model('UserModel')->ubahDataUser($_POST) > 0) {
            Flasher::setFlash('Data User telah berhasil diubah.');
        } else {
            Flasher::setFlash('Data User gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/masteruser');
        exit;
    }
}
