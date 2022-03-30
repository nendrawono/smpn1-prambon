<?php

class User extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'orang' => $this->model('UserModel')->getAllUser()
        ];

        $this->view('templates/header', $data);
        $this->view('orang/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail User',
            'orang' => $this->model('UserModel')->getUserByID($id)
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
        if ($this->model('UserModel')->tambahDataUser($_POST) > 0) {
            Flasher::setFlash('Data User telah berhasil ditambahkan.');
        } else {
            Flasher::setFlash('Data User gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASE_URL . '/orang');
        exit;
    }

    public function delete($id)
    {
        if (isset($_POST['_method'])) {
            if ($this->model('UserModel')->deleteUser($id) > 0) {
                Flasher::setFlash('Data User telah berhasil dihapus.');
            } else {
                Flasher::setFlash('Data User gagal dihapus.', 'danger');
            }
            header('Location: ' . BASE_URL . '/orang');
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
        header('Location: ' . BASE_URL . '/orang');
        exit;
    }

    public function search()
    {
        $data = [
            'title' => 'Data User',
            'orang' => $this->model('UserModel')->searchUser($_POST['keyword'])
        ];

        $this->view('templates/header', $data);
        $this->view('orang/index', $data);
        $this->view('templates/footer');
    }
}
