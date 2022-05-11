<?php

class Raport extends Controller
{
    public function index($id)
    {
        $data = [
            'title' => 'Master',
            'title_page' => 'Data Master Siswa',
            'siswa' => $this->model('SiswaModel')->getAllSiswa(),
            'select2_kelas' => $this->model('SiswaModel')->getAllKelas(),
            'select2_guru' => $this->model('SiswaModel')->getAllGuru()
        ];

        // print_r($data);
        // print("<pre>".print_r($data,true)."</pre>");
        // die();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        // $this->view('master-siswa/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $datetime = date('Y-m-d H:i:s');

        $_POST['diterima_tgl'] = date('Y-m-d', strtotime($_POST['diterima_tgl']));
        $_POST['tgl_lahir'] = date('Y-m-d', strtotime($_POST['tgl_lahir']));
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;

        if($_FILES['reff_passfoto']){
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = $_POST['nis'].'.jpg';
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['reff_passfoto']['size'];
			$file_tmp = $_FILES['reff_passfoto']['tmp_name'];
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			

                    if (!file_exists(DIR_UPLOAD_IMG)) {
                        mkdir(DIR_UPLOAD_IMG, 0777, true);
                    }

					move_uploaded_file($file_tmp, DIR_UPLOAD_IMG.$nama);
                    $_POST['reff_passfoto'] = DIR_UPLOAD_IMG.$nama;

				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}

        if ($this->model('SiswaModel')->tambahDataSiswa($_POST) > 0) {
            Flasher::setFlash('Data Siswa telah berhasil ditambahkan.');
        } else {
            Flasher::setFlash('Data Siswa gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASE_URL . '/mastersiswa');
        exit;
    }

    public function delete($id)
    {
        if (isset($_POST['_method'])) {
            $datetime = date('Y-m-d H:i:s');
            $_POST['deleted_at'] = $datetime;
            $_POST['id'] = $id;
            if ($this->model('SiswaModel')->deleteSiswa($_POST) > 0) {
                Flasher::setFlash('Data User telah berhasil dihapus.');
            } else {
                Flasher::setFlash('Data User gagal dihapus.', 'danger');
            }
            header('Location: ' . BASE_URL . '/mastersiswa');
            exit;
        } else {
            die("Error: The Page does not exist.");
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model('SiswaModel')->getSiswaByID($_POST['id']));
    }

    public function getPrestasi()
    {
        echo json_encode($this->model('SiswaModel')->getPrestasiID($_POST['id']));
    }

    public function ubah()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['diterima_tgl'] = date('Y-m-d', strtotime($_POST['diterima_tgl']));
        $_POST['tgl_lahir'] = date('Y-m-d', strtotime($_POST['tgl_lahir']));
        $_POST['updated_at'] = $datetime;

        if($_FILES['reff_passfoto']){
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = $_POST['nis'].'.jpg';
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['reff_passfoto']['size'];
			$file_tmp = $_FILES['reff_passfoto']['tmp_name'];
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
                    
					move_uploaded_file($file_tmp, DIR_UPLOAD_IMG.$nama);
                    $_POST['reff_passfoto'] = DIR_UPLOAD_IMG.$nama;

				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}

        if ($this->model('SiswaModel')->ubahDataSiswa($_POST) > 0) {
            Flasher::setFlash('Data Siswa telah berhasil diubah.');
        } else {
            Flasher::setFlash('Data Siswa gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/mastersiswa');
        exit;
    }

    public function simpanPrestasi()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;
        
        if ($this->model('siswaModel')->simpanPrestasiSiswa($_POST) > 0) {
            Flasher::setFlash('Prestasi telah berhasil ditambahkan.');
        } else {
            Flasher::setFlash('Prestasi Kelas gagal ditambahkan.', 'danger');
        }
        header('Location: ' . BASE_URL . '/mastersiswa');
        exit;
    }

    public function ubahGuruPendampingSiswa()
    {
        $datetime = date('Y-m-d H:i:s');
        $_POST['created_at'] = $datetime;
        $_POST['updated_at'] = $datetime;
        
        if ($this->model('siswaModel')->ubahGuruPendampingSiswa($_POST) > 0) {
            Flasher::setFlash('Guru Pendamping telah berhasil diubah.');
        } else {
            Flasher::setFlash('Guru Pendamping gagal diubah.', 'danger');
        }
        header('Location: ' . BASE_URL . '/mastersiswa');
        exit;
    }
}
